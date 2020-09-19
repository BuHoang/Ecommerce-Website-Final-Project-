<?php
	if (!isset($_SESSION['admin_email'])){
		echo "<script>window.open('login.php', '_self')</script>";
	}
	else{

?>

<?php  
	if (isset($_GET['user_profile'])) {
		$edit_user = $_GET['user_profile'];
		$get_user = "select * from admins where admin_id = '$edit_user'";
		$run_user = mysqli_query($con, $get_user);
		$row_user = mysqli_fetch_array($run_user);
		$user_id = $row_user['admin_id'];
		$user_name = $row_user['admin_name'];
		$user_password = $row_user['admin_password'];
		$user_email = $row_user['admin_email'];
		$user_image = $row_user['admin_image'];
		$user_country = $row_user['admin_country'];
		$user_about = $row_user['admin_about'];
		$user_phone = $row_user['admin_phone'];
		$user_job = $row_user['admin_job'];
	}
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
	<title>Edit User Profile</title>
</head>
<body>
	<div class="row">
		<div class="col-lg-12">
			<ol class="breadcrumb">
				<li class="active"><i class="fa fa-dashboard"></i> Dashboard / Edit User Profile</li>
			</ol>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<ol class="breadcrumb">
				<li class="active"><i class="fa fa-dashboard"></i> Dashboard / Edit User Profile</li>
			</ol>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="fa fa-pencil"></i> Edit User Profile</h3>
				</div>
				<div class="panel-body">
					<form method="post" class="form-horizontal" enctype="multipart/form-data">
						<div class="form-group">
							<label class="col-md-3 control-label">User Name</label>
							<div class="col-md-6">
								<input value="<?php echo $user_name; ?>" type="text" name="admin_name" class="form-control" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Email</label>
							<div class="col-md-6">
								<input value="<?php echo $user_email; ?>" type="text" name="admin_email" class="form-control" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Password</label>
							<div class="col-md-6">
								<input value="<?php echo $user_password; ?>" type="text" name="admin_password" class="form-control" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Country</label>
							<div class="col-md-6">
								<input value="<?php echo $user_country; ?>" type="text" name="admin_country" class="form-control" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Phone Number</label>
							<div class="col-md-6">
								<input value="<?php echo $user_phone; ?>" type="text" name="admin_phone" class="form-control" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Job</label>
							<div class="col-md-6">
								<input value="<?php echo $user_job; ?>" type="text" name="admin_job" class="form-control" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Profile Image</label>
							<div class="col-md-6">
								<input type="file" name="admin_image" class="form-control" required>
								<img src="admin_images/<?php echo $user_image; ?>" alt="<?php echo $user_name; ?>" width="500" height="300">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">About Me</label>
							<div class="col-md-6">
								<textarea name="admin_about" rows="6" class="form-control"><?php echo $user_about; ?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label"></label>
							<div class="col-md-6">
								<input type="submit" value="Edit Admin User" name="update" class="btn btn-primary form-control">
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
	if (isset($_POST['update'])) {
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

		$update_user = "update admins set admin_name = '$user_name', admin_email = '$user_email', admin_password = '$user_password', admin_country = '$user_country', admin_phone = '$user_phone', admin_job = '$user_job', admin_about = '$user_about', admin_image = '$user_image' where admin_id = '$user_id'";

		$run_update_user = mysqli_query($con, $update_user);
		if ($run_update_user) {
			echo "<script>alert('Admin User Information has been updated successfully')</script>";
			echo "<script>window.open('login.php', '_self')</script>";

			session_destroy();
		}
	}
?>

<?php  
	}
?>