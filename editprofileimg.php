<?php 
session_start();

	include("config.php");
    include("connection.php");
    include("functions.php");

	if(isset($_POST['submit']))
	{
		$id=intval($_GET['id']);
		$vimage1=$_FILES["img1"]["name"];
		move_uploaded_file($_FILES["img1"]["tmp_name"],"images/avatars/".$_FILES["img1"]["name"]);

		$sql="UPDATE users SET img=:vimage1 WHERE id=:id";
		$query = $dbh->prepare($sql);
		$query->bindParam(':vimage1',$vimage1,PDO::PARAM_STR);
		$query->bindParam(':id',$id,PDO::PARAM_STR);
		$query->execute();

		echo "<script>alert('You have updated your profile image.');</script>";
	}
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="cache-control" content="max-age=604800" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<title>Edit Profile</title>

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

<style>
	.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
	}
	.succWrap{
		padding: 10px;
		margin: 0 0 20px 0;
		background: #fff;
		border-left: 4px solid #5cb85c;
		-webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
		box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
	}
	</style>

</head>
<body>
<?php include('includes/header.php') ?>


<!-- ========================= SECTION PAGETOP ========================= -->
<section class="section-pagetop bg-primary">
<div class="container">
	<h2 class="title-page text-white" style="font-family:Roboto; text-transform: uppercase">Edit Profile Image</h2>
</div> <!-- container //  -->
</section>
<!-- ========================= SECTION INTRO END// ========================= -->

<?php 
$id=intval($_GET['id']);
$sql ="SELECT users.* FROM users WHERE id=:id";
$query = $dbh -> prepare($sql);
$query-> bindParam(':id', $id, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>

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

	<form method="post" class="form-horizontal" enctype="multipart/form-data">
	<main class="col-md-9">

			<?php

				if(isset($_GET['error'])){
					?>
						<small class="alert alert-danger"> Data required</small>
					<?php
				}
			?>

		<article class="card mb-3">
			<header class="card-header">
				Edit your profile image
			</header>
			<div class="card-body">
                <div style="margin-left:100px" class="form-row">
					<img src="images/avatars/<?php echo htmlentities($result->img);?>" width="300" height="500" style="border:solid 2px #000">
					<input type="file" name="img1">
                </div> 

				<div class="form-row">
					<button class="btn btn-primary" name="submit" type="submit" style="margin-top:4%">Save changes</button>
				</div>
			</div> <!-- card-body .// -->
		</article> <!-- card.// -->

	</main> <!-- col.// -->
	</form><!-- form.// -->
</div>

</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->
<?php }} ?>

<!-- ========================= FOOTER ========================= -->
<?php include('includes/footer.php') ?>
<!-- ========================= FOOTER END // ========================= -->



</body>
</html>