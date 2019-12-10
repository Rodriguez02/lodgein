<?php include("includes/header.php");

if (isset($_GET['id'])) {
    $lodgeId = $_GET['id'];
} else {
    //if there's not an id set
    header("location:index.php");
}

// gather all the information about a lodge (its title, description, city, state, country, etc)
$lodgeQuery = mysqli_query(
    $con,
    "SELECT l.id as id,
            l.description as description,
            l.title as title,
            l.photo as photo,
            lt.name as type,
            c.name as city,
            s.name as state,
            ct.name as country,
            u.email as email,
            u.phone as phone    FROM lodgings l JOIN lodgings_types lt on l.type=lt.id JOIN cities c on l.city = c.id JOIN states s on c.state_id=s.id
            JOIN countries ct on s.country_id=ct.id JOIN users u on l.publisher=u.id where l.id='$lodgeId'"
);

$lodge = mysqli_fetch_array($lodgeQuery);

echo $lodge['title'];
?>

<div class="card mx-auto" style="width:80%">
    <img src="..." class="card-img-mid" alt="...">
    <div class="card-title mx-auto">
        <h1><?php echo $lodge['title'] ?></h1>
        <div class="card-body" style="text-align: initial;">
            <p>Descripción: <br /><?php echo $lodge['description'] ?> </p>
            <i class='fa fa-home' style='color:black; font-size: 2.5em;'></i> <?php echo $lodge['type'] ?><br /><br />
        </div>
    </div>
</div>