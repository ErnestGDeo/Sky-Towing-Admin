<!DOCTYPE html>
<html>
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
    <thead>
    <tr style="color: white;">
        <th style="background-color: blue; text-align: center; color: white; font-size: 20px; padding: 10px 40px"
            colspan="5"><b>Month
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
        <th style="color: white; background-color: #eeeeee;"><b>DRIVER</b></th>
        <th style="color: white; background-color: #eeeeee;"><b>TYPE OF CAR</b></th>
        <th style="color: white; background-color: #eeeeee;"><b>Type of Motor</b></th>
        <th style="color: white; background-color: #eeeeee;"><b>Route</b></th>
        <th style="color: white; background-color: #eeeeee;"><b>Pick of date</b></th>
        <th style="color: white; background-color: #eeeeee;"><b>Drop off Date</b></th>
        <th style="color: white; background-color: #eeeeee;"><b>Shipping Cost</b></th>
        <th style="color: white; background-color: #eeeeee;"><b>Total of Wage</b></th>
        <th style="color: white; background-color: #eeeeee;"><b>Operasional Costs</b></th>
        <th style="color: white; background-color: #eeeeee;"><b>Remaining Wages</b></th>
        <th style="color: white; background-color: #eeeeee;"><b>Income</b></th>
        <th style="color: white; background-color: #eeeeee;"><b>Payment</b></th>
        <th style="color: white; background-color: #eeeeee;"><b>Description</b></th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>

    </tr>

    <!-- Lanjutkan sampai Baris 14 -->
    </tbody>
</table>

</body>
</html>
