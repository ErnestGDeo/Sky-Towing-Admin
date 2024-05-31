<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\ClassService;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CitySeeder::class,
            ServiceSeeder::class,
            ClassServiceSeeder::class,
            TowingSeeder::class,
            DriverSeeder::class,
            ExpenseSeeder::class,
            ProfitSeeder::class,
            UserSeeder::class,
        ]);
    }
}
