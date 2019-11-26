<?php
include("includes/config.php");
include("includes/classes/Account.php");
include("includes/classes/Constants.php");

$account = new Account($con);

include("includes/handlers/register-handler.php");
include("includes/handlers/login-handler.php");

function getInputValue($name)
{
    if (isset($_POST[$name])) {
        echo $_POST[$name];
    }
}
?>

<html>

<head>
    <title>Bienvenido a LodgeIn</title>

    <link href="https://fonts.googleapis.com/css?family=Montserrat:thin,extra-light,light,regular,medium,bold&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="assets/css/register.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap/3.2.0/js/bootstrap.min.js"></script>


    <script src="assets/js/register.js"></script>
</head>

<body>
    <?php
    //to show either the registration form or the login form
    if (isset($_POST['registerButton'])) {
        echo '
                <script>
                    $(document).ready(function(){
                        $("#loginForm").hide();
                        $("#registerForm").show();
                    });
                </script>';
    } else {
        echo '
                <script>
                    $(document).ready(function(){
                        $("#loginForm").show();
                        $("#registerForm").hide();
                    });
                </script>';
    }
    ?>

    <!-- Login Form -->
    <form id="loginForm" action="register.php" method="POST" class="login-form" novalidate>
        <h2>Login</h2>
        <div class="errorMessage mx-auto"><?php echo $account->getError(Constants::$loginFailed); ?> </div>

        <div class="form-group">
            <div class="txtb">
                <input id="loginUsername" class="form-control save-input" name="loginUsername" type="email" autocomplete="off" value="<?php getInputValue('loginUsername') ?>" required>
                <span data-placeholder="Nombre de Usuario"></span>
            </div>
            <div class="error">
                <span></span><?php echo $account->getError(Constants::$loginFailed); ?></span>
            </div>
        </div>
        <div class="txtb">
            <input id="loginPassword" name="loginPassword" type="password" value="">
            <span data-placeholder="Contraseña"></span>
        </div>

        <button type="submit" name="loginButton" class="logbtn mx-auto">Ingresar</button>
        <div class="hasAccountText bottom-text">
            Todavía no tenés una cuenta? <a href="javascript:void(0)" id="hideLogin">Registrate</a>
        </div>

    </form>

    <!-- Register Form -->
    <form id="registerForm" action="register.php" method="POST" class="register-form">
        <h2>Crea tu cuenta gratis</h2>
        <div class="form-row">

        </div>
        <div class="form-row">
            <div class="txtb col-5">
                <input id="username" class="form-control" name="username" type="text" required autocomplete="off" value="<?php getInputValue('username') ?>">
                <span data-placeholder="Nombre de Usuario"></span>
                <span class="error">
                    <?php echo $account->getError(Constants::$usernameTaken); ?>
                    <?php echo $account->getError(Constants::$usernameLength); ?>
                </span>
            </div>
        </div>
        <div class="form-row">
            <div class="txtb col-5">
                <input id="firstName" name="firstName" type="text" class="form-control" required autocomplete="off" value="<?php getInputValue('firstName') ?>">
                <span data-placeholder="Nombre"></span>
            </div>
            <div class="txtb col-5">
                <input id="lastName" name="lastName" type="text" class="form-control" required autocomplete="off" value="<?php getInputValue('lastName') ?>">
                <span data-placeholder="Apellido"></span>
            </div>
        </div>
        <div class="form-row">
            <div class="txtb col-5">
                <input id="email" name="email" type="email" required autocomplete="off" value="<?php getInputValue('email') ?>">
                <span data-placeholder="Email"></span>
                <span class="error">
                    <?php echo $account->getError(Constants::$emailsDontMatch); ?>
                    <?php echo $account->getError(Constants::$emailInvalid); ?>
                    <?php echo $account->getError(Constants::$emailTaken); ?>
                </span>
            </div>
            <div class="txtb col-5">
                <input id="email2" name="email2" type="email" required autocomplete="off">
                <span data-placeholder="Confirmar Email"></span>
            </div>
        </div>
        <div class="form-row">
            <div class="txtb col-5">
                <input id="password" name="password" type="password" required>
                <span data-placeholder="Contraseña"></span>
                <span class="error"> 
                    <?php echo $account->getError(Constants::$passwordsDoNotMatch); ?>
                    <?php echo $account->getError(Constants::$passwordLength); ?>
                </span>
            </div>
            <div class="txtb col-5">
                <input id="password2" name="password2" type="password" required>
                <span data-placeholder="Confirmar Contraseña"></span>
            </div>
        </div>
        <div class="form-row">
            <div class="txtb">
                <input id="phoneNumber" name="phoneNumber" type="tel" required autocomplete="off">
                <span data-placeholder="Teléfono"></span>
                <span class="error"> 
                    <?php echo $account->getError(Constants::$phoneInvalid); ?>
                </span>
            </div>
        </div>
        <button type="submit" name="registerButton" class="logbtn mx-auto">Crear Cuenta</button>
        <div class="hasAccountText bottom-text">
            Ya tenés una cuenta? <a href="javascript:void(0)" id="hideRegister">Ingresa Acá</a>
        </div>
    </form>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


    <!-- this controls the text input when clicking on it -->
    <script type="text/javascript">
        if ($("#loginUsername").val() == "") {
            $("#loginUsername").removeClass("focus");
        } else {
            $("#loginUsername").addClass("focus");
        }

        if ($("#username").val() == "") {
            $("#username").removeClass("focus");
        } else {
            $("#username").addClass("focus");
        }

        if ($("#firstName").val() == "") {
            $("#firstName").removeClass("focus");
        } else {
            $("#firstName").addClass("focus");
        }

        if ($("#lastName").val() == "") {
            $("#lastName").removeClass("focus");
        } else {
            $("#lastName").addClass("focus");
        }

        if ($("#email").val() == "") {
            $("#email").removeClass("focus");
        } else {
            $("#email").addClass("focus");
        }

        $('#mydiv').children('input').each(function() {
            alert(this.value); // "this" is the current element in the loop
        });

        $(".txtb input").on("focus", function() {
            $(this).addClass("focus");
        });

        $(".txtb input").on("blur", function() {
            if ($(this).val() == "")
                $(this).removeClass("focus");
        });
    </script>

</body>

</html>