<?php

namespace Database\Factories;

use App\Enums\DriverRole;
use App\Enums\PaymentMethode;
use App\Enums\VehicleType;
use App\Models\City;
use App\Models\ClassService;
use App\Models\Driver;
use App\Models\Service;
use App\Models\Towing;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profit>
 */
class ProfitFactory extends Factory
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

        $pickUpDate = fake()->date;
        return [
            'driver_id' => Driver::whereRole(DriverRole::DRIVER)->inRandomOrder()->value('id'),
            'co_driver_id' => Driver::whereRole(DriverRole::CO_DRIVER)->inRandomOrder()->value('id'),
            'vehicle_type' => VehicleType::getRandomValue(),
            'vehicle_description' => fake()->word,
            'from_city_id' => City::inRandomOrder()->value('id'),
            'destination_city_id' => City::inRandomOrder()->value('id'),
            'pickup_date' => $pickUpDate,
            'dropoff_date' => Carbon::createFromFormat('Y-m-d', $pickUpDate)->addDays(4),
            'shipping_cost' => fake()->numberBetween(100000, 1000000),
            'total_cost' => fake()->numberBetween(100000, 1000000),
            'total_of_wage' => fake()->numberBetween(100000, 1000000),
            'operational_cost' => fake()->numberBetween(100000, 1000000),
            'payment_method' => PaymentMethode::getRandomValue(),
            'description' => fake()->sentence,
            'office' => null,
            'service_id' => $service->id,
            'towing_id' => Towing::inRandomOrder()->whereServiceId($service->id)->value('id'),
            'class_service_id' => ClassService::inRandomOrder()->value('id'),

            'created_at' => $time,
            'updated_at' => $time
        ];
    }
}
