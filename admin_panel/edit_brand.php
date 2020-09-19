<?php

	if (!isset($_SESSION['admin_email'])){
		echo "<script>window.open('login.php', '_self')</script>";
	}
	else{
	
?>

<?php  
	if (isset($_GET['edit_brand'])) {
		$edit_brand_id = $_GET['edit_brand'];
		$edit_brand_query = "select * from brands where brand_id = '$edit_brand_id'";
		$run_edit = mysqli_query($con, $edit_brand_query);
		$row_edit = mysqli_fetch_array($run_edit);
		$brand_id = $row_edit['brand_id'];
		$brand_title = $row_edit['brand_title'];
		$brand_desc = $row_edit['brand_desc'];
	}
?>

<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li class="active"><i class="fa fa-dashboard"></i> Dashboard / Edit Brand</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-pencil"></i> Edit Brand</h3>
			</div>
			<div class="panel-body">
				<form action="" class="form-horizontal" method="post">
					<div class="form-group">
						<label for="" class="control-label col-md-3">Brand Title</label>
						<div class="col-md-6">
							<input value="<?php echo $brand_title; ?>" type="text" name="brand_title" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3">Brand Description</label>
						<div class="col-md-6">
							<textarea type="text" name="brand_desc" cols="30" rows="10" class="form-control"><?php echo $brand_desc; ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3"></label>
						<div class="col-md-6">
							<input type="submit" name="update" class="form-control btn btn-primary" value="Edit Brand">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php  
	if (isset($_POST['update'])) {
		$brand_title = $_POST['brand_title'];
		$brand_desc = $_POST['brand_desc'];
		$update_brand = "update brands set brand_title = '$brand_title', brand_desc = '$brand_desc' where brand_id = '$brand_id'";
		$run_update = mysqli_query($con, $update_brand);
		if ($run_update) {
			echo "<script>alert('Brand has been updated successfully')</script>";
			echo "<script>window.open('index.php?view_brands', '_self')</script>";
		}
	}
?>

<?php  
	}
?>