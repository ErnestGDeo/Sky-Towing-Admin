<?php

namespace Database\Factories;

use App\Enums\DriverRole;
use App\Enums\SimType;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Driver>
 */
class DriverFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name,
            'phone' => fake()->phoneNumber,
            'email' => fake()->email,
            'address' => fake()->streetAddress,
            'role' => DriverRole::getRandomValue(),
            'sim_type' => SimType::getRandomValue(),
            'sim_path' => '',
            'expired_at' => fake()->dateTimeBetween('now', '+1 years'),
            'note' => fake()->text,
            'service_id' => Service::inRandomOrder()->value('id'),
        ];
    }
}
