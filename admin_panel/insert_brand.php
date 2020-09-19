<?php

	if (!isset($_SESSION['admin_email'])){
		echo "<script>window.open('login.php', '_self')</script>";
	}
	else{
	
?>

<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li class="active"><i class="fa fa-dashboard"></i> Dashboard / Add Brand</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-plus"></i> Add Brand</h3>
			</div>
			<div class="panel-body">
				<form action="" class="form-horizontal" method="post">
					<div class="form-group">
						<label for="" class="control-label col-md-3">Brand Title</label>
						<div class="col-md-6">
							<input type="text" name="brand_title" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3">Brand Description</label>
						<div class="col-md-6">
							<textarea type="text" name="brand_desc" id="" cols="30" rows="10" class="form-control"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3"></label>
						<div class="col-md-6">
							<input type="submit" name="submit" class="form-control btn btn-primary" value="Add Brand">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php  
	if (isset($_POST['submit'])) {
		$brand_title = $_POST['brand_title'];
		$brand_desc = $_POST['brand_desc'];
		$insert_brand = "insert into brands (brand_title, brand_desc) values ('$brand_title', '$brand_desc')";
		$run_brand = mysqli_query($con, $insert_brand);
		if ($run_brand) {
			echo "<script>alert('Brand has been added successfully')</script>";
			echo "<script>window.open('index.php?view_brands', '_self')</script>";
		}
	}
?>

<?php  
	}
?>