<?php
	session_start();
	if (!isset($_SESSION['customer_email'])) {
		echo "<script>window.open('../checkout.php', '_self')</script>";
	}
	else{

	include("includes/db.php");
	include("functions/functions.php");

	if (isset($_GET['order_id'])) {
		$order_id = $_GET['order_id'];
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style/main.css">
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
	<title>Online fashion clothing store</title>
</head>
<body>
	<style type="text/css">
		body{
			font-size: 14px;
			
			color: black;
			background: #f0f0f0;
			overflow-x: hidden;
		}

		/* top */
		#top{
			background: #555555;
			padding: 10px 0;
		}

		@media(max-width: 990px){
			#top{
				font-size: 14px;
				text-align: center;
			}
		}

		#top .offer{
			color: #ffffff;
		}

		#top .offer .btn{
			text-transform: uppercase;
		}

		@media(max-width: 990px){
			#top .offer{
				margin-bottom: 10px;
			}
		}

		#top a{
			color: #ffffff;
		}

		#top ul.menu{
			padding-top: 5px;
			margin: 0px;
			text-align: right;
			font-size: 14px;
			list-style: none;
		}

		@media(max-width: 990px){
			#top ul.menu{
				text-align: center;
			}
		}

		#top ul.menu > li{
			display: inline-block;
		}

		#top ul.menu > li a{
			color: #eeeeee;
		}

		#top ul.menu > li + li:before{
			content: "|\00a0";
			color: #f7f7f7;
			padding: 0 5px;
		}

		/* navbar */
		.navbar{
			background: #ffffff;
		}

		.navbar-collapse .right{
			float: right;
		}

		.navbar-brand{
			float: left;
			padding: 10px 15px;
			font-size: 20px;
			line-height: 20px;
			height: 70px;
		}

		.navbar-brand:hover,
		.navbar-brand:focus{
			text-decoration: none;
		}

		.navbar ul.nav > li > a:hover{
			background: #e7e7e7;
		}

		.padding-nav{
			padding-top: 10px;
		}

		#search .navbar-form{
			float: right;
		}

		#search{
			clear: both;
			text-align: right;
		}

		#search .navbar-form .input-group{
			display: table;
		}

		#search .navbar-form .input-group .form-control{
			width: 100%;
		}

		#slider{
			margin-bottom: 40px;
		}

		/* advantages */
		#advantages{
			text-align: center;
		}

		#advantages .box{
			height: auto;
			background: white;
			margin: 0 0 30px;
			border: solid 1px #e6e6e6;
			box-sizing: border-box;
			padding: 20px;
			box-shadow: 0px 2px 5px rgba(0, 0, 0, .3);
		}

		#advantages .box .icon{
			font-size: 80px;
			width: 100%;
			height: 100%;
			color: #3D75E5;
			top: auto;
			float: left;
			box-sizing: border-box;
		}

		#advantages .box h3{
			position: relative;
			margin: 0 0 20px;
			font-weight: 300;
			text-transform: uppercase;
		}

		#advantages .box h3 a{
			color: #3EB1BA;
		}

		#advantages .box h3 a:hover{
			text-decoration: none;
		}

		/* ho t*/
		#hot h2{
			font-size: 35px;
			font-weight: 400;
			color: #3EB1BA;
			text-align: center;
			text-transform: uppercase;
		}

		.box{
			height: auto;
			background: white;
			margin: 0 0 30px;
			border: solid 1px #e6e6e6;
			box-sizing: border-box;
			padding: 20px;
			box-shadow: 0px 2px 5px rgba(0, 0, 0, .3);
		}

		/* content */
		#content{
			padding-left: 25px;
		}

		.single{
			width: 290px;
		}

		@media(max-width: 768px){
			.single{
				width: 60%;
				margin: 0 auto;
			}
		}

		#content .product{
			background: #ffffff;
			border: solid 1px #e6e6e6;
			margin-bottom: 30px;
			box-sizing: border-box;
		}

		#content .product .text{
			padding: 10px 10px 0;
		}

		#content .product .text p.price{
			font-size: 18px;
			text-align: center;
			font-weight: 400;
		}

		#content .product .text .button{
			text-align: center;
			clear: both;
		}

		#content .product .text h3{
			text-align: center;
			font-size: 20px;
		}

		#content .product .text h3 a{
			color: rgb(85, 85, 85);
		}

		/* breadcrumb */
		.breadcrumb{
			padding: 8px 15px;
			margin-bottom: 20px;
			background: #ffffff;
			border-radius: 5px;
			box-shadow: 0px 1px 5px rgba(0, 0, 0, .5);
		}

		.breadcrumb> li + li:before{
			content: ">\00a0";
			color: #cccccc;
		}

		@media(max-width: 991px){
			.breadcrumb{
				padding: 8px 0px;
				text-align: center;
			}
		}

		/* Categories */
		#content .panel.sidebar-menu{
			box-sizing: border-box;
			box-shadow: 0px 1px 5px rgba(0, 0, 0, .2);
		}

		#content .panel.sidebar-menu h3{
			padding-top: 5px;
			margin: 0px;
		}

		#content .panel.sidebar-menu ul.nav.category-menu{
			margin-bottom: 20px;
		}

		#content .panel.sidebar-menu ul.nav.category-menu li a{
			text-transform: uppercase;
			font-weight: 600;
		}

		/* Shop - product */
		@media(max-width: 768px){
			.center-responsive{
				width: 70%;
				margin: 0px auto;
			}
		}

		@media(max-width: 550px){
			.center-responsive{
				width: 95%;
				margin: 0px auto;
			}
		}

		/* Details.php */
		#content #productMain{
			margin-bottom: 30px;
		}

		#content #productMain .price{
			font-size: 30px;
			font-weight: 300;
			text-align: center;
			margin-top: 30px;
		}

		#content #mainImage{
			box-shadow: 0px 1px 5px rgba(0, 0, 0, .7);
		}

		#content #thumbs a{
			display: block;
			box-shadow: 0px 1px 5px rgba(0, 0, 0, .5);
			border: 2px solid transparent;
		}

		#content .headline{
			height: 305px;
		}

		/* cart.php */
		#content #cart .table tbody tr td{
			vertical-align: middle;
		}

		#content #cart .table tbody tr td input{
			width: 40px;
			text-align: right;
		}

		#content #cart .table tfoot{
			font-size: 18px;
		}

		.box .box-footer{
			background-color: #f7f7f7;
			margin: 30px -20px 20px;
			padding: 20px;
			border-top: 1px solid #eeeeee;
		}

		.box .box-footer:before,
		.box .box-footer:after{
			content: "";
			display: table;
		}

		.box .box-footer:after{
			clear: both;
		}

		.box .box-header{
			background-color: #f7f7f7;
			margin: -20px -20px 20px;
			padding: 20px;
			border-top: 1px solid #eeeeee;
		}

		#content #order-summary table{
			margin-top: 20px;
		}

		#content #order-summary table td{
			color: #999999;
		}

		#content #order-summary table tr.total td,
		#content #order-summary table tr.total th{
			font-size: 18px;
			color: #555555;
			font-weight: 700;
		}

		/* Footer */
		#footer{
			background: silver;
			padding: 10px 0;
		}

		#footer a{
			color: #4F4B4B;
			padding: 0px;
			text-decoration: none;
		}

		#footer a:hover{
			color: black;
		}

		#footer ul{
			list-style: none;
			padding-left: 0px;
		}

		#footer .social{
			text-align: left;
		}

		#footer .social a{
			width: 30px;
			height: 30px;
			margin-right: 10px;
			display: inline-block;
			color: white;
			border-radius: 15px;
			line-height: 30px;
			font-size: 15px;
			text-align: center;
			background: #484545;
			text-decoration: none;
		}
	</style>
	<div id="top">
		<div class="container">
			<div class="col-md-6 offer">
				<a href="#" class="btn btn-success btn-sm">
					<?php
						if (!isset($_SESSION['customer_email'])) {
							echo "Welcome: Customer";
						}
						else{
							echo "Welcome: " . $_SESSION['customer_email'] . "";
						}
					?>
				</a>
				<a href="checkout.php"><?php items(); ?> items in your cart | total price: <?php total_price(); ?></a>
			</div>
			<div class="col-md-6">
				<ul class="menu">
					<li><a href="../customer_register.php">Register</a></li>
					<li><a href="my_account.php">My account</a></li>
					<li><a href="../cart.php">Shopping cart</a></li>
					<li>
						<a href="../checkout.php">
							<?php
								if (!isset($_SESSION['customer_email'])) {
									echo "<a href='checkout.php'>Login</a>";
								}
								else{
									echo "<a href='logout.php'>Logout</a>";
								}
							?>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div id="navbar" class="navbar navbar-default">
		<div class="container">
			<div class="navbar-header">
				<a href="index.php" class="navbar-brand home">
					<img src="images/logov1.png" alt="autoshop logo" class="hidden-xs">
					<img src="images/logov2.png" alt="autoshop mobile logo" class="visible-xs">
				</a>
				<button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
					<span class="sr-only">Toggle navigation</span>
					<i class="fa fa-align-justify"></i>
				</button>
				<button class="navbar-toggle" data-toggle="collapse" data-target="#search">
					<span class="sr-only">Toggle search</span>
					<i class="fa fa-search"></i>
				</button>
			</div>
			<div class="navbar-collapse collapse" id="navigation">
				<div class="padding-nav">
					<ul class="nav navbar-nav left">
						<li><a href="../index.php">Home</a></li>
						<li><a href="../shop.php">Shop</a></li>
						<li class="active"><a href="my_account.php">My account</a></li>
						<li><a href="../cart.php">Shopping cart</a></li>
						<li><a href="../contact.php">Contact me</a></li>
					</ul>
				</div>
				<a href="../cart.php" class="btn navbar-btn btn-primary right">
					<i class="fa fa-shopping-cart"></i>
					<span><?php items(); ?> items in your cart</span>
				</a>
				<div class="navbar-collapse collapse right">
					<button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target="#search">
						<span class="sr-only">Toggle search</span>
						<i class="fa fa-search"></i>
					</button>
				</div>
				<div class="collapse clearfix" id="search">
					<form method="get" action="result.php" class="navbar-form">
						<div class="input-group">
							<input type="text" class="form-control" name="user_query" placeholder="Search your clothes" required>
							<span class="input-group-btn">
								<button type="submit" name="search" value="Search" class="btn btn-primary">
									<i class="fa fa-search"></i>
								</button>
							</span>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<div id="content">
		<div class="container">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li><a href="index.php">Home</a></li>
					<li>My account</li>
				</ul>
			</div>
			<div class="col-md-3">
				<?php
					include("includes/sidebar.php");
				?>
			</div>
			<div class="col-md-9">
				<div class="box">
					<h1 align="center">Please confirm your payment</h1>
					<form action="confirm.php?update_id=<?php echo $order_id; ?>" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label>Invoice No</label>
							<input type="text" class="form-control" name="invoice_no" required>
						</div>
						<div class="form-group">
							<label>Amount Sent</label>
							<input type="text" class="form-control" name="amount_sent" required>
						</div>
						<div class="form-group">
							<label>Select Payment Method</label>
							<select name="payment_method" class="form-control">
								<option>Select Payment Method</option>
								<option>PayPal</option>
								<option>Credit Card</option>
								<option>Offline</option>
								<option>Alipay</option>
							</select>
						</div>
						<div class="form-group">
							<label>Transaction / Reference ID</label>
							<input type="text" class="form-control" name="ref_no" required>
						</div>
						<div class="form-group">
							<label>Payment Date</label>
							<input type="text" class="form-control" name="date" required>
						</div>
						<div class="text-center">
							<button class="btn btn-success btn-lg" name="confirm_payment">Confirm Payment</button>
						</div>
					</form>
					<?php  
						if (isset($_POST['confirm_payment'])) {
							$update_id = $_GET['update_id'];
							$invoice_no = $_POST['invoice_no'];
							$amount_send = $_POST['amount_sent'];
							$payment_method = $_POST['payment_method'];
							$ref_no = $_POST['ref_no'];
							$payment_date = $_POST['date'];
							$complete = "Completed";
							$insert_payment = "insert into payments (invoice_no, amount_send, payment_method, ref_no, payment_date) values ('$invoice_no', '$amount_send', '$payment_method', '$ref_no', '$payment_date')";
							$run_payment = mysqli_query($con, $insert_payment);
							$update_customer_order = "update customer_orders set order_status = '$complete' where order_id = '$update_id'";
							$run_customer_order = mysqli_query($con, $update_customer_order);
							$update_pending_order = "update pending_orders set order_status = '$complete' where order_id = '$update_id'";
							$run_pending_order = mysqli_query($con, $update_pending_order);
							if ($run_pending_order) {
								echo "<script>alert('Thank you for your purchase, Your orders will be completed soon')</script>";
								echo "<script>window.open('my_account.php?my_orders', '_self')</script>";
							}
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

<?php  
	}
?>