<?php

	if (!isset($_SESSION['admin_email'])){
		echo "<script>window.open('login.php', '_self')</script>";
	}
	else{
	
?>

<?php  
	if (isset($_GET['edit_cat'])) {
		$edit_cat_id = $_GET['edit_cat'];
		$edit_cat_query = "select * from categories where cat_id = '$edit_cat_id'";
		$run_edit = mysqli_query($con, $edit_cat_query);
		$row_edit = mysqli_fetch_array($run_edit);
		$cat_id = $row_edit['cat_id'];
		$cat_title = $row_edit['cat_title'];
		$cat_desc = $row_edit['cat_desc'];
	}
?>

<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li class="active"><i class="fa fa-dashboard"></i> Dashboard / Edit Category</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-pencil"></i> Edit Category</h3>
			</div>
			<div class="panel-body">
				<form action="" class="form-horizontal" method="post">
					<div class="form-group">
						<label for="" class="control-label col-md-3">Category Title</label>
						<div class="col-md-6">
							<input value="<?php echo $cat_title; ?>" type="text" name="cat_title" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3">Category Description</label>
						<div class="col-md-6">
							<textarea type="text" name="cat_desc" cols="30" rows="10" class="form-control"><?php echo $cat_desc; ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3"></label>
						<div class="col-md-6">
							<input type="submit" name="update" class="form-control btn btn-primary" value="Edit Category">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php  
	if (isset($_POST['update'])) {
		$cat_title = $_POST['cat_title'];
		$cat_desc = $_POST['cat_desc'];
		$update_cat = "update categories set cat_title = '$cat_title', cat_desc = '$cat_desc' where cat_id = '$cat_id'";
		$run_update = mysqli_query($con, $update_cat);
		if ($run_update) {
			echo "<script>alert('Category has been updated successfully')</script>";
			echo "<script>window.open('index.php?view_cats', '_self')</script>";
		}
	}
?>

<?php  
	}
?>