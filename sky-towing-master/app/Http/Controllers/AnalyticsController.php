<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Expense;
use App\Models\Profit;
use App\Models\Towing;
use Carbon\CarbonPeriod;

class AnalyticsController extends Controller
{
    public function analytics()
    {
        $towings = Towing::getByCurrentService()->get();

        $profits = Profit::getByCurrentService()
            ->whereYear('created_at', now()->year)
            ->whereMonth('created_at', now()->month)
            ->selectRaw('DATE_FORMAT(created_at, "%d-%m-%Y") as day, SUM(shipping_cost) as amount_price')
            ->groupBy('day')
            ->orderBy('day')
            ->get();

        $expenses = Expense::getByCurrentService()
            ->whereYear('date', now()->year)
            ->whereMonth('date', now()->month)
            ->selectRaw('DATE_FORMAT(date, "%d-%m-%Y") as day, SUM(unit * unit_price) as amount_price')
            ->groupBy('day')
            ->orderBy('day')
            ->get();

        $period = CarbonPeriod::create(now()->startOfMonth(), now()->endOfMonth());
        $data = [
            'profits' => [],
            'expenses' => [],
            'incomes' => [],
            'dates' => [],
        ];

        $countProfits = 0;
        $countExpenses = 0;
        $countIncome = 0;
        $countDrivers = Driver::getByCurrentService()->whereYear('created_at', now()->year)->whereMonth('created_at', now()->month)->count();


        foreach ($period as $date) {
            $formatDate = $date->format('d-m-Y');
            $profit = $profits->firstWhere('day', $formatDate)?->amount_price ?? 0;
            $expense = $expenses->firstWhere('day', $formatDate)?->amount_price ?? 0;

            $data['dates'][] = $formatDate;
            $data['profits'][] = $profit;
            $data['expenses'][] = $expense;
            $data['incomes'][] = $profit - $expense;

            $countProfits += $profit;
            $countExpenses += $expense;
            $countIncome += $profit - $expense;
        }

        return view('report.index', compact('towings', 'data', 'countProfits', 'countExpenses', 'countIncome', 'countDrivers'));
    }
}
