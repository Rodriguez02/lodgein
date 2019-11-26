<?php
class Account
{

    private $con;
    private $errorArray;

    public function __construct($con)
    {
        $this->con = $con;
        $this->errorArray = array();
    }

    public function login($un, $pw)
    {
        $pw = md5($pw);

        $query = mysqli_query($this->con, "SELECT * FROM users WHERE username='$un' AND password='$pw'");
        if (mysqli_num_rows($query) == 1) {
            $un = "";
            $pw = "";
            return true;
        } else {
            array_push($this->errorArray, Constants::$loginFailed);
            return false;
        }
    }

    public function getUserInfo($username){
        $query = mysqli_query($this->con, "SELECT * FROM users WHERE username='$username'");
        $user = mysqli_fetch_array($query);
        return $user;
    }

    public function register($un, $fn, $ln, $em, $em2, $pw, $pw2, $pn)
    {
        $this->validateUsername($un);
        $this->validateFirstName($fn);
        $this->validateLastName($ln);
        $this->validateEmails($em, $em2);
        $this->validatePasswords($pw, $pw2);
        $this->validatePhone($pn);

        //if everything went fine
        if (empty($this->errorArray)) {
            //insert into db
            $un = "";
            $fn = "";
            $ln = "";
            $em = "";
            $em2 = "";
            $pw = "";
            $pw2 = "";
            $pn = "";
            return $this->insertUser($un, $fn, $ln, $em, $pw, $pn);
        } else {
            return false;
        }
    }

    public function getError($error)
    {
        if (!in_array($error, $this->errorArray)) {
            $error = "";
        }
        return "<span class = 'errorMessage'>$error</span>";
    }

    private function insertUser($un, $fn, $ln, $em, $pw, $pn)
    {
        $encryptedPw = md5($pw);
        $profilePic = "assets/images/profile-pics/head_esmerald.png";
        $date = date("Y-m-d");

        $result = mysqli_query($this->con, "INSERT INTO users VALUES ('','$un','$fn','$ln','$em','$encryptedPw','$date','$profilePic','$pn')");
        return $result;
    }

    private function validateUsername($un)
    {
        if (strlen($un) > 25 || strlen($un) < 5) {
            array_push($this->errorArray, Constants::$usernameLength);
            return;
        }
        $checkUserNameQuery = mysqli_query($this->con, "SELECT username FROM users WHERE username='$un'");
        if (mysqli_num_rows($checkUserNameQuery) != 0) {
            array_push($this->errorArray, Constants::$usernameTaken);
            return;
        }
    }

    private function validateFirstName($fn)
    {
        if (strlen($fn) > 25 || strlen($fn) < 2) {
            array_push($this->errorArray, Constants::$firstNameLength);
            return;
        }
    }

    private function validateLastName($ln)
    {
        if (strlen($ln) > 25 || strlen($ln) < 2) {
            array_push($this->errorArray, Constants::$lastNameLength);
            return;
        }
    }

    private function validateEmails($em1, $em2)
    {
        if ($em1 != $em2) {
            array_push($this->errorArray, Constants::$emailsDontMatch);
            return;
        }
        //this needs to be checked because in html an email input type only checks
        // if there's a @ in the input field, not the .com
        if (!filter_var($em1, FILTER_VALIDATE_EMAIL)) {
            array_push($this->errorArray, Constants::$emailInvalid);
            return;
        }

        $checkEmailQuery = mysqli_query($this->con, "SELECT email FROM users WHERE email='$em1'");
        if (mysqli_num_rows($checkEmailQuery) != 0) {
            array_push($this->errorArray, Constants::$emailTaken);
            return;
        }
    }

    private function validatePasswords($pw, $pw2)
    {
        if ($pw != $pw2) {
            array_push($this->errorArray, Constants::$passwordsDoNotMatch);
            return;
        }
        if (strlen($pw) > 30 || strlen($pw) < 5) {
            array_push($this->errorArray, Constants::$passwordLength);
            return;
        }
    }

    //TODO: agregar esta validacion
    private function validatePhone($pn)
    {
        $filtered_phone_number = filter_var($pn, FILTER_SANITIZE_NUMBER_INT);
        // Remove "-" from number
        $phone_to_check = str_replace("-", "", $filtered_phone_number);
        // Check the lenght of number
        // This can be customized if you want phone number from a specific country
        if (strlen($phone_to_check) < 10 || strlen($phone_to_check) > 14) {
            array_push($this->errorArray, Constants::$phoneInvalid);
            return false;
        }
    }
}
