<?php

namespace App\Http\Controllers;

use App\Http\Requests\Driver\CreateDriverRequest;
use App\Http\Requests\Driver\UpdateDriverRequest;
use App\Models\Driver;
use App\Models\Profit;
use App\Services\DriverService;

class DriverController extends Controller
{

    public function __construct(
        private DriverService $driverService
    )
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drivers = $this->driverService->getList();
        return view('driver.table', compact('drivers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('driver.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateDriverRequest $request)
    {
        $input = $request->validated();
        $input['sim_path'] = $request->file('sim_path')->store('drivers');
        $input['service_id'] = service()->id;

        Driver::create($input);

        return to_route('drivers.index')->with('success', 'Berhasil menambahkan data driver');
    }

    /**
     * Display the specified resource.
     */
    public function show(Driver $driver)
    {
        $profits = Profit::whereDriverId($driver->id)
            ->orWhere('co_driver_id', $driver->id)
            ->latest('id')
            ->paginate(10);

        return view('driver.view', compact('driver', 'profits'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Driver $driver)
    {
        return view('driver.edit', compact('driver'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDriverRequest $request, Driver $driver)
    {
        $input = $request->validated();
        if ($request->hasFile('sim_path')) {
            $input['sim_path'] = $request->file('sim_path')->store('drivers');
        }

        $driver->update($input);

        return to_route('drivers.index')->with('success', 'Berhasil merubah data driver');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Driver $driver)
    {
        $driver->delete();
        return to_route('drivers.index')->with('success', 'Berhasil menghapus data driver');
    }
}
