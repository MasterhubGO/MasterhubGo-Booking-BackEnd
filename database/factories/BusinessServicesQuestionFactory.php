<?php

namespace Database\Factories;

use App\Models\BusinessService;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BusinessServicesQuestion>
 */
class BusinessServicesQuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'service_id' => BusinessService::inRandomOrder()->first()->id,
			'question' => $this->faker->realTextBetween(15, 120),
			'answer' => $this->faker->realTextBetween(50, 300),
        ];
    }
}
