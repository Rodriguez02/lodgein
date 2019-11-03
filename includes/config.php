<?php
    ob_start();
    session_start();

    $timeZone = date_default_timezone_set("America/Argentina/Cordoba");

    $con = mysqli_connect("localhost","root","","lodgein");

    if (mysqli_connect_errno()){
        echo "Failed to connect: " . mysqli_connect_errno();
    }

?>