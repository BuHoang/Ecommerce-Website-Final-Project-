<?php 
	$active = 'Cart';
	include("includes/header.php");
?>

<?php  
	$product_id = $_GET['pro_id'];
    $get_product = "select * from procloth where product_id='$product_id'";
    $run_product = mysqli_query($con,$get_product);
    $check_product = mysqli_num_rows($run_product);
    if($check_product == 0){
        echo "<script>window.open('index.php','_self')</script>";
    }
    else{
    	$row_products = mysqli_fetch_array($run_product);
    	$cat_id = $row_products['cat_id'];
    	$pro_title = $row_products['product_title'];
    	$pro_price = $row_products['product_price'];
    	$pro_desc = $row_products['product_desc'];
    	$pro_img1 = $row_products['product_img1'];
    	$pro_img2 = $row_products['product_img2'];
    	$pro_img3 = $row_products['product_img3'];
    }
    $get_cat = "select * from categories where cat_id='$cat_id'";  
    $run_cat = mysqli_query($con,$get_cat);  
    $row_cat = mysqli_fetch_array($run_cat);  
    $cat_title = $row_cat['cat_title'];
?>

	<div id="content">
		<div class="container">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li><a href="index.php">Home</a></li>
					<li>Shop</li>
					<li>
						<a href="shop.php?cat=<?php echo $cat_id; ?>"><?php echo $cat_title; ?></a>
					</li>
					<li><?php echo $pro_title; ?></li>
				</ul>
			</div>
			<div class="col-md-3">
				<?php
					include("includes/sidebar.php");
				?>
			</div>
			<div class="col-md-9">
				<div id="productMain" class="row">
					<div class="col-sm-6">
						<div id="mainImage">
							<div id="myCarousel" class="carousel slide" data-ride="carousel" style="height: 500px;">
								<ol class="carousel-indicators">
									<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
									<li data-target="#myCarousel" data-slide-to="1"></li>
									<li data-target="#myCarousel" data-slide-to="2"></li>
								</ol>
								<div class="carousel-inner">
									<div class="item active">
										<center><img class="img-responsive" style="height: 500px;" src="admin_panel/product_images/<?php echo $pro_img1; ?>" alt="Product 1"></center>
									</div>
									<div class="item">
										<center><img class="img-responsive" style="height: 500px;" src="admin_panel/product_images/<?php echo $pro_img2; ?>" alt="Product 1.2"></center>
									</div>
									<div class="item">
										<center><img class="img-responsive" style="height: 500px;" src="admin_panel/product_images/<?php echo $pro_img3; ?>" alt="Product 1.3"></center>
									</div>
								</div>
								<a href="#myCarousel" class="left carousel-control" data-slide="prev">
									<span class="glyphicon glyphicon-chevron-left"></span>
									<span class="sr-only">Previous</span>
								</a>
								<a href="#myCarousel" class="right carousel-control" data-slide="next">
									<span class="glyphicon glyphicon-chevron-right"></span>
									<span class="sr-only">Next</span>
								</a>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="box">
							<h1 class="text-center"><?php echo $pro_title; ?></h1>

							<form class="form-horizontal" method="post">
								<div class="form-group">
									<label for="" class="col-md-5 control-label">Clothes Quantity</label>
									<div class="col-md-7">
										<select name="product_qty" id="" class="form-control">
											<option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
											<option>5</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-5 control-label">Clothes size</label>
									<div class="col-md-7">
										<select name="product_size" class="form-control" required>
											<option disabled selected>Select a size</option>
											<option>Large</option>
											<option>Medium</option>
											<option>Small</option>
										</select>
									</div>
								</div>
								<p class="price">$<?php echo $pro_price; ?></p>
								<p class="text-center buttons"><button type="submit" name="add_cart" class="btn btn-success i fa fa-shopping-cart"> Add to cart</button></p>
							</form>
							<?php  
								if (isset($_POST['add_cart'])) {
									$ip_add = getRealIpUser();
									$pro_id = $row_products['product_id'];
									$p_id = $pro_id;
									$product_qty = $_POST['product_qty'];
									$product_size = $_POST['product_size'];
									$check_product = "select * from cart where ip_add = '$ip_add' AND p_id = '$p_id'";
									$run_check = mysqli_query($db, $check_product);
									if (mysqli_num_rows($run_check)>0) {
										echo "<script>alert('This clothing product has already added in cart')</script>";
										echo "<script>window.open('Details.php?pro_id=$p_id','_self')</script>";
									}
									else{
										$query = "insert into cart (p_id, ip_add, qty, size) values ('$p_id', '$ip_add', '$product_qty', '$product_size')";
										$run_query = mysqli_query($db, $query);
										echo "<script>alert('This clothing product has already added in cart')</script>";
										echo "<script>window.open('Details.php?pro_id=$p_id','_self')</script>";
									}
								}
							?>
						</div>
						<div class="row" id="thumbs">
							<div class="col-xs-4">
								<a data-target="#myCarousel" data-slide-to="0" class="thumb">
									<img src="admin_panel/product_images/<?php echo $pro_img1; ?>" alt="product 2" class="img-responsive">
								</a>
							</div>
							<div class="col-xs-4">
								<a data-target="#myCarousel" data-slide-to="1" class="thumb">
									<img src="admin_panel/product_images/<?php echo $pro_img2; ?>" alt="product 3" class="img-responsive">
								</a>
							</div>
							<div class="col-xs-4">
								<a data-target="#myCarousel" data-slide-to="2" class="thumb">
									<img src="admin_panel/product_images/<?php echo $pro_img3; ?>" alt="product 4" class="img-responsive">
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="box" id="Details">
					<h4>Clothes Details</h4>
					<p><?php echo $pro_desc; ?></p>
					<h4>Size</h4>
					<ul>
						<li>Large</li>
						<li>Medium</li>
						<li>Small</li>
					</ul>
					<hr>
				</div>
				<div id="row same-height-row">
					<div class="col-md-3 col-sm-6">
						<div class="box same-height headline">
							<h3 class="text-center">Clothes you may like</h3>
						</div>
					</div>
					<?php  
						$get_products = "select * from procloth order by rand() LIMIT 0,3";
						$run_products = mysqli_query($con, $get_products);
						while ($row_products = mysqli_fetch_array($run_products)) {
							$pro_id = $row_products['product_id'];
							$pro_title = $row_products['product_title'];
							$pro_img1 = $row_products['product_img1'];
							$pro_price = $row_products['product_price'];
							echo "
								<div class = 'col-md-3 col-sm-6 center-responsive'>
									<div class = 'product same-height'>
										<a href = 'Details.php?pro_id=$pro_id'>
											<img class='img-responsive' src = 'admin_panel/product_images/$pro_img1'>
										</a>
										<div class = 'text'>
											<h3><a href = 'Details.php?pro_id=$pro_id'>$pro_title</a></h3>
											<p class = 'price'>$$pro_price</p>
										</div>
									</div>	
								</div>
							";
						}
					?>
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