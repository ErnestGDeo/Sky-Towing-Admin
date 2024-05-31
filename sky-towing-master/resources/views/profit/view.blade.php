@php use App\Enums\VehicleType; @endphp
@extends('layout.dashboard')

@section('title')
    Detail Profit
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item " aria-current="page"><a href="{{ url('/profits') }}">Profit</a></li>
    <li class="breadcrumb-item active" aria-current="page">Detail</li>
@endsection

@section('content')
    <div class="raw">

        <div class="card col-md-8">
            <div class="card-header">
                <h4 class="card-title">
                    {{ $profit->towing->id }} <span class="text-danger">(
                        {{ str($profit->payment_method)->title() . ' - ' . strtoupper($profit->classService->class_name) }}
                        )</span>
                </h4>
            </div>
            <div class="card-content">
                <div class="card-body">

                    <div class="list-group">

                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">Date</h5>
                            </div>
                            <p class="mb-1">
                                {{ arrayFormatMerge([$profit->pickup_date?->format('d/m/Y'), $profit->dropoff_date?->format('d/m/Y')]) }}
                            </p>
                        </a>

                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">Route</h5>
                            </div>
                            <p class="mb-1">
                                {{ arrayFormatMerge([$profit->fromCity?->name, $profit->toCity?->name]) }}
                            </p>
                        </a>

                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">Driver</h5>
                            </div>
                            <p class="mb-1">
                                {{ arrayFormatMerge([$profit->driver?->name, $profit->coDriver?->name]) }}
                            </p>
                        </a>

                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">Vehicle</h5>
                            </div>
                            <p class="mb-1">
                                @if ($profit->vehicle_type == VehicleType::MOBIL)
                                    <span class="badge bg-primary me-2"> {{ VehicleType::MOBIL }} </span>
                                    {{ $profit->vehicle_description }}
                                @elseif($profit->vehicle_type == VehicleType::MOTOR)
                                    <span class="badge bg-success me-2">{{ VehicleType::MOTOR }} </span>
                                    {{ $profit->vehicle_description }}
                                @endif
                            </p>
                        </a>

                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">Shipping Cost</h5>
                            </div>
                            <p class="mb-1">
                                {{ idrPrice($profit->shipping_cost) }}
                            </p>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">Total of Wage</h5>
                            </div>
                            <p class="mb-1">
                                {{ idrPrice($profit->total_of_wage) }}
                            </p>
                        </a>

                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">Income</h5>
                            </div>
                            <p class="mb-1">
                                {{ idrPrice($profit->shipping_cost - $profit->total_of_wage) }}
                            </p>
                        </a>
                        {{-- TODO: lengkapi --}}

                    </div>
                </div>
                <div class="form-actions d-flex justify-content-end font-bold">
                    <a href="{{ route('profits.salary', $profit->id) }}" class="btn btn-warning font-bold me-4"> <i
                            class="fas fa-file-pdf me-2"></i>Salary</a>
                </div>
            </div>
        </div>
    </div>
@endsection
