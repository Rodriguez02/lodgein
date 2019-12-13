<?php include("includes/header.php"); ?>


<div class="bg-white">

    <div class="discover">
        <h1>Descubrí LodgeIn</h1>
        <div class="row">
            <div class="col md-3">
                <div class='card mb-2 mt-4 shadow'>
                    <div class='row no-gutters'>
                        <div class='col-md-5'>
                            <img src='https://images.unsplash.com/photo-1534430480872-3498386e7856?ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80' class='card-img'>
                        </div>
                        <div class='col-md-7'>
                            <div class='card-body'>
                                <h5 class='card-title' style='font-weight:bold;'>Nueva York</h5>
                            </div>
                        </div>
                        <a href="search.php?term=New York" class="stretched-link"></a>
                    </div>
                </div>
            </div>
            
            <div class="col md-3">
                <div class='card mb-3 mt-4 shadow'>
                    <div class='row no-gutters'>
                        <div class='col-md-5'>
                            <img src='https://images.unsplash.com/photo-1559064500-4b4aee013170?ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80' class='card-img'>
                        </div>
                        <div class='col-md-7'>
                            <div class='card-body'>
                                <h5 class='card-title' style='font-weight:bold;'>Barcelona</h5>
                            </div>
                        </div>
                        <a href="search.php?term=Barcelona" class="stretched-link"></a>
                    </div>
                </div>
            </div>

            <div class="col md-3">

                <div class='card mb-3 mt-4 shadow'>
                    <div class='row no-gutters'>
                        <div class='col-md-5'>
                            <img src='https://images.unsplash.com/photo-1505761671935-60b3a7427bad?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80' class='card-img'>
                        </div>
                        <div class='col-md-7'>
                            <div class='card-body'>
                                <h5 class='card-title' style='font-weight:bold;'>Londres</h5>
                            </div>
                        </div>
                        <a href="search.php?term=London" class="stretched-link"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="browse-index">
        <p class="text">Empezá a buscar tu lugar!</p>
        <a href="search.php" class='btn btn-primary browse-btn shadow'>Buscar</a>
        <img src="https://images.unsplash.com/photo-1572376313139-2d2c6ff7de20?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1548&q=80" class="img-index">
        
        <!-- https://images.unsplash.com/photo-1573311568869-7aea30da5cb7?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1548&q=80 -->
    </div>

    <div class="recomendations">
        <h1 class="text-center text-dark" style="margin-top: 30px;font-weight: 700;">Recomendaciones</h1>

        <div class=" container">
            <div class='row hidden-md-up'>
                <?php
                $lodgeQuery = mysqli_query($con, "SELECT  l.id as id, l.title as title, l.photo as photo, lt.name as type, c.name as city,
                                                s.name as state, ct.name as country, u.email as email, u.phone as phone
                                            FROM lodgings l
                                            JOIN lodgings_types lt
                                                on l.type=lt.id
                                            JOIN cities c
                                                on l.city = c.id
                                            JOIN states s
                                                on c.state_id=s.id
                                            JOIN countries ct
                                                on s.country_id=ct.id
                                            JOIN users u
    	                                        on l.publisher=u.id
                                                order by rand() LIMIT 6");

                while ($row = mysqli_fetch_array($lodgeQuery)) {
                    echo "
                <div class='col-md-4 py-4'>
                    <div class='card shadow' style='width: 19rem;
                                                    border: none;'>
                        <img src='" . $row['photo'] . "' class='card-img-top shadow-sm'>
                        <div class='card-body' style='text-align:center;'>
                            <h5 class='card-title text-dark' style='font-weight:bolder'>" . $row['title'] . "</h5>
                            <p class='card-text text-dark'>
                                <i class='fa fa-home' style='color:gray; font-size: 1.5em;'></i> " . $row['type'] . " <br/><br/>
                                <i class='fa fa-globe' style='color:gray; font-size: 1.5em;'></i>
                                " . $row['city'] . ", " . $row['state'] . ", " . $row['country'] . " <br/> <br/>
                            </p>
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

</div>