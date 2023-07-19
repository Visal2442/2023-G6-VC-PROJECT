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
        }

        h3 {
            font-size: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            text-align: left;
            padding: 7px;
            border-bottom: 1px solid #ddd;
            border: 1px solid black;
            background-color: rgba(235, 235, 235, 0.868);
            text-align: center;
        }

        th {

            background-color: rgb(247, 183, 46);
            color: white;

        }
    </style>
</head>

<body>
    <div>
        <h3>Hello, {{$detail['landlordName']}}</h3>
        <p>Here is customer information who booked your house!</p>
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