<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\User; // ADDED: import User model
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    protected $model = Client::class;

    public function definition(): array
    {
        $user = User::factory()->create(); // CHANGED: create a user for assessed_by

        return [
            'first_name' => $this->faker->firstName(),
            'middle_name' => $this->faker->optional()->firstName(),
            'last_name' => $this->faker->lastName(),
            'sex' => $this->faker->randomElement(['Male', 'Female']),
            'age' => $this->faker->numberBetween(18, 80),
            'birth_date' => $this->faker->optional(0.8)->date('Y-m-d', '-18 years'),
            'Case' => $this->faker->optional(0.6)->randomElement(['CKD', 'Cancer', 'Heart Illness', 'Diabetes', 'Hypertension', 'Others']),
            'address' => $this->faker->address(),
            'contact_number' => $this->faker->phoneNumber(),
            'representative_first_name' => $this->faker->optional()->firstName(),
            'representative_middle_name' => $this->faker->optional()->firstName(),
            'representative_last_name' => $this->faker->optional()->lastName(),
            'representative_contact_number' => $this->faker->optional()->phoneNumber(),
            'municipality_id' => 1, // You may want to ensure this exists or use a factory
            'assistance_type_id' => 1, // You may want to ensure this exists or use a factory
            'assistance_category_id' => 1, // Added missing field
            'assessed_by' => $user->id, // CHANGED: use created user's ID
            'valid_id' => $this->faker->boolean(),
        ];
    }
}
