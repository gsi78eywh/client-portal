<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\AccountProfile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<AccountProfile>
 */
class AccountProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'account_id' => Account::factory(),
            'account_type' => fake()->randomElement(['Personal', 'Professional / Practice', 'Business / Organization']),
            'legal_name' => fake()->company(),
            'trade_name' => fake()->companySuffix(),
            'tin' => fake()->numerify('###-###-###-000'),
            'registration_number' => fake()->numerify('SEC-######'),
            'registration_authority' => 'Securities and Exchange Commission',
            'registration_date' => fake()->date(),
            'industry_profession' => fake()->jobTitle(),
            'primary_address' => fake()->address(),
            'business_email' => fake()->companyEmail(),
            'contact_number' => fake()->phoneNumber(),
            'website' => fake()->url(),
            'logo_path' => null,
        ];
    }
}
