<?php include("includes/header.php");

$username = $_SESSION['userLoggedIn'];

// to show the updated data when reloading the page
$query = mysqli_query($con,"SELECT * FROM users where username = '$username'");
$queryUser = mysqli_fetch_array($query);
$_SESSION['email'] = $queryUser['email'];
$userEmail = $_SESSION['email'];

?>

<div class="changeProfile">
    <h2>Perfil</h2>
    <div class="form-group">
        <h5>Correo Electrónico</h5>
        <div class="txtb">
            <input id="newEmail" class="form-control newEmail" name="newEmail" type="email" autocomplete="off" value="<?php echo $userEmail ?>" required>
            <span data-placeholder="Email"></span>
        </div>
        <span class="message"></span>
        <button class="logbtn mx-auto" onclick="updateEmail('newEmail')">Actualizar Email</button>
    </div>

    <div class="form-group">
        <h5>Contraseña</h5>
        <div class="txtb">
            <input id="passwordOld" name="passwordOld" type="password" value="">
            <span data-placeholder="Contraseña Actual"></span>
        </div>
        <div class="txtb">
            <input id="passwordNew" name="passwordNew" type="password" value="">
            <span data-placeholder="Contraseña Nueva"></span>
        </div>
        <div class="txtb">
            <input id="passwordNew2" name="passwordNew2" type="password" value="">
            <span data-placeholder="Confirmar Contraseña"></span>
        </div>
    </div>

    <button type="submit" name="updateButton" class="logbtn mx-auto">Actualizar Perfil</button>
</div>


<script>
    if ($("#newEmail").val() == "") {
        $("#newEmail").removeClass("focus");
    } else {
        $("#newEmail").addClass("focus");
    }
    $(".txtb input").on("focus", function() {
        $(this).addClass("focus");
    });

    $(".txtb input").on("blur", function() {
        if ($(this).val() == "")
            $(this).removeClass("focus");
    });
</script>