<?php include ("includes/header.php");?>

<?php
$idUser = $_SESSION['idUser'];

$query = mysqli_query($con,("SELECT * FROM lodgings l WHERE l.publisher = '$idUser'"));

/* if (mysqli_num_rows($query) == 0) {
    echo "No tienes publiciones activas";
} */

/* while ($row = mysqli_fetch_array($query)) {
    echo "<tr>";
    echo "<td>" . $row['title'] . "</td>";
    echo "</tr>";
}
 */
?>

<div class="mx-auto">
    <h1 class="text-center mt-2" style="font-weight:600">Publicaciones</h1>

    <h2>
        <?php
            if (mysqli_num_rows($query) == 0){
                echo "No tienes publiciones activas";
            }
            else{
                while ($row = mysqli_fetch_array($query)) {
                    echo "<tr>";
                    echo "<td>" . $row['title'] . "</td>";
                    echo "</tr>";
                }
            }
        ?>
    </h2>

</div>