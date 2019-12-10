<?php
include("../config.php");

if (isset($_POST['id'])){
    $pubId = $_POST['id'];

    $pubQuery = mysqli_query($con,"DELETE FROM lodgings WHERE id = '$pubId'");
} else {
    echo "publication id was not sent";
}

?>