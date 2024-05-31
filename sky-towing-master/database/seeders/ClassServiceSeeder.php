<?php

namespace Database\Seeders;

use App\Enums\TypeService;
use App\Models\ClassService;
use Illuminate\Database\Seeder;

class ClassServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (TypeService::getValues() as $service) {
            ClassService::create([
                'class_name' => $service
            ]);
        }
    }
}
