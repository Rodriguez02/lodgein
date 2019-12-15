<?php include("includes/header.php"); ?>

<?php
$idUser = $_SESSION['idUser'];

$query = mysqli_query($con, ("SELECT * FROM lodgings l WHERE l.publisher = '$idUser'"));

$query = mysqli_query($con, ("SELECT l.id as id, l.title as title, l.photo as photo, t.name as type, c.name as city, s.name as state, ct.name as country
        FROM lodgings l
        JOIN lodgings_types t
            on l.type = t.id
        JOIN cities c
            on l.city = c.id
        JOIN states s
            on c.state_id = s.id
        JOIN countries ct
            on s.country_id = ct.id
        WHERE l.publisher = '$idUser'"));

?>

<svg class="favWave" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="#0099ff" fill-opacity="1" d="M0,128L80,138.7C160,149,320,171,480,170.7C640,171,800,149,960,144C1120,139,1280,149,1360,154.7L1440,160L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z"></path>
</svg>
<div class="mx-auto">
    <div class="title">
        <h1 class="text-center mt-5 title">Publicaciones</h1>
    </div>
    <div class="publications">
        <?php
        if (mysqli_num_rows($query) == 0) {
            echo "<h1 class='text-center mt-5'>No tienes publiciones activas</h1>";
        } else {
            while ($row = mysqli_fetch_array($query)) {
                echo "
                <div class='card mb-3 mt-4 shadow' style='max-width: 650px; margin-left: 2em;'>
                  <div class='row'>
                    <div class='col-md-4'>
                      <img src='" . $row['photo'] . "' class='card-img shadow'>
                    </div>
                    <div class='col-md-8'>
                      <div class='card-body'>
                        <h5 class='card-title' style='font-weight:bold;'>" . $row['title'] . "</h5>
                        <p class='card-text'>
                        <i class='fa fa-home' style='color:gray; font-size: 1.2em; margin-right:0.5em;'></i> " . $row['type'] . " <br/>
                        <i class='fa fa-globe' style='color:gray; font-size: 1.2em; margin-right:0.5em;'></i>
                        " . $row['city'] . ", " . $row['state'] . ", " . $row['country'] . "
                        </p>
                        <div class='row'>
                            <a href='lodge.php?id=" . $row['id'] . "' class='btn btn-primary mx-auto'>Información</a>
                            <button class='delbtn mx-auto' style='width:7em;' onclick='deletePublication(" . $row['id'] . ")'>Eliminar</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <hr>
            ";
            }
        }
        ?>
    </div>
</div>