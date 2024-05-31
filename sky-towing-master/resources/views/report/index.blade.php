@extends('layout.dashboard')

@section('title')
    Analytics
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Analytics</li>
@endsection

@section('content')
    <div class="page-content">

        <section class="row justify-content-end">
            <div class="col-auto">
                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fas fa-file-pdf me-2"></i>Report PDF
                </button>
            </div>
            <div class="col-1"></div>
        </section>
        <section class="row">
            <div class="col-12 col-lg-11">
                <div class="row">
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div
                                        class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start"
                                    >
                                        <div class="stats-icon purple mb-2">
                                            <i class="iconly-boldShow"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Profit</h6>
                                        <h6 class="font-extrabold mb-0">{{ idrPrice($countProfits) }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div
                                        class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start"
                                    >
                                        <div class="stats-icon red mb-2">
                                            <i class="iconly-boldProfile"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Expense</h6>
                                        <h6 class="font-extrabold mb-0">{{ idrPrice($countExpenses) }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div
                                        class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start"
                                    >
                                        <div class="stats-icon green mb-2">
                                            <i class="iconly-boldAdd-User"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Income</h6>
                                        <h6 class="font-extrabold mb-0">{{ idrPrice($countIncome) }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div
                                        class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start"
                                    >
                                        <div class="stats-icon blue mb-2">
                                            <i class="iconly-boldBookmark"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Driver</h6>
                                        <h6 class="font-extrabold mb-0">{{ $countDrivers }} Driver</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Grafik</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-profile-visit"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-3"></div>
        </section>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="form form-vertical" action="{{ route('report.export') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Report PDF</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="input-month-report" class="form-label">
                                Month
                                <x-required-field/>
                            </label>
                            <input type="month" class="form-control" id="input-month-report" name="month"
                                   placeholder="Select Report Month">
                        </div>

                        <div class="  mb-4">
                            <label for="Role-label"><strong>Select Report Towing</strong>
                                <x-required-field/>
                            </label><br>
                            <div class="form-group">
                                <select class="choices form-select" name="towings[]" multiple="multiple">
{{--                                    <option value="office">Office</option>--}}
                                    @foreach($towings as $towing)
                                        <option value="{{ $towing->id }}">{{ $towing->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-warning">
                            <i class="fas fa-file-pdf me-2"></i>Report PDF
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/style.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/extensions/choices.js/public/assets/styles/choices.css')}}">
@endpush

@push('scripts')
    <!-- Need: Apexcharts -->
    <script src="{{ asset('assets/extensions/apexcharts/apexcharts.min.js') }}"></script>

    <script !src="">
        const optionsProfileVisit = {
            annotations: {
                position: "back",
            },
            dataLabels: {
                enabled: false,
            },
            chart: {
                type: "bar",
                height: 500,
            },
            fill: {
                opacity: 1,
            },
            plotOptions: {},
            series: [
                {
                    name: "Profit",
                    data: {{ \Illuminate\Support\Js::from($data['profits']) }},
                },
                {
                    name: "Expense",
                    data: {{ \Illuminate\Support\Js::from($data['expenses']) }},
                },
                {
                    name: "Income",
                    data: {{ \Illuminate\Support\Js::from($data['incomes']) }},
                },
            ],
            colors: ["#9694ff", "#ff7976", "#5ddab4"],
            xaxis: {
                categories: {{ \Illuminate\Support\Js::from($data['dates']) }},
            },
        };


        const chartProfileVisit = new ApexCharts(
            document.querySelector("#chart-profile-visit"),
            optionsProfileVisit
        );

        chartProfileVisit.render();
    </script>


    <script src="{{asset('assets/extensions/choices.js/public/assets/scripts/choices.js')}}"></script>
    <script src="{{ asset('assets/static/js/pages/form-element-select.js') }}"></script>
@endpush
