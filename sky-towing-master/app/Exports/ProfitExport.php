<?php

namespace App\Exports;

use App\Exports\Sheets\ExpenseSheet;
use App\Exports\Sheets\ProfitSheet;
use App\Models\Towing;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class ProfitExport implements WithMultipleSheets
{

    public function __construct(
        readonly private string $month
    )
    {
    }

    public function sheets(): array
    {
        $sheets = [];
        $towings = Towing::getByCurrentService()->with(['expenses' => function ($query) {
            $query->whereDate('created_at', 'like', $this->month . '%');
        }])->get();

        $carbonMonth = Carbon::createFromFormat('Y-m', $this->month);

        $towings->each(function (Towing $towing) use (&$sheets, $carbonMonth) {
            $sheets[] = new ProfitSheet($towing, $carbonMonth->format('F'));
        });

        return $sheets;
    }
}
