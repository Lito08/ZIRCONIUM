<?php 
session_start();

	include("products/includes/config.php");
    include("connection.php");
    include("functions.php");

	$result = mysqli_query($con, 'SELECT SUM(price) As val FROM cart');
	$row = mysqli_fetch_assoc($result);
	$sum = $row['val'];

	if(isset($_POST['submit']))
	{
		$sql = "SELECT item_id as IdItem FROM cart";
		$query = $dbh -> prepare($sql);
		$query->execute();
		$item=$query->fetchAll(PDO::FETCH_OBJ);
		foreach($item as $items)
		{
			$user=$_SESSION['user_id'];
			$House=$_POST['house'];
			$Street=$_POST['street'];
			$City=$_POST['city'];
			$Postalcode=$_POST['postal'];
			$State=$_POST['state'];
			$Country=$_POST['country'];
			$Courier=$_POST['courier'];
			$Item=$items->IdItem;

			$sql="INSERT INTO sale(User, house, street, city, postalCode, state, country, courier, item) VALUES(:user,:House,:Street,:City,:Postalcode,:State,:Country,:Courier,:Item)";
			$query = $dbh->prepare($sql);
			$query->bindParam(':user',$user,PDO::PARAM_STR);
			$query->bindParam(':House',$House,PDO::PARAM_STR);
			$query->bindParam(':Street',$Street,PDO::PARAM_STR);
			$query->bindParam(':City',$City,PDO::PARAM_STR);
			$query->bindParam(':Postalcode',$Postalcode,PDO::PARAM_STR);
			$query->bindParam(':State',$State,PDO::PARAM_STR);
			$query->bindParam(':Country',$Country,PDO::PARAM_STR);
			$query->bindParam(':Courier',$Courier,PDO::PARAM_STR);
			$query->bindParam(':Item',$Item,PDO::PARAM_STR);
			$query->execute();

			$lastInsertId = $dbh->lastInsertId();
			if($lastInsertId)
			{
			$msg="You have purchased successfully";
			echo("<script>window.location = 'index.php';</script>");
			mysqli_query($con,"TRUNCATE TABLE cart");
			}
			else
			{
			$error="Something went wrong. Please try again";
			}
		}
	}
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

<form method="post" action="">
<!-- ============================ COMPONENT 2 ================================= -->
<div class="row">
		<main class="col-md-8">

<article class="card mb-4">
<div class="card-body">
	<h4 class="card-title mb-4">Select your courier</h4>
	<form method="POST" action="">
	<div class="row">
		<div class="form-group col-md-6">
			<p><strong>Courier:</strong>
				<?php
					if(isset($_POST["courier"])){
					$courier=$_POST["courier"];
					echo $courier;
						}
				?>
			</p>
			<select id="courier" class="form-control" name="courier" onchange="this.form.submit()" >
			<option value="" disable selected> Select </option>
			<?php $ret="select name from courier";
						$query= $dbh -> prepare($ret);
						$query-> execute();
						$results = $query -> fetchAll(PDO::FETCH_OBJ);
						if($query -> rowCount() > 0)
						{
						foreach($results as $result)
						{
						?>
						<option value="<?php echo htmlentities($result->name);?>"><?php echo htmlentities($result->name);?></option>
						<?php }} ?>
			</select>
		</div>
	</div> <!-- row.// -->	
	</form>
</div> <!-- card-body.// -->
</article> <!-- card.// -->

<article class="card mb-4">
<div class="card-body">
	<h4 class="card-title mb-4">Delivery info</h4>
		<div class="row">
				<div class="form-group col-sm-4">
					<label>House No.</label>
					<input name="house" type="text" placeholder="House Address" class="form-control" required>
				</div>
				<div class="form-group col-sm-8">
					<label>Street*</label>
					<input name="street" type="text" placeholder="Street" class="form-control" required>
				</div>
				<div class="form-group col-sm-6">
					<label>City*</label>
					<input name="city" type="text" placeholder="City" class="form-control" required>
				</div>
				
				<div class="form-group col-sm-4">
					<label>Postal code</label>
					<input name="postal" type="text" placeholder="Ex: 58200" class="form-control" required>
				</div>
				<div class="form-group col-sm-6">
					<label>State*</label>
					<input name="state" type="text" placeholder="State" class="form-control" required>
				</div>
				<div class="form-group col-md-6">
					  <label>Country</label>
					  <select id="inputState" class="form-control" name="country" required>
					      <option value=""> Choose...</option>
                          <option value="Indoneisa">Indoneisa</option>
					      <option value="Russia">Russia</option>
                          <option value="France">France</option>
                          <option value="Germany">Germany</option>
                          <option value="Italy">Italy</option>
					      <option value="Singapore">Singapore</option>
					      <option value="Malaysia" selected="">Malaysia</option>
					      <option value="Thailand">Thailand</option>
                          <option value="United States">United States</option>
					  </select>
				</div>
		</div> <!-- row.// -->
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
				<input class="form-check-input" name="payment" type="radio" value="option1">
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
				  <dt class="text-muted">Delivery type:</dt>
				  <dd>Courier</dd>
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
				<p class="small mb-3 text-muted">By clicking buy you are agreed with <a href="tac.php" class="card-product" style="color:blue">terms & conditions</a>. </p>
				
				<button type="submit" class="btn btn-primary btn-block"  name="submit">Buy</button>
				
				
			</div> <!-- card-body.// -->
			</div> <!-- card.// -->
		</aside> <!-- col.// -->
	</div> <!-- row.// -->

<!-- ============================ COMPONENT 2 END//  ================================= -->


</form>

</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->

<!-- ========================= FOOTER  ========================= -->
<?php
include('includes/footer.php');
?>


</body>
</html>
