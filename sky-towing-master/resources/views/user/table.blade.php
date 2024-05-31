@php use App\Enums\VehicleType; @endphp
@extends('layout.dashboard')

@section('title')
    User
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Tabel User</li>
@endsection

@section('content')

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Tabel User</h5>

                <div class="d-flex justify-content-between">
                    <div class="">
                        <a href="{{ url('users/create') }}" class="btn btn-primary"><i
                                class="fa-solid fa-plus me-2"></i>New
                            User</a>
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
                        <th>Name</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($users as $user)

                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->username }}</td>
                            <td>
                                @if($user->role == 'admin')
                                    <span class="text-danger font-bold">{{ $user->role }}</span>
                                @else
                                    <span class="text-success font-bold">{{ $user->role }}</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('users.edit',$user->id) }}" class="btn text-success"><i
                                        class="fa-solid fa-pen-to-square"></i></a>
                                <form action="{{ route('users.destroy',$user->id) }}" method="post"
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
                    {{ $users->links('vendor.pagination.bootstrap-5')}}
                </div>
            </div>
        </div>
    </section>

@endsection
