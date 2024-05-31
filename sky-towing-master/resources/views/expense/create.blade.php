@extends('layout.dashboard')

@section('title')
    Form Create Expense
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item " aria-current="page"><a href="{{ url('/expenses') }}">Expense</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create Expense</li>
@endsection

@section('content')
    <div class="row">

        <div class="card col-md-8">
            <div class="card-header">
                <h4 class="card-title">Expense</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form form-vertical" method="post" action="{{ route('expenses.store') }}">
                        @csrf

                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="towing">Towing <x-required-field /></label>
                                        <select name="towing_id" id="towing" class="form-control">
                                            @foreach ($towings as $towing)
                                                <option value="{{ $towing->id }}">{{ $towing->id }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="date">Date <x-required-field /></label>
                                        <input type="date" id="date" class="form-control" name="date"
                                            placeholder="Input Date" fdprocessedid="k23n1o">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="detail">Details <x-required-field /></label>
                                        <input type="text" id="detail" class="form-control" name="detail"
                                            placeholder="text" fdprocessedid="txd1tt">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="unit">Unit <x-required-field /></label>
                                        <input type="number" id="unit" class="form-control" name="unit"
                                            placeholder="number" fdprocessedid="y1y86g">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="unit_price">Unit Price <x-required-field /></label>
                                        <input type="number" id="unit_price" class="form-control" name="unit_price"
                                            placeholder="number" fdprocessedid="tyl3a">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control" id="description" rows="3" name="description"></textarea>
                                    </div>
                                </div>


                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1" fdprocessedid="u0hyba">Submit
                                    </button>
                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1"
                                        fdprocessedid="3tnbn">Reset
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
