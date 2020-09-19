<?php
	if (!isset($_SESSION['admin_email'])){
		echo "<script>window.open('login.php', '_self')</script>";
	}
	else{

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    <script src="js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
	<title>Add User</title>
</head>
<body>
	<div class="row">
		<div class="col-lg-12">
			<ol class="breadcrumb">
				<li class="active"><i class="fa fa-dashboard"></i> Dashboard / Add User</li>
			</ol>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<ol class="breadcrumb">
				<li class="active"><i class="fa fa-dashboard"></i> Dashboard / Add User</li>
			</ol>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="fa fa-plus"></i> Add User</h3>
				</div>
				<div class="panel-body">
					<form method="post" class="form-horizontal" enctype="multipart/form-data">
						<div class="form-group">
							<label class="col-md-3 control-label">User Name</label>
							<div class="col-md-6">
								<input type="text" name="admin_name" class="form-control" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Email</label>
							<div class="col-md-6">
								<input type="email" name="admin_email" class="form-control" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Password</label>
							<div class="col-md-6">
								<input type="password" name="admin_password" class="form-control" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Country</label>
							<div class="col-md-6">
								<input type="text" name="admin_country" class="form-control" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Phone Number</label>
							<div class="col-md-6">
								<input type="text" name="admin_phone" class="form-control" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Job</label>
							<div class="col-md-6">
								<input type="text" name="admin_job" class="form-control" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Profile Image</label>
							<div class="col-md-6">
								<input type="file" name="admin_image" class="form-control" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">About Me</label>
							<div class="col-md-6">
								<textarea name="admin_about" rows="6" class="form-control"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label"></label>
							<div class="col-md-6">
								<input type="submit" value="Add Admin User" name="submit" class="btn btn-primary form-control">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script src="js/bootstrap-337.min.js"></script>
</body>
</html>

<?php  
	if (isset($_POST['submit'])) {
		$user_name = $_POST['admin_name'];
		$user_email = $_POST['admin_email'];
		$user_password = $_POST['admin_password'];
		$user_country = $_POST['admin_country'];
		$user_phone = $_POST['admin_phone'];
		$user_job = $_POST['admin_job'];
		$user_about = $_POST['admin_about'];

		$user_image = $_FILES['admin_image']['name'];
		$temp_admin_image = $_FILES['admin_image']['tmp_name'];

		move_uploaded_file($temp_admin_image, "admin_images/$user_image");

		$insert_user = "insert into admins (admin_name, admin_email, admin_password, admin_country, admin_phone, admin_job, admin_image, admin_about) values ('$user_name', '$user_email', '$user_password', '$user_country', '$user_phone', '$user_job', '$user_image', '$user_about')";

		$run_user = mysqli_query($con, $insert_user);
		if ($run_user) {
			echo "<script>alert('New Admin User has been added successfully')</script>";
			echo "<script>window.open('index.php?view_users', '_self')</script>";
		}
	}
?>

<?php  
	}
?>