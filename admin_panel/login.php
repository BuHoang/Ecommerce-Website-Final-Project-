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
    <title>Admin Login</title>
</head>
<body>
	<style type="text/css">
		body {
			color: #fff;
			background: silver;
			padding-top: 5%;
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
		<form action="" method="post">
			<div class="avatar">
				<img src="admin_images/avatar.png" alt="Avatar">
			</div>
			<h2 class="text-center">Admin Login</h2>   
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Email" name="admin_email" value="<?php if(isset($_COOKIE["admin_email"])) { echo $_COOKIE["admin_email"]; } ?>" required="required">
			</div>
			<div class="form-group">
				<input type="password" class="form-control" placeholder="Password" name="admin_password" value="<?php if(isset($_COOKIE["admin_password"])) { echo $_COOKIE["admin_password"]; } ?>" required="required">
			</div>
			<div class="form-group">
				<input type="checkbox" name="remember"> Remember me
			</div>        
			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-lg btn-block" name="admin_login">Sign in</button>
			</div>
			<p class="text-center">Don't have an account? <a href="admin_register.php">Sign up here!</a></p>
		</form>
	</div>
</body>
</html>

<?php  
	if (isset($_POST['admin_login'])) {
		$admin_email = mysqli_real_escape_string($con, $_POST['admin_email']);
		$admin_password = mysqli_real_escape_string($con, $_POST['admin_password']);
		$get_admin = "select * from admins where admin_email = '$admin_email' AND admin_password = '$admin_password'";
		$run_admin = mysqli_query($con, $get_admin);
		$count = mysqli_num_rows($run_admin);
		if ($count == 1) {
			$_SESSION['admin_email'] = $admin_email;
			echo "<script>alert('You have logged in successfully')</script>";
			echo "<script>window.open('index.php?dashboard', '_self')</script>";
		}
		else{
			echo "<script>alert('Email or Password is incorrect!')</script>";
		}
	}

	if(!empty($_POST["remember"])) {
		setcookie ("admin_email",$_POST["admin_email"],time()+ 3600);
		setcookie ("admin_password",$_POST["admin_password"],time()+ 3600);
		echo "Cookies Set Successfuly";
	} 
?>