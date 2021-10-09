<?php
session_start();
error_reporting(0);
include("includes/config.php");
include("includes/connection.php");
include("includes/functions.php");
if(strlen($_SESSION['alogin'])==0)
	{
header('location:index.php');
}
else{

if(isset($_POST['submit']))
  {
$title=$_POST['title'];
$producttype=$_POST['Producttype'];
$description=$_POST['description'];
$price=$_POST['price'];
$vimage1=$_FILES["img1"]["name"];
$vimage2=$_FILES["img2"]["name"];
$vimage3=$_FILES["img3"]["name"];
move_uploaded_file($_FILES["img1"]["tmp_name"],"img/".$_FILES["img1"]["name"]);
move_uploaded_file($_FILES["img2"]["tmp_name"],"img/".$_FILES["img2"]["name"]);
move_uploaded_file($_FILES["img3"]["tmp_name"],"img/".$_FILES["img3"]["name"]);

$sql="INSERT INTO products(title,ptype,description,price,Vimage1,Vimage2,Vimage3) VALUES(:title,:producttype,:description,:price,:vimage1,:vimage2,:vimage3)";
$query = $dbh->prepare($sql);
$query->bindParam(':title',$title,PDO::PARAM_STR);
$query->bindParam(':producttype',$producttype,PDO::PARAM_STR);
$query->bindParam(':description',$description,PDO::PARAM_STR);
$query->bindParam(':price',$price,PDO::PARAM_STR);
$query->bindParam(':vimage1',$vimage1,PDO::PARAM_STR);
$query->bindParam(':vimage2',$vimage2,PDO::PARAM_STR);
$query->bindParam(':vimage3',$vimage3,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Product posted successfully";
}
else
{
$error="Something went wrong. Please try again";
}
}
?>

<!DOCTYPE HTML>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">

	<title>Zirconium Add Products</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
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
<!-- Add Coding Here -->
<!-- ========================= Header ========================= -->
<?php include('includes/header.php');?>

<!-- ========================= SECTION CONTENT ========================= -->
<div class="ts-main-content">
<?php include('includes/leftbar.php');?>
    <div class="content-wrapper">
		<div class="container-fluid">
<!-- ============================ COMPONENT REGISTER   ================================= -->
			<div class="row">
				<div class="col-md-12">
					<h2 class="page-title">Post a product</h2>
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Basic Info</div>
									<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php }
									else if($msg)
									{?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

			<div class="panel-body">
				<form method="post" class="form-horizontal" enctype="multipart/form-data">
					<div class="form-group">
						<label class="col-sm-2 control-label">Product Title<span style="color:red">*</span></label>
						<div class="col-sm-4">
							<input type="text" name="title" class="form-control" required>
						</div>

						<div class="hr-dashed"></div>
						<div class="hr-dashed"></div>
						<div class="hr-dashed"></div>

						<label class="col-sm-2 control-label">Select type<span style="color:red">*</span></label>
						<div class="col-sm-2">
						<select class="selectpicker" name="Producttype" required>
						<option value=""> Select </option>
						<?php $ret="select id,typename from type";
						$query= $dbh -> prepare($ret);
						//$query->bindParam(':id',$id, PDO::PARAM_STR);
						$query-> execute();
						$results = $query -> fetchAll(PDO::FETCH_OBJ);
						if($query -> rowCount() > 0)
						{
						foreach($results as $result)
						{
						?>
						<option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->typename);?></option>
						<?php }} ?>

						</select>
						</div>
					</div>

						<div class="hr-dashed"></div>
						
						<div class="form-group">
						<label class="col-sm-2 control-label">Description<span style="color:red">*</span></label>
							<div class="col-sm-10">
							<textarea class="form-control" name="description" rows="3" required></textarea>
							</div>
						</div>

						<div class="hr-dashed"></div>

						<div class="form-group">
						<label class="col-sm-2 control-label">Price in (RM)<span style="color:red">*</span></label>
							<div class="col-sm-4">
							<input type="text" name="price" class="form-control" required>
							</div>
						</div>

						<div class="hr-dashed"></div>

						<div class="form-group">
							<div class="col-sm-12">
							<h4><b>Upload Images</b></h4>
							</div>
						</div>


						<div class="form-group">
							<div class="col-sm-4">
							Image 1 <span style="color:red">*</span><input type="file" name="img1" required>
							</div>
							<div class="col-sm-4">
							Image 2<span style="color:red">*</span><input type="file" name="img2" required>
							</div>
							<div class="col-sm-4">
							Image 3<span style="color:red">*</span><input type="file" name="img3" required>
							</div>
						</div>
						
						<div class="hr-dashed"></div>
					</div>
				</div>
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-8 col-sm-offset-2">
			<button class="btn btn-default" type="reset">Cancel</button>
			<button class="btn btn-primary" name="submit" type="submit">Save changes</button>
			</div>
		</div>

				</form>
											
			</div>
			</div>
		</div>
	</div>
<!-- ============================ COMPONENT REGISTER  END.// ================================= -->

</section>
<!-- ========================= SECTION CONTENT END// ========================= -->

<!-- Loading Scripts -->
<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>

</body>
</html>
<?php } ?>