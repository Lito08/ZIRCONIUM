<?php 
session_start();

    include("connection.php");
    include("functions.php");

?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="author" content="Bootstrap-ecommerce by Vosidiy M.">

<title>Zirconium - Contact Us</title>

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

<div class="row">
	<aside class="col-md-6">
    
<!-- ============================ COMPONENT FEEDBACK  ================================= -->
	<div class="card">
      <div class="card-body">
      <h4 class="card-title mb-4">Contact Us</h4>
      <form>
        <div class="form-row">
			<div class="col form-group">
				<label>Name</label>
			  	<input type="text" class="form-control" placeholder="">
			</div> <!-- form-group end.// -->
			<div class="col form-group">
				<label>Email</label>
			  	<input type="email" class="form-control" placeholder="">
			</div> <!-- form-group end.// -->
		</div> <!-- form-row.// -->
		<div class="form-group">
			<label>What is message about?</label>
			<select class="form-control">
				<option>Select</option>
				<option>Technical issue</option>
				<option>Money refund</option>
				<option>Recommendation</option>
			</select>
		</div>
		<div class="form-group">
			<label>What is message about?</label>
			<textarea class="form-control" rows="3"></textarea>
		</div>
		<div class="form-group">
			<label  for="exampleFormControlFile1">
    			<input type="file" class="form-control-file">
    		</label>
		</div>
		<button class="btn btn-primary btn-block">Send</button>
      </form>
      </div> <!-- card-body.// -->
    </div> <!-- card .// -->
<!-- ============================ COMPONENT FEEDBACK END.// ================================= -->


	</aside> 
	<aside class="col-md-5">

<!-- ============================ COMPONENT FEEDBACK  ================================= -->
<div class="card">
      <div class="card-body">
      <h2 class="card-title mb-4">Need Assistance?</h2>
      <form>
        <div class="form-row">
			<div class="form-group">
			<p>Do you have an inquiry about a Zirconium shipments? Our Customer Service Team is happy to help!</p>
            <h6 class="card-title mb-4">Our Contact:</h6>
			<p>
				If you need immediate assistance, please don't hesitate to call one of our technical team.
				<br><br><strong>Customer Service Number:</strong>
				<br>+6013-317-4100
			</p>
			</div> <!-- form-group end.// -->
		</div> <!-- form-row.// -->
      </form>
      </div> <!-- card-body.// -->
    </div> <!-- card .// -->
<!-- ============================ COMPONENT FEEDBACK END.// ================================= -->
	</aside>
</div> <!-- row.// -->


<br><br>
<div class="row">
	<aside class="col-md-6">

<!-- ============================ COMPONENT DELIVERY  ================================= -->
	<div class="card">
      <div class="card-body">
      <h4 class="card-title mb-4">Get newsletters</h4>
      	<form>
      		<div class="input-group">
      			<input type="text" class="form-control" placeholder="Email" name="">
      			<span class="input-group-append"><button class="btn btn-primary">Subscribe</button></span>
      		</div>
      		<h6 class="form-text text-muted">No spam, Only useful offers</h6>
		</form>
      </div> <!-- card-body.// -->
    </div> <!-- card .// -->
<!-- ============================ COMPONENT FEEDBACK END.// ================================= -->

	</aside>
</div> <!-- row.// -->




</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->



<!-- ========================= FOOTER ========================= -->
<?php include('includes/footer.php') ?>




</body>
</html> 