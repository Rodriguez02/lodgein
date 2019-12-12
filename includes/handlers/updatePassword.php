<?php include("../config.php");

    if (!isset($_POST['oldPassword']) || !isset($_POST['newPassword1']) || !isset($_POST['newPassword2'])){
        echo "No se ingresaron todas las contraseñas";
        exit();
    }

    if ($_POST['oldPassword'] == "" || $_POST['newPassword1'] == "" || $_POST['newPassword2'] == ""){
        echo "Por favor complete todos los campos";
        exit();
    }

    $username = $_SESSION['userLoggedIn'];
    $oldPassword = $_POST['oldPassword'];
    $newPassword1 = $_POST['newPassword1'];
    $newPassword2 = $_POST['newPassword2'];
    

    $oldMd5 = md5($oldPassword);

    $passwordCheck = mysqli_query($con, "SELECT * FROM users where username = '$username' and password='$oldMd5'");


    if (mysqli_num_rows($passwordCheck) != 1){
        echo "Contraseña Incorrecta";
        exit();
    }

    if ($newPassword1 != $newPassword2){
        echo "Las Contraseñas no Coinciden";
        exit();
    }

    if (strlen($newPassword2) < 5) {
        echo "La contraseña debe tener al menos 5 caracteres";
        exit();
    }

    $newMd5 = md5($newPassword1);
    
    $query = mysqli_query($con,"UPDATE users SET password = '$newMd5' where username = '$username'");
    echo "Contraseña Actualizada";
?>