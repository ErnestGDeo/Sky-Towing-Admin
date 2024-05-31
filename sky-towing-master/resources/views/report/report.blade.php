@extends('layout.dashboard')

@section('title')
    Report
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Report</li>
@endsection

@section('content')
    <div class="raw">

        <div class="card col-md-5">
            <div class="card-header">
                <h4 class="card-title">Report</h4>
            </div>
            <div class="card-content">
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{asset('assets/extensions/choices.js/public/assets/styles/choices.css')}}">
@endpush

@push('scripts')
    <script src="{{asset('assets/extensions/choices.js/public/assets/scripts/choices.js')}}"></script>
    <script src="{{ asset('assets/static/js/pages/form-element-select.js') }}"></script>
@endpush
