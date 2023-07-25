<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            background-color: antiquewhite;
            text-align: center;
        }

        th {

            background-color: rgb(60, 230, 13);

        }
    </style>
</head>

<body>
    <div>
        <h3>Hello, {{$detail['firstName']}}</h3>
        <p>Here are the details of the house you booked. You can contact me for more information.</p>
    </div>
    <img src="<?php echo $detail['image']; ?>" alt="">
    <table>
        <tr>
            <th>Type</th>
            <th> <?php echo ($detail['type'] == 'room') ? 'Room ID' : 'Number Of Rooms'; ?></th>
            <th>Floor</th>
            <th>Bathroom</th>
            <th>Kitchen</th>
            <th>Price</th>
            <th>District</th>
            <th>Landlord's Phone Number</th>
        </tr>
        <tr>
            <td>{{$detail['type']}}</td>
            <td><?php echo ($detail['type'] == 'room') ?  $detail['room_id'] :$detail['numberOfRoom']; ?></td>
            <td>{{$detail['floor']}}</td>
            <td>{{$detail['bathroom']}}</td>
            <td>{{$detail['kitchen']}}</td>
            <td>${{$detail['price']}}/Month</td>
            <td>{{$detail['district']}}</td>
            <td>{{$detail['landlordPhoneNumber']}}</td>
        </tr>
    </table>

</body>

</html>