<?php

namespace Tests\Unit;

use App\Models\Account;
use App\Models\AccountProfile;
use App\Models\User;
use App\Models\UserProfile;
use App\Services\PortalSessionService;
use App\Services\RegistrationService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class RegistrationServiceTest extends TestCase
{
    use RefreshDatabase;

    protected RegistrationService $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = new RegistrationService(new PortalSessionService());
    }

    public function test_can_put_and_get_registration_data(): void
    {
        $this->service->putData('profile', ['first_name' => 'John', 'last_name' => 'Doe']);

        $this->assertTrue($this->service->hasProfile());
        $this->assertEquals('John', $this->service->getData('profile.first_name'));
        $this->assertEquals(['first_name' => 'John', 'last_name' => 'Doe'], $this->service->getData('profile'));
    }

    public function test_step_guards_work_correctly(): void
    {
        $this->assertFalse($this->service->hasProfile());
        $this->assertFalse($this->service->hasAccount());
        $this->assertFalse($this->service->hasInformation());
        $this->assertFalse($this->service->hasContact());
        $this->assertFalse($this->service->isContactVerified());
        $this->assertFalse($this->service->hasSecurity());

        $this->service->putData('profile', ['first_name' => 'Jane']);
        $this->assertTrue($this->service->hasProfile());
        $this->assertFalse($this->service->hasAccount());

        $this->service->putData('account', ['account_type' => 'personal']);
        $this->assertTrue($this->service->hasAccount());
        $this->assertEquals('personal', $this->service->getAccountType());

        $this->service->putData('information', ['account_name' => 'Jane Records']);
        $this->assertTrue($this->service->hasInformation());

        $this->service->putData('contact', ['email' => 'jane@example.com', 'mobile_number' => '123456789']);
        $this->assertTrue($this->service->hasContact());

        $this->assertFalse($this->service->isContactVerified());
        $this->service->putData('contact_verified', true);
        $this->assertTrue($this->service->isContactVerified());

        $this->service->putData('completed', true);
        $this->assertTrue($this->service->hasSecurity());
    }

    public function test_verification_code_generation_and_validation(): void
    {
        $code = $this->service->generateVerificationCode();
        $this->assertEquals('123456', $code);
        $this->assertFalse($this->service->isContactVerified());

        $this->assertFalse($this->service->verifyCode('000000'));
        $this->assertFalse($this->service->isContactVerified());

        $this->assertTrue($this->service->verifyCode('123456'));
        $this->assertTrue($this->service->isContactVerified());
    }

    public function test_complete_registration_creates_records_and_authenticates_user(): void
    {
        $this->service->putData('profile', [
            'first_name' => 'Carlos',
            'middle_name' => 'M',
            'last_name' => 'Roxas',
            'suffix' => 'Jr.',
            'date_of_birth' => '1990-05-15',
            'gender' => 'male',
            'country' => 'Philippines',
        ]);

        $this->service->putData('account', [
            'account_type' => 'business',
        ]);

        $this->service->putData('information', [
            'account_type' => 'business',
            'business_account_type' => 'Corporation',
            'registered_name' => 'Apex Solutions Inc.',
            'trade_name' => 'Apex',
            'industry' => 'Technology',
            'country' => 'Philippines',
        ]);

        $this->service->putData('contact', [
            'email' => 'carlos@apexsolutions.com',
            'mobile_number' => '+639171234567',
        ]);

        $this->service->putData('security', [
            'password' => 'SecurePass123!',
        ]);

        $created = $this->service->completeRegistration();

        $this->assertDatabaseHas('users', [
            'email' => 'carlos@apexsolutions.com',
            'name' => 'Carlos Roxas',
        ]);

        $this->assertDatabaseHas('user_profiles', [
            'first_name' => 'Carlos',
            'last_name' => 'Roxas',
            'suffix' => 'Jr.',
            'gender' => 'male',
        ]);

        $this->assertDatabaseHas('accounts', [
            'id' => $created['account']->id,
            'status' => 'active',
        ]);

        $this->assertDatabaseHas('account_profiles', [
            'account_id' => $created['account']->id,
            'legal_name' => 'Apex Solutions Inc.',
            'trade_name' => 'Apex',
            'account_type' => 'Corporation',
        ]);

        $this->assertDatabaseHas('account_user', [
            'account_id' => $created['account']->id,
            'user_id' => $created['user']->id,
            'is_administrator' => 1,
        ]);

        $this->assertTrue(Auth::check());
        $this->assertEquals($created['user']->id, Auth::id());
        $this->assertTrue(session('client.authenticated'));
        $this->assertEquals($created['account']->id, session('client.account_id'));
    }
}
