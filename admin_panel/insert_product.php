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
	<title>Add product</title>
</head>
<body>
	<div class="row">
		<div class="col-lg-12">
			<ol class="breadcrumb">
				<li class="active"><i class="fa fa-dashboard"></i> Dashboard / Add Product</li>
			</ol>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<ol class="breadcrumb">
				<li class="active"><i class="fa fa-dashboard"></i> Dashboard / Add Product</li>
			</ol>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="fa fa-plus"></i> Add Product</h3>
				</div>
				<div class="panel-body">
					<form method="post" class="form-horizontal" enctype="multipart/form-data">
						<div class="form-group">
							<label class="col-md-3 control-label">Product Title</label>
							<div class="col-md-6">
								<input type="text" name="product_title" class="form-control" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Category</label>
							<div class="col-md-6">
								<select name="cat" class="form-control">
									<option>Select a category</option>
									<?php  
										$get_cats = "select * from categories";
										$run_cats = mysqli_query($con, $get_cats);
										while ($row_cats = mysqli_fetch_array($run_cats)) {
											$cat_id = $row_cats['cat_id'];
											$cat_title = $row_cats['cat_title'];
											echo "
												<option value = '$cat_id'>$cat_title</option>
											";
										}
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Brand</label>
							<div class="col-md-6">
								<select name="brand" class="form-control">
									<option>Select a brand</option>
									<?php  
										$get_brands = "select * from brands";
										$run_brands = mysqli_query($con, $get_brands);
										while ($row_brands = mysqli_fetch_array($run_brands)) {
											$brand_id = $row_brands['brand_id'];
											$brand_title = $row_brands['brand_title'];
											echo "
												<option value = '$brand_id'>$brand_title</option>
											";
										}
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Product Image 1</label>
							<div class="col-md-6">
								<input type="file" name="product_img1" class="form-control" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Product Image 2</label>
							<div class="col-md-6">
								<input type="file" name="product_img2" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Product Image 3</label>
							<div class="col-md-6">
								<input type="file" name="product_img3" class="form-control form-height-custom">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Product Price</label>
							<div class="col-md-6">
								<input type="text" name="product_price" class="form-control" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Product Keywords</label>
							<div class="col-md-6">
								<input type="text" name="product_keywords" class="form-control" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Product Description</label>
							<div class="col-md-6">
								<textarea name="product_desc" cols="19" rows="6" class="form-control"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label"></label>
							<div class="col-md-6">
								<input type="submit" value="Add Product" name="submit" class="btn btn-primary form-control">
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
		$product_title = $_POST['product_title'];
		$cat = $_POST['cat'];
		$brand = $_POST['brand'];
		$product_price = $_POST['product_price'];
		$product_keywords = $_POST['product_keywords'];
		$product_desc = $_POST['product_desc'];

		$product_img1 = $_FILES['product_img1']['name'];
		$product_img2 = $_FILES['product_img2']['name'];
		$product_img3 = $_FILES['product_img3']['name'];

		$temp_name1 = $_FILES['product_img1']['tmp_name'];
		$temp_name2 = $_FILES['product_img2']['tmp_name'];
		$temp_name3 = $_FILES['product_img3']['tmp_name'];

		move_uploaded_file($temp_name1, "product_images/$product_img1");
		move_uploaded_file($temp_name2, "product_images/$product_img2");
		move_uploaded_file($temp_name3, "product_images/$product_img3");

		$insert_product = "insert into procloth (cat_id, brand_id, date, product_title, product_img1, product_img2, product_img3, product_price, product_keywords, product_desc) values ('$cat', '$brand', NOW(), '$product_title', '$product_img1', '$product_img2', '$product_img3', '$product_price', '$product_keywords', '$product_desc')";

		$run_product = mysqli_query($con, $insert_product);
		if ($run_product) {
			echo "<script>alert('Clothing product has been added successfully')</script>";
			echo "<script>window.open('index.php?view_products', '_self')</script>";
		}
	}
?>

<?php  
	}
?>