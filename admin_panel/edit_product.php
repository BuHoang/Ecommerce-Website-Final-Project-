<?php
	if (!isset($_SESSION['admin_email'])){
		echo "<script>window.open('login.php', '_self')</script>";
	}
	else{

?>

<?php  
	if (isset($_GET['edit_product'])) {
		$edit_id = $_GET['edit_product'];
		$get_p = "select * from procloth where product_id = '$edit_id'";
		$run_edit = mysqli_query($con, $get_p);
		$row_edit = mysqli_fetch_array($run_edit);
		$p_id = $row_edit['product_id'];
		$p_title = $row_edit['product_title'];
		$cat = $row_edit['cat_id'];
		$brand = $row_edit['brand_id'];
		$p_image1 = $row_edit['product_img1'];
		$p_image2 = $row_edit['product_img2'];
		$p_image3 = $row_edit['product_img3'];
		$p_price = $row_edit['product_price'];
		$p_desc = $row_edit['product_desc'];
		$p_keywords = $row_edit['product_keywords'];
	}

	$get_cat = "select * from categories where cat_id = '$cat'";
	$run_cat = mysqli_query($con, $get_cat);
	$row_cat = mysqli_fetch_array($run_cat);
	$cat_title = $row_cat['cat_title'];
	$get_brand = "select * from brands where brand_id = '$brand'";
	$run_brand = mysqli_query($con, $get_brand);
	$row_brand = mysqli_fetch_array($run_brand);
	$brand_title = $row_brand['brand_title'];

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
	<title>Insert product</title>
</head>
<body>
	<div class="row">
		<div class="col-lg-12">
			<ol class="breadcrumb">
				<li class="active"><i class="fa fa-dashboard"></i> Dashboard / Edit Product</li>
			</ol>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<ol class="breadcrumb">
				<li class="active"><i class="fa fa-dashboard"></i> Dashboard / Edit Product</li>
			</ol>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="fa fa-pencil"></i> Edit Product</h3>
				</div>
				<div class="panel-body">
					<form method="post" class="form-horizontal" enctype="multipart/form-data">
						<div class="form-group">
							<label class="col-md-3 control-label">Product Title</label>
							<div class="col-md-6">
								<input type="text" name="product_title" class="form-control" required value="<?php echo $p_title; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Category</label>
							<div class="col-md-6">
								<select name="cat" class="form-control">
									<option value="<?php echo $cat; ?>"><?php echo $cat_title; ?></option>
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
									<option value="<?php echo $brand; ?>"><?php echo $brand_title; ?></option>
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
								<br>
								<img width="300" height="300" src="product_images/<?php echo $p_image1; ?>" alt="<?php echo $p_image1; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Product Image 2</label>
							<div class="col-md-6">
								<input type="file" name="product_img2" class="form-control">
								<br>
								<img width="300" height="300" src="product_images/<?php echo $p_image2; ?>" alt="<?php echo $p_image2; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Product Image 3</label>
							<div class="col-md-6">
								<input type="file" name="product_img3" class="form-control form-height-custom">
								<br>
								<img width="300" height="300" src="product_images/<?php echo $p_image3; ?>" alt="<?php echo $p_image3; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Product Price</label>
							<div class="col-md-6">
								<input type="text" name="product_price" class="form-control" required value="<?php echo $p_price; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Product Keywords</label>
							<div class="col-md-6">
								<input type="text" name="product_keywords" class="form-control" required value="<?php echo $p_keywords; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Product Description</label>
							<div class="col-md-6">
								<textarea name="product_desc" cols="19" rows="6" class="form-control"><?php echo $p_desc; ?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label"></label>
							<div class="col-md-6">
								<input type="submit" value="Edit Product" name="update" class="btn btn-primary form-control">
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

		$update_product = "update procloth set cat_id = '$cat', brand_id = '$brand', date = NOW(), product_title = '$product_title', product_img1 = '$product_img1', product_img2 = '$product_img2', product_img3 = '$product_img3', product_keywords = '$product_keywords', product_desc = '$product_desc', product_price = '$product_price' where product_id = '$p_id'";
		$run_update = mysqli_query($con, $update_product);
		if ($run_update) {
			echo "<script>alert('Product has been updated successfully')</script>";
			echo "<script>window.open('index.php?view_products', '_self')</script>";
		}
	}
?>

<?php  
	}
?>