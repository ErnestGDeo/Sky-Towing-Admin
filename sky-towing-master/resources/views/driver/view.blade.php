@php use App\Enums\VehicleType; @endphp
@extends('layout.dashboard')

@section('title')
    View Driver
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item" aria-current="page"><a href="{{url('/drivers')}}">Driver</a></li>
    <li class="breadcrumb-item active" aria-current="page">View</li>

@endsection

@section('content')

    <section class="section mx-2">
        <div class="card">
            <div class="card-body row">
                <div class="col-md-6">

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Nama</div>
                                {{$driver->name}}
                            </div>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Phone</div>
                                {{ $driver->phone }}
                            </div>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Email</div>
                                {{ $driver->email }}
                            </div>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Address</div>
                                {{ $driver->address }}
                            </div>
                        </li>

                    </ul>
                </div>
                <div class="col-md-6">

                    <ul class="list-group list-group-flush">

                        <li class="list-group-item ">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Sim</div>
                            </div>

                            <div class="raw d-flex justify-content-between ms-2 align-content-center w-50">
                                <div class="col-md-3">
                                    <b class="">
                                        {{ $driver->sim_type }}
                                    </b>
                                </div>
                                <div class="col-md-5">
                                    <img src="{{ $driver->sim_path_url }}" alt="sim image" width="100"
                                         height="80"></div>
                            </div>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Expired_at</div>
                                {{ $driver->created_at->format('d M Y') }}
                            </div>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Note</div>
                                {{ $driver->note }}
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="card">

            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Towing</th>
                    <th>Date</th>
                    <th>Driver</th>
                    <th>Route</th>
                    <th>Type</th>
                    <th>Income</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>

                @foreach($profits as $profit)

                    <tr>
                        <td>{{ $profit->towing_id }}</td>
                        <td>{{ arrayFormatMerge([$profit->pickup_date?->format('d/m/Y'), $profit->dropoff_date?->format('d/m/Y')]) }}</td>
                        <td>{{ arrayFormatMerge([$profit->driver?->name, $profit->coDriver?->name]) }}</td>
                        <td>{{ arrayFormatMerge([$profit->fromCity?->name, $profit->toCity?->name]) }}</td>
                        <td>
                            @if($profit->vehicle_type == VehicleType::MOBIL)
                                <span
                                    class="badge bg-primary me-2"> {{VehicleType::MOBIL}} </span> {{ $profit->vehicle_description }}
                            @elseif($profit->vehicle_type == VehicleType::MOTOR)
                                <span
                                    class="badge bg-success me-2">{{ VehicleType::MOTOR }} </span> {{ $profit->vehicle_description }}
                            @endif
                        </td>
                        <td>{{ idrPrice($profit->operational_cost) }}</td>
                        <td>
                            <a href="{{ route('profits.salary', $profit->id) }}" class="btn text-danger"><i
                                    class="fas fa-file-pdf me-1"></i>Download</a>
                        </td>

                    </tr>
                @endforeach

                </tbody>
            </table>
            <div class="mt-4">
                {{ $profits->links('vendor.pagination.bootstrap-5')}}
            </div>
        </div>

    </section>

@endsection
