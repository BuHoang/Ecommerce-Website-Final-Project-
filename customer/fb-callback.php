<?php
	$fb = new Facebook\Facebook([
		'app_id' => '301779017756389', 
  		'app_secret' => 'd3fc4b05a3c962f2a04672b6bd072a1b',
  		'default_graph_version' => 'v5.7',
  	]);

  	$helper = $fb->getRedirectLoginHelper();

  	try {
	  	$accessToken = $helper->getAccessToken();
	}catch(Facebook\Exceptions\FacebookResponseException $e) {
	  // When Graph returns an error
	  	echo 'Graph returned an error: ' . $e->getMessage();
	  	exit;
	} catch(Facebook\Exceptions\FacebookSDKException $e) {
	  // When validation fails or other local issues
	  	echo 'Facebook SDK returned an error: ' . $e->getMessage();
	  	exit;
	}

	if (! isset($accessToken)) {
		if ($helper->getError()) {
			header('HTTP/1.0 401 Unauthorized');
			echo "Error: " . $helper->getError() . "\n";
			echo "Error Code: " . $helper->getErrorCode() . "\n";
			echo "Error Reason: " . $helper->getErrorReason() . "\n";
			echo "Error Description: " . $helper->getErrorDescription() . "\n";
		} else {
			header('HTTP/1.0 400 Bad Request');
			echo 'Bad request';
		}
		exit;
	}
?>