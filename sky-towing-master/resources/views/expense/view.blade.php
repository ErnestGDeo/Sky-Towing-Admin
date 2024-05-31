@php use App\Enums\VehicleType; @endphp
@extends('layout.dashboard')

@section('title')
    Detail Expense
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item " aria-current="page"><a href="{{ url('/expenses') }}">Expense</a></li>
    <li class="breadcrumb-item active" aria-current="page">Detail</li>
@endsection

@section('content')
    <div class="raw">

        <div class="card col-md-8">
            <div class="card-header">
                <h4 class="card-title">
                    {{ $expense->towing->id }}
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
                                {{ $expense->date->format('Y-m-d') }}
                            </p>
                        </a>

                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">Detail</h5>
                            </div>
                            <p class="mb-1">
                                {{ $expense->detail }}
                            </p>
                        </a>

                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">Unit</h5>
                            </div>
                            <p class="mb-1">
                                {{ $expense->unit }}
                            </p>
                        </a>

                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">Price per Unit</h5>
                            </div>
                            <p class="mb-1">
                                {{ idrPrice($expense->unit_price) }}
                            </p>
                        </a>

                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">Total Price</h5>
                            </div>
                            <p class="mb-1">
                                {{ idrPrice($expense->unit_price * $expense->unit) }}
                            </p>
                        </a>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
