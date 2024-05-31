@extends('layout.dashboard')

@section('title')
    Form Create Driver
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Create Driver</li>
@endsection

@section('content')
    <div class="raw">

        <div class="card col-md-8">
            <div class="card-header">
                <h4 class="card-title">Driver</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form form-vertical" action="{{ route('drivers.store') }}" method="POST"
                          enctype="multipart/form-data">
                        @csrf

                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="first-name-vertical">Nama
                                            <x-required-field/>
                                        </label>
                                        <input type="text" id="first-name-vertical" class="form-control" name="name"
                                               placeholder="Input Nama" fdprocessedid="k23n1o">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="email-id-vertical">Email
                                            <x-required-field/>
                                        </label>
                                        <input type="email" id="email-id-vertical" class="form-control" name="email"
                                               placeholder="E-mail" fdprocessedid="txd1tt">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="phone-id-vertical">Phone
                                            <x-required-field/>
                                        </label>
                                        <input type="text" id="phone-id-vertical" class="form-control" name="phone"
                                               placeholder="Phone" fdprocessedid="txd1tt">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="contact-info-vertical">Alamat
                                            <x-required-field/>
                                        </label>
                                        <input type="text" id="contact-info-vertical" class="form-control"
                                               name="address"
                                               placeholder="Alamat" fdprocessedid="y1y86g">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="Role-label">Role
                                        <x-required-field/>
                                    </label><br>

                                    @foreach (\App\Enums\DriverRole::asSelectArray() as $value => $key)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="role"
                                                   id="{{ $key . $value }}" value="{{ $value }}">
                                            <label class="form-check-label"
                                                   for="{{ $key . $value }}">{{ $key }}</label>
                                        </div>
                                    @endforeach

                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-6 mb-3">
                                        <label for="SIM">Jenis SIM
                                            <x-required-field/>
                                        </label>
                                        <fieldset class="form-group">
                                            <select class="form-select" id="basicSelect" name="sim_type">

                                                @foreach (\App\Enums\SimType::asSelectArray() as $key => $value)
                                                    <option value="{{ $value }}">{{ $value }}</option>
                                                @endforeach

                                            </select>
                                        </fieldset>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="formFile" class="form-label">Upload Foto SIM
                                            <x-required-field/>
                                        </label>
                                        <input class="form-control" type="file" id="formFile" name="sim_path">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="first-name-vertical">Expired Date
                                            <x-required-field/>
                                        </label>
                                        <input type="date" id="first-name-vertical" class="form-control"
                                               name="expired_at" placeholder="date" fdprocessedid="k23n1o">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Note</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                                  name="note"></textarea>
                                    </div>
                                </div>

                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit
                                    </button>
                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1"
                                            fdprocessedid="3tnbn">
                                        Reset
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
