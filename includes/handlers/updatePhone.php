<?php include("../config.php");

if (isset($_POST['phone']) && $_POST['phone'] != ""){
    
    $phone = $_POST['phone'];

    $filtered_phone_number = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
    // Remove "-" from number
    $phone_to_check = str_replace("-", "", $filtered_phone_number);
    // Check the lenght of number
    // This can be customized if you want phone number from a specific country
    if (strlen($phone_to_check) < 10 || strlen($phone_to_check) > 14) {
        echo "Teléfono inválido";
        exit();
    }

    $username = $_SESSION['userLoggedIn'];

    $updatePhone = mysqli_query($con,"UPDATE users SET phone = '$phone' WHERE username='$username'");
    echo "Número de Teléfono actualizado";

}
else{
    echo "Debe ingesar un número de teléfono";
}

?>