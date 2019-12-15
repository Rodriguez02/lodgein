<?php

include("../config.php");


if (isset($_POST['search'])) {

    $resp = $_POST['search'];
    $arrayData = array();
    $sql = "SELECT cities.id, cities.name AS name_city, states.name AS name_state, countries.name AS name_country
                FROM cities 
                    JOIN states 
                    ON cities.state_id = states.id 
                    JOIN countries 
                    ON states.country_id = countries.id 
                WHERE cities.name LIKE '" . $resp . "%' LIMIT 40";

    $res = $con->query($sql);
    if ($res->num_rows > 0) {
        while ($row = $res->fetch_array()) {
            $arrayData[] = array("value"=>$row['id'], "label"=>($row['name_city'] . ", " . $row['name_state'] . ", " . $row['name_country']));
        }

        echo json_encode($arrayData);
    }

}