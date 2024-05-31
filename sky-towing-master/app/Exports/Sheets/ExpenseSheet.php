<?php

namespace App\Exports\Sheets;

use App\Models\Towing;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;

class ExpenseSheet implements WithTitle, FromView, ShouldAutoSize, WithEvents
{
    use RegistersEventListeners;

    public function __construct(
        private Towing $towing,
        private string $month
    )
    {
    }


    public
    function view(): View
    {
        return view('excel.expense', [
            'towing' => $this->towing,
            'expenses' => $this->towing->expenses,
            'month' => $this->month
        ]);
    }

    public function title(): string
    {
        return $this->towing->id;
    }

    public static function afterSheet(AfterSheet $event)
    {
        // Create Style Arrays
        $default_font_style = [
            'font' => ['name' => 'Arial', 'size' => 12]
        ];

        $strikethrough = [
            'font' => ['strikethrough' => true],
        ];

        // Get Worksheet
        $active_sheet = $event->sheet->getDelegate();

        // Apply Style Arrays
        $active_sheet->getParent()->getDefaultStyle()->applyFromArray($default_font_style);

        // strikethrough group of cells (A10 to B12)
        $active_sheet->getStyle('A10:B12')->applyFromArray($strikethrough);
        // or
        $active_sheet->getStyle('A10:B12')->getFont()->setStrikethrough(true);

        // single cell
        $active_sheet->getStyle('A13')->getFont()->setStrikethrough(true);

    }
}
