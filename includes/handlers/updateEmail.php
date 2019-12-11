<?php include("../config.php");

if (isset($_POST['email']) && $_POST['email'] != ""){
    
    $email = $_POST['email'];

    if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
        echo "Email inválido";
        exit();
    }

    $username = $_SESSION['userLoggedIn'];

    $emailCheck = mysqli_query($con,"SELECT email FROM users WHERE email='$email' AND username!='$username'");
    
    if (mysqli_num_rows($emailCheck) > 0){
        echo "Email ya en uso";
        exit();
    }

    $updateEmail = mysqli_query($con,"UPDATE users SET email = '$email' WHERE username='$username'");
    echo "Actualización Exitosa";

}
else{
    echo "Debe ingesar un email";
}

?>