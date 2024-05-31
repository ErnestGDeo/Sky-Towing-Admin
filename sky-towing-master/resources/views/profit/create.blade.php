@extends('layout.dashboard')

@section('title')
    Form Create Profit
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Create Profit</li>
@endsection

@section('content')
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Pemasukan</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical" action="{{ route('profits.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="towing_id">Towing
                                                <x-required-field/>
                                            </label>
                                            <fieldset class="form-group">
                                                <select class="choices form-select choices__input" id="towing_id"
                                                        name="towing_id">
                                                    @foreach ($towings as $towing)
                                                        <option value="{{ $towing->id }}">{{ $towing->id }}</option>
                                                    @endforeach
                                                </select>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="driver_id">Driver
                                                <x-required-field/>
                                            </label>
                                            <fieldset class="form-group">
                                                <select class="choices form-select choices__input" id="driver_id"
                                                        name="driver_id">
                                                    @foreach ($drivers as $driver)
                                                        <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                                                    @endforeach
                                                </select>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="co_driver_id">Co-Driver</label>
                                            <fieldset class="form-group">
                                                <select class="choices form-select choices__input" id="co_driver_id"
                                                        name="co_driver_id">
                                                    @foreach ($coDrivers as $driver)
                                                        <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                                                    @endforeach
                                                </select>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="vehicle_type">Type of Vehicle
                                                <x-required-field/>
                                            </label>
                                            <fieldset class="form-group">
                                                <select class="choices form-select choices__input" id="vehicle_type"
                                                        name="vehicle_type">
                                                    @foreach (\App\Enums\VehicleType::asSelectArray() as $value => $key)
                                                        <option value="{{ $value }}">{{ $key }}</option>
                                                    @endforeach
                                                </select>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="vehicle_description">Vehicle_Description
                                                <x-required-field/>
                                            </label>
                                            <input type="text" id="vehicle_description" class="form-control"
                                                   name="vehicle_description" placeholder="Description"
                                                   fdprocessedid="mjec4q">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="from_city">From City
                                                <x-required-field/>
                                            </label>
                                            <fieldset class="form-group">
                                                <select class="choices form-select choices__input" id="from_city"
                                                        name="from_city_id">
                                                    @foreach ($cities as $city)
                                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                                    @endforeach
                                                </select>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="to_city">To City
                                                <x-required-field/>
                                            </label>
                                            <fieldset class="form-group">
                                                <select class="choices form-select choices__input" id="to_city"
                                                        name="destination_city_id">
                                                    @foreach ($cities as $city)
                                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                                    @endforeach
                                                </select>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Pick up Date
                                                <x-required-field/>
                                            </label>
                                            <input type="date" id="first-name-column" class="form-control"
                                                   placeholder="Pick up Date" name="pickup_date" fdprocessedid="vf6krk">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Drop off Date
                                                <x-required-field/>
                                            </label>
                                            <input type="date" id="last-name-column" class="form-control"
                                                   placeholder="Drop off Date" name="dropoff_date"
                                                   fdprocessedid="hvr53l">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column">Shipping Cost</label>
                                            <input type="number" id="city-column" class="form-control"
                                                   placeholder="Shipping Cost" name="shipping_cost"
                                                   fdprocessedid="heafy">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="country-floating">Total of Wage
                                                <x-required-field/>
                                            </label>
                                            <input type="number" id="country-floating" class="form-control"
                                                   name="total_of_wage" placeholder="Total of Wage"
                                                   fdprocessedid="xzc97o">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="company-column">Operational Cost
                                                <x-required-field/>
                                            </label>
                                            <input type="number" id="company-column" class="form-control"
                                                   name="operational_cost" placeholder="Operational Cost"
                                                   fdprocessedid="mjec4q">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column">Payment
                                                <x-required-field/>
                                            </label>
                                            <select name="payment_method" id="" class="form-control">
                                                <option value="transfer">Transfer</option>
                                                <option value="cash">Cash</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="company-column">Description</label>
                                            <input type="text" id="company-column" class="form-control"
                                                   name="description" placeholder="Description" fdprocessedid="mjec4q">
                                        </div>
                                    </div>


                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column">Class Package
                                                <x-required-field/>
                                            </label>
                                            <select name="class_service_id" id="" class="form-control">
                                                @foreach ($classServices as $classService)
                                                    <option value="{{ $classService->id }}">
                                                        {{ $classService->class_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1"
                                                fdprocessedid="4dq13">Submit
                                        </button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1"
                                                fdprocessedid="fjjyc">Reset
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
