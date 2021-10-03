<?php 
session_start();

	include("products/includes/config.php");
    include("connection.php");
    include("functions.php");

	$result = mysqli_query($con, 'SELECT SUM(price) As val FROM cart');
	$row = mysqli_fetch_assoc($result);
	$sum = $row['val'];
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="author" content="Bootstrap-ecommerce by Vosidiy M.">

<title>Zirconium - Purchase</title>

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


<section class="section-content padding-y bg">
<div class="container">

<!-- ============================ COMPONENT 2 ================================= -->
<div class="row">
		<main class="col-md-8">

<article class="card mb-4">
<div class="card-body">
	<h4 class="card-title mb-4">Delivery info</h4>
	<form action="">
		<div class="row">
			<div class="form-group col-sm-6">
				<label class="js-check box active">
					<input type="radio" name="dostavka" value="option1" checked>
					<h6 class="title">Delivery</h6>
					<p class="text-muted">We will deliver by DHL Kargo</p>
				</label> <!-- js-check.// -->
			</div>
			<div class="form-group col-sm-6">
				<label class="js-check box">
					<input type="radio" name="dostavka" value="option1">
					<h6 class="title">Pick-up</h6>
					<p class="text-muted">Come to our office to somewhere </p>
				</label> <!-- js-check.// -->
			</div>
		</div> <!-- row.// -->
			

		<div class="row">
				<div class="form-group col-sm-6">
					<label>City*</label>
					<select name="" class="form-control">
						<option value="">Tashkent</option>
						<option value="">Buxoro</option>
						<option value="">Samarqand</option>
					</select>
				</div>
				<div class="form-group col-sm-6">
					<label>Area*</label>
					<input type="text" placeholder="Type here" class="form-control">
				</div>
				<div class="form-group col-sm-8">
					<label>Street*</label>
					<input type="text" placeholder="Type here" class="form-control">
				</div>
				<div class="form-group col-sm-4">
					<label>Building</label>
					<input type="text" placeholder="" class="form-control">
				</div>
				<div class="form-group col-sm-4">
					<label>House</label>
					<input type="text" placeholder="Type here" class="form-control">
				</div>
				<div class="form-group col-sm-4">
					<label>Postal code</label>
					<input type="text" placeholder="" class="form-control">
				</div>
				<div class="form-group col-sm-4">
					<label>Zip</label>
					<input type="text" placeholder="" class="form-control">
				</div>
		</div> <!-- row.// -->	
	</form>
</div> <!-- card-body.// -->
</article> <!-- card.// -->


<article class="accordion" id="accordion_pay">
	<div class="card">
		<header class="card-header">
			<img src="images/misc/payment-paypal.png" class="float-right" height="24"> 
			<label class="form-check collapsed" data-toggle="collapse" data-target="#pay_paynet">
				<input class="form-check-input" name="payment-option" checked type="radio" value="option2">
				<h6 class="form-check-label"> 
					Paypal 
				</h6>
			</label>
		</header>
		<div id="pay_paynet" class="collapse show" data-parent="#accordion_pay">
		<div class="card-body">
			<p class="text-center text-muted">Connect your PayPal account and use it to pay your bills. You'll be redirected to PayPal to add your billing information.</p>
			<p class="text-center">
				<a href="#"><img src="images/misc/btn-paypal.png" height="32"></a>
				<br><br>
			</p>
		</div> <!-- card body .// -->
		</div> <!-- collapse .// -->
	</div> <!-- card.// -->
	<div class="card">
	<header class="card-header">
		<img src="images/misc/payment-card.png" class="float-right" height="24">  
		<label class="form-check" data-toggle="collapse" data-target="#pay_payme">
			<input class="form-check-input" name="payment-option" type="radio" value="option2">
			<h6 class="form-check-label"> Credit Card  </h6>
		</label>
	</header>
	<div id="pay_payme" class="collapse" data-parent="#accordion_pay">
		<div class="card-body">
			<p class="alert alert-success">Some information or instruction</p>
			<form class="form-inline">
				<input type="text" class="form-control mr-2" placeholder="xxxx-xxxx-xxxx-xxxx" name="">
				<input type="text" class="form-control mr-2" style="width: 100px"  placeholder="dd/yy" name="">
				<input type="number" maxlength="3" class="form-control mr-2"  style="width: 100px"  placeholder="cvc" name="">
				<button class="btn btn btn-success">Button</button>
			</form>
		</div> <!-- card body .// -->
	</div> <!-- collapse .// -->
	</div> <!-- card.// -->
	<div class="card">
		<header class="card-header">
			<img src="images/misc/payment-bank.png" class="float-right" height="24">  
			<label class="form-check" data-toggle="collapse" data-target="#pay_card">
				<input class="form-check-input" name="payment-option" type="radio" value="option1">
				<h6 class="form-check-label"> Bank Transfer </h6>
			</label>
		</header>
		<div id="pay_card" class="collapse" data-parent="#accordion_pay">
			<div class="card-body">
				<p class="text-muted">Instructions about bank transfer payment</p>
				<p>
					Maybank, <br>
					Account number: 12345678912346 <br>
				</p>
			</div> <!-- card body .// -->
		</div> <!-- collapse .// -->
	</div> <!-- card.// -->
	<div class="card">
		<header class="card-header">
			<img src="images/logos/logo.png" class="float-right" height="24">  
			<label class="form-check" data-toggle="collapse" data-target="#cash">
				<input class="form-check-input" name="payment-option" type="radio" value="option1">
				<h6 class="form-check-label"> Cash on delivery </h6>
			</label>
		</header>
		<div id="cash" class="collapse" data-parent="#accordion_pay">
			<div class="card-body">
				<p class="text-muted">Pay when received the item from courier.</p>
				<p>
					You will be recorded during the transaction.
				</p>
			</div> <!-- card body .// -->
		</div> <!-- collapse .// -->
	</div> <!-- card.// -->
	
</article> 
<!-- accordion end.// -->
  
		</main> <!-- col.// -->
		<aside class="col-md-4">
			<div class="card shadow">
			<div class="card-body">
				<h4 class="mb-3">Overview</h4>
				<dl class="dlist-align">
					<dt class="text-muted">Delivery:</dt>
					<dd>Pick-up</dd>
				  </dl>
				<dl class="dlist-align">
				  <dt class="text-muted">Delivery type:</dt>
				  <dd>Standart</dd>
				</dl>
				<dl class="dlist-align">
				  <dt class="text-muted">Payment method:</dt>
				  <dd>Cash</dd>
				</dl>
				<hr>
				<dl class="dlist-align">
				  <dt>Total:</dt>
				  <dd class="h5">RM<?php echo $sum;?></dd>
				</dl>
				<hr>
				<p class="small mb-3 text-muted">By clicking you are agree with terms of condition </p>
				<a href="#" class="btn btn-primary btn-block"> Button  </a>
				
			</div> <!-- card-body.// -->
			</div> <!-- card.// -->
		</aside> <!-- col.// -->
	</div> <!-- row.// -->

<!-- ============================ COMPONENT 2 END//  ================================= -->




</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->

<!-- ========================= HEADER  ========================= -->
<?php
include('includes/footer.php');
?>


</body>
</html>