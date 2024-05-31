<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        @page {
            margin: 7px;
        }

        .fw-small {
            font-size: 11px;
        }

        .min-gap {
            margin-top: .5rem;
        }

        .gap {
            margin-top: 2rem;
        }

        .container {
            padding: 0 2%;
        }

        .title {
            text-align: center;
        }

        .bg-blue {
            background-color: blue;
            color: white;
            display: inline-block;
        }

        .bg-blue * {
            padding: 0 2%;
        }

        .bg-red {
            background-color: red;
            color: white;
        }

        .bg-red {
            text-align: center;
        }

        .title-table {
            width: 100%;
            display: block;
        }

        .clearfix::after {
            content: "";
            display: table;
            clear: both;
        }

        .title-table span {
            float: left;
        }

        table, td, th {
            border: 1px solid black;
            padding: .4rem .5rem;
            border-collapse: collapse;
        }

        .table-record {
            width: 100%;
        }

        .table-record thead tr th,
        .table-record tfoot tr th {
            background-color: blue;
            color: white;
            text-transform: uppercase;
            font-size: 1.1rem;
            font-weight: 700;
        }

        .table-record tbody tr:nth-child(even) {
            background-color: #c7d7fa;
        }

        .table-record tfoot tr th:first-child {
            text-align: right;
        }

        .table-summary thead * {
            font-weight: 700;
        }

        .table-summary tfoot tr * {
            background-color: red;
            font-weight: bolder;
        }


    </style>

</head>
<body>

<h1 class="title">
    LAPORAN PENDAPATAN
    {{ str(service()->name)->title() }}
    AGUSTUS 2023
</h1>


<div class="container">
    <h1>A. Pemasukkan</h1>
    <div class="container-table ">
        <div class="title-table">
            <span class="bg-blue" style="width: 50%"><h3>Month : {{$monthStr}}</h3></span>
            <span class="bg-red" style="width: 50%"><h3>{{service()->shortname}} Office</h3></span>
            <div class="clearfix"></div>
        </div>

        <div class="min-gap"></div>

        <table class="table-record fw-small">

            <thead>
            <tr>
                <th>No</th>
                <th>Date</th>
                <th>Detail</th>
                <th>amount</th>
                <th>description</th>
            </tr>
            </thead>

            <tbody>
            <tr>
                <td>1</td>
                <td>12/12/2023</td>
                <td>Bagi Hasil BTS005</td>
                <td>{{ idrPrice(32432) }}</td>
                <td></td>
            </tr>
            </tbody>

            <tfoot>
            <tr>
                <th colspan="3">TOTAL</th>
                <th style="font-size: 15px" colspan="2">{{ idrPrice(32432) }}</th>
            </tr>
            </tfoot>
        </table>

        <div class="gap"></div>
    </div>

    @foreach($profits as $towingId => $profitData)
        <div class="container-table ">
            <div class="title-table">
                <span class="bg-blue" style="width: 50%"><h3>Month : {{$monthStr}}</h3></span>
                <span class="bg-red" style="width: 50%"><h3>{{ $towingId }}</h3></span>
                <div class="clearfix"></div>
            </div>

            <div class="min-gap"></div>

            <table class="table-record fw-small">

                <thead>
                <tr style="font-size: 11px">
                    <th style="font-size: 11px">No</th>
                    <th style="font-size: 11px">Driver</th>
                    <th style="font-size: 11px">Type Of Char</th>
                    <th style="font-size: 11px">Type Of Motor</th>
                    <th style="font-size: 11px">Route</th>
                    <th style="font-size: 11px">Pick Up Date</th>
                    <th style="font-size: 11px">Drop Off Date</th>
                    <th style="font-size: 11px">Shipping Cost</th>
                    <th style="font-size: 11px">Total Of Wage</th>
                    <th style="font-size: 11px">Income</th>
                </tr>
                </thead>

                <tbody>
                @foreach($profitData as $profit )
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{ arrayFormatMerge([$profit->driver?->name, $profit->coDriver?->name]) }}</td>
                        <td>{{$profit->vehicle_type}}</td>
                        <td>{{ $profit->vehicle_description }}</td>
                        <td>{{ arrayFormatMerge([$profit->fromCity?->name, $profit->toCity?->name]) }} </td>
                        <td>{{$profit->pickup_date?->format('d/m/Y'),  }}</td>
                        <td>{{$profit->dropoff_date?->format('d/m/Y'),  }}</td>
                        <td>{{ idrPrice($profit->shipping_cost) }}</td>
                        <td>{{ idrPrice($profit->total_of_wage) }}</td>
                        <td>
                            {{ idrPrice($profit->shipping_cost - $profit->total_of_wage) }}
                        </td>

                    </tr>
                @endforeach

                {{--                <thead>--}}
                {{--                <tr>--}}
                {{--                    <th>No</th>--}}
                {{--                    <th>Date</th>--}}
                {{--                    <th>Detail</th>--}}
                {{--                    <th>amount</th>--}}
                {{--                    <th>description</th>--}}
                {{--                </tr>--}}
                {{--                </thead>--}}

                {{--                <tbody>--}}
                {{--                @foreach($profitData as $profit )--}}
                {{--                    <tr>--}}
                {{--                        <td>{{$loop->iteration}}</td>--}}
                {{--                        <td>{{  }}</td>--}}
                {{--                        <td>32432</td>--}}
                {{--                        <th>description</th>--}}
                {{--                        <td>{{ idrPrice(32432) }}</td>--}}
                {{--                    </tr>--}}
                {{--                @endforeach--}}


                </tbody>

                <tfoot>
                <tr>
                    <th colspan="8">TOTAL</th>
                    <th style="font-size: 15px" colspan="2">{{ idrPrice(32432) }}</th>
                </tr>
                </tfoot>
            </table>

            <div class="gap"></div>
        </div>

    @endforeach


    <table class="table-summary">
        <thead>
        <tr>
            <th rowspan="2"></th>
            <th colspan="3">Agustus</th>
        </tr>
        <tr>
            <th>SHIPPING COST</th>
            <th>TOTAL OF WAGE</th>
            <th>INCOME</th>
        </tr>
        </thead>

        <tbody>
        <tr>
            <td><strong>OFFICE</strong></td>
            <td>{{ idrPrice(100) }}</td>
            <td>{{ idrPrice(400) }}</td>
        </tr>
        </tbody>

        <tfoot>
        <tr>
            <td>Total</td>
            <td>{{ idrPrice(100) }}</td>
            <td>{{ idrPrice(100) }}</td>
            <td>{{ idrPrice(100) }}</td>
        </tr>
        </tfoot>

    </table>
</div>

<div class="container">
    <h1>A. Pemasukkan</h1>
    <div class="title-table">
        <span class="bg-blue" style="width: 50%"><h3>Month : {{$monthStr}}</h3></span>
        <span class="bg-red" style="width: 50%"><h3>Month : {{$monthStr}}</h3></span>
        <div class="clearfix"></div>
    </div>

    <div class="min-gap"></div>

    <table class="table-record">

        <thead>
        <tr>
            <th>No</th>
            <th>Date</th>
            <th>Detail</th>
            <th>amount</th>
            <th>description</th>
        </tr>
        </thead>

        <tbody>
        <tr>
            <td>1</td>
            <td>32432</td>
            <td>32432</td>
            <th>description</th>
            <td>{{ idrPrice(32432) }}</td>
        </tr>

        </tbody>

        <tfoot>
        <tr>
            <th colspan="3">TOTAL</th>
            <th>{{ idrPrice(32432) }}</th>
        </tr>
        </tfoot>
    </table>

    <div class="gap"></div>

    <table class="table-summary">
        <thead>
        <tr>
            <th rowspan="2"></th>
            <th colspan="3">Agustus</th>
        </tr>
        <tr>
            <th>SHIPPING COST</th>
            <th>TOTAL OF WAGE</th>
            <th>INCOME</th>
        </tr>
        </thead>

        <tbody>
        <tr>
            <td><strong>OFFICE</strong></td>
            <td>{{ idrPrice(100) }}</td>
            <td>{{ idrPrice(400) }}</td>
        </tr>
        </tbody>

        <tfoot>
        <tr>
            <td>Total</td>
            <td>{{ idrPrice(100) }}</td>
            <td>{{ idrPrice(100) }}</td>
            <td>{{ idrPrice(100) }}</td>
        </tr>
        </tfoot>

    </table>
</div>

<div class="container">
    <h1>A. Pemasukkan</h1>
    <div class="title-table">
        <span class="bg-blue" style="width: 50%"><h3>Month : Agustus</h3></span>
        <span class="bg-red" style="width: 50%"><h3>Month : Agustus</h3></span>
        <div class="clearfix"></div>
    </div>

    <div class="min-gap"></div>

    <table class="table-record">

        <thead>
        <tr>
            <th>No</th>
            <th>Date</th>
            <th>Detail</th>
            <th>amount</th>
            <th>description</th>
        </tr>
        </thead>

        <tbody>
        <tr>
            <td>1</td>
            <td>32432</td>
            <td>32432</td>
            <th>description</th>
            <td>{{ idrPrice(32432) }}</td>
        </tr>

        </tbody>

        <tfoot>
        <tr>
            <th colspan="3">TOTAL</th>
            <th>{{ idrPrice(32432) }}</th>
        </tr>
        </tfoot>
    </table>

    <div class="gap"></div>

    <table class="table-summary">
        <thead>
        <tr>
            <th rowspan="2"></th>
            <th colspan="3">Agustus</th>
        </tr>
        <tr>
            <th>SHIPPING COST</th>
            <th>TOTAL OF WAGE</th>
            <th>INCOME</th>
        </tr>
        </thead>

        <tbody>
        <tr>
            <td><strong>OFFICE</strong></td>
            <td>{{ idrPrice(100) }}</td>
            <td>{{ idrPrice(400) }}</td>
        </tr>
        </tbody>

        <tfoot>
        <tr>
            <td>Total</td>
            <td>{{ idrPrice(100) }}</td>
            <td>{{ idrPrice(100) }}</td>
            <td>{{ idrPrice(100) }}</td>
        </tr>
        </tfoot>

    </table>
</div>

</body>
</html>
