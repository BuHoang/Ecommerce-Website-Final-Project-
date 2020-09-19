<?php
	session_start();
	include("includes/db.php");
	
	if (!isset($_SESSION['admin_email'])){
		echo "<script>window.open('login.php', '_self')</script>";
	}
	else{
		$admin_session = $_SESSION['admin_email'];
		$get_admin = "select * from admins where admin_email = '$admin_session'";
		$run_admin = mysqli_query($con, $get_admin);
		$row_admin = mysqli_fetch_array($run_admin);
		$admin_id = $row_admin['admin_id'];
		$admin_name = $row_admin['admin_name'];
		$admin_email = $row_admin['admin_email'];
		$admin_image = $row_admin['admin_image'];
		$admin_country = $row_admin['admin_country'];
		$admin_about = $row_admin['admin_about'];
		$admin_phone = $row_admin['admin_phone'];
		$admin_job = $row_admin['admin_job'];
		$get_products = "select * from procloth";
		$run_products = mysqli_query($con, $get_products);
		$count_products = mysqli_num_rows($run_products);
		$get_customers = "select * from customers";
		$run_customers = mysqli_query($con, $get_customers);
		$count_customers = mysqli_num_rows($run_customers);
		$get_categories = "select * from categories";
		$run_categories = mysqli_query($con, $get_categories);
		$count_categories = mysqli_num_rows($run_categories);
		$get_pending_orders = "select * from pending_orders";
		$run_pending_orders = mysqli_query($con, $get_pending_orders);
		$count_pending_orders = mysqli_num_rows($run_pending_orders);
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <script src="js/jquery-331.min.js"></script>
    <script>
    	$(document).ready(function(){
    		$("#user_query").on("keyup", function() {
    			var value = $(this).val().toLowerCase();
    			$(".table tr").filter(function() {
    				$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    			});
    		});
    	});
    </script>
	<title>Admin Panel</title>
</head>
<body>
	<style type="text/css">
		body{
			margin-top: 100px;
		}

		#wrapper{
			padding-left: 0px;
		}

		#page-wrapper{
			width: 100%;
			padding: 0;
			background-color: #F8F8F8;
		}

		@media(min-width: 768px){
			body{
				margin-top: 50px;
			}

			#wrapper{
				padding-left: 255px;
			}

			#page-wrapper{
				padding: 10px;
			}
		}

		/* top navigation */
		.top-nav{
			top: 0; 
			right: 15px;
		}

		.top-nav > li{
			float: left;
			display: inline-block;
		}

		.top-nav > li > a{
			color: #999;
			line-height: 20px;
			padding-top: 15px;
			padding-bottom: 15px;
		}

		.top-nav > li > a:hover, .top-nav > li > a:focus{
			color: #5CCEE9;
		}

		/* sidebar */
		@media(min-width: 768px){
			.side-nav{
				position: fixed;
				top: 51px;
				bottom: 0;
				width: 255px;
				overflow-x: hidden;
				overflow-y: auto;
				background-color: #222;
				padding-bottom: 40px;
				border-radius: 0;
			}

			.side-nav > li > a{
				width: 255px;
			}

			.side-nav > li > a:hover, .side-nav > li > a:focus{
				outline: none;
				background-color: #000;
			}
		}

		.side-nav > li >ul {
			padding: 0;
		}

		.side-nav > li > ul > li > a{
			padding: 10px 15px 10px 38px;
			text-decoration: none;
			color: #999;
			display: block;
		}

		.side-nav > li > ul > li > a:hover{
			color: #fff;
		}

		/* dashboard.php */
		.huge{
			font-size: 40px;
			line-height: normal;
		}

		.panel-green{
			border-color: #1AFD59;
		}

		.panel-green > .panel-heading{
			color: white;
			background-color: #1AFD59;
		}

		.panel-green > a{
			color: #1AFD59;
		}

		.panel-green > a:hover{
			color: #196321;
		}

		.panel-yellow{
			border-color: #FCE570;
		}

		.panel-yellow > .panel-heading{
			color: white;
			background-color: #FCE570;
		}

		.panel-yellow > a{
			color: #FCE570;
		}

		.panel-yellow > a:hover{
			color: #D4AD13;
		}

		.panel-red{
			border-color: #FA5151;
		}

		.panel-red > .panel-heading{
			color: white;
			background-color: #FA5151;
		}

		.panel-red > a{
			color: #FA5151;
		}

		.panel-red > a:hover{
			color: #B12525;
		}

		.thumb-info{
			position: relative;
		}

		.rounded{
			border-radius: 10px;
		}

		hr{
			border: 0;
			height: 1px;
			margin: 10px 0px 10px 0px;
		}

		hr.dotted{
			border-bottom: 2px black dotted;
			height: 0px;
			margin: 10px 0px 10px 0px;
		}

		.thumb-info .thumb-info-title{
			background: rgba(36, 27, 28, .9);
			bottom: 10%;
			color: white;
			font-size: 18px;
			font-weight: 600;
			left: 0;
			letter-spacing: -1px;
			padding: 9px 11px 9px;
			position: absolute;
			text-transform: uppercase;
		}

		.thumb-info .thumb-info-inner{
			display: block;
		}

		.thumb-info .thumb-info-type{
			background: #2D6AFA;
			display: inline-block;
			border-radius: 2px;
			float: left;
			font-size: 12px;
			font-weight: 400;
			letter-spacing: 0;
			margin: 8px -2px -15px -2px;
			padding: 2px 9px;
			text-transform: none;
		}

		.widget-content-expanded{
			font-size: 15px;
		}

		.widget-content-expanded span{
			font-weight: 600;
		}

		.widget-content-expanded i{
			color: #2D6AFA;
			margin-right: 5px;
		}
	</style>
	<div id="wrapper">
		<?php  
			include("includes/sidebar.php");
		?>
		<div id="page-wrapper">
			<div class="container-fluid">
				<?php  
					if (isset($_GET['dashboard'])) {
						include("dashboard.php");
					}
					if (isset($_GET['insert_product'])) {
						include("insert_product.php");
					}
					if (isset($_GET['view_products'])) {
						include("view_products.php");
					}
					if (isset($_GET['delete_product'])) {
						include("delete_product.php");
					}
					if (isset($_GET['edit_product'])) {
						include("edit_product.php");
					}
					if (isset($_GET['insert_cat'])) {
						include("insert_cat.php");
					}
					if (isset($_GET['view_cats'])) {
						include("view_cats.php");
					}
					if (isset($_GET['delete_cat'])) {
						include("delete_cat.php");
					}
					if (isset($_GET['edit_cat'])) {
						include("edit_cat.php");
					}
					if (isset($_GET['insert_brand'])) {
						include("insert_brand.php");
					}
					if (isset($_GET['view_brands'])) {
						include("view_brands.php");
					}
					if (isset($_GET['delete_brand'])) {
						include("delete_brand.php");
					}
					if (isset($_GET['edit_brand'])) {
						include("edit_brand.php");
					}
					if (isset($_GET['insert_slide'])) {
						include("insert_slide.php");
					}
					if (isset($_GET['view_slides'])) {
						include("view_slides.php");
					}
					if (isset($_GET['delete_slide'])) {
						include("delete_slide.php");
					}
					if (isset($_GET['edit_slide'])) {
						include("edit_slide.php");
					}
					if (isset($_GET['view_customers'])) {
						include("view_customers.php");
					}
					if (isset($_GET['delete_customer'])) {
						include("delete_customer.php");
					}
					if (isset($_GET['view_orders'])) {
						include("view_orders.php");
					}
					if (isset($_GET['delete_order'])) {
						include("delete_order.php");
					}
					if (isset($_GET['view_payments'])) {
						include("view_payments.php");
					}
					if (isset($_GET['delete_payment'])) {
						include("delete_payment.php");
					}
					if (isset($_GET['view_users'])) {
						include("view_users.php");
					}
					if (isset($_GET['delete_user'])) {
						include("delete_user.php");
					}
					if (isset($_GET['insert_user'])) {
						include("insert_user.php");
					}
					if (isset($_GET['user_profile'])) {
						include("user_profile.php");
					}
				?>
			</div>
		</div>
	</div>
	
	<script src="js/bootstrap-337.min.js"></script>
</body>
</html>

<?php  
	}
?>