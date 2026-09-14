<?php

namespace Tests\Feature;

use App\Models\ContactVerification;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProfessionStepTest extends TestCase
{
    use RefreshDatabase;

    protected function setupProfileAndAccount(): void
    {
        $this->post(route('profile.update'), [
            'first_name' => 'Maria',
            'middle_name' => 'Clara',
            'last_name' => 'Santos',
            'suffix' => null,
            'date_of_birth' => '1992-05-15',
            'gender' => 'female',
            'country' => 'Philippines',
        ])->assertRedirect(route('register.account'));

        $this->post(route('account.update'), [
            'account_type' => 'profession',
        ])->assertRedirect(route('register.profession'));
    }

    public function test_cannot_access_profession_step_without_completing_account_step(): void
    {
        $response = $this->get(route('register.profession'));
        $response->assertRedirect(route('register.account'));
    }

    public function test_can_view_profession_step_with_expanded_professions_and_no_generic_professional_or_tin_or_country(): void
    {
        $this->setupProfileAndAccount();

        $response = $this->get(route('register.profession'));
        $response->assertStatus(200);
        $response->assertViewIs('portal.registration.profession');

        // Check required specific professions are present
        $response->assertSee('Doctor / Physician');
        $response->assertSee('Lawyer / Legal Professional');
        $response->assertSee('Accountant / CPA');
        $response->assertSee('Engineer');
        $response->assertSee('Architect');
        $response->assertSee('Dentist');
        $response->assertSee('Nurse / Healthcare Practitioner');
        $response->assertSee('Consultant');
        $response->assertSee('Therapist / Mental Health Counselor');
        $response->assertSee('Teacher / Educator');
        $response->assertSee('Freelancer / Creative Professional');
        $response->assertSee('Business Consultant');
        $response->assertSee('Financial Advisor / Wealth Consultant');
        $response->assertSee('Real Estate Broker / Appraiser');
        $response->assertSee('IT / Software Consultant');
        $response->assertSee('Clinic / Outpatient Practice');
        $response->assertSee('Independent Practice / Solo Office');
        $response->assertSee('Other');

        // Verify generic "Professional" option is completely removed
        $response->assertDontSee('<option value="Professional"', false);
        $response->assertDontSee('>Professional</option>', false);

        // Verify TIN field is completely removed
        $response->assertDontSee('Tax Identification Number');
        $response->assertDontSee('name="tin"', false);

        // Verify Country / Region field is completely removed from the form UI
        $response->assertDontSee('Country / Region');
        $response->assertDontSee('name="country"', false);

        // Verify conditional "Other" fields exist in markup
        $response->assertSee('Specify Profession / Practice Type');
        $response->assertSee('name="profession_other"', false);
        $response->assertSee('Specify Relationship to Account');
        $response->assertSee('name="relationship_other"', false);
    }

    public function test_successful_profession_step_submission_with_specific_profession(): void
    {
        $this->setupProfileAndAccount();

        $response = $this->post(route('profession.update'), [
            'practice_name' => 'Santos Dental & Orthodontic Practice',
            'profession' => 'Dentist',
            'primary_address' => 'Suite 302 Medical Plaza, Ortigas, Pasig City',
            'registration_number' => 'PRC-0098765',
            'professional_email' => 'contact@santosdental.ph',
            'contact_number' => '+63 917 123 4567',
            'relationship' => 'Lead Practitioner',
            'is_authorized' => 'Yes',
        ]);

        $response->assertRedirect(route('register.contact'));

        // Assert session has the data properly saved
        $this->assertEquals('Dentist', session('registration.information.profession'));
        $this->assertEquals('Santos Dental & Orthodontic Practice', session('registration.information.practice_name'));
        $this->assertEquals('Lead Practitioner', session('registration.information.relationship'));
        // Country is inherited from Step 1 Profile without being asked in Step 3
        $this->assertEquals('Philippines', session('registration.information.country'));
        // TIN is not collected
        $this->assertNull(session('registration.information.tin'));
    }

    public function test_other_profession_requires_specification(): void
    {
        $this->setupProfileAndAccount();

        $response = $this->from(route('register.profession'))->post(route('profession.update'), [
            'practice_name' => 'Custom Practice Group',
            'profession' => 'Other',
            'profession_other' => '',
            'primary_address' => '123 Main St.',
            'relationship' => 'Owner / Founder',
            'is_authorized' => 'Yes',
        ]);

        $response->assertRedirect(route('register.profession'));
        $response->assertSessionHasErrors(['profession_other']);
        $this->assertEquals(
            'Please specify your profession or practice type.',
            session('errors')->first('profession_other')
        );
    }

    public function test_other_relationship_requires_specification(): void
    {
        $this->setupProfileAndAccount();

        $response = $this->from(route('register.profession'))->post(route('profession.update'), [
            'practice_name' => 'Santos Engineering Services',
            'profession' => 'Engineer',
            'primary_address' => 'Suite 100 Commercial Center, Makati',
            'relationship' => 'Other',
            'relationship_other' => '',
            'is_authorized' => 'Yes',
        ]);

        $response->assertRedirect(route('register.profession'));
        $response->assertSessionHasErrors(['relationship_other']);
        $this->assertEquals(
            'Please specify your relationship to the account.',
            session('errors')->first('relationship_other')
        );
    }

    public function test_other_profession_and_relationship_with_details_succeeds(): void
    {
        $this->setupProfileAndAccount();

        $response = $this->post(route('profession.update'), [
            'practice_name' => 'Metro Veterinary Wellness Clinic',
            'profession' => 'Other',
            'profession_other' => 'Veterinarian / Animal Care Specialist',
            'primary_address' => '88 Katipunan Ave, Quezon City',
            'relationship' => 'Other',
            'relationship_other' => 'Managing Veterinary Director',
            'is_authorized' => 'Yes',
        ]);

        $response->assertRedirect(route('register.contact'));
        $this->assertEquals('Other', session('registration.information.profession'));
        $this->assertEquals('Veterinarian / Animal Care Specialist', session('registration.information.profession_other'));
        $this->assertEquals('Other', session('registration.information.relationship'));
        $this->assertEquals('Managing Veterinary Director', session('registration.information.relationship_other'));
    }

    public function test_full_7_step_registration_with_profession_account(): void
    {
        // 1. Profile
        $this->post(route('profile.update'), [
            'first_name' => 'Alexander',
            'middle_name' => 'Cruz',
            'last_name' => 'Bautista',
            'suffix' => null,
            'date_of_birth' => '1987-03-22',
            'gender' => 'male',
            'country' => 'Philippines',
        ])->assertRedirect(route('register.account'));

        // 2. Account Type: Profession
        $this->post(route('account.update'), [
            'account_type' => 'profession',
        ])->assertRedirect(route('register.profession'));

        // 3. Profession Information (Doctor) - No TIN, No Country in request
        $this->post(route('profession.update'), [
            'practice_name' => 'Bautista Cardiology & Internal Medicine',
            'profession' => 'Doctor',
            'primary_address' => 'Medical Center Building, Room 502, Cebu City',
            'registration_number' => 'PRC-0054321',
            'professional_email' => 'dr.bautista@example.com',
            'contact_number' => '+63 918 222 3344',
            'relationship' => 'Lead Practitioner',
            'is_authorized' => 'Yes',
        ])->assertRedirect(route('register.contact'));

        // 4. Contact Information
        $this->post(route('contact.update'), [
            'email' => 'dr.bautista@example.com',
            'mobile_number' => '+639182223344',
        ])->assertRedirect(route('register.verification'));

        // 5. Verify Email
        $otp = ContactVerification::where('channel', 'email')
            ->where('destination', 'dr.bautista@example.com')
            ->latest('id')
            ->first()
            ->otp_code;

        $this->post(route('verification.email.verify'), [
            'verification_code' => $otp,
        ])->assertRedirect(route('register.security'));

        // 6. Security Password
        $this->post(route('security.create'), [
            'password' => 'SafeDocPassword2026!',
            'password_confirmation' => 'SafeDocPassword2026!',
            'terms' => '1',
            'privacy_policy' => '1',
        ])->assertRedirect(route('register.confirmation'));

        // 7. Complete Registration
        $this->post(route('register.complete'))
            ->assertRedirect(route('account.created'));

        $this->assertAuthenticated();

        $user = User::where('email', 'dr.bautista@example.com')->first();
        $this->assertNotNull($user);

        $account = $user->currentAccount();
        $this->assertEquals('profession', $account->account_type);
        $this->assertEquals('Professional / Practitioner', $account->profile->account_type);
        $this->assertEquals('Bautista Cardiology & Internal Medicine', $account->profile->legal_name);
        $this->assertEquals('Doctor', $account->profile->industry_profession);
        // Ensure TIN is null (not collected during registration)
        $this->assertNull($account->profile->tin);

        // Check pivot table relationship
        $pivot = \Illuminate\Support\Facades\DB::table('account_user')
            ->where('account_id', $account->id)
            ->where('user_id', $user->id)
            ->first();
        $this->assertEquals('Lead Practitioner', $pivot->relationship);
        $this->assertTrue((bool)$pivot->is_administrator);
    }
}
