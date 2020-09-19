<?php

	if (!isset($_SESSION['admin_email'])){
		echo "<script>window.open('login.php', '_self')</script>";
	}
	else{
	
?>

<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-exl-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a href="index.php?dashboard" class="navbar-brand">Admin Panel</a>
	</div>
	<ul class="nav navbar-right top-nav">
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
				<img src="admin_images/<?php echo $admin_image; ?>" style="width: 30px; height: 25px; border-radius: 30px;"> <?php echo $admin_name; ?> <b class="caret"></b>
			</a>
			<ul class="dropdown-menu">
				<li><a href="index.php?user_profile=<?php echo $admin_id; ?>"><i class="fa fa-fw fa-user"></i> Profile</a></li>
				<li>
					<a href="index.php?view_products">
						<i class="fa fa-fw fa-product-hunt"></i> View Products
						<span class="badge"><?php echo $count_products; ?></span>
					</a>
				</li>
				<li>
					<a href="index.php?view_customers">
						<i class="fa fa-fw fa-users"></i> View Customers
						<span class="badge"><?php echo $count_customers; ?></span>
					</a>
				</li>
				<li>
					<a href="index.php?view_cats">
						<i class="fa fa-fw fa-list"></i> View Categories
						<span class="badge"><?php echo $count_categories; ?></span>
					</a>
				</li>
				<li class="divider"></li>
				<li>
					<a href="logout.php">
						<i class="fa fa-fw fa-sign-out"></i> Log out
					</a>
				</li>
			</ul>
		</li>
	</ul>
	<div class="collapse navbar-collapse navbar-exl-collapse">
		<ul class="nav navbar-nav side-nav">
			<li>
				<a href="index.php?dashboard">
					<i class="fa fa-fw fa-dashboard"></i> Dashboard
				</a>
			</li>
			<li>
				<a href="#" data-toggle="collapse" data-target="#products">
					<i class="fa fa-fw fa-tag"></i> Products
					<i class="fa fa-fw fa-caret-down"></i>
				</a>
				<ul id="products" class="collapse">
					<li>
						<a href="index.php?insert_product">Add Product</a>
					</li>
					<li>
						<a href="index.php?view_products">View Products</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="#" data-toggle="collapse" data-target="#cat">
					<i class="fa fa-fw fa-list"></i> Categories
					<i class="fa fa-fw fa-caret-down"></i>
				</a>
				<ul id="cat" class="collapse">
					<li>
						<a href="index.php?insert_cat">Add Category</a>
					</li>
					<li>
						<a href="index.php?view_cats">View Category</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="#" data-toggle="collapse" data-target="#brand">
					<i class="fa fa-fw fa-book"></i> Brands
					<i class="fa fa-fw fa-caret-down"></i>
				</a>
				<ul id="brand" class="collapse">
					<li>
						<a href="index.php?insert_brand">Add Brand</a>
					</li>
					<li>
						<a href="index.php?view_brands">View Brands</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="#" data-toggle="collapse" data-target="#slides">
					<i class="fa fa-fw fa-sliders"></i> Slides
					<i class="fa fa-fw fa-caret-down"></i>
				</a>
				<ul id="slides" class="collapse">
					<li>
						<a href="index.php?insert_slide">Add Slide</a>
					</li>
					<li>
						<a href="index.php?view_slides">View Slides</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="index.php?view_customers">
					<i class="fa fa-fw fa-users"></i> View Customers
				</a>
			</li>
			<li>
				<a href="index.php?view_orders">
					<i class="fa fa-fw fa-edit"></i> View Orders
				</a>
			</li>
			<li>
				<a href="index.php?view_payments">
					<i class="fa fa-fw fa-money"></i> View Payments
				</a>
			</li>
			<li>
				<a href="#" data-toggle="collapse" data-target="#users">
					<i class="fa fa-fw fa-users"></i> Admin Users
					<i class="fa fa-fw fa-caret-down"></i>
				</a>
				<ul id="users" class="collapse">
					<li>
						<a href="index.php?insert_user">Add User</a>
					</li>
					<li>
						<a href="index.php?view_users">View Users</a>
					</li>
					<li>
						<a href="index.php?user_profile=<?php echo $admin_id; ?>">Edit User Profile</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="logout.php">
					<i class="fa fa-fw fa-sign-out"></i> Log out
				</a>
			</li>
		</ul>
	</div>
</nav>

<?php  
	}
?>