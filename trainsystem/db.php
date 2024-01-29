<?php
    $con = mysqli_connect("localhost","root","","trainsystem");
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $GLOBAL__CONSTANT = array(
        array("TRAIN_NO" => 1001, "DEPARTURE_FROM" => "Kuala Lumpur", "DESTINATION" => "Penang", "DATE" => "2024-01-31", "PRICE" => 50, "AVAILABLE_SITS" => 120, "AVAILABLE_COACH" => "A,B,C,D,E,F"),
        array("TRAIN_NO" => 1002, "DEPARTURE_FROM" => "Kuala Lumpur", "DESTINATION" => "Johor Bahru", "DATE" => "2024-02-01", "PRICE" => 50, "AVAILABLE_SITS" => 120, "AVAILABLE_COACH" => "A,B,C,D,E,F")
    );
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/datepicker.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Home Page</title>
</head>
<body>
</html>