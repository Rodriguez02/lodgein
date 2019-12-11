<?php
include("includes/header.php");

if (isset($_GET['term'])) {
    $term =  urldecode($_GET['term']);
} else {
    $term = "";
}

$userLoggedIn = $_SESSION['userLoggedIn'];

?>

<div class="searchContainer">
    <input type="text" class="searchInput" value="<?php echo $term ?>" placeholder="Buscá por ciudad, provincia, estado o usuario" onfocus="this.value = this.value">
</div>


<script>
    var fieldInput = $('.searchInput');
    var fldLength = fieldInput.val().length;
    fieldInput.focus();
    fieldInput[0].setSelectionRange(fldLength, fldLength);

    $(function() {
        var timer;

        $(".searchInput").keyup(function() {
            clearTimeout(timer);
            timer = setTimeout(function() {
                var val = $(".searchInput").val();
                url = "search.php?term=" + val;

                if (url.indexOf("?") == -1) {
                    url = url + "?";
                }

                var encodedUrl = encodeURI(url);
                console.log(encodedUrl);
                $("#mainContent").load(encodedUrl);

                $("body").scrollTop(0);
                history.pushState(null, null, url);

            }, 500);
        })
    })
</script>

<?php if($term == "") exit(); ?>

<div>

    <?php
    $lodgeQuery = mysqli_query($con, "SELECT l.id as id,
                                            l.title as title,
                                            l.type as type, l.photo as photo, c.name as city, s.name as state, ct.name as country
                                        FROM lodgings l JOIN cities c on l.city=c.id JOIN states s on c.state_id=s.id
                                        JOIN countries ct on s.country_id=ct.id
                                        WHERE c.name LIKE '%$term%' or s.name LIKE '%$term%' or ct.name LIKE '%$term%'");

    if (mysqli_num_rows($lodgeQuery) == 0) {
        echo "<span class='noResults'>No se encontraron alojamientos que coincidan con " . $term . "</span>";
    } else {
        echo "<div class='container'>";
        echo "<div class='row hidden-md-up'>";
        while ($row = mysqli_fetch_array($lodgeQuery)) {
            echo "
            <div class='col-md-4 py-4'>
                <div class='card shadow' style='width: 18rem;
                                                border: none;'>
                    <img src='" . $row['photo'] . "' class='card-img-top'>
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
        echo "</div>";
        echo "</div>";
    }
    ?>

</div>