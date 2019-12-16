<?php include("includes/header.php"); ?>

<?php
$idUser = $_SESSION['idUser'];

$query = mysqli_query($con, ("SELECT * FROM lodgings l WHERE l.publisher = '$idUser'"));

$query = mysqli_query($con, ("SELECT l.id lodId, l.title title, l.photo photo
	                            FROM favourites f
                                JOIN users u
                                	on f.id_user = u.id
                                JOIN lodgings l
                                    on f.id_lodging = l.id
                                WHERE u.id = '$idUser'
                                "));

?>

<svg class="favWave" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
  <path fill="#0099ff" fill-opacity="1" d="M0,128L80,138.7C160,149,320,171,480,170.7C640,171,800,149,960,144C1120,139,1280,149,1360,154.7L1440,160L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z"></path>
</svg>

<h1 class="favouriteTitle text-center">Favoritos</h1>

<div class="favourites container">
    <div class="row ">
        <?php
        if (mysqli_num_rows($query) == 0) {
            echo "<h1 class='text-center mt-5'>No tienes publiciones en Favoritos</h1>";
        } else {
            while ($row = mysqli_fetch_array($query)) {
                echo "
                <div class='col-sm py-4'>
                    <div class='card shadow' style='width: 14rem;
                                                    border: none;'>
                        <img src='" . $row['photo'] . "' class='card-img-top'>
                        <div class='card-body' style='text-align:center;'>
                            <h5 class='card-title text-dark' style='font-weight:bolder'>" . $row['title'] . "</h5>
                            <a href='lodge.php?id=" . $row['lodId'] . "' class='btn btn-primary'>Información</a>
                        </div>
                    </div>
                </div>
            ";
            }
        }
        ?>
    </div>
</div>