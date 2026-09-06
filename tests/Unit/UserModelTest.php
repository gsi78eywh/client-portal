<?php

namespace Tests\Unit;

use App\Models\Account;
use App\Models\AccountProfile;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_has_one_profile(): void
    {
        $user = User::factory()->create();
        $profile = UserProfile::factory()->create(['user_id' => $user->id]);

        $this->assertInstanceOf(UserProfile::class, $user->profile);
        $this->assertEquals($profile->id, $user->profile->id);
    }

    public function test_user_belongs_to_many_accounts_with_pivot(): void
    {
        $user = User::factory()->create();
        $account = Account::factory()->create();

        $user->accounts()->attach($account->id, [
            'relationship' => 'Self / Owner',
            'is_administrator' => true,
        ]);

        $this->assertCount(1, $user->accounts);
        $this->assertEquals($account->id, $user->accounts->first()->id);
        $this->assertTrue((bool) $user->accounts->first()->pivot->is_administrator);
        $this->assertEquals('Self / Owner', $user->accounts->first()->pivot->relationship);
    }

    public function test_user_helpers_primary_and_current_account(): void
    {
        $user = User::factory()->create();
        $account1 = Account::factory()->create();
        $account2 = Account::factory()->create();

        $user->accounts()->attach($account1->id, ['is_administrator' => true]);
        $user->accounts()->attach($account2->id, ['is_administrator' => false]);

        $this->assertEquals($account1->id, $user->primaryAccount()?->id);
        $this->assertTrue($user->isAdmin($account1));
        $this->assertFalse($user->isAdmin($account2));

        session(['client.account_id' => $account2->id]);
        $this->assertEquals($account2->id, $user->currentAccount()?->id);
    }
}
