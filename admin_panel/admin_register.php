<?php  
	session_start();
	include("includes/db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/ADMIN.css">
    <script src="js/jquery-331.min.js"></script>
    <title>Admin Register</title>
</head>
<body>
	<style type="text/css">
		body {
			color: #fff;
			background: silver;
			padding-top: 0;
		}
		.form-control {
			min-height: 41px;
			background: #fff;
			box-shadow: none !important;
			border-color: #e3e3e3;
		}
		.form-control:focus {
			border-color: #70c5c0;
		}
		.form-control, .btn {        
			border-radius: 2px;
		}
		.login-form {
			width: 350px;
			margin: 0 auto;
			padding: 100px 0 30px;		
		}
		.login-form form {
			color: #7a7a7a;
			border-radius: 2px;
			margin-bottom: 15px;
			font-size: 13px;
			background: #ececec;
			box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
			padding: 30px;	
			position: relative;	
		}
		.login-form h2 {
			font-size: 22px;
			margin: 35px 0 25px;
		}
		.login-form .avatar {
			position: absolute;
			margin: 0 auto;
			left: 0;
			right: 0;
			top: -50px;
			width: 95px;
			height: 95px;
			border-radius: 50%;
			z-index: 9;
			background: #70c5c0;
			padding: 15px;
			box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
		}
		.login-form .avatar img {
			width: 100%;
		}	
		.login-form .btn, .login-form .btn:active {        
			font-size: 16px;
			font-weight: bold;
			background: #70c5c0 !important;
			border: none;
			margin-bottom: 20px;
		}
		.login-form .btn:hover, .login-form .btn:focus {
			background: #50b8b3 !important;
		}    
	</style>
	<div class="login-form">
		<form action="admin_register.php" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label>Enter Name</label>
				<input type="text" class="form-control" name="ad_name" required>
			</div>
			<div class="form-group">
				<label>Enter Email</label>
				<input type="email" class="form-control" name="ad_email" required>
			</div>
			<div class="form-group">
				<label>Enter Password</label>
				<input type="password" class="form-control" name="ad_password" required>
			</div>
			<div class="form-group">
				<label>Country</label>
				<input type="text" class="form-control" name="ad_country" required>
			</div>
			<div class="form-group">
				<label>Phone Number</label>
				<input type="text" class="form-control" name="ad_phone" required>
			</div>
			<div class="form-group">
				<label>Job</label>
				<input type="text" class="form-control" name="ad_job" required>
			</div>
			<div class="form-group">
				<label>About You</label>
				<input type="text" class="form-control" name="ad_about" required>
			</div>
			<div class="form-group">
				<label>Profile Picture</label>
				<input type="file" class="form-control" name="ad_image" required>
			</div>
			<div class="form-group">
				<button type="submit" name="register" class="btn btn-primary btn-lg btn-block">Sign Up</button>
			</div>
		</form>
	</div>
</body>
</html>

<?php  
	if (isset($_POST['register'])) {
		$ad_name = $_POST['ad_name'];
		$ad_email = $_POST['ad_email'];
		$ad_password = $_POST['ad_password'];
		$ad_country = $_POST['ad_country'];
		$ad_phone = $_POST['ad_phone'];
		$ad_job = $_POST['ad_job'];
		$ad_about = $_POST['ad_about'];

		$ad_image = $_FILES['ad_image']['name'];
		$ad_image_tmp = $_FILES['ad_image']['tmp_name'];

		move_uploaded_file($ad_image_tmp, "admin_images/$ad_image");

		$insert_ad = "insert into admins (admin_name, admin_email, admin_password, admin_country, admin_phone, admin_job, admin_image, admin_about) values ('$ad_name', '$ad_email', '$ad_password', '$ad_country', '$ad_phone', '$ad_job', '$ad_image', '$ad_about')";

		$run_ad = mysqli_query($con, $insert_ad);
		if ($run_ad) {
			$_SESSION['admin_email'] = $ad_email;
			echo "<script>alert('New Admin Account has been created successfully')</script>";
			echo "<script>window.open('login.php', '_self')</script>";
		}
	}
?>