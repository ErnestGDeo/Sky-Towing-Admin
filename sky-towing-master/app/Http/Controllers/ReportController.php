<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReportRequest;
use App\Models\Expense;
use App\Models\Profit;
use App\Models\Towing;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{

    public function index()
    {
        $towings = Towing::getByCurrentService()->get();
        return view('report.report', compact('towings'));
    }

    public function report(ReportRequest $request)
    {
        $input = $request->validated();

        $year = str($input['month'])->before('-')->toInteger();
        $month = str($input['month'])->after('-')->toInteger();

        $profits = Profit::getByCurrentService()->with('towing')
            ->whereIn('towing_id', $input['towings'])
            ->whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->get()
            ->groupBy('towing.id')
            ->sortKeys();

        $expenses = Expense::getByCurrentService()->with('towing')
            ->whereIn('towing_id', $input['towings'])
            ->whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->get()
            ->groupBy('towing.id')
            ->sortKeys();

        $monthStr = int_to_month($month);

//        dd($profits, $expenses, $input);

        $pdf = PDF::loadView('pdf.report', compact('profits', 'expenses', 'input', 'monthStr'));
        return $pdf->download($input['month'] . '-' . service()->name . '.pdf');
    }

}
