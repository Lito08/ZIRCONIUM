<?php 
session_start();

	include('products/includes/config.php');
	include('includes/config.php');
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

<title>Zirconium - Home</title>

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

<!-- ========================= HEADER  ========================= -->
<?php include('includes/header.php') ?>


<!-- ========================= SECTION MAIN ========================= -->
<section class="section-main bg padding-y">
<div class="container">

<div class="row">
	<aside class="col-md-3">
		<nav class="card">
			<ul class="menu-category">
				<li><a href="products/sports.php">Sports & Lifestyle</a></li>
				<li><a href="products/hab.php">Health & Beauty</a></li>
				<li><a href="products/appliances.php">Appliances</a></li>
				<li><a href="products/electronics">Electronics</a></li>
				<li><a href="products/babies.php">Babies & Toys</a></li>
				<li><a href="products/automotive.php">Automotive & Motorcycles</a></li>
				<li class="has-submenu"><a href="">Others</a>
					<ul class="submenu">
						<li><a href="products/groceries.php">Groceries</a></li>
						<li><a href="products/frozen.php">Frozen</a></li>
						<li><a href="products/freshproducts.php">Fresh Products</a></li>
						<li><a href="products/confectioneries.php">Confectioneries</a></li>
					</ul>
				</li>
			</ul>
		</nav>
	</aside> <!-- col.// -->
	<div class="col-md-9">
		<article class="banner-wrap">
			<img src="images/banners/FrontPage2.jpg" class="w-100 rounded">
		</article>
	</div> <!-- col.// -->
</div> <!-- row.// -->
</div> <!-- container //  -->
</section>
<!-- ========================= SECTION MAIN END// ========================= -->

<!-- ========================= SECTION  ========================= -->
<section class="section-name padding-y-sm">
<div class="container">

<header class="section-heading">
	<a href="all_products.php" class="btn btn-outline-primary float-right">See all</a>
	<h3 class="section-title">New Products</h3>
</header><!-- sect-heading -->


<div class="row">
<?php 
$sql = "SELECT products.title,type.typename,type.id,products.price,products.id,products.description,products.Vimage1 from products join type on type.id=products.ptype";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{
?>	
	<div class="col-md-3">
		<div href="products/product_details.php?vhid=<?php echo htmlentities($result->id);?>" class="card card-product-grid">
			<a href="products/product_details.php?vhid=<?php echo htmlentities($result->id);?>" class="img-wrap"> <img src="superadmin/img/<?php echo htmlentities($result->Vimage1);?>"> </a>
			<figcaption class="info-wrap">
				<a href="products/product_details.php?vhid=<?php echo htmlentities($result->id);?>" class="title"><?php echo htmlentities($result->title);?></a>
				<div class="price mt-1">RM<?php echo htmlentities($result->price);?></div> <!-- price-wrap.// -->
			</figcaption>
		</div>
	</div> <!-- col.// -->
	<?php }}?>
</div> <!-- row.// -->

</div><!-- container // -->
</section>
<!-- ========================= SECTION  END// ========================= -->

<!-- ========================= SECTION  ========================= -->
<section class="section-name padding-y-sm">
<div class="container">

<header class="section-heading">
	<a href="all_products.php" class="btn btn-outline-primary float-right">See all</a>
	<h3 class="section-title">On 50% Off Sale!</h3>
</header><!-- sect-heading -->


<div class="row">
<?php 
$sql = "SELECT products.title,type.typename,type.id,products.price,products.id,products.description,products.Vimage1 from products join type on type.id=products.ptype";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{
?>	
	<div class="col-md-3">
		<div href="products/product_details.php?vhid=<?php echo htmlentities($result->id);?>" class="card card-product-grid">
			<a href="products/product_details.php?vhid=<?php echo htmlentities($result->id);?>" class="img-wrap"> <img src="superadmin/img/<?php echo htmlentities($result->Vimage1);?>"> </a>
			<figcaption class="info-wrap">
				<a href="products/product_details.php?vhid=<?php echo htmlentities($result->id);?>" class="title"><?php echo htmlentities($result->title);?></a>
				<div class="price mt-1">RM<?php echo htmlentities($result->price);?></div> <!-- price-wrap.// -->
			</figcaption>
		</div>
	</div> <!-- col.// -->
	<?php }}?>
</div> <!-- row.// -->

</div><!-- container // -->
</section>
<!-- ========================= SECTION  END// ========================= -->


<!-- ========================= SECTION  ========================= -->
<section class="section-name padding-y bg">
<div class="container">

<div class="row">
<div class="col-md-6">
	<h3>Application coming soon!</h3>
	<p>Get an amazing app  to make Your life easy</p>
</div>
<div class="col-md-6 text-md-right">
	<a href="#"><img src="images/misc/appstore.png" height="40"></a>
	<a href="#"><img src="images/misc/appstore.png" height="40"></a>
</div>
</div> <!-- row.// -->
</div><!-- container // -->
</section>
<!-- ========================= SECTION  END// ======================= -->

<!-- ========================= FOOTER ========================= -->
<?php include('includes/footer.php') ?>

</body>
</html>