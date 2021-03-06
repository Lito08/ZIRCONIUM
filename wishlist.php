<?php 
session_start();

	include("products/includes/config.php");
    include("connection.php");
    include("functions.php");

	$sessid = $_SESSION['user_id'];

	$sql ="SELECT cart_id from wishlist WHERE userEmail = '$sessid';";
	$query = $dbh -> prepare($sql);
	$query->execute();
	$results=$query->fetchAll(PDO::FETCH_OBJ);
	$regusers=$query->rowCount();

	
	$query = "SELECT * FROM wishlist WHERE userEmail = '$sessid';";
	$results = mysqli_query($con, $query) or die (mysqli_query());

	if(mysqli_num_rows($results) == 0)
	{
		echo '<div id="content" class="col-md-7"><div align="center"><h3>Your wishlist is empty.</h3> You can find our items on our <a href="index.php">product page</a>.</div></div><div class="col-md-7"></div>';
		mysqli_query($con,"TRUNCATE TABLE wishlist");
	}
	else
	{
		if(isset($_POST['submit']))
		{

			$useremail=$_SESSION['user_id'];
			$sql="INSERT INTO cart(userEmail,item_id) VALUES (:useremail,:vhid)";

			$query = $dbh->prepare($sql);
			$query->bindParam(':useremail',$useremail,PDO::PARAM_STR);
			$query->bindParam(':vhid',$vhid,PDO::PARAM_STR);
			$query->execute();
			$lastInsertId = $dbh->lastInsertId();
			if($lastInsertId)
			{
				echo "<script>alert('Product has been deleted.');</script>";
				echo("<script>window.location = '../shoppingcart.php';</script>");
			}
			else
			{
				
			}

		}
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="author" content="Bootstrap-ecommerce by Vosidiy M.">

<title>Zirconium - Wishlist</title>

<!-- jQuery -->
<script src="js/jquery-2.0.0.min.js" type="text/javascript"></script>

<!-- Bootstrap4 files-->
<script src="js/bootstrap.bundle.min.js" type="text/javascript"></script>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>

<!-- Fonticons -->
<link href="fonts/fontawesome/css/all.min.css" type="text/css" rel="stylesheet">
<link href="fonts/feathericons/css/iconfont.css" rel="stylesheet" type="text/css" />
<link href="fonts/material-icons/css/materialdesignicons.css" rel="stylesheet" type="text/css" />

<!-- custom style -->
<link href="css/ui.css" rel="stylesheet" type="text/css"/>
<link href="css/responsive.css" rel="stylesheet" />

<!-- custom javascript -->
<script src="js/script.js" type="text/javascript"></script>


</head>
<body>

<!-- ========================= HEADER  ========================= -->
<?php include('includes/header.php') ?>

<!-- ========================= SECTION PAGETOP ========================= -->
<section class="section-pagetop bg-primary">
<div class="container" >
	<h2 class="title-page text-white" style="font-family:Roboto; text-transform: uppercase">My Wishlist</h2>
</div> <!-- container //  -->
</section>
<!-- ========================= SECTION INTRO END// ========================= -->

<section class="section-content padding-y bg">
<div class="container">


<!-- ============================ COMPONENT 2  ================================= -->
<div class="row">
	<aside class="col-md-3">
		<ul class="list-group">
			<a class="list-group-item" href="profile.php"> Account overview  </a>
			<a class="list-group-item" href="profileorder.php"> My Orders </a>
			<a class="list-group-item active" href="wishlist.php"> My wishlist </a>
		</ul>
	</aside> <!-- col.// -->
	
	<main class="col-md-9">
	<article class="card  mb-3">
	<div class="card-body">
			
		<h5 class="card-title mb-4">Wishlist </h5>					
	
	<?php
	$total = 0;
	$useremail=$_SESSION['user_id'];
	$sql = "SELECT products.Vimage1 as Vimage1,products.price,products.title,products.id as pid,type.typename,wishlist.cart_id from wishlist join products on wishlist.item_id=products.id join type on type.id=products.ptype where wishlist.userEmail=:useremail";
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
			<article class="card-body border-bottom">
					
						<div class="col-md-7">																							
						<div class="col-md-6">
									<form method="post">
										<figure class="itemside  mb-3">
											<div class="aside">
												<img src="superadmin/img/<?php echo htmlentities($result->Vimage1);?>" class="border img-sm">
											</div>
											<figcaption class="info">
												<div class="aside">
													<a href="products/product_details.php?vhid=<?php echo htmlentities($result->pid);?>" name="name" class="title"><?php echo htmlentities($result->title);?></a>
													<strong name="price" class="">RM<?php echo htmlentities($result->price);?></strong>
												</div>	
											</figcaption>
											<figcaption class="info">
											<input type="hidden" name="item_id" value="<?php echo htmlentities($result->pid) ?>">
											<input type="submit" class="btn  btn-outline-primary"  name="delete-wishlist-submit" value="Delete">
											</figcaption>
										</figure>
									</form>
								</figcaption>
							</figure> 
						</div>					
						</div> <!-- col.// -->										
			</article> <!-- card-group.// -->
			<?php }} ?>
			<article class="card-body border-bottom">
			<div class="col-md-6">
				<a name="spent" class="title">Total Items in Wishlist: <strong><?php echo htmlentities($regusers);?></strong></a>
			</div>
			</article>
	</div>
	</article>
	</main>
</div> <!-- card.// -->



<!-- ============================ COMPONENT 2 END .// ================================= -->


	</aside> <!-- col.// -->
</div> <!-- row.// -->

<br><br><br><br>
<br><br><br><br>
<br><br><br><br>
<br><br><br><br>


</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->


<!-- ========================= FOOTER ========================= -->
<?php include('includes/footer.php') ?>

</body>
</html>
<?php } ?>