<div class="box">
	<div class="box-header">
		<center>
			<h1>Login</h1>
		</center>
	</div>
	<form method="post" action="checkout.php">
		<div class="form-group">
			<label>Email</label>
			<input type="text" name="c_email" class="form-control" required>
		</div>
		<div class="form-group">
			<label>Password</label>
			<input type="password" name="c_password" class="form-control" required>
		</div>
		<div class="text-center">
			<button name="login" value="login" class="btn btn-success" style="width: 100%; padding: 12px; display: inline-block;">Login</button>
		</div>
	</form>
	<center>
		<?php
			require_once 'vendor/autoload.php';

			$fb = new Facebook\Facebook([
				'app_id' => '301779017756389', 
  				'app_secret' => 'd3fc4b05a3c962f2a04672b6bd072a1b',
  				'default_graph_version' => 'v5.7',
  			]);
  		?>
  		<?php
			$facebook_output = '';
			$facebook_helper = $fb->getRedirectLoginHelper();

			if(isset($_GET['code']))
			{
				if(isset($_SESSION['access_token']))
				{
				  	$access_token = $_SESSION['access_token'];
				}
				else
				{
				  	$access_token = $facebook_helper->getAccessToken();

				  	$_SESSION['access_token'] = $access_token;

				  	$facebook->setDefaultAccessToken($_SESSION['access_token']);
				}

				$_SESSION['user_id'] = '';
				$_SESSION['user_name'] = '';
				$_SESSION['user_email_address'] = '';
				$_SESSION['user_image'] = '';

				$graph_response = $facebook->get("/me?fields=name,email", $access_token);

				$facebook_user_info = $graph_response->getGraphUser();

				if(!empty($facebook_user_info['id']))
				{
				 	$_SESSION['user_image'] = 'http://graph.facebook.com/'.$facebook_user_info['id'].'/picture';
				}

				if(!empty($facebook_user_info['name']))
				{
				  	$_SESSION['user_name'] = $facebook_user_info['name'];
				}

				if(!empty($facebook_user_info['email']))
				{
				  	$_SESSION['user_email_address'] = $facebook_user_info['email'];
				}
				 
			}
			else
			{
				 // Get login url
				$facebook_permissions = ['email']; // Optional permissions

				$facebook_login_url = $facebook_helper->getLoginUrl('http://localhost/Project2/index.php', $facebook_permissions);
				    
				    // Render Facebook login button
				echo "<a href='" . htmlspecialchars($facebook_login_url) . " class='fb btn'
					style='width: 100%;
					padding: 12px;
					border: none;
					border-radius: 4px;
					margin: 5px 0;
					opacity: 0.85;
					display: inline-block;
					font-size: 17px;
					line-height: 20px;
					text-decoration: none; 
					background-color: #dd4b39;
					color: white; 
					background-color: #3B5998;
  					color: white;'>
  				<i class='fa fa-facebook fa-fw'></i> Login with Facebook</a>";
			}	
		?>
		<a href="customer_register.php">
			<h3>Or You can register the website account here!</h3>
		</a>
	</center>
</div>

<?php  
	if (isset($_POST['login'])) {
		$customer_email = $_POST['c_email'];
		$customer_password = $_POST['c_password'];
		$select_customer = "select * from customers where customer_email='$customer_email' AND customer_password='$customer_password'";
		$run_customer = mysqli_query($con, $select_customer);
		$get_ip = getRealIpUser();
		$check_customer = mysqli_num_rows($run_customer);
		$select_cart = "select * from cart where ip_add='$get_ip'";
		$run_cart = mysqli_query($con, $select_cart);
		$check_cart = mysqli_num_rows($run_cart);
		if ($check_customer==0) {
			echo "<script>alert('Email or Password is incorrect')</script>";
			exit();
		}
		if ($check_customer==1 AND $check_cart==0) {
			$_SESSION['customer_email'] = $customer_email;
			echo "<script>alert('Logged in successfully')</script>";
			echo "<script>window.open('customer/my_account.php?my_orders', '_self')</script>";
		}
		else{
			$_SESSION['customer_email'] = $customer_email;
			echo "<script>alert('Logged in successfully')</script>";
			echo "<script>window.open('checkout.php', '_self')</script>";
		}
	}
?>

