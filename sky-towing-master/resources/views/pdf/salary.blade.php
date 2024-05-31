<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            margin-top: 5rem;
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }


        .text-center {
            text-align: center;
        }

        #head h1 {
            margin-bottom: 0;
        }

        #head h2 {
            margin-top: 0;
        }


        .px-1 {
            padding-right: 1rem;
            padding-left: 1rem;
        }

        .footer-section {
            width: 48%; /* Set the width to 48% to leave some space between driver sections */
            float: left;
            text-align: center;
        }

        .text-center {
            text-align: center;
        }

        .dot::after {
            content: "............................................................";
        }
    </style>

</head>
<body>
<div id="head" class="text-center">
    <h1>SLIP GAJI / BORONGAN</h1>
    <h2>Tanggal : {{$profit->pickup_date->format('d/m/Y')}}</h2>
</div>

<table class="px-1">
    <tr>
        <th>ID TOWING</th>
        <td>{{ $profit->towing_id }}</td>
    </tr>
    <tr>
        <th>NAMA</th>
        <td>{{ arrayFormatMerge([$profit->driver?->name, $profit->coDriver?->name]) }}</td>
    </tr>
    <tr>
        <th>TRIP</th>
        <td>{{ arrayFormatMerge([$profit->fromCity?->name, $profit->toCity?->name]) }}</td>
    </tr>
    <tr>
        <th>BORONGAN</th>
        <td>{{ idrPrice($profit->total_of_wage) }}</td>
    </tr>
    <tr>
        <th>OPS</th>
        <td>{{ idrPrice($profit->operational_cost) }}</td>
    </tr>
    <tr>
        <th>SISA BORONGAN</th>
        <td>{{ idrPrice($profit->remaining_wages) }}</td>
    </tr>
    <tr>
        <th>KETERANGAN</th>
        <td>
            <p>{{$profit->driver?->name}} 60% {{ idrPrice( $profit->remaining_wages *60 /100 ) }}</p>
            @if(is_not_null($profit->coDriver))
                <p>{{$profit?->coDriver->name}} 40% {{ idrPrice( $profit->remaining_wages *40 /100 ) }}</p>
            @endif
        </td>
    </tr>
</table>


<div class="footer-section">
    <p>
        DRIVER 1
        <br><br><br><br><br><br>
        <span class="dot"></span>
    </p>
</div>

<div class="footer-section">
    <p>
        DRIVER 2
        <br><br><br><br><br><br>
        <span class="dot"></span>
    </p>
</div>

<div class="text-center">
    <p>
        MANAGEMENT
        <br><br><br><br><br><br>
        <span class="dot"></span>
    </p>
</div>

</body>
</html>
