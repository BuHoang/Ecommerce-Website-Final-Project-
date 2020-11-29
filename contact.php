<?php
	$active='Contact';  
	include("includes/header.php");
?>

	<div id="content">
		<div class="container">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li><a href="index.php">Home</a></li>
					<li>Contact me</li>
				</ul>
			</div>
			<div class="col-md-12">
				<div class="box">
					<div class="box-header">
						<center>
							<h2>Contact Me</h2>
							<p class="text-muted">Please <a href="contact.php">contact me</a> when having any questions or problems. My customer service works <strong>24/7</strong></p>
						</center>
						<form action="contact.php" method="post">
							<div class="form-group">
								<label>Name</label>
								<input type="text" class="form-control" name="name" required>
							</div>
							<div class="form-group">
								<label>Email</label>
								<input type="email" class="form-control" name="email" required>
							</div>
							<div class="form-group">
								<label>Problem</label>
								<input type="text" class="form-control" name="problem" required>
							</div>
							<div class="form-group">
								<label>Message</label>
								<textarea name="message" class="form-control"></textarea>
							</div>
							<div class="text-center">
								<button type="submit" name="submit" class="btn btn-primary">Send Message</button>
							</div>
						</form>
						<?php
							if (isset($_POST['submit'])) {
								//admin receives message
								$name = $_POST['name'];
								$email = $_POST['email'];
								$problem = $_POST['problem'];
								$message = $_POST['message'];
								$formcontent="From: $name \n Message: $message";
								$recipient = "hoang1835@gmail.com";
								$subject = "Contact to get help";
								$mailheader = "From: $email \r\n";

								if (mail($recipient, $subject, $formcontent, $mailheader)) {
									echo "<h2 align = 'center'>Your message has been sent successfully</h2>";
								}
								else{
									echo "<h2 align = 'center' style = 'color: red;'>Error! Your message was sent unsuccessfully</h2>";
								}
								
								//sendmail_path = "\"D:\xampp\sendmail\sendmail.exe\" -t" in php.ini

								//auth_username=hoang1835@gmail.com in sendmail.ini
								//auth_password=hoangpzo123
							}
						?>
					</div>
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