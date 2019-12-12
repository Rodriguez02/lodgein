<?php include("includes/header.php");

if (isset($_GET['id'])) {
    $lodgingId = $_GET['id'];
} else {
    //if there's not an id set
    header("location:index.php");
}

$userId = $_SESSION['idUser'];

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

$favQuery = mysqli_query($con, "SELECT * FROM favourites f WHERE f.id_lodging = '$lodgingId' and f.id_user = '$userId'");
if (mysqli_num_rows($favQuery) == 0) {
    $favs = 0;
} else {
    $favs = 1;
}

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

            <div class="click" onclick="favourite(<?php echo $lodging['id']?>)">
                <span class="fa fa-star-o"></span>
                <div class="ring"></div>
                <div class="ring2"></div>
                <p class="info">Añadido a Favoritos!</p>
            </div>
        </div>
    </div>
</div>

<script>
    let fav = '<?php echo $favs; ?>'
    if (fav == 0) {
        $('.click').removeClass('active')
        setTimeout(function() {
            $('.click').removeClass('active-2')
        }, 30)
        $('.click').removeClass('active-3')
        setTimeout(function() {
            $('span').removeClass('fa-star')
            $('span').addClass('fa-star-o')
        }, 0)
    } else{
        $('.click').addClass('active')
            $('.click').addClass('active-2')
            setTimeout(function() {
                $('span').addClass('fa-star')
                $('span').removeClass('fa-star-o')
            }, 150)
            setTimeout(function() {
                $('.click').addClass('active-3')
            }, 0)
    }
</script>

<script>
    $('.click').click(function() {
        if ($('span').hasClass("fa-star")) {
            $('.click').removeClass('active')
            setTimeout(function() {
                $('.click').removeClass('active-2')
            }, 30)
            $('.click').removeClass('active-3')
            setTimeout(function() {
                $('span').removeClass('fa-star')
                $('span').addClass('fa-star-o')
            }, 15)
        } else {
            $('.click').addClass('active')
            $('.click').addClass('active-2')
            setTimeout(function() {
                $('span').addClass('fa-star')
                $('span').removeClass('fa-star-o')
            }, 150)
            setTimeout(function() {
                $('.click').addClass('active-3')
            }, 150)
            $('.info').addClass('info-tog')
            setTimeout(function() {
                $('.info').removeClass('info-tog')
            }, 1000)
        }
    })
</script>