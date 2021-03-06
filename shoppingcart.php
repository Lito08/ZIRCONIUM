<?php 
session_start();

	include("products/includes/config.php");
    include("connection.php");
    include("functions.php");

	$result = mysqli_query($con, 'SELECT SUM(Total) As val FROM cart');
	$row = mysqli_fetch_assoc($result);
	$sum = $row['val'];

	$sessid = $_SESSION['user_id'];
	$query = "SELECT * FROM cart WHERE userEmail = '$sessid'";
	$results = mysqli_query($con, $query) or die (mysqli_query());
	if(mysqli_num_rows($results) == 0)
	{
		mysqli_query($con,"TRUNCATE TABLE cart");
		echo '<div id="content" class="col-md-7"><div align="center"><h3>Your cart is empty.</h3> You can find our items on our <a href="index.php">product page</a>.</div></div><div class="col-md-7"></div>';
	}
	else
	{
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="author" content="Bootstrap-ecommerce by Vosidiy M.">

<title>Zirconium - Shopping Cart</title>

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

<!-- ========================= CART ========================= -->
<section class="section-content padding-y bg">
<div class="container">

<br>
<br>

<!-- ============================ COMPONENT 2  ================================= -->
<div class="card">
<div class="row no-gutters">
	<aside class="col-md-9">
	<?php
	$total = 0;
	$useremail=$_SESSION['user_id'];
	$sql = "SELECT products.Vimage1 as Vimage1,products.price,products.title,products.id as pid,type.typename,cart.cart_id,cart.Total,cart.quantity,cart.price as rice from cart join products on cart.item_id=products.id join type on type.id=products.ptype where cart.User_id=:useremail";
	$query = $dbh -> prepare($sql);
	$query-> bindParam(':useremail', $useremail, PDO::PARAM_STR);
	$query->execute();
	$results=$query->fetchAll(PDO::FETCH_OBJ);
	$cnt=1;
	if($query->rowCount() > 0)
	{
	foreach($results as $result)
	{  ?>
			<form method="post">
			<article class="card-body border-bottom">
					<div class="row">
						<div class="col-md-7">
							<figure class="itemside">
								<div class="aside"><img src="superadmin/img/<?php echo htmlentities($result->Vimage1);?>" class="border img-sm"></div>
								<figcaption class="info">
									<a name="name" class="title"><?php echo htmlentities($result->title);?></a>
									<strong name="price" class="">RM<?php echo htmlentities($result->price);?></strong>
										<?php if($_SESSION['user_id'])
    									{?>
										<div class="form-group">
										<a href="#" class="btn-link mr-2">Save for later</a> 
										<input type="hidden" name="item_id" value="<?php echo htmlentities($result->pid) ?>">
										<button type="submit" name="delete-cart-submit" class="btn btn-light"> Delete</button>
										</div>
										<?php } ?>
										
								</figcaption>
							</figure> 
						</div> <!-- col.// -->
						<div class="col-md-5 text-md-right text-right">
							<div class="input-group input-spinner">
							  <div class="input-group-prepend">
							  	<?php if($_SESSION['user_id'])
    							{?>
							  	<div class="form-group">
									<input type="hidden" name="item_id" value="<?php echo htmlentities($result->pid) ?>">
									<button type="submit" name="adding-cart" class="btn btn-light"> <i class="fa fa-plus"></i> </button>
							  	</div>
								<?php } ?>
							  </div>
							  <input type="text" name="quantity" class="form-control"  value="<?php echo htmlentities($result->quantity) ?>">
							  <div class="input-group-append">
							  	<?php if($_SESSION['user_id'])
    							{?>
							  	<div class="form-group">
									<input type="hidden" name="item_id" value="<?php echo htmlentities($result->pid) ?>">
									<button type="submit" name="minus-cart" class="btn btn-light"> <i class="fa fa-minus"></i> </button>
								</div>
								<?php } ?>
							  </div>
							</div> <!-- input-group.// -->
							
						</div>
					</div> <!-- row.// -->
			</article> <!-- card-group.// -->
			</form>
			<?php }} ?>		
	</aside> <!-- col.// -->
	

	<aside class="col-md-3 border-left">
		<div class="card-body">
			<dl class="dlist-align">
			  <dt>Total price:</dt>
			  <dd class="text-right">RM<?php echo $sum;?></dd>
			</dl>
			<dl class="dlist-align">
			  <dt>Discount:</dt>
			  <dd class="text-right text-danger">- RM0.00</dd>
			</dl>
			<dl class="dlist-align">
			  <dt>Total:</dt>
			  <dd class="text-right text-dark b"><strong>RM<?php echo $sum;?></strong></dd>
			</dl>
			<hr>
			<a href="purchase.php" class="btn btn-primary btn-block"> Make Purchase </a>
			<a href="index.php" class="btn btn-light btn-block">Continue Shopping</a>
		</div> <!-- card-body.// -->
	</aside> <!-- col.// -->
</div> <!-- row.// -->
</div> <!-- card.// -->
<!-- ============================ COMPONENT 2 END .// ================================= -->


	</aside> <!-- col.// -->
</div> <!-- row.// -->

<br>
<br>


</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->


<!-- ========================= FOOTER ========================= -->
<?php include('includes/footer.php') ?>

</body>
</html>
<?php } ?>