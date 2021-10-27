<?php 
session_start();

	include("products/includes/config.php");
    include("connection.php");
    include("functions.php");

?>
<?php
	// Code for change password	
	if(isset($_POST['submit']))
		{
			$Password=md5($_POST['password']);
			$newpassword=md5($_POST['newpassword']);
			$username=$_SESSION['user_id'];
			$sql ="SELECT password FROM users WHERE user_name=:username and password=:Password";
			$query= $dbh -> prepare($sql);
			$query-> bindParam(':username', $username, PDO::PARAM_STR);
			$query-> bindParam(':Password', $Password, PDO::PARAM_STR);
			$query-> execute();
			$results = $query -> fetchAll(PDO::FETCH_OBJ);
			if($query -> rowCount() > 0)
			{
			$con="UPDATE users SET password=:newpassword WHERE user_name=:username";
			$chngpwd1 = $dbh->prepare($con);
			$chngpwd1-> bindParam(':username', $username, PDO::PARAM_STR);
			$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
			$chngpwd1->execute();
			echo "<script>alert('Password has been changed.');</script>";
			echo("<script>window.location = 'profile.php';</script>");
			}
			else 
			{
				echo "<script>alert('Password is not valid.');</script>";
			}
		}
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="cache-control" content="max-age=604800" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<title>Zirconium - Change Password</title>

<link href="images/logos/Logo.png" rel="shortcut icon" type="image/x-icon">

<!-- jQuery -->
<script src="js/jquery-2.0.0.min.js" type="text/javascript"></script>

<!-- Bootstrap4 files-->
<script src="js/bootstrap.bundle.min.js" type="text/javascript"></script>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>

<!-- Font awesome 5 -->
<link href="fonts/fontawesome/css/all.min.css" type="text/css" rel="stylesheet">

<!-- custom style -->
<link href="css/ui.css" rel="stylesheet" type="text/css"/>
<link href="css/responsive.css" rel="stylesheet" media="only screen and (max-width: 1200px)" />

<!-- custom javascript -->
<script src="js/script.js" type="text/javascript"></script>

<script type="text/javascript">
/// some script

// jquery ready start
$(document).ready(function() {
	// jQuery code

}); 
// jquery end
function valid()
{
if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
{
alert("New Password and Confirm Password Field do not match  !!");
document.chngpwd.confirmpassword.focus();
return false;
}
return true;
}
</script>


</head>
<body>

<!-- section-header.// -->
<?php include('includes/header.php'); ?>
<!-- section-header.// -->

<!-- ========================= SECTION PAGETOP ========================= -->
<section class="section-pagetop bg-primary">
<div class="container" >
	<h2 class="title-page text-white" style="font-family:Roboto; text-transform: uppercase">Change password</h2>
</div> <!-- container //  -->
</section>
<!-- ========================= SECTION INTRO END// ========================= -->

<br><br><br><br>

<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">

<!-- ============================ COMPONENT REGISTER   ================================= -->
	<div class="card mx-auto" style="max-width:520px; margin-top:40px;">
      <article class="card-body">
		<header class="mb-4"><h4 class="card-title">Change Password</h4></header>
		<form method="post" name="chngpwd" class="form-horizontal" onSubmit="return valid();">
				<div class="form-row">
					<div class="form-group col-md-6">
						<label>Current password</label>
					    <input class="form-control" type="password" name="password" id="password" placeholder="Password">
					</div> <!-- form-group end.// --> 
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label>New password</label>
					    <input class="form-control" type="password" name="newpassword" id="newpassword" placeholder="Password">
					</div> <!-- form-group end.// --> 
					<div class="form-group col-md-6">
						<label>Repeat password</label>
					    <input class="form-control" type="password" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password" required>
					</div> <!-- form-group end.// -->  
				</div>
			    <div class="form-group">
			        <button name="submit" type="submit" class="btn btn-primary btn-block"> Change Password  </button>
			    </div> <!-- form-group// -->                 
			</form>
		</article><!-- card-body.// -->
    </div> <!-- card .// -->
    <br><br>
<!-- ============================ COMPONENT REGISTER  END.// ================================= -->


</section>
<!-- ========================= SECTION CONTENT END// ========================= -->

<br><br><br><br>
<br><br><br><br>

<!-- ========================= FOOTER ========================= -->
<?php include('includes/footer.php'); ?>
<!-- ========================= FOOTER END // ========================= -->



</body>
</html>