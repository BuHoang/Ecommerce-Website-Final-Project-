<?php 
	$active='Account'; 
	include("includes/header.php");
?>

	<div id="content">
		<div class="container">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li><a href="index.php">Home</a></li>
					<li>Register</li>
				</ul>
			</div>
			<div class="col-md-3">
				<?php
					include("includes/sidebar.php");
				?>
			</div>
			<div class="col-md-9">
				<div class="box">
					<div class="box-header">
						<center>
							<h2> Register New Account </h2>
						</center>
						<form action="customer_register.php" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label>Enter Name</label>
								<input type="text" class="form-control" name="c_name" required>
							</div>
							<div class="form-group">
								<label>Enter Email</label>
								<input type="email" class="form-control" name="c_email" required>
							</div>
							<div class="form-group">
								<label>Enter Password</label>
								<input type="password" class="form-control" name="c_password" required>
							</div>
							<div class="form-group">
								<label>Country</label>
								<input type="text" class="form-control" name="c_country" required>
							</div>
							<div class="form-group">
								<label>City</label>
								<input type="text" class="form-control" name="c_city" required>
							</div>
							<div class="form-group">
								<label>Phone Number</label>
								<input type="text" class="form-control" name="c_phone" required>
							</div>
							<div class="form-group">
								<label>Address</label>
								<input type="text" class="form-control" name="c_address" required>
							</div>
							<div class="form-group">
								<label>Profile Picture</label>
								<input type="file" class="form-control" name="c_image" required>
							</div>
							<div class="text-center">
								<button type="submit" name="register" class="btn btn-primary">Register</button>
							</div>
						</form>
					</div>
				</div>	
			</div>
		</div>
	</div>
	<?php
		include("includes/footer.php");
	?>
	<script src="js/bootstrap-337.min.js"></script>
</body>
</html>

<?php  
	if (isset($_POST['register'])) {
		$c_name = $_POST['c_name'];
		$c_email = $_POST['c_email'];
		$c_password = $_POST['c_password'];
		$c_country = $_POST['c_country'];
		$c_city = $_POST['c_city'];
		$c_phone = $_POST['c_phone'];
		$c_address = $_POST['c_address'];
		$c_image = $_FILES['c_image']['name'];
		$c_image_tmp = $_FILES['c_image']['tmp_name'];
		$c_ip = getRealIpUser();
		move_uploaded_file($c_image_tmp, "customer/customer_images/$c_image");
		$insert_customer = "insert into customers (customer_name, customer_email, customer_password, customer_country, customer_city, customer_phone, customer_address, customer_image, customer_ip) values ('$c_name', '$c_email', '$c_password', '$c_country', '$c_city', '$c_phone', '$c_address', '$c_image', '$c_ip')";
		$run_customer = mysqli_query($con, $insert_customer);
		$sel_cart = "select * from cart where ip_add='$c_ip'";
		$run_cart = mysqli_query($con, $sel_cart);
		$check_cart = mysqli_num_rows($run_cart);
		if ($check_cart > 0) {
			// if register have items in cart
			$_SESSION['customer_email'] = $c_email;
			echo "<script>alert('Account has been registered successfully')</script>";
			echo "<script>window.open('checkout.php', '_self')</script>";
		}
		else{
			// if register have no items in cart
			$_SESSION['customer_email'] = $c_email;
			echo "<script>alert('Account has been registered successfully')</script>";
			echo "<script>window.open('index.php', '_self')</script>";
		}
	}
?>