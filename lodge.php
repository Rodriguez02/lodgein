<?php include("includes/header.php");

if (isset($_GET['id'])) {
    $lodgingId = $_GET['id'];
} else {
    //if there's not an id set
    header("location:index.php");
}

// gather all the information about a lodging
$lodgingQuery = mysqli_query(
    $con,
    "SELECT l.id    as id   , l.description as description, l.title as title,
            l.photo as photo, lt.name       as type       , c.name as city, 
            s.name  as state, ct.name       as country    , u.email as email,
            u.phone as phone, u.username as user
            FROM lodgings l JOIN lodgings_types lt on l.type=lt.id JOIN cities c on l.city = c.id JOIN states s on c.state_id=s.id
            JOIN countries ct on s.country_id=ct.id JOIN users u on l.publisher=u.id where l.id='$lodgingId'"
);

$lodging = mysqli_fetch_array($lodgingQuery);

?>

<div class="lodging">
    <div class="card shadow mb-5">
        <img src="<?php echo $lodging['photo'] ?>" class="card-img-top" alt="...">
        <div class="card-body">
            <h3 class="card-title text-center"> <strong> <?php echo $lodging['title'] ?> </strong></h3>
            <hr>
            <i class='fa fa-home' style='color:gray; font-size: 1.2em;'></i> <?php echo $lodging['type'] ?><br /><br />
            <h5>Descripción:</h5>
            <hr style="margin-top: -0.4em;">
            <p class="card-text"><?php echo $lodging['description'] ?></p>
            <p class="card-text">
                <i class='fa fa-globe' style='color:gray; font-size: 1.2em;'></i>
                <?php echo $lodging['city'] ?> - <?php echo $lodging['state'] ?> - <?php echo $lodging['country'] ?>
            </p>
            <p class="card-text text-muted">Publicado por: <?php echo $lodging['user'] ?></p>
        </div>
    </div>
</div>

<!-- <div class="card mx-auto" style="width:80%">
    <img src="..." class="card-img-mid" alt="...">
    <div class="card-title mx-auto">
        <h1><?php echo $lodging['title'] ?></h1>
        <div class="card-body" style="text-align: initial;">
            <p>Descripción: <br /><?php echo $lodging['description'] ?> </p>
            <i class='fa fa-home' style='color:black; font-size: 2.5em;'></i> <?php echo $lodging['type'] ?><br /><br />
        </div>
    </div>
</div> -->