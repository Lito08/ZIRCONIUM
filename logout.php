<?php
include('google.php');

if(isset($_SESSION['user_id']))
{
	unset($_SESSION['user_id']);

}

//Reset OAuth access token
$google_client->revokeToken();
//Destroy entire session data.
session_destroy();

header("Location: index.php");
die;