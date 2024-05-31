@extends('layout.dashboard')

@section('title')
    Expense
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Tabel Expense</li>
@endsection

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Tabel Expense</h5>

                <div class="d-flex justify-content-between">
                    <div class="">
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                class="fa-solid fa-file-excel me-2"></i>Report
                        </button>
                        <a href="{{ url('expenses/create') }}" class="btn btn-primary"><i
                                class="fa-solid fa-plus me-2"></i>New Expense</a>
                    </div>

                    <div class="">
                        <form action="{{ route('expenses.index') }}" method="get" autocomplete="off">
                            <div class="input-group ms-auto">

                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                                <input type="search" name="search" value="{{ request('search') }}" class="form-control"
                                       placeholder="Search" aria-label="Recipient's username"
                                       aria-describedby="button-addon2"/>
                                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
                                    Search
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th style="width: 6em;">Towing</th>
                        <th>Date</th>
                        <th style="width: 20em">Detail</th>
                        <th style="width: 20em">Description</th>
                        <th>Unit</th>
                        <th>Unit Price</th>
                        <th>Total Price</th>
                        <th style="width: 10em">Action</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach ($expenses as $expense)
                        <tr>
                            <th>{{ $expense->towing->id }}</th>
                            <td>{{ $expense->date->format('d/m/Y') }}</td>
                            <td>{{ $expense->detail }}</td>
                            <td>{{ $expense->description }}</td>
                            <td>{{ $expense->unit }}</td>
                            <td>{{ idrPrice($expense->unit_price) }}</td>
                            <td>{{ idrPrice($expense->unit_price * $expense->unit) }}</td>

                            <td>
                                <a href="{{ route('expenses.edit', $expense->id) }}" class="btn text-success"><i
                                        class="fa-solid fa-pen-to-square"></i></a>
                                <a href="{{ route('expenses.show',$expense->id) }}" class="btn text-info"><i
                                        class="fa-solid fa-eye"></i></a>
                                <form action="{{ route('expenses.destroy', $expense->id) }}" method="post"
                                      class="d-inline-block">
                                    @csrf
                                    @method('Delete')
                                    <button type="button" class="btn text-danger"
                                            onclick="confirmationDelete(this.form)">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $expenses->links('vendor.pagination.bootstrap-5') }}
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">

            <form action="{{ route('expenses.report') }}" method="post">
                @csrf

                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Select Month</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="input-month-report" class="form-label">Month</label>
                            <input type="month" class="form-control" id="input-month-report" name="month"
                                placeholder="Select Report Month">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-success" type="submit"><i class="fa-solid fa-file-excel me-2"></i>Report
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
