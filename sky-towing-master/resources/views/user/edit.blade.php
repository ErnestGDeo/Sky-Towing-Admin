@php use App\Enums\VehicleType; @endphp
@extends('layout.dashboard')

@section('title')
    User
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item" aria-current="page"><a href="{{route('users.index')}}">User</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit</li>
@endsection

@section('content')
    <div class="raw">

        <div class="card col-md-8">
            <div class="card-header">
                <h4 class="card-title">Edit User</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form form-vertical" action="{{ route('users.update',$user->id) }}" method="POST">
                        @csrf
                        @method('put')

                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="first-name-vertical">Nama
                                            <x-required-field/>
                                        </label>
                                        <input type="text" value="{{ $user->name }}" id="first-name-vertical"
                                               class="form-control" name="name"
                                               placeholder="Input Nama" fdprocessedid="k23n1o">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="email-id-vertical">Username
                                            <x-required-field/>
                                        </label>
                                        <input type="text" id="email-id-vertical" value="{{ $user->username }}"
                                               class="form-control" name="username"
                                               placeholder="Username" fdprocessedid="txd1tt">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="email-id-vertical">Password
                                        </label>
                                        <input type="password" id="email-id-vertical" class="form-control"
                                               name="password"
                                               placeholder="Password" fdprocessedid="txd1tt">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="Role-label">Role
                                        <x-required-field/>
                                    </label><br>


                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="role"
                                               @checked($user->role == 'super-admin')
                                               id="role-super-admin" value="super-admin">
                                        <label class="form-check-label"
                                               for="role-super-admin">Super Admin</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="role"
                                               @checked($user->role == 'admin')
                                               id="role-admin" value="admin">
                                        <label class="form-check-label"
                                               for="role-admin">Admin</label>
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
