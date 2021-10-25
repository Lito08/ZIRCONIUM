<?php 
session_start();

	include("products/includes/config.php");
    include("connection.php");
    include("functions.php");

?>
    
<?php

$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE user_name = '$user_id'; ";
$result = mysqli_query($con, $sql);
if(mysqli_num_rows($result) > 0)
{
	foreach($result as $row)
	{
		
	}
}
else
{
	echo "no record found";
}
?>





<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="cache-control" content="max-age=604800" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



<title>Profile</title>

<link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon">

<!-- jQuery -->
<script src="js/jquery-2.0.0.min.js" type="text/javascript"></script>

<!-- Bootstrap4 files-->
<script src="js/bootstrap.bundle.min.js" type="text/javascript"></script>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>

<!-- Font awesome 5 -->
<link href="fonts/fontawesome/css/all.min.css" type="text/css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&family=Roboto&display=swap" rel="stylesheet"> 

<style>




</style>

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
<div class="container" >
	<h2 class="title-page text-white" style="font-family:Roboto; text-transform: uppercase">My profile</h2>
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

		<article class="card mb-3" >
			<div class="card-body">				
				<figure class="icontext">
						<div class="text" style="font-family:Noto Sans JP" >
						<p style="text-transform: capitalize; font-size:36px" >Hello <strong><?php echo $row['full_name'];?></strong> !<br></p>
						<br>
						<p style="font-size:17px"><strong>Username:</strong> "<?php echo $row['user_name'];?>"</p>
						<p style="font-size:17px"><strong>Gender:</strong> "<?php echo $row['gender'];?>"</p>
						<br>
						</div>
				</figure>
				<hr>
				<p style="font-family:Noto Sans JP; text-transform: capitalize;font-size:17px">
					<strong>Location:</strong> 
					 <br>
					 <?php echo $row['country'];?>  
					 <br>
					 <?php echo $row['city'];?> 
					 <br> 
					<br>
					<a href="editprofile.php" class="btn  btn-outline-primary"> Edit your profile here!</a>
				</p>

			</div> <!-- card-body .// -->
		</article> <!-- card.// -->

	</main> <!-- col.// -->
</div>

</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->

<br><br><br><br>
<br><br><br><br>
<br><br><br><br>
<br><br>

<!-- ========================= FOOTER ========================= -->
<?php include('includes/footer.php'); ?>
<!-- ========================= FOOTER END // ========================= -->



</body>
</html>



