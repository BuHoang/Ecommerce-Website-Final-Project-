<?php
	session_start();

	include("includes/db.php");
	include("functions/functions.php");
?>

<?php  
	if (isset($_GET['c_id'])) {
		$customer_id = $_GET['c_id'];
		$c_email = "select * from customers where customer_id = '$customer_id'";
		$run_email = mysqli_query($con, $c_email);
		$row_email = mysqli_fetch_array($run_email);
		$customer_email = $row_email['customer_email'];
		$customer_name = $row_email['customer_name'];
	}
	$ip_add = getRealIpUser();
	$status = "Pending";
	$invoice_no = mt_rand();
	$select_cart = "select * from cart where ip_add = '$ip_add'";
	$run_cart = mysqli_query($con, $select_cart);
	while ($row_cart = mysqli_fetch_array($run_cart)) {
		$pro_id = $row_cart['p_id'];
		$pro_qty = $row_cart['qty'];
		$pro_size = $row_cart['size'];
		$get_products = "select * from procloth where product_id = '$pro_id'";
		$run_products = mysqli_query($con, $get_products);
		while ($row_products = mysqli_fetch_array($run_products)) {
			$sub_total = $row_products['product_price'] * $pro_qty;
			$insert_customer_order = "insert into customer_orders (customer_id, amount, invoice_no, qty, size, order_date, order_status) values ('$customer_id', '$sub_total', '$invoice_no', '$pro_qty', '$pro_size', NOW(), '$status')";
			$run_customer_order = mysqli_query($con, $insert_customer_order);
			$insert_pending_order = "insert into pending_orders (customer_id, invoice_no, product_id, qty, size, order_status) values ('$customer_id', '$invoice_no', '$pro_id', '$pro_qty', '$pro_size', '$status')";
			$run_pending_order = mysqli_query($con, $insert_pending_order);
			$delete_cart = "delete from cart where ip_add = '$ip_add'";
			$run_delete = mysqli_query($con, $delete_cart);
			echo "<script>alert('Your orders has been sent')</script>";
			echo "<script>window.open('customer/my_account.php?my_orders', '_self')</script>";
		}
	}

	$from = "hoang1835@gmail.com";
	$to = $customer_email;
	$subject = "Orders Detail";
	$message = "
		<center><h1>Your Orders Detail from hoang1835@gmail.com</h1></center>
		<div class = 'table-responsive'>
			<table class='table table-bordered table-hover table-striped'>
				<thead>
					<tr>
						<th>No</th>
						<th>Product Name</th>
						<th>Invoice No</th>
						<th>Quantity</th>
						<th>Total Price</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $product_name ?></td>
						<td><?php echo $invoice_no ?></td>
						<td><?php echo $pro_qty ?></td>
						<td><?php echo $total ?></td>
					</tr>
				</tbody>
			</table>
		</div>
	";
	mail($to, $subject, $message, $from);
?>