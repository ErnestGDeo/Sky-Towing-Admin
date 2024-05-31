<!doctype html>
<html lang="en">
<head>
    <title>{{$towing->id}}</title>

    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            text-align: left;
            padding: 8px;
            font-size: 12px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        * {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 23px !important;
        }

    </style>

</head>
<body>

<table border="1">
    <tr style="color: white; text-align: center">
        <th style="background-color: blue; text-align: center; color: white; font-size: 20px; padding: 10px 40px"
            colspan="4"><b>Month
                : {{ $month }}</b>
        </th>
        <th style="background-color: red; color: white; font-size:20px;padding: 30px" colspan="3">
            <b>{{$towing->id}}</b>
        </th>
    </tr>
    <tr>
        <td></td>
    </tr>
    <tr style="color: white; background-color: blue;">
        <th style="color: white; background-color: #eeeeee;"><b>NO</b></th>
        <th style="color: white; background-color: blue;"><b>DATE</b></th>
        <th style="color: white; background-color: blue;"><b>DETAILS</b></th>
        <th style="color: white; background-color: blue;"><b>DESCRIPTION</b></th>
        <th style="color: white; background-color: blue;"><b>UNITS</b></th>
        <th style="color: white; background-color: blue;"><b>UNIT PRICE</b></th>
        <th style="color: white; background-color: blue;"><b>TOTAL PRICE</b></th>
    </tr>


    <tbody>

    @foreach($expenses as $expense)

        <tr>
            <th style="background-color: {{ $loop->iteration %2 == 0 ? '#cfdcf3' : '#eeeeee'}}">{{ $loop->iteration }}</th>
            <td style="background-color: {{ $loop->iteration %2 == 0 ? '#cfdcf3' : '#eeeeee'}}">{{$expense->date->format('d/m/Y')}}</td>
            <td style="background-color: {{ $loop->iteration %2 == 0 ? '#cfdcf3' : '#eeeeee'}}">{{$expense->detail}}</td>
            <td style="background-color: {{ $loop->iteration %2 == 0 ? '#cfdcf3' : '#eeeeee'}}">{{ $expense->description }}</td>
            <td style="background-color: {{ $loop->iteration %2 == 0 ? '#cfdcf3' : '#eeeeee'}}">{{$expense->unit}}</td>
            <td style="background-color: {{ $loop->iteration %2 == 0 ? '#cfdcf3' : '#eeeeee'}}">{{ $expense->unit_price }}</td>
            <td style="background-color: {{ $loop->iteration %2 == 0 ? '#cfdcf3' : '#eeeeee'}}">{{ $expense->unit_price * $expense->unit }}</td>
        </tr>
    @endforeach
    </tbody>

</table>
</body>
</html>
