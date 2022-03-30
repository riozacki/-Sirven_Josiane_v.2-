<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="css/indexUser.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/medium_device.css">
    <link rel="stylesheet" href="css/small_device.css">
    <link rel="stylesheet" href="css/indexUser.css">
</head>
<?php
//header("Content-type: application/json; charset=utf-8");
session_start();
include 'views/header.php';
include 'views/footer.php';


?>

<body>
    <div class="transition" id="left_transit">
        <div class="welcome">
            <h3>Welcome</h3>
            <div id="display_data"></div>
        </div>
    </div>
    <script src="js/indexUser.js"></script>
</body>


