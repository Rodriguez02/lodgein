<?php
    ob_start();
    session_start();

    $timeZone = date_default_timezone_set("America/Argentina/Cordoba");

    $con = mysqli_connect("localhost","g01devel_root","panchopereyra07","g01devel_lodgein","3306");

    if (mysqli_connect_errno()){
        echo "Failed to connect: " . mysqli_connect_errno();
    }

?>