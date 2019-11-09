<?php include("includes/header.php"); ?>


<div class="bg-secondary">
    <h1 class="text-center text-primary">You might also like</h1>

    <div class="container">
        <div class='row hidden-md-up'>
        <?php
        $albumQuery = mysqli_query($con, "select * from lodgings order by rand()");

        while ($row = mysqli_fetch_array($albumQuery)) {
            
            echo "
                <div class='col-md-4 py-2'>
                    <div class='card' style='width: 18rem;'>
                        <img src='" . $row['photo'] . "' class='card-img-top'>
                        <div class='card-body'>
                            <h5 class='card-title text-primary'>'". $row['title'] . "'</h5>
                            <p class='card-text text-primary'>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href='lodge.php?id=" . $row['id'] . "' class='btn btn-primary'>Información</a>
                        </div>
                    </div>
                </div>
            ";
        }
        ?>
    </div>
    </div>
</div>