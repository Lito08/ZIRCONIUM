<?php 
session_start();

	include("connection.php");
    include("config.php");
    include("functions.php");

	if(isset($_POST["submit"]))
	{
		$name = $_POST["Name"];
		$email = $_POST["Email Address"];
		$phone = $_POST["phone"];
		$about = $_POST["about"];
		$description = $_POST["Message"];


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
	
		  <form action="https://formsubmit.co/official.zirconium@gmail.com" method="POST">
			<div class="form-row">
				<div class="col form-group">
					<label>Name</label>
					  <input type="text" name="Name" class="form-control" placeholder="" required>
				</div> <!-- form-group end.// -->
				<div class="col form-group">
					<label>Email</label>
					  <input type="email" name="Email Address" class="form-control" placeholder="" required>
				</div> <!-- form-group end.// -->
				<div class="col form-group">
					<label>Phone No.</label>
					  <input type="text" name="phone" class="form-control" placeholder="" required>
				</div> <!-- form-group end.// -->
			</div> <!-- form-row.// -->
			<div class="form-group">
				<label>What is the message category?</label>
				<select name="about" class="form-control">
					<option>Select</option>
					<option value="Technical issue">Technical issue</option>
					<option value="Money refund">Money refund</option>
					<option value="Recommendation">Recommendation</option>
				</select>
			</div>
			<div class="form-group">
				<label>What is message about?</label>
				<textarea type="text" name="Message" class="form-control" placeholder="" required rows="3"></textarea>
			</div>
			<div class="form-group">
				<label  for="exampleFormControlFile1">
				</label>
			</div>
			<input type="hidden" name="_next" value="http://localhost/ZIRCONIUM/index.php">
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