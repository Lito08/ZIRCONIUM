<?php

if (isset($_POST["submit"])) {
    
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $user_name = $_POST["user_name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    require_once '../connection.php';
    require_once '../functions.php';

    if (emptyInputSignup($first_name, $last_name, $user_name, $email, $password, $confirm_password) !== false) {
        header("Location: ../signup.php?error=emptyinput");
        exit();
    }
    if (invalidUid($user_name) !== false) {
        header("Location: ../signup.php?error=invaliduid");
        exit();
    }
    if (invalidEmail($email) !== false) {
        header("Location: ../signup.php?error=invalidemail");
        exit();
    }
    if (passwordMatch($password, $confirm_password) !== false) {
        header("Location: ../signup.php?error=passwordsdontmatch");
        exit();
    }
    if (uidExists($con, $user_name, $email) !== false) { 
        header("Location: ../signup.php?error=usernametaken");
        exit();
    }

    createUser($con, $first_name, $last_name, $user_name, $email, $password);

}
else {
    header("Location: ../signup.php");
    exit();
}