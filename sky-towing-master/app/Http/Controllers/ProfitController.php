<?php

namespace App\Http\Controllers;

use App\Exports\ProfitExport;
use App\Http\Requests\MonthRequest;
use App\Http\Requests\Profit\CreateProfitRequest;
use App\Http\Requests\Profit\UpdateProfitRequest;
use App\Models\Profit;
use App\Services\ProfitService;
use Maatwebsite\Excel\Facades\Excel;

class ProfitController extends Controller
{

    public function __construct(
        readonly private ProfitService $profitService
    )
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profits = Profit::getByCurrentService()->latest('id')->paginate(10);
        return view('profit.table', compact('profits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = $this->profitService->dataRequireFormInput();

        return view('profit.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateProfitRequest $request)
    {
        Profit::create($request->validated());

        return to_route('profits.index')->withSuccess('Profit created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Profit $profit)
    {
        return view('profit.view', compact('profit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profit $profit)
    {
        $data = $this->profitService->dataRequireFormInput();

        return view('profit.edit', $data, compact('profit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfitRequest $request, Profit $profit)
    {
        $profit->update($request->validated());

        return to_route('profits.index')->withSuccess('Profit updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profit $profit)
    {
        $profit->delete();
        return to_route('profits.index')->with('success', 'Successfully deleted profit');
    }

    public function report(MonthRequest $request)
    {
        $month = $request->month;
        return Excel::download(new ProfitExport($month), "$month-" . service()->shortname . ".xlsx");
    }

    public function downloadSalary(Profit $profit)
    {
        return $this->profitService->reportDriver($profit);
    }
}
