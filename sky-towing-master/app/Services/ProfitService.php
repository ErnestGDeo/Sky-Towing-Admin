<?php

namespace App\Services;

use App\Enums\DriverRole;
use App\Models\City;
use App\Models\ClassService;
use App\Models\Driver;
use App\Models\Profit;
use App\Models\Towing;
use PDF;

/**@author Agung Prasetyo Nugroho <agungpn33@gmail.com> */
class ProfitService
{
    public function dataRequireFormInput(): array
    {
        $towings = Towing::getByCurrentService()->get();
        $drivers = Driver::getByCurrentService()->get();
        $coDrivers = Driver::getByCurrentService()->get();
        $cities = City::all();
        $classServices = ClassService::all();

        return compact('towings', 'drivers', 'coDrivers', 'cities', 'classServices');
    }

    public function reportDriver(Profit $profit)
    {
        $calculate = $this->calculateIncome($profit);
//        return view('pdf.salary',compact('profit', 'calculate'));
        $pdf = PDF::loadView('pdf.salary', compact('profit', 'calculate'));
        return $pdf->download($profit->towing_id . '-' . $profit->pickup_date->format('d-m-Y') . '.pdf');
    }

    public function calculateIncome(Profit $profit): array
    {
        $income = $profit->shipping_cost - $profit->total_of_wage;
        $remainingWholesale = $profit->total_of_wage - $profit->operational_cost;
        return [
            'income' => $income,
            'remaining_wholesale' => $remainingWholesale
        ];
    }
}
