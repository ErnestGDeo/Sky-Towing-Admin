@php use App\Enums\VehicleType; @endphp
@extends('layout.dashboard')

@section('title')
    Profit
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Tabel Profit</li>
@endsection

@section('content')

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Tabel Profit</h5>

                <div class="d-flex justify-content-between">
                    <div class="">
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                class="fa-solid fa-file-excel me-2"></i>Report
                        </button>

                        <a href="{{ url('profits/create') }}" class="btn btn-primary"><i
                                class="fa-solid fa-plus me-2"></i>New
                            Profit</a>
                    </div>

                    <div class="">
                        <div class="input-group ms-auto">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                            <input type="text" class="form-control" placeholder="Search"
                                   aria-label="Recipient's username"
                                   aria-describedby="button-addon2"/>
                            <button class="btn btn-outline-secondary" type="button" id="button-addon2">
                                Button
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th style="min-width: 6em">Towing</th>
                        <th>Date</th>
                        <th>Driver</th>
                        <th>Route</th>
                        <th>Type</th>
                        <th style="min-width: 8em">Income</th>
                        <th style="min-width: 10em;">Action</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($profits as $profit)

                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $profit->towing_id }}</td>
                            <td>{{ arrayFormatMerge([$profit->pickup_date?->format('d/m/Y'), $profit->dropoff_date?->format('d/m/Y')]) }}</td>
                            <td>{{ arrayFormatMerge([$profit->driver?->name, $profit->coDriver?->name]) }}</td>
                            <td>{{ arrayFormatMerge([$profit->fromCity?->name, $profit->toCity?->name]) }}</td>
                            <td>
                                @if( $profit->vehicle_type == VehicleType::MOBIL)
                                    <span
                                        class="badge bg-primary me-2"> {{VehicleType::MOBIL}} </span> {{ $profit->vehicle_description }}
                                @elseif($profit->vehicle_type == VehicleType::MOTOR)
                                    <span
                                        class="badge bg-success me-2">{{ VehicleType::MOTOR }} </span> {{ $profit->vehicle_description }}
                                @endif
                            </td>
                            <td>{{ idrPrice($profit->shipping_cost - $profit->total_of_wage) }}</td>
                            <td>
                                <a href="{{ route('profits.edit',$profit->id) }}" class="btn text-success"><i
                                        class="fa-solid fa-pen-to-square"></i></a>
                                <a href="{{ url("/profits/".$profit->id) }}" class="btn text-info"><i
                                        class="fa-solid fa-eye"></i></a>
                                <form action="{{ route('profits.destroy',$profit->id) }}" method="post"
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
                    {{ $profits->links('vendor.pagination.bootstrap-5')}}
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">

            <form action="{{ route('profits.report') }}" method="post">
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
                        <button class="btn btn-success" type="submit"><i
                                class="fa-solid fa-file-excel me-2"></i>Report
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection
