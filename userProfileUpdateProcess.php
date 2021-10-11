<?php
session_start();



if(isset($_POST['update'])){

    include("products/includes/config.php");
    include("connection.php");
    include("functions.php");

    $userNewName = $_POST['user_name'];
    $Newemail = $_POST['email'];
    $Newcountry = $_POST['country'];
    $Newcity = $_POST['city'];
    $Newgender = $_POST['gender'];
    $Newfull_name = $_POST['full_name'];

    if(!empty($userNewName) ){

        $user_id= $_SESSION['user_id'];
        $sql ="UPDATE users SET user_name = '$userNewName', email = '$Newemail', country = '$Newcountry', city = '$Newcity', full_name ='$Newfull_name'  WHERE user_name = '$user_id'; ";

        $results = mysqli_query($con,$sql);
        

        if(isset($_SESSION['user_id']))
            {
	            unset($_SESSION['user_id']);

            }

        header("Location: index.php");
        die;

    }else{
        header('Location:editprofile.php?error=emptyNameAndEmail');
        exit;
    }

    print_r($user_name);
    print_r($email);

}

?>
