<?php

    if(isset($_POST['loginButton'])){
        $username = $_POST['loginUsername'];
        $password = $_POST['loginPassword'];

        $result = $account->login($username,$password);

        if ($result){
            $data = $account->getUserInfo($username);
            $_SESSION['idUser'] = $data['id'];
            $_SESSION['email'] = $data['email'];
            $_SESSION['userLoggedIn'] = $username;
            header("Location: main.php");
        }
    }
?>