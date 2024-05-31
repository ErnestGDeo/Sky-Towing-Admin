<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\Towing;
use Illuminate\Database\Seeder;

class TowingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $serviceSky = Service::getSky();
        $serviceBts = Service::getBts();

        // SKY
        $towings = [];

        for ($i = 0; $i < 15; $i++) {
            $towings[] = [
                'id' => sprintf("SKY-%03d", $i + 1),
                'service_id' => $serviceSky->id,
                'created_at'=> now(),
                'updated_at'=> now(),
            ];
        }


        for ($i = 0; $i < 8; $i++) {
            $towings[] = [
                'id' => sprintf("BTS-%03d", $i + 1),
                'service_id' => $serviceBts->id,
                'created_at'=> now(),
                'updated_at'=> now(),
            ];
        }

        Towing::insert($towings);

    }
}
