<?php 
session_start();

	include("config.php");
    include("connection.php");
    include("functions.php");

?>

<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="cache-control" content="max-age=604800" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<title>Edit Profile</title>

<link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon">

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
<?php include('includes/header.php') ?>


<!-- ========================= SECTION PAGETOP ========================= -->
<section class="section-pagetop bg-primary">
<div class="container">
	<h2 class="title-page text-white" style="font-family:Roboto; text-transform: uppercase">Edit Profile</h2>
</div> <!-- container //  -->
</section>
<!-- ========================= SECTION INTRO END// ========================= -->

<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">
<div class="container">

<div class="row">
	<aside class="col-md-3">
		<ul class="list-group">
			<a class="list-group-item active" href="profile.php"> Account overview  </a>
			<a class="list-group-item" href="profileorder.php"> My Orders </a>
			<a class="list-group-item" href="wishlist.php"> My wishlist </a>

		</ul>
	</aside> <!-- col.// -->
	<main class="col-md-9">

			<?php

				if(isset($_GET['error'])){
					?>
						<small class="alert alert-danger"> Data required</small>
					<?php
				}
			?>

		<article class="card mb-3">
			<header class="card-header">
				Edit your profile
			</header>
			<div class="card-body">
				
            <div class="form-row">

			
				<form action="userProfileUpdateProcess.php"
					method="POST"
					enctype="multipart/form-data"

				>
				</div> 
					<?php
					$user_id = $_SESSION['user_id'];
					$sql = "SELECT * FROM users WHERE user_name = '$user_id'; ";
					$result = mysqli_query($con, $sql);
				
					if(mysqli_num_rows($result) > 0)
					{
						foreach($result as $row)
						{
							//print_r($row['user_name']);
					?>
								
					<?php
						}
					}
					else
					{
						echo "no record found";
					}
					?>		
					
					<!-- form-row end.// -->
						<div class="form-group">
							<label>Full Name</label>
							<input type="text" class="form-control" value="<?php echo $row['full_name'];?>" placeholder="Full Name" name="full_name" >
						</div> <!-- form-group end.// -->

						<div class="form-group">
							<label>Username</label>
							<input id="text" type="text"  class="form-control" value="<?php echo $row['user_name'];?> "placeholder="Username" name="user_name" >
							<small class="form-text text-muted">Please enter your username.</small>
						</div> <!-- form-group end.// -->

						<div class="form-group">
							<label>Email</label>
							<input id="text" type="email" class="form-control" value="<?php echo $row['email'];?>" placeholder="Email Address" name="email">
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
								<input type="text" class="form-control" value="<?php echo $row['city'];?>" name="city" >
							</div> <!-- form-group end.// -->

							<div class="form-group col-md-6">
								<label>Country</label>
								<select id="inputState" class="form-control" value="<?php echo $row['country'];?>" name="country" >
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

					<div class="form-group">
					<button id="button" type="submit" name="update"  class="btn btn-primary btn-block"> Update  </button>
					<small class="form-text text-muted">You will be logged out after updation!</small>
					</div> <!-- form-group// --> 

				</form>
                
			</div> <!-- card-body .// -->
		</article> <!-- card.// -->

		
	</main> <!-- col.// -->
</div>

</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->


<!-- ========================= FOOTER ========================= -->
<?php include('includes/footer.php') ?>
<!-- ========================= FOOTER END // ========================= -->



</body>
</html>