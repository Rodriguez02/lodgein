<?php include("includes/header.php");

$username = $_SESSION['userLoggedIn'];

// to show the updated data when reloading the page
$query = mysqli_query($con, "SELECT * FROM users where username = '$username'");
$queryUser = mysqli_fetch_array($query);
$_SESSION['email'] = $queryUser['email'];
$userEmail = $_SESSION['email'];
$userPhone = $queryUser['phone'];

?>

<h2 id="modifyProfile">Modificar Perfil</h2>

<div class="profile">
    <div class="card shadow">
        <div class="form-group">
            <h4 class="text-center mb-5" style="font-weight: 700;">Correo Electrónico</h4>
            <div class="txtb mx-auto">
                <input id="newEmail" class="form-control newEmail" name="newEmail" type="email" autocomplete="off" value="<?php echo $userEmail ?>" required>
                <span data-placeholder="Email"></span>
            </div>
            <span class="message m1"></span>
            <button class="logbtn mx-auto" onclick="updateEmail('newEmail')">Actualizar Email</button>
        </div>

        <hr>

        <div class="form-group">
            <h4 class="text-center mb-5 mt-3" style="font-weight: 700;">Contraseña</h4>
            <div class="txtb mx-auto">
                <input class="oldPassword" id="oldPassword" name="oldPassword" type="password" value="">
                <span data-placeholder="Contraseña Actual"></span>
            </div>
            <div class="txtb mx-auto">
                <input class="newPassword1" id="newPassword1" name="newPassword1" type="password" value="">
                <span data-placeholder="Contraseña Nueva"></span>
            </div>
            <div class="txtb mx-auto">
                <input class="newPassword2" id="newPassword2" name="newPassword2" type="password" value="">
                <span data-placeholder="Confirmar Contraseña"></span>
            </div>
            <span class="message m2"></span>
            <button class="logbtn mx-auto" onclick="updatePassword('oldPassword','newPassword1','newPassword2')">Actualizar Contraseña</button>
        </div>

        <hr>

        <div class="form-group">
            <h4 class="text-center mb-5 mt-3" style="font-weight: 700;">Teléfono</h4>
            <div class="txtb mx-auto">
                <input id="newPhone" class="form-control newPhone" name="newPhone" type="tel" autocomplete="off" value="<?php echo $userPhone ?>" required>
                <span data-placeholder="Teléfono"></span>
            </div>
            <span class="message m3"></span>
            <button class="logbtn mx-auto" onclick="updatePhone('newPhone')">Actualizar Teléfono</button>
        </div>

    </div>
</div>

<script>
    if ($("#newPhone").val() == "") {
        $("#newPhone").removeClass("focus");
    } else {
        $("#newPhone").addClass("focus");
    }

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