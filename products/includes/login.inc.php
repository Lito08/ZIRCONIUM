<?php

if (isset($_POST["submit"])) {

    $user_name = $_POST["uid"];
    $password = $_POST["password"];

    require_once '../connection.php';
    require_once '../functions.php';

    if (emptyInputLogin($user_name, $password) !== false) {
        header("Location: ../login.php?error=emptyinput");
        exit();
    }

    loginUser($con, $user_name, $password);
}
else {
    header("LocationL ../login.php");
    exit();
}