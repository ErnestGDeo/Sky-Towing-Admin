<?php

namespace App\Http\Controllers;

use App\Exports\ExpenseExport;
use App\Http\Requests\Expense\CreateExpenseRequest;
use App\Http\Requests\Expense\UpdateExpenseRequest;
use App\Http\Requests\MonthRequest;
use App\Models\Expense;
use App\Models\Towing;
use App\Services\ExpenseService;
use Maatwebsite\Excel\Facades\Excel;

class ExpenseController extends Controller
{

    public function __construct(
        private ExpenseService $expenseService
    )
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expenses = $this->expenseService->getList();
        return view('expense.table', compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $towings = Towing::getByCurrentService()->get();
        return view('expense.create', compact('towings'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateExpenseRequest $request)
    {
        Expense::create($request->validated());

        return to_route('expenses.index')->withSuccess('Expense created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Expense $expense)
    {
        return view('expense.view', compact('expense'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expense $expense)
    {
        $towings = Towing::getByCurrentService()->get();
        return view('expense.edit', compact('expense', 'towings'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExpenseRequest $request, Expense $expense)
    {
        $expense->update($request->validated());

        return to_route('expenses.index')->withSuccess('Expense updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expense $expense)
    {
        $expense->delete();

        return to_route('expenses.index')->withSuccess('Expense deleted successfully');
    }

    public function report(MonthRequest $request)
    {
        $month = $request->month;
        return Excel::download(new ExpenseExport($month), "$month-" . service()->shortname . ".xlsx");
    }
}
