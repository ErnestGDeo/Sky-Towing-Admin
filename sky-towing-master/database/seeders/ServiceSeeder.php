<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::create([
            'name' => "Sky Towing",
            'shortname' => 'SKY',
            'color' => 'primary'
        ]);

        Service::create([
            'name' => "Bali Towing",
            'shortname' => 'BTS',
            'color' => 'danger'
        ]);
    }
}
