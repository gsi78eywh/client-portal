<?php

namespace Tests\Feature;

use App\Models\Account;
use App\Models\AccountProfile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BusinessRegistrationPageTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
    }

    public function test_business_registration_page_loads_and_verifies_structure(): void
    {
        // Setup registration session for business
        $response = $this->withSession([
            'registration' => [
                'profile' => [
                    'first_name' => 'Maria',
                    'last_name' => 'Santos',
                    'date_of_birth' => '1990-01-01',
                    'country' => 'Philippines',
                ],
                'account' => [
                    'account_type' => 'business',
                ],
            ],
        ])->get(route('register.business'));

        $response->assertStatus(200);

        $content = $response->getContent();

        // 1. Verify NO TIN field anywhere
        $this->assertStringNotContainsString('Tax Identification Number', $content);
        $this->assertStringNotContainsString('name="tin"', $content);
        $this->assertStringNotContainsString('id="tin"', $content);

        // 2. Verify NO primary registered address field anywhere
        $this->assertStringNotContainsString('Primary registered address', $content);
        $this->assertStringNotContainsString('name="primary_address"', $content);
        $this->assertStringNotContainsString('id="primary_address"', $content);

        // 3. Verify Industry is still a dropdown / select field with "Select industry"
        $this->assertStringContainsString('name="industry"', $content);
        $this->assertStringContainsString('Select industry', $content);
        $this->assertStringContainsString('<select', $content);

        // 4. Verify Entity type is a select field with "Select entity type"
        $this->assertStringContainsString('name="business_account_type"', $content);
        $this->assertStringContainsString('Select entity type', $content);

        // 5. Verify Company email attributes
        $this->assertStringContainsString('name="company_email"', $content);
        $this->assertStringContainsString('type="email"', $content);
        $this->assertStringContainsString('Company email (optional)', strip_tags($content));
        $this->assertStringContainsString('info@yourcompany.com', $content);

        // 6. Verify Company phone attributes
        $this->assertStringContainsString('name="company_phone"', $content);
        $this->assertStringContainsString('type="tel"', $content);
        $this->assertStringContainsString('Company phone (optional)', strip_tags($content));
        $this->assertStringContainsString('+63 2 8XXX XXXX', $content);

        // 7. Verify field order:
        // registered_name -> business_account_type -> industry -> trade_name -> registration_number -> registration_date -> company_email -> company_phone -> relationship -> is_authorized
        $posRegName = strpos($content, 'name="registered_name"');
        $posAccountType = strpos($content, 'name="business_account_type"');
        $posIndustry = strpos($content, 'name="industry"');
        $posTradeName = strpos($content, 'name="trade_name"');
        $posRegNumber = strpos($content, 'name="registration_number"');
        $posRegDate = strpos($content, 'name="registration_date"');
        $posCompanyEmail = strpos($content, 'name="company_email"');
        $posCompanyPhone = strpos($content, 'name="company_phone"');
        $posRelationship = strpos($content, 'name="relationship"');
        $posIsAuthorized = strpos($content, 'name="is_authorized"');

        $this->assertNotFalse($posRegName);
        $this->assertNotFalse($posAccountType);
        $this->assertNotFalse($posIndustry);
        $this->assertNotFalse($posTradeName);
        $this->assertNotFalse($posRegNumber);
        $this->assertNotFalse($posRegDate);
        $this->assertNotFalse($posCompanyEmail);
        $this->assertNotFalse($posCompanyPhone);
        $this->assertNotFalse($posRelationship);
        $this->assertNotFalse($posIsAuthorized);

        $this->assertTrue($posRegName < $posAccountType, 'registered_name should be before business_account_type');
        $this->assertTrue($posAccountType < $posIndustry, 'business_account_type should be before industry');
        $this->assertTrue($posIndustry < $posTradeName, 'industry should be before trade_name');
        $this->assertTrue($posTradeName < $posRegNumber, 'trade_name should be before registration_number');
        $this->assertTrue($posRegNumber < $posRegDate, 'registration_number should be before registration_date');
        $this->assertTrue($posRegDate < $posCompanyEmail, 'registration_date should be before company_email');
        $this->assertTrue($posCompanyEmail < $posCompanyPhone, 'company_email should be before company_phone');
        $this->assertTrue($posCompanyPhone < $posRelationship, 'company_phone should be before relationship');
        $this->assertTrue($posRelationship < $posIsAuthorized, 'relationship should be before is_authorized');
    }

    public function test_form_submission_succeeds_without_tin_and_address(): void
    {
        $response = $this->withSession([
            'registration' => [
                'profile' => [
                    'first_name' => 'Maria',
                    'last_name' => 'Santos',
                    'date_of_birth' => '1990-01-01',
                    'country' => 'Philippines',
                ],
                'account' => [
                    'account_type' => 'business',
                ],
            ],
        ])->post(route('business.update'), [
            'business_account_type' => 'Corporation',
            'registered_name' => 'Apex Enterprises Inc.',
            'trade_name' => 'Apex Global',
            'industry' => 'Information Technology',
            'registration_number' => 'CS202511223',
            'registration_date' => '2025-01-15',
            'company_email' => 'contact@apexglobal.ph',
            'company_phone' => '+63 2 8123 4567',
            'relationship' => 'Owner / Founder',
            'is_authorized' => 'Yes',
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('register.contact'));

        // Verify session data was stored properly
        $info = session('registration.information');
        $this->assertEquals('Apex Enterprises Inc.', $info['registered_name']);
        $this->assertEquals('Corporation', $info['business_account_type']);
        $this->assertEquals('Information Technology', $info['industry']);
        $this->assertEquals('contact@apexglobal.ph', $info['company_email']);
        $this->assertEquals('+63 2 8123 4567', $info['company_phone']);
    }

    public function test_form_validation_does_not_require_tin_or_address(): void
    {
        $response = $this->withSession([
            'registration' => [
                'profile' => [
                    'first_name' => 'Maria',
                    'last_name' => 'Santos',
                    'date_of_birth' => '1990-01-01',
                    'country' => 'Philippines',
                ],
                'account' => [
                    'account_type' => 'business',
                ],
            ],
        ])->post(route('business.update'), []);

        $response->assertSessionHasErrors(['registered_name', 'business_account_type']);
        $response->assertSessionDoesntHaveErrors(['tin', 'primary_address']);
    }
}
