<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/app.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        h3 {
            color: #333333;
            font-size: 24px;
            font-weight: bold;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
            border-bottom: 1px solid #ddd;
            border: 2px solid black;
            background-color: rgba(177, 177, 177, 0.233);
            text-align: center;
        }

        th {

            background-color: rgb(220, 167, 52);
            color: white;

        }
    </style>
</head>

<body>
    <div>
        <h3>Hello, {{$detail['landlordName']}}</h3>
        <p>Here are the details of the house you booked. You can contact me for more information.</p>
    </div>
    <img src="<?php echo $detail['image']; ?>" alt="">
    <table>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Phone Number</th>
            <th>Email</th>
            <th>Date Check In</th>
            <th>Date Check Out</th>
        </tr>
        <tr>
            <td>{{$detail['firstName']}}</td>
            <td>{{$detail['lastName']}}</td>
            <td>{{$detail['customerPhoneNumber']}}</td>
            <td>{{$detail['email']}}</td>
            <td>{{$detail['check_in_date']}}</td>
            <td>{{$detail['check_out_date']}}</td>
        </tr>
    </table>

</body>

</html>