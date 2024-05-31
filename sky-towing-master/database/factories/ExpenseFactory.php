<?php

namespace Database\Factories;

use App\Models\Service;
use App\Models\Towing;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Expense>
 */
class ExpenseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $service = Service::inRandomOrder()->first();
        $time = fake()->dateTimeBetween('-1 month', 'now');

        return [
            'date' => $time,
            'detail' => fake()->sentence,
            'unit' => fake()->numberBetween(1, 10),
            'unit_price' => fake()->numberBetween(10000, 100000),
            'description' => fake()->sentence,
            'service_id' => $service->id,
            'towing_id' => Towing::inRandomOrder()->whereServiceId($service->id)->value('id'),

            'created_at' => $time,
            'updated_at' => $time
        ];
    }
}
