<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// include Facebook libraries
require_once('facebookPost.php');
require_once('twitterPost.php');
require_once('ffmpeg.class.php');
class Service extends CI_Controller {
	
	// Error tag flag
	public $errorFlag;
	
	// Success tag glag
	public $successFlag;
	
	// Password lengths
	public $passwordLength = 10;
	
	function __construct()
	{
		parent::__construct();      
		$this->load-> model('post_model', '', TRUE);
		$this->load-> model('post_categories_model', '', TRUE);
		$this->load-> model('category_model', '', TRUE);
		$this->load->model('member_model', '', TRUE);
		$this->load->model('configuration_model', '', TRUE);
		$this->load->model('emailtemplate_model', '', TRUE);
		$this->load->model('country_model', '', TRUE);
		$this->load->model('state_model', '', TRUE);
		$this->load->model('languagelabel_model', '', TRUE);
		
		$this->load->library('upload'); 
		$this->load->library('image_lib');
		$this->load->library('session');
		
		$this->load->helper('url');
		
		// Facebook API class
		$this->facebookpost = new FacebookPost;
		
		// Twitter API class
		$this->twitterPost = new TwitterPost;
		
		$this->errorFlag 	= -1;
		$this->successFlag	=  1;
    }

	function index()
	{
		
		if($this->input->post()){
			$action = $this->input->post('action');
		}
		if($this->input->get()){
			$action = $this->input->get('action');
		}
		//echo $action;exit;
		switch($action)
		{
		 	case 'userLogin':
	          	$this->userLogin();
	            break;
	            
	        case 'forgotPassword':
		 		$this->forgotPassword();
		 		break;
		 		
		 	case 'userRegistration':
	          	$this->userRegistration();
	            break;
			
	        case 'homePageLatestPost':
	          	$this->homePageLatestPost();
	            break;
	            
	        case 'newsFeed':
	        	$this->newsFeed();
	        	break;
	        	
		 	case 'getCategories':
	          	$this->getCategories();
	            break;

            case 'getPosts':           	
	          	$this->getPosts();
	            break;
	            
	        case 'getAllPost':           	
	          	$this->getAllPost();
	            break;

	        case 'getPostdetails':           	
	          	$this->getPostdetails();
	            break;

	        case 'getProfileDetails':           	
	          	$this->getProfileDetails();
	            break;
	            
	        case 'setProfileCoverImage':
	        	$this->setProfileCoverImage();
	        	break;
	        	
	        case 'deleteProfileCoverImage':
	        	$this->deleteProfileCoverImage();
	        	break;
	        	
	        case 'getPublicProfile':
	        	$this->getPublicProfile();
	        	break;
	        	
	        case 'setFollow':
	        	$this->setFollow();
	        	break;
	        	
	        case 'setUnFollow':
	        	$this->setUnFollow();
	        	break;
	        	
	        case 'setProfileDetails':
	        	$this->setProfileDetails();
	        	break;
	        	
	        case 'setPost':
	        	$this->setPost();
	        	break;
	        	
	        case 'deletePost':
	        	$this->deletePost();
	        	break;
	        		
	        case 'getComments':
	        	$this->getComments();
	        	break;
	        	
	        case 'setComments':
	        	$this->setComments();
	        	break;
	        
	        case 'deleteComment':
	        	$this->deleteComment();
	        	break;	
	        		
	        case 'setPostLike':
	        	$this->setPostLike();
	        	break;
	        	
	        case 'setPostUnLike':
	        	$this->setPostUnLike();
	        	break;
	        	
	        case 'getCountries':
	        	$this->getCountries();
	        	break;
	        	
	        case 'getState':
	        	$this->getState();
	        	break;
	        	
	        case 'pushNotification':
	        	$this->pushNotification();
	        	break;
	        	
	        case 'loginWithTwitter':
	        	$this->loginWithTwitter();
	        	break;
	        	
	        case 'callBackTwitter':
	        	$this->callBackTwitter();
	        	break;
	        	
	        case 'generatVideoThumbnail':
	        	$this->generatVideoThumbnail();
	        	break;
				
			case 'userLogout':
	        	$this->userLogout();
	        	break;
	        	
	        case 'setLanguage':
	        	$this->setLanguage();
	        	break;
	        	
	        case 'setCameraMode':
	        	$this->setCameraMode();
	        	break;
	        	
	        case 'setMemberSettings':
	        	$this->setMemberSettings();
	        	break;
	        
		}
	}

	//check login from mobile 
	function userLogin()
	{
		/*if(!$this->input->post()){ 
			
		echo '<html>
			<body>
			<form action="" method="post"
			enctype="multipart/form-data">
			<table border="1" cellpadding="5">
				<!--<input type="hidden" name="eLoginType" value="FACEBOOK" />-->
				<tr>
					<td>Email:</td><td><input type="text" name="vEmail" value="" /></td>
				</tr>
				<tr>
					<td>Password:</td><td><input type="password" name="vPassword" value="" /></td>
				</tr>
				<!--<tr>
					<td>Name:</td><td><input type="text" name="vName" value="" /></td>
				</tr>>
				<tr>
					<td>tFacebookToken:</td><td><input type="text" name="tFacebookToken" value="" /></td>
				</tr
				<tr>
					<td>Facebook ID:</td><td><input type="text" name="vFacebookId" value="" /></td>
				</tr>-->
				<!--<tr>
					<td><label for="file">Picture:</label></td>
					<td><input type="text" name="vPicture" id="file"></td>
				</tr>-->
				<tr>
					<td colspan="2" align="center"><input type="submit" name="submit" value="Submit"></td>
				</tr>
			</table>
			</form> 
			
			</body>
			</html>';exit;
		}*/
		
		$data['vName']      = $this->input->post('vName');
		$data['vUsername']  = $this->input->post('vUsername');
		$data['vDeviceid']= $this->input->post('vDeviceid');
		$data['tDeviceToken'] =$this->input->post('tDeviceToken');
		$data['dCreatedDate'] = date('Y-m-d H:i:s');
		$data['vIP'] = $this->input->post('vIP');
		$data['iLangId'] = $this->input->post('iLangId');
		
		$iLangId = $this->input->post('iLangId');
		
		$data['tDeviceToken'] = str_replace(' ','', $data['tDeviceToken']);
		$data['tDeviceToken'] = str_replace('<','', $data['tDeviceToken']);
		$data['tDeviceToken'] = str_replace('>','', $data['tDeviceToken']);
		
		$vEmail    = '';
		if($this->input->post('vEmail')){
			$vEmail    = $this->input->post('vEmail');
			$data['vEmail']     = $this->input->post('vEmail');
		}
		
		$vPassword = '';
		if($this->input->post('vPassword')){
			$data['vPassword']  = md5($this->input->post('vPassword'));
			$vPassword = md5($this->input->post('vPassword'));
		}
		
		$loginWithSocialMediaFlag = FALSE;
		
		// Login type condition
		$data['eLoginType'] = 'REGISTER';
		$eLoginType = $this->input->post('eLoginType');
		
		if( $eLoginType == 'FACEBOOK'){
			$data['eLoginType'] = 'FACEBOOK';
			$data['vFacebookId'] = $this->input->post('vFacebookId');
			$data['tFacebookToken'] = $this->input->post('tFacebookToken');
			$loginWithSocialMediaFlag = TRUE;
		}
		
		if($eLoginType == 'TWITTER'){
			$data['eLoginType'] = 'TWITTER';
			$data['vTwitterId'] = $this->input->post('vTwitterId');
			$data['tTwitterToken'] = $this->input->post('tTwitterToken');
			$loginWithSocialMediaFlag = TRUE;
		}
		
		if(($vEmail != '') && ($vPassword != '') && filter_var($vEmail, FILTER_VALIDATE_EMAIL)){
			$loginWithWhichField = 'EMAIL';
			
			$loginCheck = $this->member_model->check_authentication($vEmail,$vPassword,$data,$loginWithWhichField);
			
			unset($loginCheck['vPassword']);
			if($loginCheck)
			{
				$logindata['iMemberId'] = $loginCheck['iMemberId'];
				$dLoginDate = date('Y-m-d H:i:s');
            	$logindata['dLoginDate'] = $dLoginDate;
            	$logindata['vIP'] = $data['vIP'];
           	 	$iLoginLogId = $this->member_model->loginentry($logindata);
           	 	
           	 	// update language
           	 	$langCode['iMemberId'] = $loginCheck['iMemberId'];
           	 	$langCode['iLangId'] = $iLangId;
           	 	$this->member_model->update_member_language($langCode);
           	 	
           	 	$data = $loginCheck;
				$message['msg'] = $this->getLL('USER_LOGIN_SUCCESS',$iLangId);
				$message['success'] = $this->successFlag;
				
				$iMemberId = $data['iMemberId'];
				if($this->input->post('vDeviceid')){
					$deviceInfo['vDeviceid'] = $this->input->post('vDeviceid');
				}
				
				$deviceInfo['tDeviceToken'] = $this->input->post('tDeviceToken');
				
				$deviceInfo['tDeviceToken'] = str_replace(' ','', $deviceInfo['tDeviceToken']);
				$deviceInfo['tDeviceToken'] = str_replace('<','', $deviceInfo['tDeviceToken']);
				$deviceInfo['tDeviceToken'] = str_replace('>','', $deviceInfo['tDeviceToken']);
				$deviceId=$this->member_model->update_device($iMemberId,$deviceInfo);
				
				// update in push notification DATABASE
				$pushNotificationData['action'] = 'register';
				$pushNotificationData['vDevicename'] = $this->input->post('vDevicename');
				$pushNotificationData['vType'] = $this->input->post('vType');
				$pushNotificationData['vDeviceid'] = $deviceInfo['vDeviceid'];
				$pushNotificationData['deviceToken'] = $deviceInfo['tDeviceToken'];
				$this->pushNotification($pushNotificationData);
				
			}
			else
			{
				unset($data);
				$data['vEmail']     = $this->input->post('vEmail');
				$message['msg'] = $this->getLL('USER_LOGIN_FAILED',$iLangId);
				$message['success'] = $this->errorFlag;
			}
		}else if(($vEmail != '') && ($vPassword != '') && !filter_var($vEmail, FILTER_VALIDATE_EMAIL)){
			$loginWithWhichField = 'USERNAME';
			$loginCheck = $this->member_model->check_authentication($vEmail,$vPassword,$data,$loginWithWhichField);
			unset($loginCheck['vPassword']);
			if($loginCheck)
			{
				$logindata['iMemberId'] = $loginCheck['iMemberId'];
				$dLoginDate = date('Y-m-d H:i:s');
            	$logindata['dLoginDate'] = $dLoginDate;
            	$logindata['vIP'] = $data['vIP'];
           	 	$iLoginLogId = $this->member_model->loginentry($logindata);
				
           	 	// update language
           	 	$langCode['iMemberId'] = $loginCheck['iMemberId'];
           	 	$langCode['iLangId'] = $iLangId;
           	 	$this->member_model->update_member_language($langCode);
           	 	
           	 	$data = $loginCheck;
				$message['msg'] = $this->getLL('USER_LOGIN_SUCCESS',$iLangId);
				$message['success'] = $this->successFlag;
				
				$iMemberId = $data['iMemberId'];
				if($this->input->post('vDeviceid')){
					$deviceInfo['vDeviceid'] = $this->input->post('vDeviceid');
				}
				$deviceInfo['tDeviceToken'] = $this->input->post('tDeviceToken');
				
				$deviceInfo['tDeviceToken'] = str_replace(' ','', $deviceInfo['tDeviceToken']);
				$deviceInfo['tDeviceToken'] = str_replace('<','', $deviceInfo['tDeviceToken']);
				$deviceInfo['tDeviceToken'] = str_replace('>','', $deviceInfo['tDeviceToken']);
				$deviceId=$this->member_model->update_device($iMemberId,$deviceInfo);
				
				// update in push notification DATABASE
				$pushNotificationData['action'] = 'register';
				$pushNotificationData['vDevicename'] = $this->input->post('vDevicename');
				$pushNotificationData['vType'] = $this->input->post('vType');
				$pushNotificationData['vDeviceid'] = $deviceInfo['vDeviceid'];
				$pushNotificationData['deviceToken'] = $deviceInfo['tDeviceToken'];
				$this->pushNotification($pushNotificationData);
			}
			else
			{
				unset($data);
				$data['vUsername']     = $this->input->post('vEmail');
				$message['msg'] = $this->getLL('USER_LOGIN_FAILED',$iLangId);
				$message['success'] = $this->errorFlag;
			}
		}else if($loginWithSocialMediaFlag == TRUE){
			$loginWithWhichField = 'SOCIAL';
			
			// add member social information
			$iMemberId = $this->input->post('iMemberId');
			if($iMemberId){
				// Update facebook token
				$socialInfo = array();
				if($data['eLoginType'] == 'FACEBOOK'){
					$socialInfo['iMemberId'] 		= $iMemberId;
					$socialInfo['vFacebookId'] 		= $data['vFacebookId'];
					$socialInfo['tFacebookToken'] 	= $data['tFacebookToken'];
					$this->member_model->add_socialmedia_info($socialInfo);
				}
				if($data['eLoginType'] == 'TWITTER'){
					$socialInfo['iMemberId'] 		= $iMemberId;
					$socialInfo['vTwitterId'] 		= $data['vTwitterId'];
					$socialInfo['tTwitterToken'] 	= $data['tTwitterToken'];
					$this->member_model->add_socialmedia_info($socialInfo);
				}
			}
			
			$fieldName = '';
			if($data['eLoginType'] == 'FACEBOOK'){
				$fieldName = 'vFacebookId';
				$socialId = $data['vFacebookId'];
			}
			
			if($data['eLoginType'] == 'TWITTER'){
				$fieldName = 'vTwitterId';
				$socialId  = $data['vTwitterId'];
			}
			
			$checkUnameAndEmail = $this->member_model->check_username_or_email($socialId,$fieldName);
			if($checkUnameAndEmail){
				
				// Update facebook token
				if($data['eLoginType'] == 'FACEBOOK'){
					$takenData['vFacebookId'] = $data['vFacebookId'];
					$takenData['tFacebookToken'] = $data['tFacebookToken'];
					$result = $this->member_model->update_socialmedia_token($takenData);
				}
				
				// update twitter token
				if($data['eLoginType'] == 'TWITTER'){
					$takenData['eLoginType'] = 'TWITTER';
					$takenData['vTwitterId'] = $data['vTwitterId'];
					$takenData['tTwitterToken'] = $data['tTwitterToken'];
					$result = $this->member_model->update_socialmedia_token($takenData);
				}
				
				$memberData = $this->member_model->get_member_details_social_media_id($socialId,$fieldName);
				unset($memberData['vPassword']);
				
				$logindata['iMemberId'] = $memberData['iMemberId'];
				$dLoginDate = date('Y-m-d H:i:s');
            	$logindata['dLoginDate'] = $dLoginDate;
            	$logindata['vIP'] = $data['vIP'];
           	 	$iLoginLogId = $this->member_model->loginentry($logindata);
				
           	 	// update language
           	 	$langCode['iMemberId'] = $memberData['iMemberId'];
           	 	$langCode['iLangId'] = $iLangId;
           	 	$this->member_model->update_member_language($langCode);
           	 	
           	 	$message['msg'] = $this->getLL('USER_LOGIN_SUCCESS',$iLangId);
				$message['success'] = $this->successFlag;
				$dataArry = array(
					'data'    => $memberData,
					'message' => $message
				);
				
				$iMemberId = $memberData['iMemberId'];
				if($this->input->post('vDeviceid')){
					$deviceInfo['vDeviceid'] = $this->input->post('vDeviceid');
				}
				$deviceInfo['tDeviceToken'] = $this->input->post('tDeviceToken');
				
				$deviceInfo['tDeviceToken'] = str_replace(' ','', $deviceInfo['tDeviceToken']);
				$deviceInfo['tDeviceToken'] = str_replace('<','', $deviceInfo['tDeviceToken']);
				$deviceInfo['tDeviceToken'] = str_replace('>','', $deviceInfo['tDeviceToken']);
				$deviceId=$this->member_model->update_device($iMemberId,$deviceInfo);
				
				// update in push notification DATABASE
				$pushNotificationData['action'] = 'register';
				$pushNotificationData['vDevicename'] = $this->input->post('vDevicename');
				$pushNotificationData['vType'] = $this->input->post('vType');
				$pushNotificationData['vDeviceid'] = $deviceInfo['vDeviceid'];
				$pushNotificationData['deviceToken'] = $deviceInfo['tDeviceToken'];
				$this->pushNotification($pushNotificationData);
				
				header('Content-type: application/json');
				$main = json_encode($dataArry);
				echo $main.'';
				exit;
			}else{
				$message['msg'] = $this->getLL('USER_NOT_REGISTER',$iLangId);
				$message['success'] = $this->errorFlag;
				$dataArry = array(
					'data'    => $data,
					'message' => $message
				);
				header('Content-type: application/json');
				$main = json_encode($dataArry);
				echo $main.'';
				exit;
			}
			
		}else {
			unset($data);
			$data['vEmail']     = $this->input->post('vEmail');
			$message['msg'] = $this->getLL('USER_LOGIN_FAILED',$iLangId);
			$message['success'] = $this->errorFlag;
		}
		
		$dataArry = array(
			'data' 	  => $data,
			'message' => $message
		);
		
		header('Content-type: application/json');
		$main = json_encode($dataArry);
		echo $main;
		exit;
	}
	
	//make Logout Entry
	function userLogout()
    {
        $iMemberId = $this->input->get('iMemberId');
        $vIP = $this->input->get('vIP');
        $dLogoutDate = date('Y-m-d H:i:s');
        $logindata['iMemberId'] = $iMemberId;
        $logindata['dLogoutDate'] = $dLogoutDate;
        $logindata['vIP'] = $vIP;
        $iLoginLogId = $this->member_model->logoutentry($logindata);
        if ($iLoginLogId) {
        	 $message['msg']= $this->getLL('LOGOUT_SUCCESS','',$iMemberId);
			 $message['success']= $this->successFlag;
			 $this->session->sess_destroy();
        }else{
        	 $message['msg']= $this->getLL('LOGOUT_FAILED','',$iMemberId);
			 $message['success']= $this->errorFlag;
        }
       	$data['iMemberId'] = $iMemberId;
		$dataArry = array(
				'data'    => $data,
				'message' => $message
			);
		header('Content-type: application/json');
		$main = json_encode($dataArry);
		echo $main.'';
		exit;
    }
    
	// Forgotten password
	function forgotPassword(){
		$vEmail 	= $this->input->get('vEmail');

		if(!empty($vEmail)){
			$memberData = $this->member_model->find_member_by_email($vEmail);
			$iMemberId = $memberData['iMemberId'];
			
			if($memberData){

				// Set new password;
				$link=$this->config->item('base_url');
				$image=$this->config->item('base_image');
				$imageLogo=$image.'logo.png';
				$myforgot_word=$this->input->get('myforgot_word');
				$linkUrl=$link.'service?action=forgotPassword&vEmail='.$vEmail.'&myforgot_word=1';
				
				if(empty($myforgot_word)){

					$result = $this->Send($memberData,$linkUrl);
					
					if($result){
						$memberData = array('vEmail' => $vEmail);
						$message['msg'] = $this->getLL("FORGOT_PASSWORD_EMAIL_SEND_SUCCESS",'',$iMemberId);
						$message['success'] = $this->successFlag;
					}
					else{
						$message['msg'] = $this->getLL("ERROR_SEND_MAIL",'',$iMemberId);
						$message['success'] = $this->errorFlag;
					}
					
				}

				if($myforgot_word==1){
					$iMemberId = $memberData['iMemberId'];
					$passwordLength = $this->passwordLength;
					$genaratNewPassword = $this->getRandomStringPassword($passwordLength);
					$updatePassword = $this->member_model->update_new_password($iMemberId,$genaratNewPassword);
					$result = $this->Send($memberData,$linkUrl,$genaratNewPassword);
					if($result){
						$memberData = array('vEmail' => $vEmail);
						$message['msg'] = $this->getLL("FORGOT_PASSWORD_EMAIL_SEND_SUCCESS",'',$iMemberId);
						$message['success'] = $this->successFlag;
					}
					else{
						$message['msg'] = $this->getLL("ERROR_SEND_MAIL",'',$iMemberId);
						$message['success'] = $this->errorFlag;
					}
					
					if($myforgot_word !='')
					{
						echo '
						<html>
						<body align="center" style="background-color:#F5F5F5">
							<div>
							<img src="'.$imageLogo.'" alt="" style="padding-top:100px" />
					         <div style="background-color:#FFFFFF; border: 1px solid #E5E5E5; border-radius: 5px;
								box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);margin: 50 auto 20px;max-width: 300px;padding: 19px 29px 29px;">
					             <h3>'.$this->getLL("FORGOT_PASSWORD_CHANGE_SUCCESS",'',$iMemberId).'</h3>  
					         </div>
			        		</div>
						</body>
						</html>';exit;
					}
				}
				
			}else{
				$memberData = array('vEmail' => $vEmail);
				$message['msg'] = $this->getLL("EMAIL_NOT_MATCH",'',$iMemberId);
				$message['success'] = $this->errorFlag;
			}
		}else{
			$memberData = array('vEmail' => $vEmail);
			$message['msg'] = $this->getLL("EMAIL_ID_ENTER",'',$iMemberId);
			$message['success'] = $this->errorFlag;
		}
		
		$dataArry = array(
			'data'    => $memberData,
			'message' => $message
		);
		
		header('Content-type: application/json');
		$main = json_encode($dataArry);
		echo $main;
		exit;
	}
	
	// Gererate new password
	function getRandomStringPassword($length) {
		$salt = array_merge(range('a', 'z'), range(0, 9));
		$maxIndex = count($salt) - 1;
		
		$result = '';
		for ($i = 0; $i < $length; $i++) {
			$index = mt_rand(0, $maxIndex);
			$result .= $salt[$index];
		}
		return $result;
	}
	
	//user registration 
	function userRegistration()
	{
		$data['vEmail']     = $this->input->post('vEmail');
		if($this->input->post('vPassword')){
			$data['vPassword']  = md5($this->input->post('vPassword'));
		}
		$data['vName']      = $this->input->post('vName');
		$data['vUsername']  = $this->input->post('vUsername');
		$data['iCountryId']  = $this->input->post('iCountryId');
		$data['iStateId']  = $this->input->post('iStateId');
		$data['vCity']  = $this->input->post('vCity');
		$data['dCreatedDate'] = date('Y-m-d H:i:s');
		$data['vIP'] 		= $this->input->post('vIP');
		$data['dLoginDate'] = date('Y-m-d H:i:s');
		
		// store Device data
		$data['vDeviceid']     = $this->input->post('vDeviceid');
		$data['tDeviceToken']  = $this->input->post('tDeviceToken');
		$data['iLangId']  = $this->input->post('iLangId');
		
		$data['tDeviceToken'] = str_replace(' ','', $data['tDeviceToken']);
		$data['tDeviceToken'] = str_replace('<','', $data['tDeviceToken']);
		$data['tDeviceToken'] = str_replace('>','', $data['tDeviceToken']);
		
		$iLangId  = $this->input->post('iLangId');
		
		$loginWithSocialMediaFlag = FALSE;
		
		// Registration type condition
		$data['eLoginType'] = 'REGISTER';
		$eLoginType = $this->input->post('eLoginType');
		
		if( $eLoginType == 'FACEBOOK'){
			$data['eLoginType'] = 'FACEBOOK';
			$data['vFacebookId'] = $this->input->post('vFacebookId');
			$data['tFacebookToken'] = $this->input->post('tFacebookToken');
			$loginWithSocialMediaFlag = TRUE;
		}
		
		if($eLoginType == 'TWITTER'){
			$data['eLoginType'] = 'TWITTER';
			$data['vTwitterId'] = $this->input->post('vTwitterId');
			$data['tTwitterToken'] = $this->input->post('tTwitterToken');
			$loginWithSocialMediaFlag = TRUE;
		}
		
		// Username Restriction ( One or more user cannot use same username )
		if(!empty($data['vUsername']) && $loginWithSocialMediaFlag == FALSE){			
			$fieldName = 'vUsername';
			$checkUnameAndEmail = $this->member_model->check_username_or_email($data['vUsername'],$fieldName);
			if($checkUnameAndEmail){
				unset($data['vPassword']);
				$message['msg']= $this->getLL('USERNAME_TAKEN',$iLangId);
				$message['success']= $this->errorFlag;
				$dataArry = array(
					'data'    => $data,
					'message' => $message
				);
				header('Content-type: application/json');
				$main = json_encode($dataArry);
				echo $main.'';
				exit;
			}
		}else if(empty($data['vUsername'])){
			unset($data['vPassword']);
			$message['msg']= $this->getLL('USERNAME_NOT_NULL',$iLangId);
			$message['success']= $this->errorFlag;
			$dataArry = array(
				'data'    => $data,
				'message' => $message
			);
			header('Content-type: application/json');
			$main = json_encode($dataArry);
			echo $main.'';
			exit;
		}
		
		if (!filter_var($data['vEmail'], FILTER_VALIDATE_EMAIL) && $loginWithSocialMediaFlag == FALSE){
			unset($data['vPassword']);
			$message['msg'] = $this->getLL('INVALID_EMAIL',$iLangId);
			$message['success']= $this->errorFlag;
			$dataArry = array(
				'data'    => $data,
				'message' => $message
			);
			header('Content-type: application/json');
			$main = json_encode($dataArry);
			echo $main.'';
			exit;
		}
		
		// Email Restriction ( One or more user cannot use same email )
		if(!empty($data['vEmail'])){
			$fieldName = 'vEmail';
			$checkUnameAndEmail = $this->member_model->check_username_or_email($data['vEmail'],$fieldName);
			if($checkUnameAndEmail){
				unset($data['vPassword']);
				$message['msg'] = $this->getLL('EMAIL_ALREADY_TAKEN',$iLangId);
				$message['success']= $this->errorFlag;
				$dataArry = array(
					'data'    => $data,
					'message' => $message
				);
				header('Content-type: application/json');
				$main = json_encode($dataArry);
				echo $main.'';
				exit;
			}
		}else if(empty($data['vEmail']) && $loginWithSocialMediaFlag == FALSE){
			unset($data['vPassword']);
			$message['msg'] = $this->getLL('EMAIL_NOT_EMPTY',$iLangId);
			$message['success']= $this->errorFlag;
			$dataArry = array(
					'data'    => $data,
					'message' => $message
				);
			header('Content-type: application/json');
			$main = json_encode($dataArry);
			echo $main.'';
			exit;
		}
		
		$fieldName = '';
		if($data['eLoginType'] == 'FACEBOOK'){
			$fieldName = 'vFacebookId';
			$socialId = $data['vFacebookId'];
		}
		
		if($data['eLoginType'] == 'TWITTER'){
			$fieldName = 'vTwitterId';
			$socialId  = $data['vTwitterId'];
		}
		
		$checkUnameAndEmail = '';
		if($fieldName != ''){
			$checkUnameAndEmail = $this->member_model->check_username_or_email($socialId,$fieldName);
		}
		if($checkUnameAndEmail){
			$memberData = $this->member_model->get_member_details_social_media_id($socialId,$fieldName);
			unset($memberData['vPassword']);
			$message['msg'] = $this->getLL('SOCIALID_ALREADY_TAKEN',$iLangId);
			$message['success'] = $this->errorFlag;
			$dataArry = array(
				'data'    => $memberData,
				'message' => $message
			);
			header('Content-type: application/json');
			$main = json_encode($dataArry);
			echo $main.'';
			exit;
		}
		
		$iMemberId = $this->member_model->add_member($data);
		$data['iMemberId'] = $iMemberId;
		
		// Member profile picture
		if(!empty($_FILES['vPicture']['name']) && !empty($iMemberId)){
			$data['iMemberId'] = $iMemberId;
			$dir = $this->config->item('member_picture_path').$data['iMemberId'];
			if(!is_dir($dir)){
				if (!mkdir($dir, 0777, true)) {
				    $message['msg']= $this->getLL('ULOAD_FILE_ERROR',$iLangId);
					$message['success']= $this->errorFlag;
				}
			}
			$fileType = strtolower(substr($_FILES['vPicture']['name'], strrpos($_FILES['vPicture']['name'], '.') + 1));
			//$fileType = explode('/',$_FILES['vPicture']['type']);
			$filename = $_FILES['vPicture']['tmp_name'];
			$new_image_name = $data['iMemberId'].'.'.$fileType;
			$fullfilename = $this->config->item('member_picture_path').$data['iMemberId'].'/'.$new_image_name;
			move_uploaded_file($_FILES["vPicture"]["tmp_name"], $fullfilename);
			
			// Image rotation
			$fromIos = $this->input->post('vType');

			$folderName = 'member';
			$fieldName = 'vPicture';
			$i = $this->do_upload_partner($iMemberId,$folderName,$fieldName);

			if($fromIos == 'IOS'){
				// File and rotation
				$imgNameArr = array($this->config->item('member_picture_path').$iMemberId.'/'.$new_image_name,$this->config->item('member_picture_path').$iMemberId.'/200x200_'.$new_image_name);
				for($i = 0;$i<=1;$i++){
					$rotateFilename = $imgNameArr[$i];
					$degrees = $this->input->post('imagerotation');
					$degrees = 360-(360+($degrees));
					// Content type
					if($fileType == 'png' || $fileType == 'PNG'){
						header('Content-type: image/png');
						$source = imagecreatefromjpeg($rotateFilename);
						$bgColor = imagecolorallocatealpha($source, 255, 255, 255, 127);
						// Rotate 
						$rotate = imagerotate($source, $degrees, $bgColor);
						imagesavealpha($rotate, true);
						imagepng($rotate,$rotateFilename);
					
					}
					if($fileType == 'jpg' || $fileType == 'jpeg'){
						header('Content-type: image/jpeg');
						$source = imagecreatefromjpeg($rotateFilename);
						// Rotate 
						$rotate = imagerotate($source, $degrees, 0);
						imagejpeg($rotate,$rotateFilename);

					}
					// Free the memory
					imagedestroy($source);
					imagedestroy($rotate);
				}	
			}
			$fileurl = $this->config->item('member_picture_url').$data['iMemberId'].'/'.$new_image_name;
			$data['vPicture'] = $fileurl;
			
			// Update Image
			$picData['iMemberId'] 	= $data['iMemberId'];
			$picData['vPicture']	= $new_image_name;
			$this->member_model->update_profile_picture($picData);
			
			unset($data['vPassword']);
		}
		
		// File upload from URL
		$vPictureUrl = $this->input->post('vPicture');
		if(!empty($vPictureUrl) && empty($_FILES['vPicture']['name']) && !empty($iMemberId)){
			// File Upload from URL
			$get_url = $this->input->post('vPicture');
			
			if($data['eLoginType'] == 'FACEBOOK'){
					$url = $get_url.'?style=large';
					$ext = 'gif';
				}else{
					$url = $get_url;
					$ext = end(explode(".",strtolower(basename($url))));
				}
			if($url){
			    $file = fopen($url,"rb");
				$dir = $this->config->item('member_picture_path').$data['iMemberId'];
				if(!is_dir($dir)){
					if (!mkdir($dir, 0777, true)) {
					    $message['msg'] = "Failed to create folders...";
			  			$message['success'] = $this->errorFlag;
					}
				}
			    $directory = $dir."/";
				
			    
			    $new_image_name = $data['iMemberId'].'.'.$ext;
			    $fileurl = $this->config->item('member_picture_path').$data['iMemberId'].'/'.$new_image_name;
			    $ch = curl_init($url);
				$fp = fopen($fileurl, 'wb');
				curl_setopt($ch, CURLOPT_FILE, $fp);
				curl_setopt($ch, CURLOPT_HEADER, 0);
				curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
				curl_exec($ch);
				curl_close($ch);
				$newfile = fclose($fp);
			    
			    if($newfile){
		            $fileurl = $this->config->item('member_picture_url').$data['iMemberId'].'/'.$new_image_name;
					$data['vPicture'] = $fileurl;
					
					// Update Image
					$picData['iMemberId'] 	= $data['iMemberId'];
					$picData['vPicture']	= $new_image_name;
					$this->member_model->update_profile_picture($picData);
					unset($data['vPassword']);
		        }else{
		            $message['msg'] = "File does not exists";
					$message['success'] = $this->errorFlag;
		        }
			    
			}else{
				$message['msg'] = "Please enter the URL";
				$message['success'] = $this->errorFlag;
			}
			
			$message['msg'] = $this->getLL('USER_LOGIN_SUCCESS',$iLangId);
			$message['success'] = $this->successFlag;
		}else{
			$message['msg'] = $this->getLL('USER_LOGIN_FAILED',$iLangId);
		  	$message['success'] = $this->errorFlag;
		}
		
		if(!empty($iMemberId)){
			$message['msg'] = $this->getLL('USER_REGISTER_SUCCESS',$iLangId);
			$message['success'] = $this->successFlag;
			
			// Push Notification Data
			$pushNotificationData['action'] = 'register';
			$pushNotificationData['vDevicename'] = $this->input->post('vDevicename');
			$pushNotificationData['vType'] = $this->input->post('vType');
			$pushNotificationData['vDeviceid'] = $this->input->post('vDeviceid');
			$pushNotificationData['deviceToken'] = $this->input->post('tDeviceToken');
			
			$pushNotificationData['deviceToken'] = str_replace(' ','', $pushNotificationData['deviceToken']);
			$pushNotificationData['deviceToken'] = str_replace('<','', $pushNotificationData['deviceToken']);
			$pushNotificationData['deviceToken'] = str_replace('>','', $pushNotificationData['deviceToken']);
			$this->pushNotification($pushNotificationData);
		}else{
			$message['msg']= $this->getLL('USER_REGISTRATION_FAILED',$iLangId);
			$message['success'] = $this->errorFlag;
		}
		
		$dataArry = array(
			'data'    => $data,
			'message' => $message
		);
		
		header('Content-type: application/json');
		$main = json_encode($dataArry);
		echo $main.'';
		exit;
	}
	
	// Homepage latest post
	function homePageLatestPost(){
		$conditions = array();
		
		$latitude =	$this->input->get('vLattitude');
		$longitude = $this->input->get('vLongitude');
		
		if (!empty($latitude) && !empty($longitude)) {
			$d = 200; 
			$r = 3959; //earth's radius in miles 
			$latN = rad2deg(asin(sin(deg2rad($latitude)) * cos($d / $r) 
	        + cos(deg2rad($latitude)) * sin($d / $r) * cos(deg2rad(0)))); 
			$latS = rad2deg(asin(sin(deg2rad($latitude)) * cos($d / $r) 
			        + cos(deg2rad($latitude)) * sin($d / $r) * cos(deg2rad(180))));
			$lonE = rad2deg(deg2rad($longitude) + atan2(sin(deg2rad(90)) 
			        * sin($d / $r) * cos(deg2rad($latitude)), cos($d / $r) 
			        - sin(deg2rad($latitude)) * sin(deg2rad($latN)))); 
			$lonW = rad2deg(deg2rad($longitude) + atan2(sin(deg2rad(270)) 
			        * sin($d / $r) * cos(deg2rad($latitude)), cos($d / $r)
			        - sin(deg2rad($latitude)) * sin(deg2rad($latN)))); 
		}
		$conditions = array();

		if($latitude){
			$conditions['vLattitude'] = $this->input->get('vLattitude');
			$conditions['latN'] =$latN;
			$conditions['latS'] =$latS;
		}
		if($longitude){
			$conditions['vLongitude'] = $this->input->get('vLongitude');
			$conditions['lonE'] =$lonE;
			$conditions['lonW'] =$lonW;
		}
		
		$iSessMemberId 	= $this->input->get('iMemberId');
		$totalPost = $this->post_model->count_post();
		$pageLimit = $this->getConfiguration('FRONT_REC_LIMIT');
		$limit = $pageLimit['vValue'];
		$totalPage = ceil($totalPost/$limit);
		if($this->input->get('page')){
			$pagerId = $this->input->get('page');
			$start = ($pagerId -1) * $limit;
		}else{
			$start = 0;
		}
		
		$latestPost = $this->post_model->get_latest_post($limit,$start,$conditions);
		
		if(!empty($latestPost)){
			
			foreach ($latestPost as $key => $value){
				$iMemberId = $value['iMemberId'];
				
				$latestPost[$key]['dCreatedDate'] = $this->relativeDate(strtotime($value['dCreatedDate']));
				
				// Memmber picture
				$vPictureNotAvailable = $this->config->item('member_picture_url')."picture_not_available.jpeg";
				if(!empty($value['vPicture'])){
					$filename = $this->config->item('member_picture_path').$value['iMemberId']."/".$value['vPicture'];
					
					if (file_exists($filename)) {
						$filename = $this->config->item('member_picture_url').$value['iMemberId']."/".$value['vPicture'];
						$latestPost[$key]['vPicture'] = $filename;
					}else{
						$latestPost[$key]['vPicture'] = $vPictureNotAvailable;
					}
				}else{
					$latestPost[$key]['vPicture'] = $vPictureNotAvailable;
				}
				
				// Post categories
				$iPostId = $value['iPostId'];
				$categories = $this->post_categories_model->get_postcategories_details($iPostId);
				$catArr = array();
				foreach ($categories as $key1 => $value1){
					$categoriesName = $this->category_model->get_category_details($value1['iCategoryId']);
					$catArr[] = $categoriesName['vCategory'];
				}
				$catStr = implode(',',$catArr);
				$latestPost[$key]['vCategoriesName'] = $catStr;
				
				// Count total Post Like
				$latestPost[$key]['totalPostLikes'] = $this->post_model->count_total_post_likes($iPostId);
				
				// Count total Post Comment
				$latestPost[$key]['totalPostComments'] = $this->post_model->count_total_post_comments($iPostId);
				
				// Check post like by current logedin member OR not
				$latestPost[$key]['isPostLike'] = 'NO';
				$iPostLikeStatus = $this->post_model->post_like_status($iPostId,$iSessMemberId);
				if($iPostLikeStatus){
					$latestPost[$key]['isPostLike'] = 'YES';
				}
				
				// post image or post video
				if($latestPost[$key]['eFileType'] == 'Video'){
					$latestPost[$key]['vVideothumbnail'] =  $this->config->item('post_file_url').$value['iPostId']."/".$value['vVideothumbnail'];
				}else{
					$latestPost[$key]['vVideothumbnail'] = $this->config->item('post_file_url').$value['iPostId']."/200x200_".$value['vFile'];
				}
				
				$latestPost[$key]['vFile'] = $this->config->item('post_file_url').$value['iPostId']."/".$value['vFile'];

				$latestPost[$key]['tPost'] = ($value['tPost'] != "" || $value['tPost'] != NULL )? $value['tPost'] : '';
				$latestPost[$key]['vLattitude'] = ($value['vLattitude'] != "" || $value['vLattitude'] != NULL )? $value['vLattitude'] : '';
				$latestPost[$key]['vLongitude'] = ($value['vLongitude'] != "" || $value['vLongitude'] != NULL )? $value['vLongitude'] : '';
				$latestPost[$key]['iCountryId'] = ($value['iCountryId'] != "" || $value['iCountryId'] != NULL )? $value['iCountryId'] : '';
				$latestPost[$key]['iStateId'] = ($value['iStateId'] != "" || $value['iStateId'] != NULL )? $value['iStateId'] : '';
				$latestPost[$key]['vCity'] = ($value['vCity'] != "" || $value['vCity'] != NULL )? $value['vCity'] : '';
				$latestPost[$key]['tLikes'] = ($value['tLikes'] != "" || $value['tLikes'] != NULL )? $value['tLikes'] : '';
				$latestPost[$key]['tComments'] = ($value['tComments'] != "" || $value['tComments'] != NULL )? $value['tComments'] : '';
			}
			
			$message['msg'] = $this->getLL('HOME_LATEST_POST','',$iSessMemberId);
			$message['success'] = $this->successFlag;
			
		}else{
			$latestPost = array('iMemberId' => $iSessMemberId);
			$message['msg'] = $this->getLL('POST_NOT_AVAILABLE','',$iSessMemberId);
			$message['success'] = $this->errorFlag;
		}
		
		$dataArry = array(
			'data'    => $latestPost,
			'message' => $message
		);
		
		header('Content-type: application/json');
		$main = json_encode($dataArry);
		echo $main;
		exit;
	}
	
	/**
	 * Function: Newsfeed for member profile
	 * In the newsfeed: show likes, comments and posts by followers
	 * @param $iProfilerId (Profiler ID)
	 */
	function newsFeed($iMemberId,$isMergeNewsFeed,$onlyPostShowInFeed){
		
		// ME and FOLLOWING click parameters 1)iProfilerId, 2) eNewsFeedType
		
		$eNewsFeedType = '';
		if(!empty($iMemberId) && $isMergeNewsFeed == true){
			$iMemberId = $iMemberId;
			$iSessMemberId 	= $iMemberId;
			$eNewsFeedType = 'ME';
		}
		
		if($this->input->get('iProfilerId')){
			$iMemberId   	= $this->input->get('iProfilerId');
			$iSessMemberId 	= $this->input->get('iMemberId');
			
			// Condition for Notification (Me and Following)
			if($this->input->get('eNewsFeedType')){
				$eNewsFeedType  = $this->input->get('eNewsFeedType');
			}
		}
		
		if(!empty($iMemberId)){
			
			// Get followers Ids
			if($eNewsFeedType == 'ME'){
				$getFollowersId['result'][0]['iFollowerId'] = $iMemberId;
				$getFollowersId['fieldName'] = 'iFollowerId';
			}else{
				$getFollowersId = $this->member_model->get_followers_id($iMemberId,$eNewsFeedType);
			}
			
			if(!empty($getFollowersId['result'])){
				$followersArr = array();
				foreach ($getFollowersId['result'] as $key => $value){
					$followersArr[] = $value[$getFollowersId['fieldName']];
				}
				$data['followersId'] = $followersArr;//implode(',',array_unique($followersArr));
				
				// Pagination
				//$totalNewsFeed = $this->post_model->count_followers_newsfeed($data['followersId']);
				$pageLimit = $this->getConfiguration('FRONT_REC_LIMIT');
				$limit = $pageLimit['vValue'];
				//$totalPage = ceil($totalNewsFeed/$limit);
				
				if($this->input->get('page')){
					$pagerId = $this->input->get('page');
					$start = ($pagerId -1) * $limit;
				}else{
					$start = 0;
				}
				
				$newsFeedData = $this->post_model->get_followers_newsfeed($data['followersId'],$limit,$start,$onlyPostShowInFeed,$eNewsFeedType);
				//$this->arrPrint($newsFeedData);
				if(!empty($newsFeedData)){
					
					// Set date in time ago formate and post Image
					foreach ($newsFeedData as $key => $value){
						$vPictureNotAvailable = $this->config->item('member_picture_url')."picture_not_available.jpeg";
						$memberImage = $this->member_model->get_member_details($value['iMemberId']);
						if(!empty($memberImage['vPicture'])){
							$filename = $this->config->item('member_picture_path').$memberImage['iMemberId']."/".$memberImage['vPicture'];
							
							if (file_exists($filename)) {
								$filename = $this->config->item('member_picture_url').$memberImage['iMemberId']."/".$memberImage['vPicture'];
								$newsFeedData[$key]['vPicture'] = $filename;
							}else{
								$newsFeedData[$key]['vPicture'] = $vPictureNotAvailable;
							}
						}else{
							$newsFeedData[$key]['vPicture'] = $vPictureNotAvailable;
						}
						
						// post image or post video
						if($newsFeedData[$key]['eFileType'] == 'Video'){
							$newsFeedData[$key]['vVideothumbnail'] =  $this->config->item('post_file_url').$value['iPostId']."/".$value['vVideothumbnail'];
						}else{
							//$newsFeedData[$key]['vVideothumbnail'] = $this->config->item('post_file_url').$value['iPostId']."/200x200_".$value['vFile'];
							$newsFeedData[$key]['vVideothumbnail'] = $this->config->item('post_file_url').$value['iPostId']."/".$value['vFile'];
						}
						
						$vPictureNotAvailable = $this->config->item('post_file_url')."picture_not_available.jpeg";
						
						// Post image
						if(!empty($value['vFile'])){
							$filename = $this->config->item('post_file_path').$value['iPostId']."/".$value['vFile'];
							
							if (file_exists($filename)) {
								$filename = $this->config->item('post_file_url').$value['iPostId']."/".$value['vFile'];
								$newsFeedData[$key]['vFile'] = $filename;
							}else{
								$newsFeedData[$key]['vFile'] = $vPictureNotAvailable;
							}
						}else{
							$newsFeedData[$key]['vFile'] = $vPictureNotAvailable;
						}
						
						if($eNewsFeedType == 'ME'){
							// Post LIKE, COMMENTS, POST strings, eg xyz likes your post.
							if($newsFeedData[$key]['eFeedType'] == 'LIKE' && $newsFeedData[$key]['iMemberId'] != $newsFeedData[$key]['postUsername']){
								$newsFeedData[$key]['tDescription'] = $newsFeedData[$key]['vUsername'].' '.$this->getLL('POST_LIKE_MESSAGE','',$iMemberId);
								$newsFeedData[$key]['vUsername'] = $newsFeedData[$key]['postUsername'];
							}
							
							// Post LIKE, COMMENTS, POST strings, eg xyz likes your comments
							if($newsFeedData[$key]['eFeedType'] == 'COMMENT' && $newsFeedData[$key]['iMemberId'] != $newsFeedData[$key]['postUsername']){
								$newsFeedData[$key]['tDescription'] = $newsFeedData[$key]['vUsername'].' '.$this->getLL('COMMENTS_ON_POST','',$iMemberId);
								$newsFeedData[$key]['vUsername'] = $newsFeedData[$key]['postUsername'];
							}
						}
						
						if($eNewsFeedType == 'FOLLOWING'){
							// Post LIKE, COMMENTS, POST strings, eg add new post.
							if($newsFeedData[$key]['eFeedType'] == 'POST'){
								$newsFeedData[$key]['tDescription'] = $this->getLL('ADD_NEW_POST','',$iMemberId);
								$newsFeedData[$key]['vUsername'] = $newsFeedData[$key]['postUsername'];
							}
							
							// Post LIKE, COMMENTS, POST strings, eg likes your post.
							if($newsFeedData[$key]['eFeedType'] == 'LIKE' && $newsFeedData[$key]['iMemberId'] != $newsFeedData[$key]['postUsername']){
								$usernameFlag = '';
								if($newsFeedData[$key]['postMemberId'] == $iMemberId){
									$usernameFlag = $this->getLL('POST_YOUR_WORDS','',$iMemberId);
								}else{
									$usernameFlag = $newsFeedData[$key]['postUsername'];
								}
								
								$newsFeedData[$key]['tDescription'] = $this->getLL('POST_LIKES','',$iMemberId).' '.$usernameFlag.' '.$this->getLL('POST_MESSAGE','',$iMemberId).'.';
							}
							
							// Post LIKE, COMMENTS, POST strings, eg xyz likes your comments
							if($newsFeedData[$key]['eFeedType'] == 'COMMENT' && $newsFeedData[$key]['iMemberId'] != $newsFeedData[$key]['postUsername']){
								$usernameFlag = '';
								if($newsFeedData[$key]['postMemberId'] == $iMemberId){
									$usernameFlag = $this->getLL('POST_YOUR_WORDS','',$iMemberId);
								}else{
									$usernameFlag = $newsFeedData[$key]['postUsername'];
								}
								$newsFeedData[$key]['tDescription'] = $this->getLL('POST_COMMENTS','',$iMemberId).' '.$usernameFlag.' '.$this->getLL('POST_MESSAGE','',$iMemberId).'.';
							}
						}
						
						// Count total Post Like
						$newsFeedData[$key]['totalPostLikes'] = $this->post_model->count_total_post_likes($value['iPostId']);
						
						// Count total Post Comment
						$newsFeedData[$key]['totalPostComments'] = $this->post_model->count_total_post_comments($value['iPostId']);
						
						$newsFeedData[$key]['dCreatedDate'] = $this->relativeDate(strtotime($value['dCreatedDate']));

						$newsFeedData[$key]['iCommentId'] = ($value['iCommentId'] != "" || $value['iCommentId'] != NULL )? $value['iCommentId'] : '';
						$newsFeedData[$key]['iLikeId'] = ($value['iLikeId'] != "" || $value['iLikeId'] != NULL )? $value['iLikeId'] : '';
						$newsFeedData[$key]['tComments'] = ($value['tComments'] != "" || $value['tComments'] != NULL )? $value['tComments'] : '';
						//$newsFeedData[$key]['vVideothumbnail'] = ($value['vVideothumbnail'] != "" || $value['vVideothumbnail'] != NULL )? $value['vVideothumbnail'] : '';
						
						if($eNewsFeedType == 'ME' && $isMergeNewsFeed == false){
							if($newsFeedData[$key]['eFeedType'] == 'POST'){
								unset($newsFeedData[$key]);
							}
						}
					}
					
					$message['msg'] = $this->getLL('NEWS_FEEDS_AVAILABLE','',$iMemberId);
					$message['success'] = $this->successFlag;
				}else{
					$newsFeedData = array('iProfilerId' => $iMemberId);
					$message['msg'] = $this->getLL('NEWS_FEEDS_NOT_AVAILABLE','',$iMemberId);
					$message['success'] = $this->errorFlag;
				}
				
			}else{
				$newsFeedData = array('iProfilerId' => $iMemberId);
				$message['msg'] = $this->getLL('NEWS_FEEDS_NOT_AVAILABLE','',$iMemberId);
				$message['success'] = $this->errorFlag;
			}
		}else{
			$newsFeedData = array('iProfilerId' => $iMemberId);
			$message['msg'] = $this->getLL('TRY_LATER_ERROR','',$iMemberId);
			$message['success'] = $this->errorFlag;
		}
		
		
		if($eNewsFeedType == 'ME' && $isMergeNewsFeed == false && !empty($newsFeedData)){
			$countKey = 0;
			$newsFeedData1 = array();
			foreach ($newsFeedData as $key => $value){
				$newsFeedData1[$countKey] = $value;
				$countKey++;
			}
			$newsFeedData = $newsFeedData1;
		}
		if(empty($newsFeedData) && ($eNewsFeedType == 'ME' || $eNewsFeedType == 'FOLLOWING')){
			$newsFeedData = array('iProfilerId' => $iMemberId);
			$message['msg'] = $this->getLL('TRY_LATER_ERROR','',$iMemberId);
			$message['success'] = $this->errorFlag;
		}
		
		// Notification message
		if($eNewsFeedType == 'ME' || $eNewsFeedType == 'FOLLOWING'){
			if($message['success'] == $this->errorFlag){
				$message['msg'] = $this->getLL('NOTIFICATION_NOT_AVAILABLE','',$iMemberId);
			}else{
				$message['msg'] = $this->getLL('NOTIFICATION_AVAILABLE','',$iMemberId);
			}
		}
		
		//$this->arrPrint($newsFeedData);
		
		if($isMergeNewsFeed){
			
			$dataArry = array(
				'data' 	  => $newsFeedData,
				'message' => $message
			);
			//$this->arrPrint($dataArry);
			header('Content-type: application/json');
			$main = json_encode($dataArry);
			return $main;
		}else{
			
			$dataArry = array(
				'data' 	  => $newsFeedData,
				'message' => $message
			);
			//$this->arrPrint($dataArry);
			header('Content-type: application/json');
			$main = json_encode($dataArry);
			echo $main;
			exit;
		}
	}
	
	//get all categories 
	function getCategories()
	{
		$all_categories = $this->category_model->get_all_categories();
		
		$iMemberId = $this->input->get('iMemberId');
		if($all_categories){
			for ($i=0; $i<count($all_categories); $i++)
			{
				$all_categories[$i]['vImage'] = $this->config->item('category_icon_url').$all_categories[$i]['iCategoryId']."/".$all_categories[$i]['vIcon'];
			}
			
			$message['success'] = $this->successFlag;
			$message['msg'] = $this->getLL('POST_CATEGORY_LIST_SUCCESS','',$iMemberId);
			
		}else{
			$message['msg'] = $this->getLL('POST_CATEGORY_NOT_AVAILABLE','',$iMemberId);
			$message['success'] = $this->errorFlag;
		}
		
		$data = array(
			'data' => $all_categories,
			'message' => $message
		);
		
		header('Content-type: application/json');
		$main = json_encode($data);
		echo $main;
		exit;  
	}
	
	//set Post
	function setPost()
	{
		if(!$this->input->post() || !$_FILES){
		
		echo '<html>
		<head></head>
			<body>
			<form action="" method="post"
			enctype="multipart/form-data">
			<table border="1" cellpadding="5">
				<tr>
					<td>Current Login Member ID:</td><td><input type="text" name="iMemberId" value="" /></td>
				</tr><!--<tr>
		 			<td>Username:</td><td><input type="text" name="vUsername" value="" /></td>
		 		</tr><tr>
		 			<td>Name:</td><td><input type="text" name="vName" value="" /></td>
		 		</tr>--!>
				<tr>
					<td>Post Headline:</td><td><input type="text" name="tPost" value="" /></td>
				</tr>
				<tr valign="top">
					<td>Categories:</td><td><textarea name="vCategoryId"></textarea></td>
				</tr>
				<tr valign="top">
					<td>Comment:</td><td><textarea name="tComments"></textarea></td>
				</tr>
				<tr>
					<td>File Type:</td><td><select name="eFileType"><option value="Image">Image</option><option value="Video">Video</option></select></td>
				</tr>
				
				<tr>
					<td>isShareWithTwitter:</td><td><input type="text" name="isShareWithTwitter" value="" /></td>
				</tr>
				
				<tr>
					<td>vType:</td><td><input type="text" name="vType" value="" /></td>
				</tr>
				<tr>
					<td>degrees:</td><td><input type="text" name="imagerotation" value="" /></td>
				</tr>
				<tr>
					<td>Longitude:</td><td><input type="text" name="vLattitude" value="" /></td>
				</tr>
				<tr>
					<td><label for="file">Upload:</label></td>
					<td><input type="file" name="vFile" id="file"></td>
				</tr>
				<tr>
					<td colspan="2" align="center"><input type="submit" name="submit" value="Submit"><a style="cursor: pointer;" onclick="myNavFunc();">Take me there!</a></td>
				</tr>
			</table>
			</form>
			
			</body>
			</html>';
			echo 'Hi.,..!';
			exit;
		}
		
		if($this->input->post()){
			$iMemberId = $this->input->post('iMemberId');
			$memberData = $this->member_model->get_member_details($iMemberId);
						
/*(
    [iMemberId] => 217
    [tPost] => asdaddd
    [imagerotation] => 0
    [vType] => IOS
    [vLongitude] => -122.406417
    [vLattitude] => 37.785834
    [eFileType] => Image
    [tComments] => Ddddfdsf 

    [vCategoryId] => 68
    [action] => setPost
    [iCountryId] => US
    [iStateId] => CA
    [vCity] => San Francisco
    [isShareWithFacebook] => 
    [isShareWithTwitter] => 
    [vIP] => error
);*/

			$data['iMemberId'] 		= $iMemberId;
			$data['tPost'] 			= $this->input->post('tPost');
			$data['iCountryId'] 	= $this->input->post('iCountryId');
			$data['iStateId'] 		= $this->input->post('iStateId');
			$data['vCity'] 			= $this->input->post('vCity');
			$data['eFileType'] 		= $this->input->post('eFileType');
			
			$isShareWithFacebook 	= $this->input->post('isShareWithFacebook');
			$isShareWithTwitter 	= $this->input->post('isShareWithTwitter');
			$data['vIP'] = $this->input->post('vIP');
			$data['tDescription'] 	= $this->input->post('tComments');
			$data['dCreatedDate'] 	= date('Y-m-d H:i:s');
			$data['vLattitude'] 	= $this->input->post('vLattitude');
			$data['vLongitude'] 	= $this->input->post('vLongitude');

			/*$data['iMemberId'] 		= 217;//$iMemberId;
			$data['tPost'] 			= 'New Post 1';//$this->input->post('tPost');
			$data['iCountryId'] 	= 'US';//$this->input->post('iCountryId');
			$data['iStateId'] 		= 'CA';//$this->input->post('iStateId');
			$data['vCity'] 			= 'San Francisco';//$this->input->post('vCity');
			$data['eFileType'] 		= 'Image';//$this->input->post('eFileType');
			
			$isShareWithFacebook 	= '';//$this->input->post('isShareWithFacebook');
			$isShareWithTwitter 	= '';//$this->input->post('isShareWithTwitter');
			$data['vIP'] = 'error';//$this->input->post('vIP');
			$data['tDescription'] 	= 'Ddddfdsf';//$this->input->post('tComments');
			$data['dCreatedDate'] 	= date('Y-m-d H:i:s');
			$data['vLattitude'] 	= -122.406417;//$this->input->post('vLattitude');
			$data['vLongitude'] 	= 37.785834;//$this->input->post('vLongitude');*/
			
			/*echo '<pre>';
			print_r($_POST);*/
			$postDate = date('Y-m-d');
			$postValidation = $this->post_model->is_post_exist($iMemberId,$postDate,$data['tPost']);
			
			if($postValidation){
				
				$message['msg'] = $this->getLL('DUPLICATE_POST_NOT_ALLOW','',$iMemberId);
				$message['success'] = $this->errorFlag;
				
				$dataArry = array(
					'data' => $data,
					'message' => $message
				);
				
				header('Content-type: application/json');
				$main = json_encode($dataArry);
				echo  $main.'';
				exit;
			}
			
			$postDataId = $this->post_model->add_post($data);
			// Post file
			$new_image_name = '';
			if(!empty($_FILES['vFile']['name']) && !empty($postDataId)){
				$data['iPostId'] = $postDataId;
				$dir = $this->config->item('post_file_path').$data['iPostId'];
				if(!is_dir($dir)){
					if (!mkdir($dir, 0777, true)) {
					    $message['msg'] = $this->getLL('ULOAD_FILE_ERROR','',$iMemberId);
						$message['success'] = $this->errorFlag;
					}
				}
				$fileType = strtolower(substr($_FILES['vFile']['name'], strrpos($_FILES['vFile']['name'], '.') + 1));
				$new_image_name = $postDataId.'.'.$fileType;
				$fullfilename = $this->config->item('post_file_path').$postDataId.'/'.$new_image_name;
				move_uploaded_file($_FILES['vFile']['tmp_name'], $fullfilename);
				// Image rotation
				$fromIos = $this->input->post('vType');
				
				$folderName = 'post';
				$fieldName = 'vFile';
				$i = $this->do_upload_partner($postDataId,$folderName,$fieldName);

				if($fromIos == 'IOS' && $data['eFileType'] != 'Video')
				{
					// File and rotation
					$imgNameArr = array($this->config->item('post_file_path').$postDataId.'/'.$new_image_name,$this->config->item('post_file_path').$postDataId.'/200x200_'.$new_image_name);
					for($i = 0;$i<=1;$i++)
					{
						$rotateFilename = $imgNameArr[$i];
						$degrees = $this->input->post('imagerotation');
						$degrees = 360-(360+($degrees));
						// Content type
						if($fileType == 'png' || $fileType == 'PNG')
						{
							//echo 'Image PNG'.PHP_EOL;
							header('Content-type: image/png');
							$source = imagecreatefromjpeg($rotateFilename);
							$bgColor = imagecolorallocatealpha($source, 255, 255, 255, 127);
							// Rotate 
							//echo 'Image PNG 2'.PHP_EOL;
							$rotate = imagerotate($source, $degrees, $bgColor);
							imagesavealpha($rotate, true);
							imagepng($rotate,$rotateFilename);
						}
						if($fileType == 'jpg' || $fileType == 'jpeg')
						{
							//echo 'Image PNG 3'.PHP_EOL;

							header('Content-type: image/jpeg');
							$source = imagecreatefromjpeg($rotateFilename);
							// Rotate 
							//echo 'Image PNG 4'.PHP_EOL;
							$rotate = imagerotate($source, $degrees, 0);
							imagejpeg($rotate,$rotateFilename);
						}
						
						// Free the memory
						imagedestroy($source);
						imagedestroy($rotate);
					}
				}
				//echo 'Image post_model  1'.PHP_EOL;
				$fileurl = $this->config->item('post_file_url').$postDataId.'/'.$new_image_name;
				$data['vFile'] 			= $fileurl;
				$picData['iPostId'] 	= $postDataId;
				$picData['vFile']		= $new_image_name;
				$this->post_model->update_post_file($picData);
				//echo 'Image post_model  2'.PHP_EOL;
			}
			
			// Facebook API call for post
			if($postDataId){
				if($data['eFileType'] == 'Video'){
					$fileFullPath = $this->config->item('post_file_url').$postDataId.'/'.$new_image_name;
					$dir = $this->config->item('post_file_path').$postDataId;
					
					//$newVideoThumbnailName = $this->generatVideoThumbnail($new_image_name,$postDataId);
					$newVideoThumbnailName = $this->generateThumbnail($new_image_name,$postDataId);
					
					// update table post for video thumbnail
					if($newVideoThumbnailName){
						$data['vVideothumbnail'] = $this->config->item('post_file_url').$postDataId.'/'.$newVideoThumbnailName;
						
						$picData['iPostId'] 	= $postDataId;
						$picData['vVideothumbnail']		= $newVideoThumbnailName;
						$this->post_model->update_post_file($picData);
					}
					
				}else{
					//echo 'Image post_file_url  1'.PHP_EOL;
					$fileFullPath = $this->config->item('post_file_url').$postDataId.'/'.$new_image_name;
					//echo 'Image post_file_url  2'.PHP_EOL;
				}
				
				$memberData = $this->member_model->get_all_info_of_member($iMemberId);
				if($isShareWithFacebook == 'FACEBOOK'){
					$postDataArr = array(
						'member' => array(
							'vFacebookId' => $memberData['vFacebookId'],
							'tFacebookToken' => $memberData['tFacebookToken']
						),
						'post' => array(
							'tPost' => $data['tPost'],
							'tDescription' => $data['tDescription'],
							#'picture' => $postPicture,
							'fileFullPath' => $fileFullPath,
							'eFileType' => $data['eFileType']
						)
					);
					$result = $this->facebookpost->setMemberPost($postDataArr);
				}
				
				if($isShareWithTwitter == 'TWITTER'){
					$postDataArr = array(
						'member' => array(
							'vTwitterId' => $memberData['vTwitterId'],
							'tTwitterToken' => $memberData['tTwitterToken']
						),
						'post' => array(
							'tPost' => $data['tPost'],
							'tDescription' => $data['tDescription'],
							#'picture' => $postPicture,
							'fileFullPath' => $fileFullPath,
							'eFileType' => $data['eFileType']
						)
					);
					
					$result = $this->twitterPost->setMemberPost($postDataArr);
					//$this->arrPrint($postDataArr);
				}
			}
			//exit;
			// Insert multiple category to post_categories_model
			$postCategories = $this->input->post('vCategoryId');
			if(!empty($postCategories)){
				$categories = explode(',',$postCategories);
				$catIdArr = array();
				foreach ($categories as $key => $value){
					$catIdArr['iPostId'] 	 = $postDataId;
					$catIdArr['iCategoryId'] = $value;
					$this->post_categories_model->add_post_category($catIdArr);
				}
			}
			
			// Push Notification Data
			if($postDataId){
				
				$followingsIds = $this->member_model->get_profiler_following($iMemberId);
				$followingsIdsArr = array();
				foreach ($followingsIds as $key => $value){
					$followingsIdsArr[] = $value['iFollowerId'];
				}
				
				$memberDeviceInfo = array();
				if(!empty($followingsIdsArr)){
					$followingsIdsStr = implode(',',$followingsIdsArr);
					$memberDeviceInfo = $this->member_model->get_member_device_info($followingsIdsStr);	
				}
				
				$pos = strpos($data['tPost'], 200);
				$memberPostStr = mb_substr($data['tPost'],0, (($pos)?$pos:200),'UTF-8');
				$memberPostStr = $memberPostStr.'...';
				$pushNotificationData = array();
				foreach ($memberDeviceInfo as $key => $value){
					
					$pushNotificationData['action'] = 'sendNotification';
					$pushNotificationData['vDeviceid'] = $value['vDeviceid'];
					$pushNotificationData['msg'] = $memberData['vUsername'].' added post '.$memberPostStr;
					
					$this->pushNotification($pushNotificationData);
				}
				
			}
			//echo 'Image postDataId  1'.PHP_EOL;
			if($postDataId){
				$data['postId'] = $postDataId;
				
				$getUserName = $this->member_model->get_member_details($iMemberId);
				// Add post into newsfeed
				$newsfeedData['iPostId'] 		= $postDataId;
				$newsfeedData['iMemberId']		= $iMemberId;
				$newsfeedData['vUsername'] 		= $getUserName['vUsername'];
				$newsfeedData['tPost'] 			= $data['tPost'];
				$newsfeedData['tDescription']	= $data['tDescription'];
				$newsfeedData['tComments']		= '';
				$newsfeedData['dCreatedDate']	= $data['dCreatedDate'];
				$newsfeedData['vFile']			= $new_image_name;
				$newsfeedData['eFileType']			= $data['eFileType'];
				
				// If post video, store generated new videothumbnail
				if($data['eFileType'] == 'Video'){
					$newsfeedData['vVideothumbnail'] = $newVideoThumbnailName;
				}
				$newsfeedData['eFeedType']		= 'POST';
				
				$this->post_model->add_newsfeed($newsfeedData);
				
				$data['vFile'] = $this->config->item('post_file_url').$postDataId.'/'.$new_image_name;
				
				$message['msg'] = $this->getLL('POST_ADD_SUCCESS','',$iMemberId);
				$message['success'] = $this->successFlag;
			}else{
				$message['msg'] = $this->getLL('TRY_LATER_ERROR','',$iMemberId);
				$message['success'] = $this->errorFlag;
			}
			
		}else{
			$iMemberId = $this->input->post('iMemberId');
			$data = array('iMemberId' => $iMemberId);
			$message['success'] = $this->errorFlag;
			$message['msg'] = $this->getLL('TRY_LATER_ERROR','',$iMemberId);
		}
		//echo 'Image postDataId  8'.PHP_EOL;
		$dataArry = array(
			'data' => $data,
			'message' => $message
		);
		
		/*print_r($dataArry);
		exit;*/
		header('Content-type: application/json');
		$main = json_encode($dataArry);
		echo  $main.'';
		exit;
		
	}
	
	// generat video thumbnail
	function generatVideoThumbnail($file, $iPostId){
		if($_REQUEST['url']){
			$url = $_REQUEST;
			$fileurl = $url['url'];
			
			$videoPostId = $iPostId;
			$videoPostId = $_REQUEST['postid'];
			
			$file = fopen($fileurl,"rb");
			$dir = $this->config->item('post_file_path').$videoPostId;
			
			if(!is_dir($dir)){
				if (!mkdir($dir, 0777, true)) {
				    $message['msg'] = "Failed to create folders...";
		  			$message['success'] = $this->errorFlag;
				}
			}
			
			$directory = $dir."/";
			$ext = end(explode(".",strtolower(basename($fileurl))));
			
		    $new_image_name = $videoPostId.'.'.$ext;
		    
		    $fileurl1 = $this->config->item('post_file_path').$videoPostId.'/'.$new_image_name;
		    
		    $ch = curl_init($fileurl);
			$fp = fopen($fileurl1, 'wb');
			curl_setopt($ch, CURLOPT_FILE, $fp);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
			curl_exec($ch);
			curl_close($ch);
			$newfile = fclose($fp);
			
			$newVideoThumbnailName = $new_image_name;
			if($newVideoThumbnailName){

				$picData['iPostId'] 	= $videoPostId;
				$picData['vVideothumbnail']		= $newVideoThumbnailName;
				$this->post_model->update_post_file($picData);
			}
			
		}else{
			$videoFileName  = $this->config->item('post_file_url').$iPostId.'/'.$file;
			
			$serverTwoUrl = "	";
			
			$ch = curl_init();
			$url='http://184.107.213.34/~techiest/php/videoblog/service?action=generatVideoThumbnail&url='.$videoFileName.'&postid='.$iPostId;
			
			@curl_setopt($ch,CURLOPT_URL,$url);
			@curl_exec($ch);
			@curl_close($ch);
		}
		
	}
	
	//get post listing depends on category
	function getPosts()
	{
		$conditions = array();
		if($this->input->get('vLattitude')){
			$conditions['vLattitude'] = $this->input->get('vLattitude');
		}
		if($this->input->get('vLongitude')){
			$conditions['vLongitude'] = $this->input->get('vLongitude');
		}
		
		$totalPost = $this->post_model->count_post();
		$pageLimit = $this->getConfiguration('FRONT_REC_LIMIT');
		$limit = $pageLimit['vValue'];
		if($this->input->get('page')){
			$pagerId = $this->input->get('page');
			$start = ($pagerId -1) * $limit;
		}else{
			$start = 0;
		}
		
		$iCategoryId = $this->input->get('iCategoryId');
		$iMemberId = $this->input->get('iMemberId');
		$post = $this->post_model->get_all_posts($iCategoryId,$limit,$start,$conditions);
		
		if($post){
			for ($i=0; $i<count($post); $i++)
			{
				$iMemberId = $post[$i]['iMemberId'];
				$memberDetails = $this->member_model->get_member_details($iMemberId);
				$post[$i]['vName'] 		= $memberDetails['vName'];
				$post[$i]['vUsername'] 	= $memberDetails['vUsername'];
				// Memmber picture
				$vPictureNotAvailable = $this->config->item('member_picture_url')."picture_not_available.jpeg";
				if(!empty($memberDetails['vPicture'])){
					$filename = $this->config->item('member_picture_path').$memberDetails['iMemberId']."/".$memberDetails['vPicture'];
					
					if (file_exists($filename)) {
						$filename = $this->config->item('member_picture_url').$memberDetails['iMemberId']."/".$memberDetails['vPicture'];
						$post[$i]['vPicture'] = $filename;
					}else{
						$post[$i]['vPicture'] = $vPictureNotAvailable;
					}
				}else{
					$post[$i]['vPicture'] = $vPictureNotAvailable;
				}
				
				// Post categories
				$iPostId = $post[$i]['iPostId'];
				$categories = $this->post_categories_model->get_postcategories_details($iPostId);
				$catArr = array();
				foreach ($categories as $key => $value){
					$categoriesName = $this->category_model->get_category_details($value['iCategoryId']);
					$catArr[] = $categoriesName['vCategory'];
				}
				$catStr = implode(',',$catArr);
				$post[$i]['vCategoriesName'] = $catStr;
				
				// Count total Post Like
				$post[$i]['totalPostLikes'] = $this->post_model->count_total_post_likes($iPostId);
				
				// Count total Post Comment
				$post[$i]['totalPostComments'] = $this->post_model->count_total_post_comments($iPostId);
				
				// post image or post video
				if($post[$i]['eFileType'] == 'Video'){
					$post[$i]['vVideothumbnail'] =  $this->config->item('post_file_url').$post[$i]['iPostId']."/".$post[$i]['vVideothumbnail'];
				}else{
					$post[$i]['vVideothumbnail'] = $this->config->item('post_file_url').$post[$i]['iPostId']."/200x200_".$post[$i]['vFile'];
				}
				
				$post[$i]['vFile'] = $this->config->item('post_file_url').$post[$i]['iPostId']."/".$post[$i]['vFile'];

				$post[$i]['iCountryId'] = ($value['iCountryId'] != "" || $value['iCountryId'] != NULL )? $value['iCountryId'] : '';
				$post[$i]['iStateId'] = ($value['iStateId'] != "" || $value['iStateId'] != NULL )? $value['iStateId'] : '';
				$post[$i]['vCity'] = ($value['vCity'] != "" || $value['vCity'] != NULL )? $value['vCity'] : '';
				$post[$i]['vPhone'] = ($value['vPhone'] != "" || $value['vPhone'] != NULL )? $value['vPhone'] : '';
				$post[$i]['vURL'] = ($value['vURL'] != "" || $value['vURL'] != NULL )? $value['vURL'] : '';
			}
			
			$message['msg'] = $this->getLL('DISPLAY_POST_DATA','',$iMemberId);
			$message['success'] = $this->successFlag;
		}else{
			$post['iCategoryId'] = $iCategoryId;
			$message['msg'] = $this->getLL('POST_NOT_AVAILABLE','',$iMemberId);
			$message['success'] = $this->errorFlag;
		}
		
		$dataArry = array(
			'data' => $post,
			'message' => $message
		);
		header('Content-type: application/json');
		$main = json_encode($dataArry);
		echo $main.'';
		exit;
	}
	
	// get all post
	function getAllPost(){
		$post = $this->post_model->get_all_post($iCategoryId,$limit,$start,$conditions);
		
		if($post){
			for ($i=0; $i<count($post); $i++)
			{
				$iMemberId = $post[$i]['iMemberId'];
				$memberDetails = $this->member_model->get_member_details($iMemberId);
				$post[$i]['vName'] 		= $memberDetails['vName'];
				$post[$i]['vUsername'] 	= $memberDetails['vUsername'];
				// Memmber picture
				$vPictureNotAvailable = $this->config->item('member_picture_url')."picture_not_available.jpeg";
				if(!empty($memberDetails['vPicture'])){
					$filename = $this->config->item('member_picture_path').$memberDetails['iMemberId']."/".$memberDetails['vPicture'];
					
					if (file_exists($filename)) {
						$filename = $this->config->item('member_picture_url').$memberDetails['iMemberId']."/".$memberDetails['vPicture'];
						$post[$i]['vPicture'] = $filename;
					}else{
						$post[$i]['vPicture'] = $vPictureNotAvailable;
					}
				}else{
					$post[$i]['vPicture'] = $vPictureNotAvailable;
				}
				
				// Post categories
				$iPostId = $post[$i]['iPostId'];
				$categories = $this->post_categories_model->get_postcategories_details($iPostId);
				$catArr = array();
				foreach ($categories as $key => $value){
					$categoriesName = $this->category_model->get_category_details($value['iCategoryId']);
					$catArr[] = $categoriesName['vCategory'];
				}
				$catStr = implode(',',$catArr);
				$post[$i]['vCategoriesName'] = $catStr;
				
				// Count total Post Like
				$post[$i]['totalPostLikes'] = $this->post_model->count_total_post_likes($iPostId);
				
				// Count total Post Comment
				$post[$i]['totalPostComments'] = $this->post_model->count_total_post_comments($iPostId);
				
				// post image or post video
				if($post[$i]['eFileType'] == 'Video'){
					$post[$i]['vVideothumbnail'] =  $this->config->item('post_file_url').$post[$i]['iPostId']."/".$post[$i]['vVideothumbnail'];
				}else{
					$post[$i]['vVideothumbnail'] = $this->config->item('post_file_url').$post[$i]['iPostId']."/200x200_".$post[$i]['vFile'];
				}
				
				$post[$i]['vFile'] = $this->config->item('post_file_url').$post[$i]['iPostId']."/".$post[$i]['vFile'];

				/*$post[$i]['iCountryId'] = ($value['iCountryId'] != "" || $value['iCountryId'] != NULL )? $value['iCountryId'] : '';
				$post[$i]['iStateId'] = ($value['iStateId'] != "" || $value['iStateId'] != NULL )? $value['iStateId'] : '';
				$post[$i]['vCity'] = ($value['vCity'] != "" || $value['vCity'] != NULL )? $value['vCity'] : '';
				$post[$i]['vPhone'] = ($value['vPhone'] != "" || $value['vPhone'] != NULL )? $value['vPhone'] : '';
				$post[$i]['vURL'] = ($value['vURL'] != "" || $value['vURL'] != NULL )? $value['vURL'] : '';*/
			}
			
			$message['msg'] = $this->getLL('DISPLAY_POST_DATA','',$iMemberId);
			$message['success'] = $this->successFlag;
		}else{
			$post['iCategoryId'] = $iCategoryId;
			$message['msg'] = $this->getLL('POST_NOT_AVAILABLE','',$iMemberId);
			$message['success'] = $this->errorFlag;
		}
		
		$dataArry = array(
			'data' => $post,
			'message' => $message
		);
		//echo '<pre>';print_r($dataArry);exit;
		header('Content-type: application/json');
		$main = json_encode($dataArry);
		echo $main.'';
		exit;
	}
	
	//get post details for post detail page 
	function getPostdetails()
	{
		$iPostId = $this->input->get('iPostId');
		$iSessMemberId 	= $this->input->get('iMemberId');
		//$iPostId = 535;
		//$iSessMemberId=197;
		$post_details = $this->post_model->get_all_postdetails($iPostId);
		
		if($post_details){
			$iMemberId = $post_details['iMemberId'];
			$memberDetails = $this->member_model->get_member_details($iMemberId);
			$post_details['vName'] 		= $memberDetails['vName'];
			$post_details['vUsername'] 	= $memberDetails['vUsername'];
			// Memmber picture
			$vPictureNotAvailable = $this->config->item('member_picture_url')."picture_not_available.jpeg";
			if(!empty($memberDetails['vPicture'])){
				$filename = $this->config->item('member_picture_path').$memberDetails['iMemberId']."/".$memberDetails['vPicture'];
				
				if (file_exists($filename)) {
					$filename = $this->config->item('member_picture_url').$memberDetails['iMemberId']."/".$memberDetails['vPicture'];
					$post_details['vPicture'] = $filename;
				}else{
					$post_details['vPicture'] = $vPictureNotAvailable;
				}
			}else{
				$post_details['vPicture'] = $vPictureNotAvailable;
			}
			
			// Post categories
			$iPostId = $post_details['iPostId'];
			$categories = $this->post_categories_model->get_postcategories_details($iPostId);
			$catArr = array();
			foreach ($categories as $key => $value){
				$categoriesName = $this->category_model->get_category_details($value['iCategoryId']);
				$catArr[] = $categoriesName['vCategory'];
			}
			$catStr = implode(',',$catArr);
			$post_details['vCategoriesName'] = $catStr;
			
			// Count total Post Like
			$post_details['totalPostLikes'] = $this->post_model->count_total_post_likes($iPostId);
			
			// Count total Post Comment
			$post_details['totalPostComments'] = $this->post_model->count_total_post_comments($iPostId);
			
			// Check post like by current logedin member OR not
			$post_details['isPostLike'] = 'NO';
			$iPostLikeStatus = $this->post_model->post_like_status($iPostId,$iSessMemberId);
			if($iPostLikeStatus){
				$post_details['isPostLike'] = 'YES';
			}
			
			// Merge Newsfeeds
			$isMergeNewsFeed = TRUE;
			$onlyPostShowInFeed = 'POST';
			$post_details['newsFeeds'] = $this->newsFeed($iMemberId,$isMergeNewsFeed,$onlyPostShowInFeed);
			
			// post image or post video
			if($post_details['eFiletype'] == 'Video'){
				$post_details['vVideothumbnail'] =  $this->config->item('post_file_url').$post_details['iPostId']."/".$post_details['vVideothumbnail'];
			}else{
				$post_details['vVideothumbnail'] =  $this->config->item('post_file_url').$post_details['iPostId']."/200x200_".$post_details['vFile'];
			}
			
			$post_details['vFile'] = $this->config->item('post_file_url').$post_details['iPostId']."/".$post_details['vFile'];	

			$post_details['iCountryId'] = ($value['iCountryId'] != "" || $value['iCountryId'] != NULL )? $value['iCountryId'] : '';
			$post_details['iStateId'] = ($value['iStateId'] != "" || $value['iStateId'] != NULL )? $value['iStateId'] : '';
			$post_details['vCity'] = ($value['vCity'] != "" || $value['vCity'] != NULL )? $value['vCity'] : '';
			$post_details['vPhone'] = ($value['vPhone'] != "" || $value['vPhone'] != NULL )? $value['vPhone'] : '';
			$post_details['vURL'] = ($value['vURL'] != "" || $value['vURL'] != NULL )? $value['vURL'] : '';
			
			$message['msg'] = $this->getLL('DISPLAY_POST_DATA','',$iSessMemberId);
			$message['success']= $this->successFlag;	
		}else{
			$post_details['iPostId'] = $iPostId;
			$message['msg'] = $this->getLL('POST_NOT_AVAILABLE','',$iSessMemberId);
			$message['success']= $this->errorFlag;
		}
		
		$dataArry = array(
			'data' => $post_details,
			'message' => $message
		);
		
		header('Content-type: application/json');
		$main = json_encode($dataArry);
		echo $main.'';
		exit;
	}
	
	// delete POST by post ID
	function deletePost(){
		if($this->input->post()){	
			$iPostId 		= $this->input->post('iPostId');
		}else{
			$iPostId 		= $this->input->get('iPostId');	
		}
		
		// $iMemberId 	= $this->input->get('iMemberId');
		$data= $this->post_model->get_post_details($iPostId);
		$deleteImage = $data['vFile'];

		// $data['iPostId'] = $iPostId;
		unlink($this->config->item('post_file_path').$iPostId.'/'.$deleteImage);
		unlink($this->config->item('post_file_path').$iPostId.'/200x200_'.$deleteImage);
    	rmdir($this->config->item('post_file_path').$iPostId);
		
		if(!empty($iPostId)){
			
			$deletePostResult = $this->post_model->delete_post_by_postid($iPostId);
			if($deletePostResult){
				
				// Define flag for all post delete
				$allPost = 'ALL';
				
				// Delete newsfeed data depends on relative post
				$fieldName = 'iPostId';
				$this->post_model->delete_newsfeed($iPostId,'',$fieldName,$allPost);
				
				// Trigger post comments delete depends on post delete
				$this->post_model->delete_comment('','',$iPostId);
				
				// Trigger post like delete depends on post delete
				$this->post_model->unlike_post($iPostId,'',$allPost);
				
				$message['msg'] = $this->getLL('POST_DELETE_SUCCESS','',$iMemberId);
				$message['success'] = $this->successFlag;
			}else{
				$message['msg'] = $this->getLL('POST_NOT_AVAILABLE','',$iMemberId);
				$message['success'] = $this->errorFlag;
			}
		}else{
			$message['msg'] = $this->getLL('POST_NOT_AVAILABLE','',$iMemberId);
			$message['success'] = $this->errorFlag;
		}
		
		$dataArry = array(
			'data' => $data,
			'message' => $message
		);
		
		header('Content-type: application/json');
		$main = json_encode($dataArry);
		echo $main.'';
		exit;
	}
	
	
	//get member profile details to show existing details
	function getProfileDetails()
	{
		$iMemberId = $this->input->post('iMemberId');
		//$iSessMemberId = $iMemberId=90;
		$memberDetails = array('iMemberId' => $iMemberId);
		if(!empty($iMemberId)){
			$memberDetails = $this->member_model->edit_member_details($iMemberId);
			
			if(!empty($memberDetails)){
				// Memmber picture
				$vPictureNotAvailable = $this->config->item('member_picture_url')."picture_not_available.jpeg";
				if(!empty($memberDetails['vPicture'])){
					$filename = $this->config->item('member_picture_path').$memberDetails['iMemberId']."/".$memberDetails['vPicture'];
					
					if (file_exists($filename)) {
						$filename = $this->config->item('member_picture_url').$memberDetails['iMemberId']."/".$memberDetails['vPicture'];
						$memberDetails['vPicture'] = $filename;
					}else{
						$memberDetails['vPicture'] = $vPictureNotAvailable;
					}
				}else{
					$memberDetails['vPicture'] = $vPictureNotAvailable;
				}
				
				// Cover Image
				$vCoverPictureNotAvailable  = $this->config->item('member_picture_url')."cover_picture_not_available.jpeg";
				if(!empty($memberDetails['vCoverImage'])){
					$filename = $this->config->item('member_picture_path').$memberDetails['iMemberId']."/".$memberDetails['vCoverImage'];
					
					if (file_exists($filename)) {
						$filename = $this->config->item('member_picture_url').$memberDetails['iMemberId']."/".$memberDetails['vCoverImage'];
						$memberDetails['vCoverImage'] = $filename;
					}else{
						$memberDetails['vCoverImage'] = $vCoverPictureNotAvailable;
					}
				}else{
					$memberDetails['vCoverImage'] = $vCoverPictureNotAvailable;
				}
				
				// Check current login member and profiler member IF YES set flag YES for provide Edit Link
				// Else check following for followers
				$memberDetails['isCurrentUserLoginMatch'] = 'NO';
				$memberDetails['isFollowing'] = 'NO';
				if($iSessMemberId == $iMemberId){
					$memberDetails['isCurrentUserLoginMatch'] = 'YES';
				}else{
					$isFollowing = $this->member_model->get_profiler_following($iMemberId);
					if(in_array($iSessMemberId,$isFollowing)){
						$memberDetails['isFollowing'] = 'YES';
					}else{
						$memberDetails['isFollowing'] = 'NO';
					}
				}
				
				$memberDetails['totalFollowers']=$memberDetails['totalFollowings']=$memberDetails['totalPostByProfiler']=0;
				
				// Get followers
				$getFollowers = $this->member_model->get_followers($iMemberId);
				$memberDetails['totalFollowers'] = $getFollowers;
				
				// Get following
				$getFollowing = $this->member_model->get_following($iMemberId);
				$memberDetails['totalFollowings'] = $getFollowing;
				
				// Count all post by profiler
				$countTotalPostByProfiler = $this->post_model->count_post_by_profiler_id($iMemberId);
				$memberDetails['totalPostByProfiler'] = $countTotalPostByProfiler;
				
				// Merge Newsfeeds
				$isMergeNewsFeed = TRUE;
				$onlyPostShowInFeed = 'POST';
				$memberDetails['newsFeeds'] = $this->newsFeed($memberDetails['iMemberId'],$isMergeNewsFeed,$onlyPostShowInFeed);
				
				$message['msg'] = $this->getLL('MEMBER_DATA','',$iMemberId);
				$message['success'] = $this->successFlag;
			}else{
				$message['msg'] = $this->getLL('TRY_LATER_ERROR','',$iMemberId);
				$message['success'] = $this->errorFlag;
			}
		}else{
			$message['msg'] = $this->getLL('TRY_LATER_ERROR','',$iMemberId);
			$message['success'] = $this->errorFlag;
		}
		
		$dataArry = array(
			'data' => $memberDetails,
			'message' => $message
		);
		
		header('Content-type: application/json');
		$main = json_encode($dataArry);
		echo  $main.'';
		exit;
	}

	//set member profile details to show existing details 
	function setProfileDetails()
	{
		if(!$this->input->post() || !$_FILES){
			
		echo '<html>
			<body>
			<form action="" method="post"
			enctype="multipart/form-data">
			<table border="1" cellpadding="5">
				<tr>
					<td>Member ID:</td><td><input type="text" name="iMemberId" value="" /></td>
				</tr>
				<tr>
					<td>Email:</td><td><input type="text" name="vEmail" value="" /></td>
				</tr>
				<tr>
					<td>Password:</td><td><input type="password" name="vPassword" value="" /></td>
				</tr>
				<tr>
					<td>Name:</td><td><input type="text" name="vName" value="" /></td>
				</tr>
				<tr>
					<td>Username:</td><td><input type="text" name="vUsername" value="" /></td>
				</tr>
				<tr>
					<td><label for="file">Picture:</label></td>
					<td><input type="file" name="vPicture" id="file"></td>
				</tr>
				<tr>
					<td><label for="file">Cover Image:</label></td>
					<td><input type="file" name="vCoverImage" id="file"></td>
				</tr>
				<tr>
					<td colspan="2" align="center"><input type="submit" name="submit" value="Submit"></td>
				</tr>
			</table>
			</form>
			
			</body>
			</html>';exit;
		}

		$data['iMemberId'] = $this->input->post('iMemberId');
		$data['vName'] = $this->input->post('vName');
		$data['vUsername'] = $this->input->post('vUsername');
		$data['vEmail'] = $this->input->post('vEmail');
		$data['vURL'] = $this->input->post('vURL');
		$data['vPhone'] = $this->input->post('vPhone');
		$data['tDescription'] = $this->input->post('tDescription');
		
		if($this->input->post('vPassword')){
		
			if($this->input->post('vPassword') != '')
			{
				$data['vPassword'] = md5($this->input->post('vPassword'));
			}
		}
		
		$this->member_model->edit_member($data);

		$message['msg'] = $this->getLL('MEMBER_UPDATE_PROFILE_SUCCESS','',$iMemberIdLL);
		$message['success'] = $this->successFlag;		
		
		$dataArry = array(
			
			'message' => $message
		);
		
		header('Content-type: application/json');
		echo json_encode($dataArry);

		$iMemberIdLL = $data['iMemberId'];
		
		$iMemberId = $data['iMemberId'];
		
		// Upload profile picture
		$data['iMemberId'] = $iMemberId;

		if(isset($_FILES['vPicture']['name']))
		{
			if(!empty($_FILES['vPicture']['name']) && !empty($iMemberId)){
				$data['iMemberId'] = $iMemberId;
				$dir = $this->config->item('member_picture_path').$_FILES['vPicture']['name'];
				if(!is_dir($dir)){
					if (!mkdir($dir, 0777, true)) {
					    $message['msg'] = $this->getLL('ULOAD_FILE_ERROR');
						$message['success']= $this->errorFlag;
					}
				}
				$fileType = strtolower(substr($_FILES['vPicture']['name'], strrpos($_FILES['vPicture']['name'], '.') + 1));
				$filename = $_FILES['vPicture']['tmp_name'];
				$new_image_name = $data['iMemberId'].'.'.$fileType;
				$fullfilename = $this->config->item('member_picture_path').$data['iMemberId'].'/'.$new_image_name;
				move_uploaded_file($_FILES["vPicture"]["tmp_name"], $fullfilename);
				// Image rotation
				$fromIos = $this->input->post('vType');
				$folderName = 'member';
				$fieldName = 'vPicture';
				$i = $this->do_upload_partner($iMemberId,$folderName,$fieldName);
				if($fromIos == 'IOS'){
					// File and rotation
					$imgNameArr = array($this->config->item('member_picture_path').$iMemberId.'/'.$new_image_name,$this->config->item('member_picture_path').$iMemberId.'/200x200_'.$new_image_name);
					for($i = 0;$i<=1;$i++){
						$rotateFilename = $imgNameArr[$i];
						$degrees = $this->input->post('imagerotation');
						//if($degrees < 0){
							$degrees = 360-(360+($degrees));
						//}
						// Content type
						if($fileType == 'png' || $fileType == 'PNG'){
							header('Content-type: image/png');
							$source = imagecreatefromjpeg($rotateFilename);
							$bgColor = imagecolorallocatealpha($source, 255, 255, 255, 127);
							// Rotate
							//echo $degrees;exit;
							$rotate = imagerotate($source, $degrees, $bgColor);
							imagesavealpha($rotate, true);
							imagepng($rotate,$rotateFilename);
						}
						if($fileType == 'jpg' || $fileType == 'jpeg'){
							// header('Content-type: image/jpeg');
							$source = imagecreatefromjpeg($rotateFilename);
							// Rotate 
							$rotate = imagerotate($source, $degrees, 0);
							imagejpeg($rotate,$rotateFilename);
						}
						// Free the memory
						imagedestroy($source);
						imagedestroy($rotate);
					}
				}
				$data['vPicture'] = $new_image_name;
			}
		}
		
		// Cover Image

		/*if(isset($_FILES['vCoverImage']['name']))
		{
			if(!empty($_FILES['vCoverImage']['name'])){
				$dir = $this->config->item('member_picture_path').$data['iMemberId'];
				if(!is_dir($dir)){
					if (!mkdir($dir, 0777, true)) {
					    $message['msg']="Failed to create folders...";
						$message['success']= $this->errorFlag;
					}
				}
				$fileType = strtolower(substr($_FILES['vCoverImage']['name'], strrpos($_FILES['vCoverImage']['name'], '.') + 1));
				$filename = $_FILES['vCoverImage']['tmp_name'];
				$new_image_name = $data['iMemberId'].'_cover_image.'.$fileType;
				$fullfilename = $this->config->item('member_picture_path').$data['iMemberId'].'/'.$new_image_name;
				move_uploaded_file($_FILES["vCoverImage"]["tmp_name"], $fullfilename);
				
				$fileurl = $this->config->item('member_picture_url').$data['iMemberId'].'/'.$new_image_name;
				$data['vCoverImage'] = $new_image_name;
			}
		}*/
		
		//$this->arrPrint($data);
		
		$iMemberId = $this->member_model->edit_member($data);
		
		$vPictureNotAvailable = $this->config->item('member_picture_url')."picture_not_available.jpeg";
		$vCoverPictureNotAvailable  = $this->config->item('member_picture_url')."cover_picture_not_available.jpeg";
		if($iMemberId){
			/*if(!empty($iMemberId['vPicture'])){
				$filename = $this->config->item('member_picture_path').$iMemberId['iMemberId']."/".$iMemberId['vPicture'];
			
				if (file_exists($filename)) {
					$filename = $this->config->item('member_picture_url').$iMemberId['iMemberId']."/".$iMemberId['vPicture'];
					$data['vPicture'] = $filename;
				}else{
					$data['vPicture'] = $vPictureNotAvailable;
				}
			}else{
				$data['vPicture'] = $vPictureNotAvailable;
			}
			
			if(!empty($iMemberId['vCoverImage'])){
				$filename = $this->config->item('member_picture_path').$iMemberId['iMemberId']."/".$iMemberId['vCoverImage'];
			
				if (file_exists($filename)) {
					$filename = $this->config->item('member_picture_url').$iMemberId['iMemberId']."/".$iMemberId['vCoverImage'];
					$data['vCoverImage'] = $filename;
				}else{
					$data['vCoverImage'] = $vCoverPictureNotAvailable;
				}
			}else{
				$data['vCoverImage'] = $vCoverPictureNotAvailable;
			}*/
			
			$message['msg'] = $this->getLL('MEMBER_UPDATE_PROFILE_SUCCESS','',$iMemberIdLL);
			$message['success'] = $this->successFlag;
		}else{
			$message['msg'] = $this->getLL('MEMBER_UPDATE_PROFILE_ERROR','',$iMemberIdLL);
			$message['success']  = $this->errorFlag;
		}
		
		$dataArry = array(
			'data' => $data,
			'message' => $message
		);
		
		header('Content-type: application/json');
		$main = json_encode($dataArry);
		
		//echo  $main.'';
		exit;
	}
	
	// set Profile Image
	function setProfileCoverImage(){
		$data['iMemberId'] = $this->input->post('iMemberId');
		$iMemberIdLL = $data['iMemberId'];
		// Cover Image
		if(!empty($_FILES['vCoverImage']['name'])){
			$dir = $this->config->item('member_picture_path').$data['iMemberId'];
			if(!is_dir($dir)){
				if (!mkdir($dir, 0777, true)) {
				    $message['msg']="Failed to create folders...";
					$message['success']= $this->errorFlag;
				}
			}
			$fileType = strtolower(substr($_FILES['vCoverImage']['name'], strrpos($_FILES['vCoverImage']['name'], '.') + 1));
			$filename = $_FILES['vCoverImage']['tmp_name'];
			$new_image_name = $data['iMemberId'].'_cover_image.'.$fileType;
			$fullfilename = $this->config->item('member_picture_path').$data['iMemberId'].'/'.$new_image_name;
			
			if(move_uploaded_file($_FILES["vCoverImage"]["tmp_name"], $fullfilename)){
			
				$fileurl = $this->config->item('member_picture_url').$data['iMemberId'].'/'.$new_image_name;
				$data['vCoverImage'] = $fileurl;
				
				// Update Image
				$picData['iMemberId'] 	= $data['iMemberId'];
				$picData['vCoverImage']	= $new_image_name;
				$result = $this->member_model->update_profile_picture($picData);
				
				if($result){
					$message['msg'] = $this->getLL("MEMBER_PROFILE_COVER_IMAGE",'',$iMemberIdLL);
					$message['success']  = $this->successFlag;
				}else{
					$message['msg'] = $this->getLL("MEMBER_PROFILE_COVER_IMAGE_NOT_AVAILABLE",'',$iMemberIdLL);
					$message['success']  = $this->errorFlag;
				}
			
			}else{
				$message['msg'] = $this->getLL("MEMBER_PROFILE_COVER_IMAGE_NOT_AVAILABLE",'',$iMemberIdLL);
				$message['success']  = $this->errorFlag;
			}
			
		}else{
			$message['msg'] = $this->getLL("MEMBER_PROFILE_COVER_IMAGE_NOT_AVAILABLE",'',$iMemberIdLL);
			$message['success']  = $this->errorFlag;
		}
		
		$dataArry = array(
			'data' => $data,
			'message' => $message
		);
		
		header('Content-type: application/json');
		$main = json_encode($dataArry);
		echo  $main.'';
		exit;
	}
	
	// unlink Member cover image
	function deleteProfileCoverImage(){
		$data['iMemberId'] = $this->input->get('iMemberId');
		$iMemberIdLL = $data['iMemberId'];
		
		if($data['iMemberId']){
			$iMemberId = $data['iMemberId'];
			$memberDetails = $this->member_model->get_member_details($iMemberId);
			$coverImage = $memberDetails['vCoverImage'];
			$fullfilename = $this->config->item('member_picture_path').$iMemberId.'/'.$coverImage;

			$deletePostResult = $this->member_model->delete_image($iMemberId,$coverImage);
			
			if(file_exists($fullfilename)) {
				unlink($fullfilename);
				rmdir($this->config->item('member_picture_path').$iMemberId);
				// Update Image
				$picData['iMemberId'] 	= $data['iMemberId'];
				$picData['vCoverImage']	= '';
				$result = $this->member_model->update_profile_picture($picData);
				
				$message['msg']= $this->getLL("REMOVE_MEMBER_COVER_IMAGE",'',$iMemberIdLL);
				$message['success']  = $this->successFlag;
			}else{
				$message['msg']= $this->getLL("REMOVE_ERROR_MEMBER_COVER_IMAGE",'',$iMemberIdLL);
				$message['success']  = $this->errorFlag;
			}
			
		}else{
			$message['msg']= $this->getLL("REMOVE_ERROR_MEMBER_COVER_IMAGE",'',$iMemberIdLL);
			$message['success']  = $this->errorFlag;
		}
		
		$dataArry = array(
			'data' => $data,
			'message' => $message
		);
		
		header('Content-type: application/json');
		$main = json_encode($dataArry);
		echo  $main.'';
		exit;
		
	}
	
	//get user public profile 
	function getPublicProfile()
	{
		$iSessMemberId   = $this->input->post('iSessMemberId');
		$iMemberId = $this->input->post('iProfilerId');
		//$iSessMemberId = $iMemberId =223;
		$memberDetails = array('iSessMemberId' => $iSessMemberId,'iProfilerId' => $iMemberId);
		
		if(!empty($iSessMemberId) && !empty($iMemberId)){
		
			$memberDetails = $this->member_model->get_member_details($iMemberId);
			
			if(!empty($memberDetails)){
				// Memmber picture
				$vPictureNotAvailable = $this->config->item('member_picture_url')."picture_not_available.jpeg";
				if(!empty($memberDetails['vPicture'])){
					$filename = $this->config->item('member_picture_path').$memberDetails['iMemberId']."/".$memberDetails['vPicture'];
					
					if (file_exists($filename)) {
						$filename = $this->config->item('member_picture_url').$memberDetails['iMemberId']."/".$memberDetails['vPicture'];
						$memberDetails['vPicture'] = $filename;
					}else{
						$memberDetails['vPicture'] = $vPictureNotAvailable;
					}
				}else{
					$memberDetails['vPicture'] = $vPictureNotAvailable;
				}
				
				// Cover Image
				$vCoverPictureNotAvailable  = $this->config->item('member_picture_url')."cover_picture_not_available.jpeg";
				if(!empty($memberDetails['vCoverImage'])){
					$filename = $this->config->item('member_picture_path').$memberDetails['iMemberId']."/".$memberDetails['vCoverImage'];
					
					if (file_exists($filename)) {
						$filename = $this->config->item('member_picture_url').$memberDetails['iMemberId']."/".$memberDetails['vCoverImage'];
						$memberDetails['vCoverImage'] = $filename;
					}else{
						$memberDetails['vCoverImage'] = $vCoverPictureNotAvailable;
					}
				}else{
					$memberDetails['vCoverImage'] = $vCoverPictureNotAvailable;
				}
				
				// Check current login member and profiler member IF YES set flag YES for provide Edit Link
				// Else check following for followers
				$memberDetails['isCurrentUserLoginMatch'] = 'NO';
				$memberDetails['isFollowing'] = 'NO';
				if($iSessMemberId == $iMemberId){
					$memberDetails['isCurrentUserLoginMatch'] = 'YES';
				}else{
					$isFollowing = $this->member_model->get_profiler_following($iMemberId);
					$followArry = array();
					foreach ($isFollowing as $followKey => $followValue){
						$followArry[] = $followValue['iFollowerId'];
					}
					
					if(in_array($iSessMemberId,$followArry)){
						$memberDetails['isFollowing'] = 'YES';
					}else{
						$memberDetails['isFollowing'] = 'NO';
					}
				}
				
				$memberDetails['totalFollowers']=$memberDetails['totalFollowings']=$memberDetails['totalPostByProfiler']=0;
				// Get followers
				$getFollowers = $this->member_model->get_followers($iMemberId);
				$memberDetails['totalFollowers'] = $getFollowers;
				
				// Get following
				$getFollowing = $this->member_model->get_following($iMemberId);
				$memberDetails['totalFollowings'] = $getFollowing;
				
				// Count all post by profiler
				$countTotalPostByProfiler = $this->post_model->count_post_by_profiler_id($iMemberId);
				$memberDetails['totalPostByProfiler'] = $countTotalPostByProfiler;
				
				// Merge Newsfeeds
				$isMergeNewsFeed = TRUE;
				$onlyPostShowInFeed = 'POST';
				$memberDetails['newsFeeds'] = $this->newsFeed($memberDetails['iMemberId'],$isMergeNewsFeed,$onlyPostShowInFeed);
				
				$message['msg'] = $this->getLL('MEMBER_PUBLIC_SUCCESS','',$iSessMemberId);
				$message['success'] = $this->successFlag;
			}else{
				$message['msg'] = $this->getLL('TRY_LATER_ERROR','',$iSessMemberId);
				$message['success'] = $this->errorFlag;
			}
		}else {
			$message['msg'] = $this->getLL('TRY_LATER_ERROR','',$iSessMemberId);
			$message['success'] = $this->errorFlag;
		}
		
		$dataArry = array(
			'data' => $memberDetails,
			'message' => $message
		);
		
		header('Content-type: application/json');
		$main = json_encode($dataArry);
		echo  $main.'';
		exit;
	}
	
	//follow user
	function setFollow()
	{
		$data = array();
		$iSessMemberId   = $this->input->post('iSessMemberId');
		$iMemberId = $this->input->post('iProfilerId');
		
		$data = array('iFollowerId' => $iSessMemberId, 'iMemberId' => $iMemberId);
		if(!empty($iSessMemberId) && !empty($iMemberId)){
			$followId = $this->member_model->add_follow($data);
			
			if( $followId ){
				$message['msg'] = $this->getLL('SET_FOLLOW_SUCCESS','',$iSessMemberId);
				$message['success'] = $this->successFlag;
				
				$followingMemberID = $this->member_model->get_member_details($iSessMemberId);
				$followersMemberID = $this->member_model->get_member_details($iMemberId);
				
				// Push Notification Data
				if(!empty($followingMemberID) && !empty($followersMemberID)){
					
					$pos = strpos($getPostData['tPost'], 200);
					$memberPostStr = mb_substr($getPostData['tPost'],0, (($pos)?$pos:200),'UTF-8');
					$memberPostStr = $memberPostStr.'...';
					
					$memberDeviceInfo = $this->member_model->get_member_device_info($followersMemberID['iMemberId']);
					
					if($followingMemberID['iMemberId'] != $followersMemberID['iMemberId']){
						$pushNotificationData['action'] = 'sendNotification';
						$pushNotificationData['vDeviceid'] = $memberDeviceInfo[0]['vDeviceid'];
						$pushNotificationData['msg'] = $followingMemberID['vUsername'].' follow you';
						$this->pushNotification($pushNotificationData);
					}
				}
				
			}else{
				$message['msg'] = $this->getLL('TRY_LATER_ERROR','',$iSessMemberId);
				$message['success'] =$this->errorFlag;
			}
		}else {
			$message['msg'] = $this->getLL('TRY_LATER_ERROR','',$iSessMemberId);
			$message['success'] = $this->errorFlag;
		}
		
		$dataArry = array(
			'data' => $data,
			'message' => $message
		);
		
		header('Content-type: application/json');
		$main = json_encode($dataArry);
		echo  $main.'';
		exit;
	}
	
	// Unfollow	
	function setUnFollow(){
		$iSessMemberId  = $this->input->post('iSessMemberId');
		$iProfilerId 	= $this->input->post('iProfilerId');
		
		$data = array('iSessMemberId'=>$iSessMemberId,'iProfilerId'=>$iProfilerId);
		if(!empty($iSessMemberId) && !empty($iProfilerId)){
			
			$unFollowResult = $this->member_model->set_unfollow($iSessMemberId,$iProfilerId);
			if($unFollowResult){
				$message['success'] = $this->successFlag;
				$message['msg'] = $this->getLL('SET_UNFOLLOW_SUCCESS','',$iSessMemberId);
			}else{
				$message['sucess'] = $this->errorFlag;
				$message['msg'] = $this->getLL('TRY_LATER_ERROR','',$iSessMemberId);
			}
		}else{
			$message['sucess'] = $this->errorFlag;
			$message['msg'] = $this->getLL('TRY_LATER_ERROR','',$iSessMemberId);
		}
		
		$dataArry = array(
			'data' => $data,
			'message' => $message
		);
		
		header('Content-type: application/json');
		$main = json_encode($dataArry);
		echo  $main.'';
		exit;
	}
	
	
	// set Post comments
	function setComments(){
		
		if($this->input->post()){
			$iMemberId	= $this->input->post('iMemberId');
			$iPostId	= $this->input->post('iPostId');
			$tComments	= $this->input->post('tComments');
			
			$data['iMemberId'] 		= $iMemberId;
			$data['iPostId'] 		= $iPostId;
			$data['tDescription'] 	= $tComments;
			$data['dCreatedDate'] 	= date('Y-m-d H:i:s');
			
			$iPostCommentId = $this->post_model->add_post_comments($data);
			if($iPostCommentId){
				$getUserName = $this->member_model->get_member_details($iMemberId);
				$getPostData = $this->post_model->get_post_details($iPostId);
				if(!empty($getUserName) && !empty($getPostData)){
					// Add post into newsfeed
					$newsfeedData['iPostId'] 		= $iPostId;
					$newsfeedData['iCommentId'] 	= $iPostCommentId;
					$newsfeedData['iMemberId']		= $iMemberId;
					$newsfeedData['vUsername'] 		= $getUserName['vUsername'];
					$newsfeedData['tPost'] 			= $getPostData['tPost'];
					$newsfeedData['tDescription']	= $getPostData['tDescription'];
					$newsfeedData['tComments']		= $data['tDescription'];
					$newsfeedData['dCreatedDate']	= $data['dCreatedDate'];
					$newsfeedData['vFile']			= $getPostData['vFile'];
					$newsfeedData['eFeedType']		= 'COMMENT';
					
					$this->post_model->add_newsfeed($newsfeedData);
				}
				
				// Push Notification Data
				if(!empty($getUserName) && !empty($getPostData)){
					
					$pos = strpos($getPostData['tPost'], 200);
					$memberPostStr = mb_substr($getPostData['tPost'],0, (($pos)?$pos:200),'UTF-8');
					$memberPostStr = $memberPostStr.'...';
					
					$memberDeviceInfo = $this->member_model->get_member_device_info($getPostData['iMemberId']);
					
					if($getUserName['iMemberId'] != $getPostData['iMemberId']){
						$pushNotificationData['action'] = 'sendNotification';
						$pushNotificationData['vDeviceid'] = $memberDeviceInfo[0]['vDeviceid'];
						$pushNotificationData['msg'] = $getUserName['vUsername'].' comments on your post: '.$memberPostStr;
						$this->pushNotification($pushNotificationData);
					}
				}
				
				$message['msg'] = $this->getLL('POST_COMMENT_ADD_SUCCESS','',$iMemberId);
				$message['success'] = $this->successFlag;
			}else{
				$message['msg'] = $this->getLL('TRY_LATER_ERROR','',$iMemberId);
				$message['sucess'] = $this->errorFlag;
			}
		}else{
			$iMemberId	= $this->input->post('iMemberId');
			$iPostId	= $this->input->post('iPostId');
			$data = array('iMemberId'=>$iMemberId,'iPostId'=>$iPostId);
			$message['msg'] = $this->getLL('TRY_LATER_ERROR','',$iMemberId);
			$message['sucess'] = $this->errorFlag;
		}
		
		$dataArry = array(
			'data' => $data,
			'message' => $message
		);
		
		header('Content-type: application/json');
		$main = json_encode($dataArry);
		echo  $main.'';
		exit;
	}
	
	
	// get comments
	function getComments(){
		
		$postId = $this->input->post('iPostId');
		$iMemberIdLL = $this->input->post('iMemberId');
		
		if(!empty($postId)){
			$postCommentsDetail = $this->post_model->get_comment_details($postId);
			
			if(!empty($postCommentsDetail)){
				foreach ($postCommentsDetail as $key => $value){
					// Member Data
					$memberDetails = $this->member_model->get_member_details($value['iMemberId']);
					
					// Push member data to array
					$data[$key]['iMemberId'] 	= $value['iMemberId'];
					$data[$key]['iPostId'] 		= $value['iPostId'];
					$data[$key]['iCommentId'] 	= $postCommentsDetail[$key]['iCommentId'];
					$data[$key]['vUsername'] 	= ($memberDetails['vUsername'] != "" || $memberDetails['vUsername'] != NULL )? $memberDetails['vUsername'] : '';
					$data[$key]['vName'] 		= ($value['vName'] != "" || $value['vName'] != NULL )? $value['vName'] : '';
					$data[$key]['tPost'] 		= $postCommentsDetail[$key]['tPost'];
					$data[$key]['tComments'] 	= $postCommentsDetail[$key]['tDescription'];
					$data[$key]['dCreatedDate'] = $this->relativeDate(strtotime($postCommentsDetail[$key]['dCreatedDate']));
					
					// Memmber picture
					$vPictureNotAvailable = $this->config->item('member_picture_url')."picture_not_available.jpeg";
					if(!empty($memberDetails['vPicture'])){
						$filename = $this->config->item('member_picture_path').$memberDetails['iMemberId']."/".$memberDetails['vPicture'];
						
						if (file_exists($filename)) {
							$filename = $this->config->item('member_picture_url').$memberDetails['iMemberId']."/".$memberDetails['vPicture'];
							$data[$key]['vPicture'] = $filename;
						}else{
							$data[$key]['vPicture'] = $vPictureNotAvailable;
						}
					}else{
						$data[$key]['vPicture'] = $vPictureNotAvailable;
					}
				}
				
				$message['msg'] = $this->getLL('POST_COMMENT_DATA','',$iMemberIdLL);
				$message['success'] = $this->successFlag;
			}else{
				$data['iPostId'] = $postId;
				$message['msg'] = $this->getLL('POST_COMMENT_DATA_ERROR','',$iMemberIdLL);
				$message['success']= $this->errorFlag;
			}
		}else{
			$data['iPostId'] = $postId;
			$message['msg'] = $this->getLL('POST_COMMENT_DATA_ERROR','',$iMemberIdLL);
			$message['success']= $this->errorFlag;
		}
		
		$dataArry = array(
			'data' => $data,
			'message' => $message
		);
		
		header('Content-type: application/json');
		$main = json_encode($dataArry);
		echo  $main.'';
		exit;
	}
	
	// Delete Comment
	function deleteComment(){
		
		$iCommentId = $this->input->post('iCommentId');
		$iMemberId 	= $this->input->post('iMemberId');
		$iPostId 	= $this->input->post('iPostId');
		$data = array('iCommentId' => $iCommentId,'iMemberId' => $iMemberId,'iPostId' => $iPostId);
		if(!empty($iCommentId)){
			$deleteMyPostComment = false;
			if(!empty($iPostId)){
				$deleteMyPostComment = true;
			}
			$deletedCommentResult = $this->post_model->delete_comment($iCommentId,$iMemberId,$iPostId,$deleteMyPostComment);
			if($deletedCommentResult){
				
				// On unlike post delete newsfeed depends on post delete comment
				$fieldName = 'iCommentId';
				$myPostCommentFeed = 'ALL';
				$this->post_model->delete_newsfeed($iCommentId,$iMemberId,$fieldName,$myPostCommentFeed);
				
				$message['msg'] = $this->getLL('DELETE_POST_COMMENT','',$iMemberId);
				$message['success'] = $this->successFlag;
			}else{
				$message['msg'] = $this->getLL('POST_COMMENT_DATA_ERROR','',$iMemberId);
				$message['success'] = $this->errorFlag;
			}
			
		}else{
			$message['msg'] = $this->getLL('POST_COMMENT_DATA_ERROR','',$iMemberId);
			$message['success'] = $this->errorFlag;
		}
		
		$dataArry = array(
			'data' => $data,
			'message' => $message
		);
		
		header('Content-type: application/json');
		$main = json_encode($dataArry);
		echo  $main.'';
		exit;
	}
	
	// Set post like
	function setPostLike(){
		
		if($this->input->post()){
			$data['iPostId'] 	= $this->input->post('iPostId');
			$data['iMemberId'] 	= $this->input->post('iMemberId');
			
			/*$data['iPostId'] = 371;
			$data['iMemberId'] = 217;*/
			
			$iPostId 	= $data['iPostId'];
			$iMemberId 	= $data['iMemberId'];
			
			$iPostLikeId = $this->post_model->add_post_like($data);
			if($iPostLikeId){
				$getUserName = $this->member_model->get_member_details($iMemberId);
				$getPostData = $this->post_model->get_post_details($iPostId);
				
				if(!empty($getUserName) && !empty($getPostData)){
					// Add post into newsfeed
					$newsfeedData['iPostId'] 		= $iPostId;
					$newsfeedData['iLikeId'] 		= $iPostLikeId;
					$newsfeedData['iMemberId']		= $iMemberId;
					$newsfeedData['vUsername'] 		= $getUserName['vUsername'];
					$newsfeedData['tPost'] 			= $getPostData['tPost'];
					$newsfeedData['tDescription']	= $getPostData['tDescription'];
					$newsfeedData['tComments']		= '';
					$newsfeedData['dCreatedDate']	= date('Y-m-d H:i:s');
					$newsfeedData['vFile']			= $getPostData['vFile'];
					$newsfeedData['eFeedType']		= 'LIKE';
					
					$this->post_model->add_newsfeed($newsfeedData);
				}
				
				// Push Notification Data
				if(!empty($getUserName) && !empty($getPostData)){
					
					$pos = strpos($getPostData['tPost'], 200);
					$memberPostStr = mb_substr($getPostData['tPost'],0, (($pos)?$pos:200),'UTF-8');
					$memberPostStr = $memberPostStr.'...';
					
					$memberDeviceInfo = $this->member_model->get_member_device_info($getPostData['iMemberId']);
					if($getUserName['iMemberId'] != $getPostData['iMemberId']){
						$pushNotificationData['action'] = 'sendNotification';
						$pushNotificationData['vDeviceid'] = $memberDeviceInfo[0]['vDeviceid'];
						$pushNotificationData['msg'] = $getUserName['vUsername'].' likes your post: '.$memberPostStr;
						$this->pushNotification($pushNotificationData);
					}
					//$this->arrPrint($this->pushNotification($pushNotificationData));
				}
				
				$message['msg'] = $this->getLL('SET_POST_LIKE','',$iMemberId);
				$message['success'] = $this->successFlag;
			}else{
				$message['msg'] = $this->getLL('TRY_LATER_ERROR','',$iMemberId);
				$message['success'] = $this->errorFlag;
			}
		}else{
			$data['iPostId'] 	= $this->input->post('iPostId');
			$data['iMemberId'] 	= $this->input->post('iMemberId');
			$message['msg'] = $this->getLL('TRY_LATER_ERROR','',$iMemberId);
			$message['success'] = $this->errorFlag;
		}
		
		$dataArry = array(
			'data' => $data,
			'message' => $message
		);
		
		header('Content-type: application/json');
		$main = json_encode($dataArry);
		echo  $main.'';
		exit;
	}
	
	// Set post unlike
	function setPostUnLike(){
		
		if($this->input->post()){
			$iPostId 		= $this->input->post('iPostId');
			$iSessMemberId 	= $this->input->post('iMemberId');
			
			$data = array('iPostId' => $iPostId);
			$iPostUnLikeId = $this->post_model->unlike_post($iPostId,$iSessMemberId);
			if($iPostUnLikeId){
				
				// On unlike post delete newsfeed depends on post unlike
				$fieldName = "iPostId";
				$this->post_model->delete_newsfeed($iPostId,$iSessMemberId,$fieldName);
				
				$message['msg'] = $this->getLL('SET_POST_UNLIKE','',$iSessMemberId);
				$message['success'] = $this->successFlag;
			}else{
				$message['msg'] = $this->getLL('TRY_LATER_ERROR','',$iSessMemberId);
				$message['success'] = $this->errorFlag;
			}
		}else{
			$data = array('iPostId' =>$this->input->post('iPostId'),'iMemberId'=>$this->input->post('iMemberId'));
			$message['msg'] = $this->getLL('TRY_LATER_ERROR','',$iSessMemberId);
			$message['success'] = $this->errorFlag;
		}
		
		$dataArry = array(
			'data' => $data,
			'message' => $message
		);
		
		header('Content-type: application/json');
		$main = json_encode($dataArry);
		echo  $main.'';
		exit;
	}
	
	
	// get all country list
	function getCountries(){
		$fromService = 1;
		$allCountryData = $this->country_model->get_all_country();
		
		if($allCountryData){
			$data = $allCountryData;
			$message['msg'] = 'All country list';
			$message['success'] = $this->successFlag;
		}else{
			$data['iCountryId'] = 0;
			$message['msg'] = 'Please try later.';
			$message['success'] = $this->errorFlag;
		}
		
		$dataArry = array(
			'data' => $data,
			'message' => $message
		);
		
		header('Content-type: application/json');
		$main = json_encode($dataArry);
		echo  $main.'';
		exit;
	}
	
	// get all country list
	function getState(){
		$allStateData = $this->state_model->get_all_state();
		
		if($allStateData){
			$data = $allStateData;
			$message['msg'] = 'All state list';
			$message['success'] = $this->successFlag;
		}else{
			$data['iStateId'] = 0;
			$message['msg'] = 'Please try later.';
			$message['success'] = $this->errorFlag;
		}
		
		$dataArry = array(
			'data' => $data,
			'message' => $message
		);
		
		header('Content-type: application/json');
		$main = json_encode($dataArry);
		echo  $main.'';
		exit;
	}
	
	// set language
    function setLanguage(){
    	$iMemberId = $this->input->get('iMemberId');
    	$iLangId   = $this->input->get('iLangId');
    	
    	if($iMemberId){
    		$data['iMemberId'] = $iMemberId;
    		$data['iLangId'] = $iLangId;
    		
    		$result = $this->member_model->update_member_language($data);
    		if($result){
				$message['msg'] = $this->getLL('SET_LANGUAGE_SUCCESS','',$iMemberId);
				$message['success'] = $this->successFlag;
    		}else{
    			$message['msg'] = $this->getLL('TRY_LATER_ERROR','',$iMemberId);
				$message['success'] = $this->errorFlag;
	    	}
    	}else{
    		$data['iMemberId'] = $iMemberId;
			$message['msg'] = $this->getLL('TRY_LATER_ERROR','',$iMemberId);
			$message['success'] = $this->errorFlag;
    	}
    	
    	$dataArry = array(
			'data' => $data,
			'message' => $message
		);
		
		header('Content-type: application/json');
		$main = json_encode($dataArry);
		echo  $main.'';
		exit;
	}
	
	// authentication login with twitter
	function loginWithTwitter(){
		$result = $this->twitterPost->authLogInWithTwitter();
	}
	
	// call back function return twitter data of member
	function callBackTwitter(){
		$result = $this->twitterPost->authLogInWithTwitter($sess = true);
		if($result){
			$data['vUsername'] = $result['twitterData']['screen_name'];
			$data['vTwitterId'] = $result['twitterData']['oauth_token'];
			$data['tTwitterToken'] = $result['twitterData']['oauth_token_secret'];
			$message['msg'] = $result['message'];
			$message['success'] = $this->successFlag;
		}else{
			$data['login'] = 'Failed';
			$message['msg'] = 'Please try later.';
			$message['success'] = $this->errorFlag;
		}
		
		$dataArry = array(
			'data' => $data,
			'message' => $message
		);
		
		header('Content-type: application/json');
		$main = json_encode($dataArry);
		echo  $main.'';
		exit;
	}
	
	// push notifications
	function pushNotification($data){
		
		$url = $this->config->item('pushNotification');
		
		$fields_string = '';
		foreach($data as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
		$fields_string = rtrim($fields_string,'&');
		
		//open connection
		$ch = curl_init();
		curl_setopt($curl, CURL_TIMEOUT, 0);
		//set the url, number of POST vars, POST data 
		curl_setopt($ch,CURLOPT_URL,$url);
		curl_setopt($ch,CURLOPT_POST,count($data));
		curl_setopt($ch,CURLOPT_POSTFIELDS,$fields_string);
		
		curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,10); # timeout after 10 seconds, you can increase it
		//curl_setopt($ch,CURLOPT_HEADER,false);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);  # Set curl to return the data instead of printing it to the browser.
		curl_setopt($ch,  CURLOPT_USERAGENT , "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)"); # Some server may refuse your request if you dont pass user agent
		
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		
		//execute post
		$result = curl_exec($ch);
		
		//close connection
		curl_close($ch);
		return json_decode($result,true);
	}
	
	// Time ago function in Facebook style
	function relativeDate($timestamp){
	    //type cast, current time, difference in timestamps
	    $timestamp      = (int) $timestamp;
	    $current_time   = time();
	    $diff           = $current_time - $timestamp;
	   
	    //intervals in seconds
	    $intervals      = array (
	        'year' => 31556926, 'month' => 2629744, 'week' => 604800, 'day' => 86400, 'hour' => 3600, 'minute'=> 60
	    );
	   
	    //now we just find the difference
	    if ($diff == 0)
	    {
	        return 'just now';
	    }   
	
	    if ($diff < 60)
	    {
	        return $diff == 1 ? $diff . ' second ago' : $diff . ' seconds ago';
	    }       
	
	    if ($diff >= 60 && $diff < $intervals['hour'])
	    {
	        $diff = floor($diff/$intervals['minute']);
	        return $diff == 1 ? $diff . ' minute ago' : $diff . ' minutes ago';
	    }       
	
	    if ($diff >= $intervals['hour'] && $diff < $intervals['day'])
	    {
	        $diff = floor($diff/$intervals['hour']);
	        return $diff == 1 ? $diff . ' hour ago' : $diff . ' hours ago';
	    }   
	
	    if ($diff >= $intervals['day'] && $diff < $intervals['week'])
	    {
	        $diff = floor($diff/$intervals['day']);
	        return $diff == 1 ? $diff . ' day ago' : $diff . ' days ago';
	    }   
	
	    if ($diff >= $intervals['week'] && $diff < $intervals['month'])
	    {
	    	
	        $diff = floor($diff/$intervals['week']);
	        return $diff == 1 ? $diff . ' week ago' : $diff . ' weeks ago';
	    }   
	
	    if ($diff >= $intervals['month'] && $diff < $intervals['year'])
	    {
	    	return date('Y-m-d H:i:s',$timestamp);
	    }   
	
	    if ($diff >= $intervals['year'])
	    {
	    	return date('Y-m-d H:i:s',$timestamp);
	    }
	}
	
	
	/**
	 * Function: send mail to user with new password, email and username
	 */
	function Send($data,$linkUrl,$genaratNewPassword){

		$iMemberId = $data['iMemberId'];
		
		$myforgot_word=$this->input->get('myforgot_word');
		$companyName = $this->getConfiguration('COMPANY_NAME');
		$emailTempate = $this->getEmailTemplate('ADMIN_FORGOT_PASSWORD');
		
		$headers = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
		$headers .= 'From: videoblog <support@videoblog.com>' . "\r\n".
				'Reply-To: videoblog <support@videoblog.com>'. "\r\n".
				'Return-Path: videoblog <support@videoblog.com>' . "\r\n".
				'X-Mailer: PHP/' . phpversion();
		
		$vName 		= $data['vName'];
		$vUsername  = $data['vUsername'];
		
		$vPassword  = $genaratNewPassword;
		
		$bodyArr = array("#NAME#","#USERNAME#", "#PASSWORD#");
		$postArr = array($vName  ,$vUsername  , $vPassword);
		
		$this->body = $emailTempate['tEmailMessage'];
		$this->body = str_replace($bodyArr,$postArr, $this->body);
		$bodyText = '';
		
		if($myforgot_word==1){
			$bodyText=$this->body;
			$Subject = strtr($emailTempate['vEmailSubject'], "\r\n" , "  " );
			$vPassword  = $data['vPassword'];
		}else{
			$bodyText = '<div style="margin:20px 0 15px 0">'.$this->getLL("FORWARD_PASSWORD_CONFORMATION",'',$iMemberId).' <a href="'.$linkUrl.'">'.$this->getLL("CLICK_HERE",'',$iMemberId).'</a></div>';
			$Subject = $this->getLL("FORGOT_PASSWORD_CONFORMATION_LINK",'',$iMemberId);	
		}          
		$To = stripcslashes($data['vEmail']);
		$htmlMail = '	
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	     <html xmlns="http://www.w3.org/1999/xhtml">
	     <head>
	     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	     <title>'.$companyName['vValue'].'</title>
	     </head>
	     <body style="padding:0; border:0;">

		  <div class="mainwrap" style="float:left; width:650px; background:#e5e9ec; padding:5px; ">

		       <div class="imconpart" style="float:left; width:98%; background:#f2f5f7; border-radius:5px; border-right:1px solid #d3d9dd; border-bottom:1px solid #d3d9dd; padding:1%; ">
			    <div style="background:#363F49; padding: 10px 10px 10px 10px;margin:15px 0px 15px 0px;"><p><font size=50px; line-height:20px; color=#497CD2 style="margin:20px 0px 15px 10px;">'.$companyName['vValue'].'</font></p></div>
					'.$bodyText.'
			    </div>
		       </div>
		  </div>
	     </body>
		</html>';	
		
		if($_SERVER['SERVER_ADDR'] == '192.168.1.41'){ // for localhost server			  
			require_once "Mail.php";
			require_once "Mail/mime.php";
			$from = $emailTempate['vFromEmail'];			   
			
			$to =$To;
			$subject = strtr($Subject, "\r\n" , "  " );
			$crlf = "\n";
			$html = "<h1> This is HTML </h1>";
			$headers = array('From' => $from,'To' => $to,'Subject' => $subject);
			$host = "smtp.gmail.com";
			$username = "demo2.testing2@gmail.com";
			$password = "demo1234";
			$mime =  new Mail_mime(array('eol' => $crlf));
			$mime->setHTMLBody($htmlMail);			
			$body = $mime->getMessageBody();			
			$headers = $mime->headers($headers);			 
			$smtp = Mail::factory("smtp",array("host" => $host,"auth" => true,"username" => $username,"password" => $password));			 
			$res = $smtp->send($to, $headers, $body);			 
		}else{
			$res = mail($To,$Subject,$htmlMail,$headers);
		}
		return $res; 
	}
	
	// get Configuration by unique vName 
	function getConfiguration($vName){
		$configuration = $this->configuration_model->get_configuration($vName);
		return $configuration;
	}
	
	// get Email template by email code
	function getEmailTemplate($vEmailCode){
		$emailTemplate = $this->emailtemplate_model->get_email_template($vEmailCode);
		return $emailTemplate;
	}

	//Thumbnail Image
	function do_upload_partner($iImageId,$folderName,$fieldName){
		if($folderName){
    		if(!is_dir('uploads/'.$folderName.'/')){
	            @mkdir('uploads/'.$folderName.'/', 0777);
	        }
    		if(!is_dir('uploads/'.$folderName.'/'.$iImageId)){
	            @mkdir('uploads/'.$folderName.'/'.$iImageId, 0777);
	        }	
    	}
    	$fileType = strtolower(substr($_FILES[$fieldName]['name'], strrpos($_FILES[$fieldName]['name'], '.') + 1));
        if($folderName){
        	$config = array(
	          'allowed_types' => "gif|GIF|JPG|jpg|JPEG|jpeg||PNG|png|magedata",
	          'upload_path' => 'uploads/'.$folderName.'/'.$iImageId,
	          'file_name' => str_replace(' ','',$iImageId.'.'.$fileType),
	          'max_size'=>5380334
	        );
        }
        $this->upload->initialize($config);
        $this->upload->do_upload($fieldName); //do upload
        $image_data = $this->upload->data(); //get image data
        if($folderName){
        	$config1 = array(
	          'source_image' => $image_data['full_path'], //get original image
	          'new_image' => 'uploads/'.$folderName.'/'.$iImageId.'/200x200_'.$image_data['file_name'], //save as new image //need to create thumbs first
	          'maintain_ratio' => true,
	          'width' => 200,
	          'height' => 200
	        );
        }
        $this->image_lib->initialize($config1);
        $test1 = $this->image_lib->resize();
        $image_data = $this->upload->data(); //get image data
        return $img_uploaded;
    }
	
    // language files: return language lable (LL = language lable)
	function getLL($keyLL,$langCode,$iMemberId){
		$memberLangId = $this->languagelabel_model->get_language_code($iMemberId);
		$languageLable = $this->languagelabel_model->get_language_lable($keyLL);
		
		// condition for userLogin and userRegistraion
		if($langCode){
			$memberLangId['vLangCode'] = $langCode;
		}
		
		// temp solution
		if($memberLangId['iLangId'] == 'en'){
			$memberLangId['vLangCode'] = 'en';
		}else if($memberLangId['iLangId'] == 'pt'){
			$memberLangId['vLangCode'] = 'pt';
		}else{
			$memberLangId['vLangCode'] = 'en';
		}
		
		$ll = $languageLable['vValue_'.$memberLangId['vLangCode']];
		
		return $ll;
	}
	
	// set member settings
	function setMemberSettings(){
		$iMemberId = $this->input->get('iMemberId');
    	$iLangId   = $this->input->get('iLangId');
    	$eCameraMode=$this->input->get('eCameraMode');
    	
    	if($iMemberId){
    		$data['iMemberId'] = $iMemberId;
    		$data['iLangId'] = $iLangId;
    		$data['eCameraMode'] = $eCameraMode;
    		
    		$result = $this->member_model->update_member_setting($data);
    		
    		if($result){
				$message['msg'] = $this->getLL('SET_SETTINGS_SUCCESS','',$iMemberId);
				$message['success'] = $this->successFlag;
    		}else{
    			$message['msg'] = $this->getLL('TRY_LATER_ERROR','',$iMemberId);
				$message['success'] = $this->errorFlag;
	    	}
    	}else{
    		$data['iMemberId'] = $iMemberId;
			$message['msg'] = $this->getLL('TRY_LATER_ERROR','',$iMemberId);
			$message['success'] = $this->errorFlag;
    	}
    	
    	$dataArry = array(
			'data' => $data,
			'message' => $message
		);
		
		header('Content-type: application/json');
		$main = json_encode($dataArry);
		echo  $main.'';
		exit;
	}
	
	// set Camera mode
	function setCameraMode(){
		$iMemberId = $this->input->get('iMemberId');
    	$eCameraMode=$this->input->get('eCameraMode'); 
    	
    	
    	if($iMemberId){
    		$data['iMemberId'] = $iMemberId;
    		$data['eCameraMode'] = $eCameraMode;
    		
    		$result = $this->member_model->update_member_cameramode($data);
    		if($result){
				$message['msg'] = $this->getLL('SET_CAMERA_MODE_SUCCESS','',$iMemberId);
				$message['success'] = $this->successFlag;
    		}else{
    			$message['msg'] = $this->getLL('TRY_LATER_ERROR','',$iMemberId);
				$message['success'] = $this->errorFlag;
	    	}
    	}
    	else{
    		$data['iMemberId'] = $iMemberId;
			$message['msg'] = $this->getLL('TRY_LATER_ERROR','',$iMemberId);
			$message['success'] = $this->errorFlag;
    	}
    	
    	$dataArry = array(
			'data' => $data,
			'message' => $message
		);
		
		header('Content-type: application/json');
		$main = json_encode($dataArry);
		echo  $main.'';
		exit;
	}
	
	// function for array print
	function arrPrint($data){
		echo '<pre>';
		print_r($data);
		echo '</pre>';
		exit;
	}

	function generateThumbnail($new_image_name,$postDataId)
	{
		$new_image_name = $new_image_name;//'603.mp4';
		$videoPostId = $postDataId;//603;
		$newFile = $this->config->item('post_file_path').$videoPostId.'/'.$new_image_name;
 
 		$fileFullPath = $newFile;
 		$dir = $this->config->item('post_file_path').$videoPostId;
 		$videoThumbnailName = $videoPostId.'.jpg';
 
		//$ffmpeg = '/usr/local/src/ffmpeg-0.6'; //put the relative path to the ffmpeg.exe file
		$ffmpeg = '/opt/ffmpeg/bin/ffmpeg';

 		$second = 2; //specify the time to get the screen shot at (can easily be randomly generated)
 		$image = $dir.'/'.$videoThumbnailName; //define the output file
 		$video = $fileFullPath;
 		
 		//finally assemble the command and execute it
 		$result = ('ffmpeg -i '.$video.' -an -ss '.$second.' -f mjpeg -vframes 1 -s 200x200 '.$image.'');
		exec($result);

 		$newThumbNail = $videoThumbnailName;

 		return $newThumbNail;
	}	
}