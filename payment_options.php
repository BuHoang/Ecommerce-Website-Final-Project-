<div class="box">
	<?php  
		$session_email = $_SESSION['customer_email'];
		$select_customer = "select * from customers where customer_email = '$session_email'";
		$run_customer = mysqli_query($con, $select_customer);
		$row_customer = mysqli_fetch_array($run_customer);
		$customer_id = $row_customer['customer_id'];
	?>
	<h1 class="text-center">Payment Options For you</h1>
	<p class="lead text-center">
		<a href="order.php?c_id=<?php echo $customer_id; ?>">Offline Payment
			<img class="img-responsive" src="images/offpay.png" alt="img-offpay" style="width: 800px">
		</a>
	</p>
	<center>
		<p class="lead">
			<a href="paypal_payment.php?c_id=<?php echo $customer_id; ?>">PayPal Payment
				<img class="img-responsive" src="images/paypal.png" alt="img-paypal">
			</a>
		</p>
	</center>
</div>