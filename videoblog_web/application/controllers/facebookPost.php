<?php 
	require_once('facebook.php');

class FacebookPost extends CI_Controller{
 	
	function __construct(){
		parent::__construct();
		$this->load->model('configuration_model');
		
		$this->appIdData = $this->configuration_model->get_configuration('FB_APPID');
		$this->appId	 = $this->appIdData['vValue'];
		
		$this->appSecretData = $this->configuration_model->get_configuration('FB_APPSEC');
		$this->appSecret 	 = $this->appSecretData['vValue'];
		
		$this->siteNameData = $this->configuration_model->get_configuration('SITE_NAME');
		$this->siteName 	 = $this->appSecretData['vValue'];
		
		$this->errorFlag 	= -1;
		$this->successFlag	=  1;
		
	}
	
	function setMemberPost($data){
		
		//facebook application
		$config = array(
			'appId' => $this->appId,
			'secret' => $this->appSecret,
			'allowSignedRequest' => false, // optional but should be set to false for non-canvas apps
			//'oauth' => true,
			'fileUpload' => true,
		    #'scope' => 'publish_actions,publish_stream‌​,offline_access',
		    'cookie' => true
		);
		
		// Member access data
		$facebookUniqueId = $data['member']['vFacebookId'];
		$facebookTokenId  = $data['member']['tFacebookToken'];
		
		// Post data
		$postTitle = $data['post']['tPost'];
		$postDescription = $data['post']['tDescription'];
		$postFile =  $data['post']['fileFullPath'];
		$eFileType = $data['post']['eFileType'];
		//echo $postFile;exit;
		$facebook = new Facebook($config);
		$facebook->setAccessToken($facebookTokenId);
		$user_id = $facebook->getUser();
		$facebook->setFileUploadSupport(true);
		$result['success'] = $this->errorFlag;
		
		//echo $user_id.'<br>'.$facebookTokenId;exit;
		if($user_id) {
		
			// We have a user ID, so probably a logged in user.
			// If not, we'll get an exception, which we handle below.
			try {
				curl_setopt($curl, CURL_TIMEOUT, 0);
				
				
				
				if($eFileType == 'Video'){
					/*$postType = '/me/videos';
					$videoSrc = '';
					$params = array(
					  "access_token" => $facebookTokenId, // see: https://developers.facebook.com/docs/facebook-login/access-tokens/
					  "message" => $postTitle,
					  #"link" => $this->siteName,
					  'file' => '@'.realpath($postFile),
					  "name" => $this->siteName,
					  "caption" => $this->siteName,
					  "description" => $postDescription
					);*/
					
					$postType = '/me/feed';
					$videoSrc = '';
					$params = array(
					  "access_token" => $facebookTokenId, // see: https://developers.facebook.com/docs/facebook-login/access-tokens/
					  "message" => $postTitle,
          			  "source" => $postFile,
					  "description" => $postDescription
					);
					
				}else{
					$postType = '/me/feed';
					$params = array(
					  "access_token" => $facebookTokenId, // see: https://developers.facebook.com/docs/facebook-login/access-tokens/
					  "message" => $postTitle,
					  "picture" => $postFile,
					  "description" => $postDescription
					);
				}
				
				try {
					$ret = $facebook->api($postType, 'POST',$params);
				  	$result['success'] = $this->successFlag;
				  
				} catch(Exception $e) {
					$result['success'] = $this->errorFlag;
					//echo $e->getType();
					//echo $e->getMessage();
				}
				
			} catch(FacebookApiException $e) {
				$result['success'] = $this->errorFlag;
				//echo $e->getType();
				//echo $e->getMessage();
			}   
		} else {
			$result['success'] = $this->errorFlag;
		}
		/*echo '<pre>';print_r($result);
		exit;*/
		return $result['success'];
		exit;
	}
}
?>