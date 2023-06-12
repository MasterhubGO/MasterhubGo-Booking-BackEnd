<?php

namespace Database\Factories;

use App\Models\Currency;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BusinessService>
 */
class BusinessServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
		$user = User::whereHas('businesses')->inRandomOrder()->first();
		
        return [
            'business_id' => $user->businesses->random()->id,
			'title' => $this->faker->sentence(3),
			'currency_id' => Currency::first()->id,
			'price' => $this->faker->numberBetween(100_00, 10000_00),
			'description' => $this->faker->text(150),
			'duration' => $this->faker->numberBetween(5, 120),
			'is_field' => $this->faker->boolean(),
			'user_id' => $user->id,
        ];
    }
}
