<?php
include("includes/header.php");

if (isset($_GET['term'])){
    $term =  urldecode($_GET['term']);
    echo $term;
}
else{
    $term="";
}
?>

<div class="searchContainer">
    <input type="text" class="searchInput" value="<?php echo $term ?>" placeholder="Buscá por ciudad, provincia, estado o usuario">
</div>


<script>
    $(function(){
        var timer;

        $(".searchInput").keyup(function(){
            clearTimeout(timer);
            timer = setTimeout(function(){
                var val = $(".searchInput").val();
                openPage("search.php?term="+val);
            }, 500);
        })
    })
</script>