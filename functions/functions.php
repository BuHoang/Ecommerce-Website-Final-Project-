<?php  
	$db = mysqli_connect("localhost", "root", "", "fashion_store");


	//getRealIpUser function
	function getRealIpUser(){
		switch(true){
			case(!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
			case(!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
			case(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];

			default : return $_SERVER['REMOTE_ADDR'];
		}
	}

	// get Product function
	function getPro(){
		global $db;
		$get_products = "select * from procloth order by 1 DESC LIMIT 0,8";
		$run_products = mysqli_query($db, $get_products);
		while ($row_products = mysqli_fetch_array($run_products)) {
			$pro_id = $row_products['product_id'];
			$pro_title = $row_products['product_title'];
			$pro_price = $row_products['product_price'];
			$pro_img1 = $row_products['product_img1'];
			echo "
				<div class = 'col-md-4 col-sm-6 single'>
					<div class = 'product'>
						<a href = 'Details.php?pro_id=$pro_id'>
							<img class = 'img-responsive' src = 'admin_panel/product_images/$pro_img1'>
						</a>
						<div class = 'text'>
							<h3><a href = 'Details.php?pro_id=$pro_id'>$pro_title</a></h3>
							<p class = 'price'>$$pro_price</p>
							<p class = 'button'>
								<a class = 'btn btn-primary' href = 'Details.php?pro_id=$pro_id'>Detail</a>
								<a class = 'btn btn-success' href = 'Details.php?pro_id=$pro_id'>
									<i class = 'fa fa-shopping-cart'> Add to cart</i>
								</a>
							</p>
						</div>
					</div>
				</div>
			";
		}
	}

	// getCat function
	function getCats(){
		global $db;
		$get_cats = "select * from categories";
		$run_cats = mysqli_query($db, $get_cats);
		while ($row_cats = mysqli_fetch_array($run_cats)) {
			$cat_id = $row_cats['cat_id'];
			$cat_title = $row_cats['cat_title'];
			echo "
				<li><a href='shop.php?cat=$cat_id'>$cat_title</a></li>
			";
		}
	}

	// getBrand function
	function getBrands(){
		global $db;
		$get_brands = "select * from brands";
		$run_brands = mysqli_query($db, $get_brands);
		while ($row_brands = mysqli_fetch_array($run_brands)) {
			$brand_id = $row_brands['brand_id'];
			$brand_title = $row_brands['brand_title'];
			echo "
				<li><a href='shop.php?brand=$brand_id'>$brand_title</a></li>
			";
		}
	}

	//getcatpro function
	function getcatpro(){
		global $db;
		if (isset($_GET['cat'])) {
			$cat_id = $_GET['cat'];
			$get_cat = "select * from categories where cat_id='$cat_id'";
			$run_cat = mysqli_query($db, $get_cat);
			$row_cat = mysqli_fetch_array($run_cat);
			$cat_title = $row_cat['cat_title'];
			$cat_desc = $row_cat['cat_desc'];
			$get_products = "select * from procloth where cat_id='$cat_id'";
			$run_products = mysqli_query($db, $get_products);
			$count = mysqli_num_rows($run_products);
			if ($count==0) {
				echo "
					<div class='box'>
						<h1 align = 'center'>No clothing products found in this category</h1>
					</div>
				";
			}
			else{
				echo "
					<div class='box'>
						<h1>$cat_title</h1>
						<p>$cat_desc</p>
					</div>
				";
			}
			while ($row_products = mysqli_fetch_array($run_products)) {
				$pro_id = $row_products['product_id'];
				$pro_title = $row_products['product_title'];
				$pro_price = $row_products['product_price'];
				$pro_img1 = $row_products['product_img1'];

				echo "
					<div class = 'col-md-4 col-sm-6 center-responsive'>
						<div class = 'product'>
							<a href = 'Details.php?pro_id=$pro_id'>
								<img class = 'img-responsive' src = 'admin_panel/product_images/$pro_img1'>
							</a>
							<div class = 'text'>
								<h3><a href = 'Details.php?pro_id=$pro_id'>$pro_title</a></h3>
								<p class = 'price'>$$pro_price</p>
								<p class = 'button'>
									<a class = 'btn btn-primary' href = 'Details.php?pro_id=$pro_id'>Detail</a>
									<a class = 'btn btn-success' href = 'Details.php?pro_id=$pro_id'>
										<i class = 'fa fa-shopping-cart'> Add to cart</i>
									</a>
								</p>
							</div>
						</div>
					</div>
				";
			}
		}
	}

	//getbrandpro function
	function getbrandpro(){
		global $db;
		if (isset($_GET['brand'])) {
			$brand_id = $_GET['brand'];
			$get_brand = "select * from brands where brand_id='$brand_id'";
			$run_brand = mysqli_query($db, $get_brand);
			$row_brand = mysqli_fetch_array($run_brand);
			$brand_title = $row_brand['brand_title'];
			$brand_desc = $row_brand['brand_desc'];
			$get_brand = "select * from procloth where brand_id='$brand_id'LIMIT 0,6";
			$run_products = mysqli_query($db, $get_brand);
			$count = mysqli_num_rows($run_products);
			if ($count==0) {
				echo "
					<div class = 'box'>
						<h1 align = 'center'>No clothing products found in this brand</h1>
					</div>
				";
			}
			else{
				echo "
					<div class = 'box'>
						<h1>$brand_title</h1>
						<p>$brand_desc</p>
					</div>
				";
			}
			while ($row_products = mysqli_fetch_array($run_products)) {
				$pro_id = $row_products['product_id'];
				$pro_title = $row_products['product_title'];
				$pro_price = $row_products['product_price'];
				$pro_desc = $row_products['product_desc'];
				$pro_img1 = $row_products['product_img1'];

				echo "
					<div class = 'col-md-4 col-sm-6 center-responsive'>
						<div class = 'product'>
							<a href = 'Details.php?pro_id=$pro_id'>
								<img class = 'img-responsive' src = 'admin_panel/product_images/$pro_img1'>
							</a>
							<div class = 'text'>
								<h3><a href = 'Details.php?pro_id=$pro_id'>$pro_title</a></h3>
								<p class = 'price'>$$pro_price</p>
								<p class = 'button'>
									<a class = 'btn btn-primary' href = 'Details.php?pro_id=$pro_id'>Detail</a>
									<a class = 'btn btn-success' href = 'Details.php?pro_id=$pro_id'>
										<i class = 'fa fa-shopping-cart'> Add to cart</i>
									</a>
								</p>
							</div>
						</div>
					</div>
				";
			}
		}
	}

	//function on the number of items in the cart
	function items(){
		global $db;
		$ip_add = getRealIpUser();
		$get_items = "select * from cart where ip_add='$ip_add'";
		$run_items = mysqli_query($db, $get_items);
		$count_items = mysqli_num_rows($run_items);
		echo $count_items;
	}

	function total_price(){
		global $db;
		$ip_add = getRealIpUser();
		$total = 0;
		$select_cart = "select * from cart where ip_add='$ip_add'";
		$run_cart = mysqli_query($db, $select_cart);
		$i = 0;
		while ($record = mysqli_fetch_array($run_cart)) {
			$pro_id = $record['p_id'];
			$pro_qty = $record['qty'];
			$get_price = "select * from procloth where product_id = '$pro_id'";
			$run_price = mysqli_query($db, $get_price);
			while ($row_price = mysqli_fetch_array($run_price)) {
				$product_name = $row_price['product_title'];
				$sub_total = $row_price['product_price'] * $pro_qty;
				$total += $sub_total;
				$i++;
			}
		}
		echo "$" . $total;
	}
?>

