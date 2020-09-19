<?php
	session_start();

	include("includes/db.php");
	include("functions/functions.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/bootstrap-337.min.css">
	<link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <title>Paypal Payment</title>
</head>
<body style="background:#E1E1E1">
<style type="text/css">
	.price.panel-red>.panel-heading {
		color: #fff;
		background-color: #D04E50;
		border-color: #FF6062;
		border-bottom: 1px solid #FF6062;
	}

	.price.panel-red>.panel-body {
		color: #fff;
		background-color: #EF5A5C;
	}

	.price .list-group-item{
		border-bottom-:1px solid rgba(250,250,250, .5);
	}

	.panel.price .list-group-item:last-child {
		border-bottom-right-radius: 0px;
		border-bottom-left-radius: 0px;
	}

	.panel.price .list-group-item:first-child {
		border-top-right-radius: 0px;
		border-top-left-radius: 0px;
	}

	.price .panel-footer {
		color: #fff;
		border-bottom:0px;
		background-color:  rgba(0,0,0, .1);
		box-shadow: 0px 3px 0px rgba(0,0,0, .3);
	}
	
	.panel.price .btn{
		box-shadow: 0 -1px 0px rgba(50,50,50, .2) inset;
		border:0px;
	}
</style>
<?php
	$paypalUrl = 'https://www.sandbox.paypal.com/cgi-bin/webscr';
	$paypalId = 'buihoang22101999@gmail.com';
?>



<div class="container">
	<br/>
	<h2 class="text-center"><strong>Paypal Payment Gateway</strong></h2>
	<br/>
	<?php
		$ip_add = getRealIpUser();
		$select_cart = "select * from cart where ip_add='$ip_add'";
		$run_cart = mysqli_query($con, $select_cart);
		
		$total = 0;
		while ($row_cart = mysqli_fetch_array($run_cart)) {
			$pro_id = $row_cart['p_id'];
			$pro_size = $row_cart['size'];
			$pro_qty = $row_cart['qty'];
			$get_products = "select * from procloth where product_id = '$pro_id'";
			$run_products = mysqli_query($con, $get_products);
			while ($row_products = mysqli_fetch_array($run_products)) {
				$product_title = $row_products['product_title'];
				$product_img1 = $row_products['product_img1'];
				$only_price = $row_products['product_price'];
				$sub_total = $row_products['product_price'] * $pro_qty;
				$total += $sub_total;
			}

	?>
	<div class="col">
		<div class="col-md-3 col-sm-6">
			<form action="<?php echo $paypalUrl; ?>" method="post" name="frmPayPal1">
				
				<input type="hidden" name="business" value="<?php echo $paypalId; ?>">
				<input type="hidden" name="cmd" value="_xclick">
				<input type="hidden" name="item_name" value="<?php echo $product_title; ?>">
				<input type="hidden" name="item_number" value="<?php echo $pro_qty; ?>">
				<input type="hidden" name="amount" value="<?php echo $sub_total; ?>">
				<input type="hidden" name="currency_code" value="USD">
				<input type="hidden" name="cancel_return" value="http://localhost/Project2/cancel.php">
				<input type="hidden" name="return" value="http://localhost/Project2/success.php">  
	
				<div class="panel price panel-red">	
					<div class="panel-heading  text-center">
						<h3><?php echo $product_title; ?></h3>
					</div>
					<div class="panel-body text-center">
						<p class="lead" style="font-size:40px"><strong>Total: $<?php echo $sub_total; ?></strong></p>
					</div>
					<ul class="list-group list-group-flush text-center">
						<li class="list-group-item"><img class="img-responsive" src="admin_panel/product_images/<?php echo $product_img1; ?>"></li>
						<li class="list-group-item"><i class="icon-ok text-danger"></i>Quantity: <?php echo $pro_qty; ?></li>
						<li class="list-group-item"><i class="icon-ok text-danger"></i>Size: <?php echo $pro_size; ?></li>
						<li class="list-group-item"><i class="icon-ok text-danger"></i>Price: $<?php echo $only_price; ?></li>
					</ul>
					<div class="panel-footer">
						<button class="btn btn-lg btn-block btn-danger" href="#">BUY NOW</button>
					</div>
				</div>
			</form>			
		</div>
	</div>
	<?php	
		}
	?>
</div>
</body>
</html>