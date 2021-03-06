<!-- ========================= FOOTER ========================= -->
<footer class="section-footer border-top">
	<div class="container">
		<section class="footer-top padding-y">
			<div class="row">
				<aside class="col-md col-6">
					<h6 class="title">Company</h6>
					<ul class="list-unstyled">
						<li> <a href="aboutus.php" target="_blank">About us</a></li>
						<li> <a href="faq.php" target="_blank">FAQ</a></li>
						<li> <a href="tac.php" target="_blank">Terms & Conditions</a></li>
					</ul>
				</aside>
				<aside class="col-md col-6">
					<h6 class="title">Help</h6>
					<ul class="list-unstyled">
						<li> <a href="contactus.php" target="_blank">Contact us</a></li>
						<li> <a href="contactus.php" target="_blank">Money refund</a></li>
						<li> <a href="contactus.php" target="_blank">Order status</a></li>
					</ul>
				</aside>
				<aside class="col-md col-6">
					<h6 class="title">Account</h6>
					<ul class="list-unstyled">
						<?php
						if (isset($_SESSION["user_id"])) {
							echo
							"<li> <a href='profile.php'> View Profile </a></li>
							<li> <a href='shoppingcart.php'> My Orders </a></li>";
						}else{
							echo
							"<li> <a href='login.php'> Login </a></li>
							<li> <a href='signup.php'> Register </a></li>";
						}?>
						<li> <a href="admin/index.php"> Supplier Login </a></li>
					</ul>
				</aside>
				<aside class="col-md">
					<h6 class="title">Social</h6>
					<ul class="list-unstyled">
						<li><a href="https://www.facebook.com/profile.php?id=100059688526742" target="_blank"> <i class="fab fa-facebook"></i> Facebook </a></li>
						<li><a href="https://twitter.com/ZirconiumOffic1" target="_blank"> <i class="fab fa-twitter"></i> Twitter </a></li>
						<li><a href="https://www.instagram.com/zirconium.official/" target="_blank"> <i class="fab fa-instagram"></i> Instagram </a></li>
						<li><a href="https://www.youtube.com/channel/UCFYNBZi4TjWDGLJ3jfaKt2g" target="_blank"> <i class="fab fa-youtube"></i> Youtube </a></li>
					</ul>
				</aside>
			</div> <!-- row.// -->
		</section>	<!-- footer-top.// -->

		<section class="footer-bottom border-top row">
			<div class="col-md-2">
				<p class="text-muted"> &copy 2021 Zirconium </p>
			</div>
			<div class="col-md-8 text-md-center">
				<span  class="px-2">Designed by Lito & Group 4</span>
			</div>
			<div class="col-md-2 text-md-right text-muted">
				<i class="fab fa-lg fa-cc-visa"></i>
				<i class="fab fa-lg fa-cc-paypal"></i>
				<i class="fab fa-lg fa-cc-mastercard"></i>
			</div>
		</section>
	</div><!-- //container -->
</footer>
<!-- ========================= FOOTER END // ========================= -->
<?php
mysqli_close($con);
?>