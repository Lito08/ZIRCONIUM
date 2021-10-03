<?php 
session_start();

    include("connection.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        //something was posted
        $user_name = $_POST['user_name'];
        $password=md5($_POST['password']);
		$city = $_POST['city'];
		$country = $_POST['country'];
		$gender = $_POST['gender'];
		$full_name = $_POST['full_name'];
		$email = $_POST['email'];



        if(!empty($user_name) && !empty($password) && !is_numeric($user_name) )
        {
            //save to database
            $user_id = random_num(20);
            $query = "insert into users (user_id,user_name,password,city,country,gender,full_name,email) values ('$user_id','$user_name','$password','$city','$country','$gender','$full_name','$email')";

            mysqli_query($con, $query);

            header("Location: login.php");
            die;
        }else
		{
            echo "Please enter valid details!";
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

<title>Zirconium - Sign Up</title>

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
</script>

</head>
<body>


<header class="section-header">
<section class="header-main border-bottom">
	<div class="container">
<div class="row align-items-center">
	<div class="col-lg-2 col-4">
		<a href="index.php" class="brand-wrap">
			<img class="logo" src="images/logos/Logo.png">
		</a> <!-- brand-wrap.// -->
	</div>
	<div class="col-lg-6 col-sm-12">
		<form action="#" class="search">
			<div class="input-group w-100">
			    <input type="text" class="form-control" placeholder="Search">
			    <div class="input-group-append">
			      <button class="btn btn-primary" type="submit">
			        <i class="fa fa-search"></i> Search
			      </button>
			    </div>
		    </div>
		</form> <!-- search-wrap .end// -->
	</div> <!-- col.// -->
	<div class="col-lg-4 col-sm-6 col-12">
		<div class="widgets-wrap float-md-right">
			<div class="widget-header  mr-3">
				<a href="#" class="icon icon-sm rounded-circle border"><i class="fa fa-shopping-cart"></i></a>
				<span class="badge badge-pill badge-danger notify">0</span>
			</div>
			<div class="widget-header icontext">
				<div class="text">
					<span class="text-muted">Welcome!</span>
					<div> 
						<a href="login.php">Sign in</a> |  
						<a href="signup.php"> Register</a>
					</div>
				</div>
			</div>

		</div> <!-- widgets-wrap.// -->
	</div> <!-- col.// -->
</div> <!-- row.// -->
	</div> <!-- container.// -->
</section> <!-- header-main .// -->
</header> <!-- section-header.// -->



<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">

<!-- ============================ COMPONENT REGISTER   ================================= -->
	<div class="card mx-auto" style="max-width:520px; margin-top:40px;">
      <article class="card-body">
		<header class="mb-4"><h4 class="card-title">Sign up</h4></header>
		<form method="post">
				<div class="form-row">
					<div class="col form-group">
						<label>Full Name</label>
					  	<input type="text" class="form-control" placeholder="Full Name" name="full_name" >
					</div> <!-- form-group end.// -->
					
				</div> <!-- form-row end.// -->
                <div class="form-group">
					<label>Username</label>
					<input id="text" type="text" class="form-control" placeholder="Username" name="user_name" >
					<small class="form-text text-muted">Please enter your username.</small>
				</div> <!-- form-group end.// -->
				<div class="form-group">
					<label>Email</label>
					<input id="text" type="email" class="form-control" placeholder="Email Address" name="email">
					<small class="form-text text-muted">We'll never share your email with anyone else.</small>
				</div> <!-- form-group end.// -->
				<div class="form-group">
					<label class="custom-control custom-radio custom-control-inline">
					  <input class="custom-control-input" checked="" type="radio" name="gender" value="male">
					  <span class="custom-control-label"> Male </span>
					</label>
					<label class="custom-control custom-radio custom-control-inline">
					  <input class="custom-control-input" type="radio" name="gender" value="female">
					  <span class="custom-control-label"> Female </span>
					</label>
				</div> <!-- form-group end.// -->
				<div class="form-row">
					<div class="form-group col-md-6">
					  <label>City</label>
					  <input type="text" class="form-control" name="city" >
					</div> <!-- form-group end.// -->
					<div class="form-group col-md-6">
					  <label>Country</label>
					  <select id="inputState" class="form-control" name="country" >
					    <option> Choose...</option>
                          <option>Indoneisa</option>
					      <option>Russia</option>
                          <option>France</option>
                          <option>Germany</option>
                          <option>Italy</option>
					      <option>Singapore</option>
					      <option selected="">Malaysia</option>
					      <option>Thailand</option>
                          <option>United States</option>
					  </select>
					</div> <!-- form-group end.// -->
				</div> <!-- form-row.// -->
				<div class="form-row">
					<div class="form-group col-md-6">
						<label>Create password</label>
					    <input class="form-control" type="password" name="password" id="text" placeholder="Password">
					</div> <!-- form-group end.// --> 
					<div class="form-group col-md-6">
						<label>Repeat password</label>
					    <input class="form-control" type="password" name="confirm_password" id="text" placeholder="Confirm Password" required>
					</div> <!-- form-group end.// -->  
				</div>
			    <div class="form-group">
			        <button id="button" type="submit" value="Signup" class="btn btn-primary btn-block"> Register  </button>
			    </div> <!-- form-group// -->      
			    <div class="form-group"> 
		            <label class="custom-control custom-checkbox"> <input type="checkbox" class="custom-control-input" checked=""> <div class="custom-control-label"> I am agree with <a href="#">terms and contitions</a>  </div> </label>
		        </div> <!-- form-group end.// -->           
			</form>
		</article><!-- card-body.// -->
    </div> <!-- card .// -->
    <p class="text-center mt-4">Have an account? <a href="login.php">Log In</a></p>
    <br><br>
<!-- ============================ COMPONENT REGISTER  END.// ================================= -->


</section>
<!-- ========================= SECTION CONTENT END// ========================= -->

<br><br><br><br>
<br><br><br><br>
<br>

<!-- ========================= FOOTER ========================= -->
<footer class="section-footer border-top padding-y">
	<div class="container">
		<p class="float-md-right"> 
			&copy Copyright 2019 All rights reserved
		</p>
		<p>
			<a href="#">Terms and conditions</a>
		</p>
	</div><!-- //container -->
</footer>
<!-- ========================= FOOTER END // ========================= -->



</body>
</html>