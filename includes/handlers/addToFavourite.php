<?php
include("../config.php");

if (isset($_POST['lodgingId'])){
    $pubId = $_POST['lodgingId'];
    $userId = $_SESSION['idUser'];

    $pubQuery = mysqli_query($con,"INSERT INTO favourites (id_lodging, id_user) VALUES ('$pubId', '$userId');");

} else {
    echo "publication id was not sent";
}

?>