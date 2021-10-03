<?php
session_start();

include("includes/config.php");
include("includes/connection.php");
include("includes/functions.php");


    if(isset($_POST["register"]))  
    {  
		$user_id = random_num(20);
         if(empty($_POST["username"]) && empty($_POST["password"]) && empty($_POST["fullname"]) && empty($_POST["email"]))  
         {  
              echo '<script>alert("Please fill in all the details")</script>';  
         }  
         else  
         {  
            $fullname = mysqli_real_escape_string($con, $_POST["fullname"]);
            $email = mysqli_real_escape_string($con, $_POST["email"]);
            $username = mysqli_real_escape_string($con, $_POST["username"]);
            $password = mysqli_real_escape_string($con, $_POST["password"]);
            $password = md5($password);  
            $query = "INSERT INTO supplier (user_id,full_name, user_name, email, password) VALUES ('$user_id','$fullname','$username','$email','$password')";  
            if(mysqli_query($con, $query))  
            {  
                echo '<script>alert("Registration Done")</script>';
				header("Location: index.php");  
            }  
         }  
    }  

?>

<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Zirconium - Supplier Registeration</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
</head>

<body>

	<div class="login-page bk-img" style="background-image: url(img/background.png);">
		<div class="form-content">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<a><h4 class="text-center text-bold text-4x text-babyblue mt-5x">Supplier Registeration</h4></a>
						<div class="well row pt-2x pb-3x bk-light">
							<div class="col-md-8 col-md-offset-2">
								<form method="post">

                                    <label for="" class="text-uppercase text-sm">Company's Name</label>
									<input type="text" placeholder="Company's Full Name" name="fullname" class="form-control mb">

                                    <label for="" class="text-uppercase text-sm">Company's Email </label>
									<input type="email" placeholder="Email" name="email" class="form-control mb">

									<label for="" class="text-uppercase text-sm">Username </label>
									<input type="text" placeholder="Username" name="username" class="form-control mb">

									<label for="" class="text-uppercase text-sm">Password</label>
									<input type="password" placeholder="Password" name="password" class="form-control mb">

									<button class="btn btn-primary btn-block" name="register" type="submit">Register</button>
									<br>
									<a href="index.php">Already have an account? Log In!</a>
									<br><br>
                  					<a href="../index.php">Back to Main Page</a>

								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>

</body>

</html>