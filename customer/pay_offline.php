<center>
	<h1>Pay Offline Information</h1>
	<p class="text-muted">Please <a href="../contact.php">contact me</a> when having any questions or problems. My customer service works <strong>24/7</strong></p>
</center>
<div class="table-responsive">
	<table class="table table-bordered table-hover table-striped">
		<thead>
			<tr>
				<th>No</th>
				<th>Invoice No</th>
				<th>Amount Paid</th>
				<th>Payment Method</th>
				<th>Reference No</th>
				<th>Payment Date</th>
			</tr>
		</thead>
		<tbody>
			<?php  
				$customer_session = $_SESSION['customer_email'];
				$get_customer = "select * from customers where customer_email = '$customer_session'";
				$run_customer = mysqli_query($con, $get_customer);
				$row_customer = mysqli_fetch_array($run_customer);
				$customer_id = $row_customer['customer_id'];
				$get_order = "select * from customer_orders where customer_id = '$customer_id'";
				$run_order = mysqli_query($con, $get_order);
				$row_order = mysqli_fetch_array($run_order);
				$invoice_no = $row_order['invoice_no'];
				$get_payments = "select * from payments where invoice_no = '$invoice_no'";
				$run_payments = mysqli_query($con, $get_payments);
				$i=0;
				while ($row_payments=mysqli_fetch_array($run_payments)) {
					$payment_id = $row_payments['payment_id'];
					$invoice_no = $row_payments['invoice_no'];
					$amount_send = $row_payments['amount_send'];
					$payment_method = $row_payments['payment_method'];
					$ref_no = $row_payments['ref_no'];
					$payment_date = $row_payments['payment_date'];
					$i++;
				
			?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $invoice_no; ?></td>
				<td><?php echo $amount_send; ?></td>
				<td><?php echo $payment_method; ?></td>
				<td><?php echo $ref_no; ?></td>
				<td><?php echo $payment_date; ?></td>
			</tr>
			<?php  
				}
			?>
		</tbody>
	</table>
</div>