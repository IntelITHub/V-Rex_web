<?php 
	//require_once('facebook.php');
	/*require_once('db.php');
	require_once('config.php');*/
class TwitterPost extends CI_Controller{
 	
	function __construct(){
		parent::__construct();
		$this->load->model('configuration_model');
		$this->load->library('session');
		
		$this->appIdData = $this->configuration_model->get_configuration('TWITTER_APPID');
		$this->appId	 = $this->appIdData['vValue'];
		
		$this->appSecretData = $this->configuration_model->get_configuration('TWITTER_APPSEC');
		$this->appSecret 	 = $this->appSecretData['vValue'];
		
		$this->siteNameData = $this->configuration_model->get_configuration('SITE_NAME');
		$this->siteName 	 = $this->appSecretData['vValue'];
		
		//Code for twitter login
        require_once($this->config->item('base_path')."system/libraries/twitteroauth/twitteroauth.php");
		require_once($this->config->item('base_path')."system/libraries/twitteroauth/tmhOAuth.php");
        require_once($this->config->item('base_path')."system/libraries/twitteroauth/tmhUtilities.php");
        
		$this->errorFlag 	= -1;
		$this->successFlag	=  1;
		
	}
	
	// set member post to twitter
	function setMemberPost($data){
		//echo '<pre>';print_r($data);exit;
		/*//facebook application
		$config = array(
			'appId' => $this->appId,
			'secret' => $this->appSecret,
			'allowSignedRequest' => false, // optional but should be set to false for non-canvas apps
			//'oauth' => true,
			'fileUpload' => true,
		    #'scope' => 'publish_actions,publish_stream‌​,offline_access',
		    'cookie' => true
		);*/
		
		// Member access data
		$twitterUniqueId = $data['member']['vTwitterId'];
		$twitterTokenId  = $data['member']['tTwitterToken'];
		
		// Post data
		$postTitle = $data['post']['tPost'];
		$postDescription = $data['post']['tDescription'];
		$postFile =  $data['post']['fileFullPath'];
		$eFileType = $data['post']['eFileType'];

		
		$result['success'] = $this->errorFlag;
		
		//if($user_id) {
		
			// We have a user ID, so probably a logged in user.
			// If not, we'll get an exception, which we handle below.
			try {
				/*curl_setopt($curl, CURL_TIMEOUT, 0);
				if($eFileType == 'Video'){
					$postType = '/me/videos';
					
					$videoSrc = '';
					$params = array(
					  "access_token" => $facebookTokenId, // see: https://developers.facebook.com/docs/facebook-login/access-tokens/
					  "message" => $postTitle,
					  #"link" => $this->siteName,
					  'file' => '@'.realpath($postFile),
					  "name" => $this->siteName,
					  "caption" => $this->siteName,
					  "description" => $postDescription
					);
				}else{
					$postType = '/me/photos';
					$params = array(
					  "access_token" => $facebookTokenId, // see: https://developers.facebook.com/docs/facebook-login/access-tokens/
					  'image' => '@' . realpath($postFile),
					  "message" => $postTitle,
					  #"link" => $this->siteName,
					  #'picture' => $postFile,
					  #"name" => $this->siteName,
					  #"caption" => $this->siteName,
					  #"description" => $postDescription
					);
				}*/
				
				// post to Facebook
				try {
					//$ret = $facebook->api($postType, 'POST',$params);
					// Twitter Connection Info
					$twitter_access_token = $twitterUniqueId;
					$twitter_access_token_secret = $twitterTokenId;
					
					$twitter_consumer_key = $this->appId;
					$twitter_consumer_secret = $this->appSecret;
					//echo $twitter_consumer_secret;exit;
					// Connect to Twitter
					$connection = new TwitterOAuth($twitter_consumer_key, $twitter_consumer_secret, $twitter_access_token, $twitter_access_token_secret);
					
					// Post Update
					$content = $connection->post('statuses/update', array('status' => $postTitle));
					//echo '<pre>';print_r($content);exit;
					$result['success'] = $this->successFlag;
				} catch(Exception $e) {
					$result['success'] = $this->errorFlag;
				}
		        
				// get user profile informations
				// access token
				
			} catch(Exception $e) {
				// If the user is logged out, you can have a 
				// user ID even though the access token is invalid.
				// In this case, we'll get an exception, so we'll
				// just ask the user to login again here.
				
				$result['success'] = $this->errorFlag;
			}   
		return $result['success'];
		exit;
	}
	
	// login with twitter
	function authLogInWithTwitter(){
		
		if($this->session->userdata('request_token') || $sess == true){
			$requestToken = $this->session->userdata('request_token');
			$requestTokenSecret = $this->session->userdata('request_token_secret');
			
			if($this->input->get('oauth_verifier')){
				$this->session->set_userdata(array(
					'oauth_verifier' => $this->input->get('oauth_verifier')
				));
			}
			
			$oauthVerifier = $this->session->userdata('oauth_verifier');
			$twitteroauth = new TwitterOAuth($CONSUMER_KEY, $CONSUMER_SECRET, $requestToken, $requestTokenSecret);
			// Let's request the access token
			$twitterData = $twitteroauth->getAccessToken($oauthVerifier);
			
			//
			if($twitterData['screen_name']){
				
				$access_token['twitterData'] = $twitterData;
				$access_token['message'] = "Successfully login with twitter";
			}else{
				$access_token = array();
			}
			// Print user's info
			$this->session->sess_destroy();
			return $access_token;
			exit;
		
		}else{
			
			$CONSUMER_KEY = $this->appId;
			$CONSUMER_SECRET = $this->appSecret;
			$connection = new TwitterOAuth($CONSUMER_KEY, $CONSUMER_SECRET);
			
			$request_token = $connection->getRequestToken($OAUTH_CALLBACK); //get Request Token
			
			if(	$request_token){
				$token = $request_token['oauth_token'];
				
				$this->session->set_userdata(array(
					'request_token' => $token,
					'request_token_secret' => $request_token['oauth_token_secret']
				));
				
				switch ($connection->http_code) {
					case 200:
						$url = $connection->getAuthorizeURL($token);
						header('Location: ' . $url); 
					    break;
					default:
					    $data['message'] = "Coonection with twitter Failed";
				    	break;
				}
			} else{
				$data['message'] = "Error Receiving Request Token";
			}
		}
		return $data;
	}
	
}
?>