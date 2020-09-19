<div id="footer">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-md-3">
				<h4>Page</h4>
				<ul>
					<li><a href="cart.php">Shopping cart</a></li>
					<li><a href="contact.php">Contact me</a></li>
					<li><a href="shop.php">Shop</a></li>
					<li><a href="customer/my_account.php">My account</a></li>
				</ul>
				<hr>
				<h4>Customer Section</h4>
				<ul>
					<?php  
						if (!isset($_SESSION['customer_email'])) {
							echo "<a href='checkout.php'>Login</a>";
						}
						else{
							echo "<a href='customer/my_account.php?my_orders'>My account</a>";
						}
					?>
					<li><a href="customer_register.php">Register</a></li>
				</ul>
				<hr class="hidden-md hidden-lg hidden-sm">
			</div>
			<div class="col-sm-6 col-md-3">
				<h4>Shop Categories</h4>
				<ul>
					<?php  
						$get_cats = "select * from categories";
						$run_cats = mysqli_query($con, $get_cats);
						while ($row_cats = mysqli_fetch_array($run_cats)) {
							$cat_id = $row_cats['cat_id'];
							$cat_title = $row_cats['cat_title'];

							echo "
								<li><a href='shop.php?cat=$cat_id'>$cat_title</a></li>
							";
						}
					?>
				</ul>
				<hr class="hidden-md hidden-lg hidden-sm">
			</div>
			<div class="col-sm-6 col-md-3">
				<h4>Detailed Information</h4>
				<p>
					<strong>FPT Greenwich University</strong>
					<br>Ha Noi
					<br>Viet Nam
					<br>0962379888
					<br>hoang1835@gmail.com
					<br><strong>Bui Viet Hoang</strong>
				</p>
				<a href="contact.php">Check my contact page</a>
				<hr class="hidden-md hidden-lg hidden-sm">
			</div>
			<div class="col-sm-6 col-md-3">
				<h4>Follow Me</h4>
				<p class="social">
					<a href="#" class="fa fa-facebook"></a>
					<a href="#" class="fa fa-twitter"></a>
					<a href="#" class="fa fa-instagram"></a>
					<a href="#" class="fa fa-google-plus"></a>
				</p>
			</div>
		</div>
	</div>
</div>