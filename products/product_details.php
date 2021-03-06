<?php
session_start();
include("includes/config.php");
include("../functions.php");
include("../connection.php");
error_reporting(0);

?>


<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="author" content="Bootstrap-ecommerce by Vosidiy M.">

<title>Zirconium - Product Details</title>

<!-- jQuery -->
<script src="../js/jquery-2.0.0.min.js" type="text/javascript"></script>

<!-- Bootstrap4 files-->
<script src="../js/bootstrap.bundle.min.js" type="text/javascript"></script>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css"/>

<!-- Fonticons -->
<link href="../fonts/fontawesome/css/all.min.css" type="text/css" rel="stylesheet">
<link href="../fonts/feathericons/css/iconfont.css" rel="stylesheet" type="text/css" />
<link href="../fonts/material-icons/css/materialdesignicons.css" rel="stylesheet" type="text/css" />

<!-- custom style -->
<link href="../css/ui.css" rel="stylesheet" type="text/css"/>
<link href="../css/responsive.css" rel="stylesheet" />

<!-- plugin: slickslider -->
<link href="plugins/slickslider/slick.css" rel="stylesheet" type="text/css" />
<link href="plugins/slickslider/slick-theme.css" rel="stylesheet" type="text/css" />
<script src="plugins/slickslider/slick.min.js"></script>

<!-- custom javascript -->
<script src="../js/script.js" type="text/javascript"></script>

<script type="text/javascript">
/// some script

// jquery ready start
$(document).ready(function() {
	// jQuery code

	/////////////////  items slider. /plugins/slickslider/
    if ($('.slider-banner-slick').length > 0) { // check if element exists
        $('.slider-banner-slick').slick({
              infinite: true,
              autoplay: true,
              slidesToShow: 1,
              dots: false,
              prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-chevron-left"></i></button>',
           	  nextArrow: '<button type="button" class="slick-next"><i class="fa fa-chevron-right"></i></button>',
        });
    } // end if

     /////////////////  items slider. /plugins/slickslider/
    if ($('.slider-custom-slick').length > 0) { // check if element exists
        $('.slider-custom-slick').slick({
              infinite: true,
              slidesToShow: 2,
              dots: true,
              prevArrow: $('.slick-prev-custom'),
              nextArrow: $('.slick-next-custom')
        });
    } // end if

  

    /////////////////  items slider. /plugins/slickslider/
    if ($('.slider-items-slick').length > 0) { // check if element exists
        $('.slider-items-slick').slick({
            infinite: true,
            swipeToSlide: true,
            slidesToShow: 4,
            dots: true,
            slidesToScroll: 2,
            prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-chevron-left"></i></button>',
           	nextArrow: '<button type="button" class="slick-next"><i class="fa fa-chevron-right"></i></button>',
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 640,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });
    } // end if

	

}); 

// jquery end
</script>

<script>

	$(document).ready(function () {

	$('.increment-btn').click(function (e) {
		e.preventDefault();
		var incre_value = $(this).parents('.quantity').find('.qty-input').val();
		var value = parseInt(incre_value, 10);
		value = isNaN(value) ? 0 : value;
		if(value<100){
			value++;
			$(this).parents('.quantity').find('.qty-input').val(value);
		}

	});

	$('.decrement-btn').click(function (e) {
		e.preventDefault();
		var decre_value = $(this).parents('.quantity').find('.qty-input').val();
		var value = parseInt(decre_value, 10);
		value = isNaN(value) ? 0 : value;
		if(value>1){
			value--;
			$(this).parents('.quantity').find('.qty-input').val(value);
		}
	});

	});
	
</script>

<!-- section-header.// -->
<?php
    include_once('includes/header.php')
?>
<!-- section-header.// -->


<?php
$vhid=intval($_GET['vhid']);
$sql = "SELECT products.*,type.typename,type.id as bid from products join type on type.id=products.ptype where products.id=:vhid";
$query = $dbh -> prepare($sql);
$query->bindParam(':vhid',$vhid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{
$_SESSION['brndid']=$result->bid;

if(isset($_POST['submit']))
{

	$useremail=$_SESSION['user_id'];
	$vhid = $_GET['vhid'];
	$quan = $_POST['quantity'];
	$Pprice = $result->price;
	$total = $result->price * $quan;
	$sql="INSERT INTO cart(userEmail,item_id,quantity,price,Total) VALUES (:useremail,:vhid,:quan,:Pprice,:total)";

	$query = $dbh->prepare($sql);
	$query->bindParam(':useremail',$useremail,PDO::PARAM_STR);
	$query->bindParam(':vhid',$vhid,PDO::PARAM_STR);
	$query->bindParam(':quan',$quan,PDO::PARAM_STR);
	$query->bindParam(':Pprice',$Pprice,PDO::PARAM_STR);
	$query->bindParam(':total',$total,PDO::PARAM_STR);
	$query->execute();
	$lastInsertId = $dbh->lastInsertId();
	if($lastInsertId)
	{
		echo "<script>alert('Product has been added to shopping cart.');</script>";
		echo("<script>window.location = '../shoppingcart.php';</script>");
	}
	else
	{
		echo "<script>alert('Something went wrong. Please try again later.');</script>";
	}

}

if(isset($_POST['wish']))
{

	$useremail=$_SESSION['user_id'];
	$vhid = $_GET['vhid'];
	$sql="INSERT INTO wishlist(userEmail,item_id) VALUES (:useremail,:vhid)";

	$query = $dbh->prepare($sql);
	$query->bindParam(':useremail',$useremail,PDO::PARAM_STR);
	$query->bindParam(':vhid',$vhid,PDO::PARAM_STR);
	$query->execute();
	$lastInsertId = $dbh->lastInsertId();
	if($lastInsertId)
	{
		echo "<script>alert('Product has been added to your wishlist.');</script>";
		echo("<script>window.location = '../wishlist.php';</script>");
	}
	else
	{
		
	}

}

//$a = 1;

//if (isset($_POST['plus']))
//{
//	$a = $a + 1;
//}

?>

<section class="section-content padding-y bg">
<div class="container">

<!-- ============================ COMPONENT 1 ================================= -->
<div class="card">
	<div class="row no-gutters">
		<aside class="col-md-6">
<article class="gallery-wrap">
	<div class="slider-banner-slick">
		<div class="item-slide">
			<img src="../superadmin/img/<?php echo htmlentities($result->Vimage1);?>">
		</div>
		<div class="item-slide">
			<img src="../superadmin/img/<?php echo htmlentities($result->Vimage2);?>">
		</div>
		<div class="item-slide">
			<img src="../superadmin/img/<?php echo htmlentities($result->Vimage3);?>">
		</div>
	</div>
</article> <!-- gallery-wrap .end// -->
		</aside>
		
<main class="col-md-6 border-left">
<article class="content-body">

<h2 class="title"><?php echo htmlentities($result->title);?></h2>

<div class="rating-wrap my-3">
	<ul class="rating-stars">
		<li style="width:100%" class="stars-active">
			<img src="../images/icons/stars-active.svg" alt="">
		</li>
		<li>
			<img src="../images/icons/starts-disable.svg" alt="">
		</li>
	</ul>
	<small class="label-rating text-muted">669 reviews</small>
	<small class="label-rating text-success"> <i class="fa fa-clipboard-check"></i> 69,666 orders </small>
</div> <!-- rating-wrap.// -->

<div class="mb-3"> 
	<var class="price h4">RM<?php echo htmlentities($result->price);?></var> 
	<span class="text-muted">/<?php echo htmlentities($result->perm);?></span> 
</div> 

<p> <?php echo htmlentities($result->description);?> </p>

<dl class="row">
  <dt class="col-sm-3">Type</dt>
  <dd class="col-sm-9"><?php echo htmlentities($result->typename);?></dd>

  <dt class="col-sm-3">Brand</dt>
  <dd class="col-sm-9"><?php echo htmlentities($result->brand);?></dd>

  <dt class="col-sm-3">Stock</dt>
  <dd class="col-sm-9"><?php echo htmlentities($result->stock);?></dd>
    <!-- ?php echo htmlentities($result->brand);?>// -->
  <dt class="col-sm-3">Delivery</dt>
  <dd class="col-sm-9">Worldwide </dd>
</dl>

<hr>
	<div class="row">
		<div class="form-group col-md flex-grow-0">
			<label>Quantity</label>
			<form method="post">
				<div class="input-group mb-3 input-spinner">

				<td class="cart-product-quantity" width="130px">
					<div class="input-group quantity">
						<div class="input-group-prepend decrement-btn" style="cursor: pointer">
							<span class="input-group-text">-</span>
						</div>
						<input type="text" name="quantity" class="qty-input form-control" maxlength="3" max="100" value="1">
						<div class="input-group-append increment-btn" style="cursor: pointer">
							<span class="input-group-text">+</span>
						</div>
					</div>
				</td>

					<!-- Quantity .//
					<div class="input-group-prepend">
						<button id="add" class="btn btn-light" type="button"> + </button>
					</div>

					<input id="quan" type="text" name="quantity" class="form-control" value="1">

					<div class="input-group-append">
						<button id="sub" class="btn btn-light" type="button"> &minus; </button>
					</div> Quantity .// -->
				</div>
		</div> <!-- col.// -->
		<div class="form-group col-md">
				<label></label>
				<div class="mt-2">
					<!-- Size Options .//
					<label class="custom-control custom-radio custom-control-inline">
					  <input type="radio" name="select_size" checked="" class="custom-control-input">
					  <div class="custom-control-label">Small</div>
					</label>

					<label class="custom-control custom-radio custom-control-inline">
					  <input type="radio" name="select_size" class="custom-control-input">
					  <div class="custom-control-label">Medium</div>
					</label>

					<label class="custom-control custom-radio custom-control-inline">
					  <input type="radio" name="select_size" class="custom-control-input">
					  <div class="custom-control-label">Large</div>
					</label> Size Options .// -->

				</div>
		</div> <!-- col.// -->
	</div> <!-- row.// -->

    <?php if($_SESSION['user_id'])
    {?>

	
	<div class="form-group">
		<input type="submit" class="btn  btn-outline-primary"  name="submit" value="Add to cart">
		<input type="submit" class="btn  btn-primary"  name="wish" value="Add to wishlist">
    </div>

    <?php } else { ?>
        <a href="../login.php" class="btn  btn-primary">Login to buy!</a>
		<a href="../signup.php" class="btn  btn-outline-primary">Don't have an account? Sign Up!</a>
	
    <?php } ?>
	</form>

</article> <!-- product-info-aside .// -->
		</main> <!-- col.// -->
	</div> <!-- row.// -->
</div> <!-- card.// -->
</section>
<!-- ============================ COMPONENT 1 END .// ================================= -->
<?php
}
$results=$item;
}
?>
<!-- ========================= SIMILAR PRODUCTS ========================= -->
<section class="section-content padding-y bg">
<div class="container">
    <h3>Similar Products</h3>

	

<div class="card card-body">
	<div class="row">
		<?php
			$bid=$_SESSION['brndid'];
			$sql="SELECT products.title,type.typename,products.price,products.perm,products.id,products.description,products.Vimage1 from products join type on type.id=products.ptype where products.ptype=:bid";
			$query = $dbh -> prepare($sql);
			$query->bindParam(':bid',$bid, PDO::PARAM_STR);
			$query->execute();
			$results=$query->fetchAll(PDO::FETCH_OBJ);
			$cnt=1;
			if($query->rowCount() > 0)
			{
			foreach($results as $result)
			{ 
		?>
		<div class="col-md-3">
			<figure class="itemside mb-4">
				<div class="aside"><a href="product_details.php?vhid=<?php echo htmlentities($result->id);?>"><img src="../superadmin/img/<?php echo htmlentities($result->Vimage1);?>" class="border img-sm"></div>
				<figcaption class="info align-self-center">
					<a href="product_details.php?vhid=<?php echo htmlentities($result->id);?>" class="title"><?php echo htmlentities($result->title);?></a>
					<a class="price">RM<?php echo htmlentities($result->price);?>/<?php echo htmlentities($result->perm);?></a>
				</figcaption>
			</figure>
		</div> <!-- col.// -->
		<?php }} ?>
      </div>
    </div>

</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->


<!-- ========================= FOOTER ========================= -->
<?php include_once('includes/footer.php') ?>
<!-- ========================= FOOTER END // ========================= -->

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/interface.js"></script>
<script src="assets/switcher/js/switcher.js"></script>
<script src="assets/js/bootstrap-slider.min.js"></script>
<script src="assets/js/slick.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>

</body>
</html>