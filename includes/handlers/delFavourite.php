<?php
include("../config.php");

if (isset($_POST['lodgingId'])){
    $pubId = $_POST['lodgingId'];
    $userId = $_SESSION['idUser'];
    echo $userId;
    echo "<script>console.log(".$pubId.");</script>";

    $pubQuery = mysqli_query($con,"DELETE FROM favourites
                                    WHERE id_lodging = '$pubId' AND id_user = '$userId'");

} else {
    echo "publication id was not sent";
}

?>