@php use App\Enums\DriverRole; @endphp
@extends('layout.dashboard')

@section('title')
    Driver
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Tabel Driver</li>
@endsection

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Tabel Driver</h5>

                <div class="d-flex justify-content-between">
                    <div class="">
                        <a href="{{route('drivers.create')}}" class="btn btn-primary"><i
                                class="fa-solid fa-plus me-2"></i>New</a>
                    </div>

                    <div class="">

                        <form action="{{ route(request()->route()->action['as']) }}" method="get" autocomplete="off">
                            <div class="input-group ms-auto">

                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                                <input type="search" name="search" value="{{ request('search') }}" class="form-control"
                                       placeholder="Search"
                                       aria-label="Recipient's username" aria-describedby="button-addon2"/>
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
                        <th>No</th>
                        <th>Driver</th>
                        <th>Alamat</th>
                        <th>SIM</th>
                        <th>Tipe SIM</th>
                        <th>Role</th>
                        <th>Expired_date</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($drivers as $driver)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $driver->name }}</td>
                            <td>{{ $driver->address }}</td>
                            <td><img src="{{ $driver->sim_path_url }}" alt="sim image" width="100"
                                     height="80"></td>
                            <td>{{ $driver->sim_type }}</td>
                            <td>
                                @if(DriverRole::CO_DRIVER == $driver->role )
                                    <span
                                        class="badge bg-secondary">{{ DriverRole::getDescription($driver->role) }}</span>
                                @elseif(DriverRole::DRIVER == $driver->role)
                                    <span
                                        class="badge bg-success">{{ DriverRole::getDescription($driver->role) }}</span>
                                @endif
                            </td>
                            <td>{{ $driver->expired_at->format('d/m/y') }}</td>
                            <td>
                                <a href="{{ route('drivers.edit',$driver->id) }}" class="btn text-success"><i
                                        class="fa-solid fa-pen-to-square"></i></a>
                                <a href="{{ route('drivers.show',$driver->id) }}" class="btn text-info"><i
                                        class="fa-solid fa-eye"></i></a>
                                <form action="{{ route('drivers.destroy',$driver->id) }}" method="post"
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
                    {{$drivers->links('vendor.pagination.bootstrap-5')}}
                </div>
            </div>
        </div>
    </section>
@endsection
