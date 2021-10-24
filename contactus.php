<?php 
session_start();

	include("connection.php");
    include("config.php");
    include("functions.php");

	if(isset($_POST["submit"]))
	{
		$name = $_POST["name"];
		$email = $_POST["email"];
		$phone = $_POST["phone"];
		$about = $_POST["about"];
		$description = $_POST["description"];


		$sql="INSERT INTO contactusquery(Name,Email,ContactNumber,About,Message) VALUES(:name,:email,:phone,:about,:description)";
		$query = $dbh->prepare($sql);
		$query->bindParam(':name',$name,PDO::PARAM_STR);
		$query->bindParam(':email',$email,PDO::PARAM_STR);
		$query->bindParam(':phone',$phone,PDO::PARAM_STR);
		$query->bindParam(':about',$about,PDO::PARAM_STR);
		$query->bindParam(':description',$description,PDO::PARAM_STR);
		$query->execute();
		$lastInsertId = $dbh->lastInsertId();
		if($lastInsertId)
		{
			echo "<script>alert('Message has succesfully sended to our expert team.');</script>";
			echo("<script>window.location = 'index.php';</script>");
		}
		else
		{
			echo "<script>alert('Something went wrong. Please try again later.');</script>";
			echo("<script>window.location = 'index.php';</script>");
		}
	}
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
      <form method="post">
        <div class="form-row">
			<div class="col form-group">
				<label>Name</label>
			  	<input name="name" type="text" class="form-control" placeholder="Your Name Here">
			</div> <!-- form-group end.// -->
			<div class="col form-group">
				<label>Email</label>
			  	<input name="email" type="email" class="form-control" placeholder="Your Email Here">
			</div> <!-- form-group end.// -->
			<div class="col form-group">
				<label>Contact No.</label>
			  	<input name="phone" type="text" class="form-control" placeholder="Ex:+6013-317-4100">
			</div> <!-- form-group end.// -->
		</div> <!-- form-row.// -->
		<div class="form-group">
			<label>What is message about?</label>
			<select name="about" class="form-control">
				<option>Select</option>
				<option value="Technical issue">Technical issue</option>
				<option value="Moeny refund">Money refund</option>
				<option value="Order status">Order status</option>
			</select>
		</div>
		<div class="form-group">
			<label>Please elaborate more about the message.</label>
			<textarea name="description" class="form-control" rows="3"></textarea>
		</div>
		<div class="form-group">
			<label>
    			<input name="file" type="file" class="form-control-file">
    		</label>
		</div>
		<button name="submit" type="submit" class="btn btn-primary btn-block">Send</button>
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
      		<div class="input-group">
      			<input type="text" class="form-control" placeholder="Email" name="">
      			<span class="input-group-append"><button class="btn btn-primary">Subscribe</button></span>
      		</div>
      		<h6 class="form-text text-muted">No spam, Only useful offers</h6>
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