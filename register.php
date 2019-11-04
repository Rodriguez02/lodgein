<?php
    include("includes/config.php");
    include("includes/classes/Account.php");
    include("includes/classes/Constants.php");

    $account = new Account($con);

    include("includes/handlers/register-handler.php");
    include("includes/handlers/login-handler.php");

    function getInputValue($name){
        if (isset($_POST[$name])){
            echo $_POST[$name];
        }
    }
?>


<html>

<head>
    <title>Welcome to LodgeIn</title>
    <link rel="stylesheet" type="text/css" href="assets/css/register.css"/>
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="assets/js/register.js"></script>

</head>

<body>
    <?php
        if(isset($_POST['registerButton'])){
            echo '
                <script>
                    $(document).ready(function(){
                        $("#loginForm").hide();
                        $("#registerForm").show();
                    });
                </script>';
        }
        else{
            echo '
                <script>
                    $(document).ready(function(){
                        $("#loginForm").show();
                        $("#registerForm").hide();
                    });
                </script>';
        }
    ?>
    
    <div id="background">

        <div id="loginContainer">

            <div id="inputContainer">
                <form id="loginForm" action="register.php" method="POST">
                    <h2>Login to your Account</h2>
                    <p>
                        <?php echo $account->getError(Constants::$loginFailed); ?>
                        <label for="loginUsername">Username</label>
                        <input id="loginUsername" name="loginUsername" type="text" placeholder="e.g Geralt de Rivia" value="<?php getInputValue('loginUsername')?>">
                    </p>
                    <p>
                        <label for="loginPassword">Password</label>
                        <input id="loginPassword" name="loginPassword" type="password" placeholder="Your Password" required>
                    </p>

                    <button type="submit" name="loginButton">Log In</button>

                    <div class="hasAccountText">
                        <span id="hideLogin">Don't have an account yet? SignUp Here</span>
                    </div>
                
                </form>

                <form id="registerForm" action="register.php" method="POST">
                    <h2>Create your free account</h2>
                    <p>
                        <?php echo $account->getError(Constants::$usernameLength); ?>
                        <?php echo $account->getError(Constants::$usernameTaken); ?>
                        <label for="username">Username</label>
                        <input id="username" name="username" type="text" placeholder="e.g Geralt de Rivia" value="<?php getInputValue('username') ?>" required>
                    </p>

                    <p>
                        <?php echo $account->getError(Constants::$firstNameLength); ?>
                        <label for="firstName">First Name</label>
                        <input id="firstName" name="firstName" type="text" placeholder="e.g Geralt" value="<?php getInputValue('firstName') ?>" required>
                    </p>

                    <p>
                        <?php echo $account->getError(Constants::$lastNameLength); ?>
                        <label for="lastName">Last Name</label>
                        <input id="lastName" name="lastName" type="text" placeholder="e.g de Rivia" value="<?php getInputValue('lastName') ?>" required>
                    </p>

                    <p>
                        <?php echo $account->getError(Constants::$emailsDontMatch); ?>
                        <?php echo $account->getError(Constants::$emailInvalid); ?>
                        <?php echo $account->getError(Constants::$emailTaken); ?>
                        <label for="email">Email</label>
                        <input id="email" name="email" type="email" placeholder="e.g geralt@gmail.com" value="<?php getInputValue('email') ?>" required>
                    </p>

                    <p>
                        <label for="email2">Confirm Email</label>
                        <input id="email2" name="email2" type="email" placeholder="e.g geralt@gmail.com" value="<?php getInputValue('email2') ?>" required>
                    </p>

                    <p>
                        <?php echo $account->getError(Constants::$passwordsDoNotMatch); ?>
                        <?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?>
                        <?php echo $account->getError(Constants::$passwordLength); ?>
                        <label for="password">Password</label>
                        <input id="password" name="password" type="password" placeholder="Your Password" required>
                    </p>

                    <p>
                        <label for="password2">Confirm Password</label>
                        <input id="password2" name="password2" type="password" placeholder="Your Password" required>
                    </p>

                    <p>
                        <label for="phoneArea">Phone Area</label>
                        <input id="phoneArea" name="phoneArea" type="text" placeholder="(03571)" required>

                        <label for="phoneNumber">Phone Area</label>
                        <input id="phoneNumber" name="phoneNumber" type="text" placeholder="460210" required>
                    </p>

                    <button type="submit" name="registerButton">Registrarse</button>

                    <div class="hasAccountText">
                        <span id="hideRegister">Ya tenés una cuenta? Ingresa Acá</span>
                    </div>

                </form>

            </div>

            <div id="loginText">
                <h1>Encontra Alojamientos y Experiencias Únicas</h1>
                <h2>Empeza a buscar donde parar en el lugar que siempre quisiste estar</h2>
                <ul>
                    <li>Buscá Alojamientos en Lugares Hermosos</li>
                    <li>Conoce nuevas culturas</li>
                    <li>Encontrá tu lugar en el mundo</li>
                </ul>
            </div>

        </div>
    </div>
</body>

</html>