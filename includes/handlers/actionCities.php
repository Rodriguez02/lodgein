<?php

include("../config.php");


if (isset($_POST['search'])) {

    $resp = $_POST['search'];
    $arrayData = array();
    $sql = "SELECT * from cities WHERE name LIKE '" . $resp . "%'";
    $res = $con->query($sql);
    if ($res->num_rows > 0) {
        while ($row = $res->fetch_array()) {
            $arrayData[] = array("value"=>$row['id'], "label"=>$row['name']);
        }
        $arrayData = array_slice($arrayData,0, 7);

        echo json_encode($arrayData);
    }

}