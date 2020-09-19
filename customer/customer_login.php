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

			// init configuration
			$clientID = '712451507027-mq0g4239su8lesg6p9eto7h91ngvmi3b.apps.googleusercontent.com';
			$clientSecret = 'W8y5OtjvYVWNtfwyDIB_qReF';
			$redirectUri = 'http://localhost/Project2/index.php';

			// create Client Request to access Google API
			$client = new Google_Client();
			$client->setClientId($clientID);
			$client->setClientSecret($clientSecret);
			$client->setRedirectUri($redirectUri);
			$client->addScope("email");
			$client->addScope("profile");

			// authenticate code from Google OAuth Flow
			if (isset($_GET['code'])) {
				$token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
				$client->setAccessToken($token['access_token']);
				
				$google_oauth = new Google_Service_Oauth2($client);
				$google_account_info = $google_oauth->userinfo->get();
				$email =  $google_account_info->email;
				$name =  $google_account_info->name;
				
			} else {
				echo "<a href='".$client->createAuthUrl()."' class='google btn' 
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
					color: white;'>
				<i class='fa fa-google fa-fw'></i> Login with Google+</a>";
			}
		?>
		<?php
			require_once 'vendor/autoload.php';

			$fb = new Facebook\Facebook([
				'app_id' => '301779017756389', 
  				'app_secret' => 'd3fc4b05a3c962f2a04672b6bd072a1b',
  				'default_graph_version' => 'v5.7',
  			]);

			$helper = $fb->getRedirectLoginHelper();

			$permissions = ['email']; // Optional permissions
			$loginUrl = $helper->getLoginUrl('http://localhost/Project2/customer/fb-callback.php', $permissions);

			echo "<a href='" . htmlspecialchars($loginUrl) . " class='fb btn'
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

