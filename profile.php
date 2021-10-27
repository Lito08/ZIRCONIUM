<?php 
session_start();

	include("config.php");
    include("connection.php");
    include("functions.php");

	$sessid = $_SESSION['user_id'];
	$sql ="SELECT cart_id from wishlist WHERE userEmail = '$sessid';";
	$query = $dbh -> prepare($sql);
	$query->execute();
	$results=$query->fetchAll(PDO::FETCH_OBJ);
	$totalwish=$query->rowCount();

	$sql ="SELECT id from sale WHERE User = '$sessid';";
	$query = $dbh -> prepare($sql);
	$query->execute();
	$results=$query->fetchAll(PDO::FETCH_OBJ);
	$totalorders=$query->rowCount();

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
				<?php 
				$sql = "SELECT * from users ";
				$query = $dbh -> prepare($sql);
				$query->execute();
				$results=$query->fetchAll(PDO::FETCH_OBJ);
				$cnt=1;
				if($query->rowCount() > 0)
				{
				foreach($results as $result)
				{				
				?>
						<div class="icon">
							<a href="editprofileimg.php?id=<?php echo $result->id;?>"><img class="rounded-circle img-sm border" src="images/avatars/<?php echo htmlentities($result->img);?>"></a>
						</div>
						<div class="text">
							<strong><?php echo $row['full_name'];?> </strong> <br> 
							<?php echo $row['email'];?> <br> 
							<a href="editprofile.php">Edit</a>
							<br>
							<a href="change.php"> Change password</a>
						</div>
				<?php }} ?>
				</figure>
				<hr>
				<p>
					<i class="fa fa-map-marker text-muted"></i> &nbsp; My address:  
					 <br>
					 <?php echo $row['city'];?>, <?php echo $row['country'];?>
					<a href="editprofile.php" class="btn-link"> Edit</a>
					
				</p>

				<article class="card-group">
					<figure class="card bg">
						<div class="p-3">
							 <h5 class="card-title"><?php echo htmlentities($totalorders);?></h5>
							<span>Orders</span>
						</div>
					</figure>
					<figure class="card bg">
						<div class="p-3">
							 <h5 class="card-title"><?php echo htmlentities($totalwish);?></h5>
							<span>Wishlists</span>
						</div>
					</figure>
					<figure class="card bg">
						<div class="p-3">
							 <h5 class="card-title"><?php echo htmlentities($totalwish);?></h5>
							<span>Awaiting delivery</span>
						</div>
					</figure>
					<figure class="card bg">
						<div class="p-3">
							 <h5 class="card-title">0</h5>
							<span>Delivered items</span>
						</div>
					</figure>
				</article>

			</div> <!-- card-body .// -->
		</article> <!-- card.// -->

		<?php
		$useremail=$_SESSION['user_id'];
		$sql = "SELECT Total,quantity,products.Vimage1 as Vimage1,products.price,products.title,products.id as pid,type.typename,sale.id,sale.country,sale.dop as rice from sale join products on sale.item=products.id join type on type.id=products.ptype where sale.User=:useremail";
		$query = $dbh -> prepare($sql);
		$query-> bindParam(':useremail', $useremail, PDO::PARAM_STR);
		$query->execute();
		$results=$query->fetchAll(PDO::FETCH_OBJ);
		$cnt=1;
		if($query->rowCount() > 0)
		{
		foreach($results as $result)
		{  
		?>

		<article class="card  mb-3">
			<div class="card-body">
				<h5 class="card-title mb-4">Recent orders </h5>	

				<div class="row">
				<div class="col-md-6">
					<figure class="itemside  mb-3">
						<div class="aside"><img src="superadmin/img/<?php echo htmlentities($result->Vimage1);?>" class="border img-sm"></div>
						<figcaption class="info">
							<time class="text-muted"><i class="fa fa-calendar-alt"></i> <?php echo htmlentities($result->rice);?></time>
							<a href="products/product_details.php?vhid=<?php echo htmlentities($result->pid);?>" name="name" class="title"><?php echo htmlentities($result->title);?></a>
							<span class="text-warning">Pending</span>
						</figcaption>
					</figure>
				</div> <!-- col.// -->
			</div> <!-- row.// -->

			<a href="profileorder.php" class="btn btn-outline-primary"> See all orders  </a>
			</div> <!-- card-body .// -->
		</article> <!-- card.// -->

		<?php }} ?>

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



