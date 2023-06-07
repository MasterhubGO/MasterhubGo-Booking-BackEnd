<?php

namespace Database\Factories;

use App\Models\BusinessRole;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BusinessProfile>
 */
class BusinessProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
			'role_id' => BusinessRole::inRandomOrder()->first()->id,
			// 'photo',
			// 'banner',
			'phone' => $this->faker->phoneNumber(),
			'personal_site' => $this->faker->url(),
        ];
    }
}
