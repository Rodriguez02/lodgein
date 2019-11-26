<?php include("includes/header.php"); ?>


<div class="bg-white">
    <h1 class="text-center text-dark" style="margin-top: 30px;font-weight: 700;">Recomendaciones</h1>

    <div class="container">
        <div class='row hidden-md-up'>
            <?php
            $lodgeQuery = mysqli_query($con, "SELECT 
                                                l.id as id,
                                                l.title as title,
            	                                l.photo as photo,
                                                lt.name as type,
                                                c.name as city,
                                                s.name as state,
                                                ct.name as country,
                                                u.email as email,
                                                u.phone as phone
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
                                                order by rand() LIMIT 9");

            while ($row = mysqli_fetch_array($lodgeQuery)) {
                echo "
                <div class='col-md-4 py-2'>
                    <div class='card shadow' style='width: 18rem;
                                                    border: none;'>
                        <img src='" . $row['photo'] . "' class='card-img-top'>
                        <div class='card-body' style='text-align:center;'>
                            <h5 class='card-title text-dark' style='font-weight:bolder'>" . $row['title'] . "</h5>
                            <p class='card-text text-dark'>
                                <i class='fa fa-home' style='color:black; font-size: 1.5em;'></i> ".$row['type']." <br/><br/>
                                <i class='fa fa-globe' style='color:black; font-size: 1.5em;'></i>
                                ".$row['city'].",".$row['state'].",".$row['country']." <br/> <br/>
                                <i class='fa fa-envelope' style='color:black; font-size: 1em;'></i>  ".$row['email']." <br/>
                                <i class='fa fa-phone' style='color:black; font-size: 1.2em;'></i>  ".$row['phone']." <br/>
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