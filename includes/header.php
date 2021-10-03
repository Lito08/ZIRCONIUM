<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  $useremail=$_SESSION['user_id'];
  //delete
      if (isset($_POST['delete-cart-submit'])){
    $cart_to_delete = mysqli_real_escape_string($con, $_POST['item_id']);
    $sql = "DELETE FROM cart WHERE item_id = $cart_to_delete";

    if(mysqli_query($con, $sql))
    {
      echo "<script>alert('Product has been deleted.');</script>";
    }else{
      echo "<script>alert('Failed to delete item.');</script>";
    }

      }
  }
?>
<header class="section-header">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&family=Roboto&display=swap" rel="stylesheet"> 
<?php
$sql = "SELECT cart_id FROM cart";
if($result=mysqli_query($con,$sql))
{
  $rowcount=mysqli_num_rows($result);
}
?>
<section class="header-main border-bottom">
	<div class="container">
<div class="row align-items-center">
	<div class="col-lg-2 col-4">
		<a href="index.php" class="brand-wrap">
			<img class="logo" src="images/logos/Logo.png">
		</a> <!-- brand-wrap.// -->
	</div>
	<div class="col-lg-6 col-sm-12">
		<form action="#" class="search">
			<div class="input-group w-100">
			    <input type="text" class="form-control" placeholder="Search">
			    <div class="input-group-append">
			      <button class="btn btn-primary" type="submit">
			        <i class="fa fa-search"></i> Search
			      </button>
			    </div>
		    </div>
		</form> <!-- search-wrap .end// -->
	</div> <!-- col.// -->
	<div class="col-lg-4 col-sm-6 col-12">
		<div class="widgets-wrap float-md-right">
			<div class="widget-header  mr-3">
      <?php
        if (isset($_SESSION["user_id"])) {
				echo  "<a href='shoppingcart.php' class='icon icon-sm rounded-circle border'><i class='fa fa-shopping-cart'></i></a>
				      <span class='badge badge-pill badge-danger notify'>$rowcount</span>";
        }else{
          echo "<a href='login.php' class='icon icon-sm rounded-circle border'><i class='fa fa-shopping-cart'></i></a>
                <span class='badge badge-pill badge-danger notify'>$rowcount</span>";
        }?>
			</div>
			<div class="widget-header icontext">
      <?php
        if (isset($_SESSION["user_id"])) {
				echo "<a href='profile.php' class='icon icon-sm rounded-circle border'><i class='fa fa-user'> </i></a>";
      }else{
      }
        ?>
				<div class="text">
          <span class="text-muted">Welcome!</span>
					<div> 
          <?php
            if (isset($_SESSION["user_id"])) {
              echo "<p class='text' style='font-family: Noto Sans JP '><a href='logout.php'> Log Out</p></a>";
            }else{
              echo "<a href='login.php'>Sign in</a> |  
              <a href='signup.php'> Register</a>"; 
            }
        ?>
					</div>
				</div>
			</div>

		</div> <!-- widgets-wrap.// -->
	</div> <!-- col.// -->
</div> <!-- row.// -->
	</div> <!-- container.// -->
</section> <!-- header-main .// -->
</header> <!-- section-header.// -->

<nav class="navbar navbar-main navbar-expand-lg navbar-light border-bottom">
  <div class="container">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav" aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="main_nav">
      <ul class="navbar-nav">
      	<li class="nav-item dropdown">
           <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="aboutus.php">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Promotions</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="../supermarket.php">Supermarket</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="products/groceries.php">Groceries</a>
            <a class="dropdown-item" href="products/frozen.php">Frozen</a>
            <a class="dropdown-item" href="products/freshproducts.php">Fresh Products</a>
            <a class="dropdown-item" href="products/confectioneries.php">Confectioneries</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"> More</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="products/hab.php">Health & Beauty</a>
            <a class="dropdown-item" href="products/electronics.php">Electronics</a>
            <a class="dropdown-item" href="products/sports.php">Sports & Lifestyle</a>
            <a class="dropdown-item" href="products/babies.php">Babies & Toys</a>
            <a class="dropdown-item" href="products/books.php">Books</a>
            <a class="dropdown-item" href="products/appliances.php">Appliances</a>
            <a class="dropdown-item" href="products/automotive.php">Automotive & Motocycles</a>
          </div>
        </li>
      </ul>
    </div> <!-- collapse .// -->
  </div> <!-- container .// -->
</nav>
</header> <!-- section-header.// -->