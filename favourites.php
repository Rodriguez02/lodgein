<?php include("includes/header.php"); ?>

<?php
$idUser = $_SESSION['idUser'];

$query = mysqli_query($con, ("SELECT * FROM lodgings l WHERE l.publisher = '$idUser'"));

$query = mysqli_query($con,("SELECT l.id lodId, l.title title, l.photo photo
	                            FROM favourites f
                                JOIN users u
                                	on f.id_user = u.id
                                JOIN lodgings l
                                	on f.id_lodging = l.id"));

?>

<div class="mx-auto">
    <h1 class="text-center mt-2" style="font-weight:600">Favoritos</h1>
    
    <div>
        <?php
        if (mysqli_num_rows($query) == 0) {
            echo "<h1 class='text-center mt-5'>No tienes publiciones en Favoritos</h1>";
        } else {
            while ($row = mysqli_fetch_array($query)) {
                echo "
                <div class='col-md-4 py-4'>
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