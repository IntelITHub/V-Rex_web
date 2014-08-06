<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Webservice extends CI_Controller {
	
	function __construct(){
		parent::__construct();      
		
		$this->load-> model('webservice_model', '', TRUE);
        }
	function index(){
		
		//echo "hello";exit;
		if($_REQUEST['action'] == 'userLogin'){
			$this->userLogin();
		}elseif($_REQUEST['action'] == 'userRegistration'){
			//echo "<pre>";print_r($_REQUEST);exit;
			$this->userRegistration();
		}elseif($_REQUEST['action'] == 'get_categories'){
			$this->get_categories();
		}
	}
	function userLogin(){
		$vEmail    = $this->input->get('vEmail');
		$vPassword = $this->input->get('vPassword');
		if(($vEmail != '') && ($vPassword != '')){
			$loginCheck = $this->webservice_model->verify_login($vEmail,$vPassword);
			if($loginCheck){
			  $Data = $loginCheck;
			  $Data['msg'] = "Login Succesfull";
			}else{
			  $Data['msg'] = "Error";
			}
		}else{
			$Data['msg'] = "Error";
		}
		header('Content-type: application/json');
		$callback = '';
		if (isset($_REQUEST['callback']))
		{
		    $callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
		}
		$main = json_encode($Data);
		echo $callback . ''.$main.'';
		exit;
	}
	function userRegistration(){
		$this->data['base_path'] = $this->config->item('base_path');
		$this->data['base_url'] = $this->config->item('base_url');
		$vEmail     =$_REQUEST['vEmail'];
		$vPassword  =$_REQUEST['vPassword'];
		$vName      =$_REQUEST['vName'];
		$vUsername  =$_REQUEST['vUsername'];
		$userfile   =$_REQUEST['userfile'];
		$temp       =$_REQUEST['vFirstName'];
		//echo $this->data['base_path'];
		//exit;
		//$uploaddir = 'upload'
                
			$file = basename($_FILES['userfile']['tmp_name']);
			////echo "<pre>";
			////print_r($_FILES);
			$filename = $_FILES['userfile']['tmp_name'];
			$new_image_name = $vUsername.'.jpg';
			move_uploaded_file($_FILES["userfile"]["tmp_name"], $this->data['base_path']."uploads/user/".$new_image_name);
			$fileUrl=$this->data['base_url'].'uploads/user/'.$_FILES['userfile']['name'];
			$fileSize=$_FILES['userfile']['size'];
		//echo $fileUrl;
		//echo "<pre>";print_r($this->data);exit;
		if($vEmail !='' ){	 
		$check_user = $this->webservice_model->check_user($vEmail);
			if($check_user){	  
				$Data['vEmail'] = $vEmail;
				$Data['vPassword'] = $vPassword;
				$Data['vName'] = $vName;
				$Data['vUsername'] = $vUsername;
				//$Data['vPicture']=$fileUrl;
				$Data['vPicture']=$fileUrl;
				//$Data['vImage_url'] = $Image_url;
				$id = $this->webservice_model->update_user($fileUrl,$vEmail,$vPassword,$vName,$vUsername,$Data);
				if($id){
				  $Data['msg']="Update Succesfully";
				}else{
				  $Data['msg']="error";
				}		
			}else{
				//echo "hello";exit;
				$Data['vEmail']=$vEmail;
				$Data['vPassword']=$vPassword;
				$Data['vName']=$vName;
				$Data['vUsername']=$vUsername;
				$Data['vPicture']=$fileUrl;
				//$Data['vImage_url'] = $Image_url;
				$id = $this->webservice_model->save_user($Data);
				if($id){
				  $Data['msg']="Insert succesfully";
				}else{
				  $Data['msg']="error";
				}		
			}
		}else{
			$Data['msg']="Error";
		}
		header('Content-type: application/json');
		$callback = '';
		if (isset($_REQUEST['callback']))
		{
			$callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
		}
		$main = json_encode($Data);
		echo $callback . ''.$main.'';
		exit;  
	}
	function get_categories($iconId)
	{
		$this->data['base_path'] = $this->config->item('base_path');
		$this->data['base_url'] = $this->config->item('base_url');
		$iCategoryId =$_REQUEST['iCategoryId'];
		$vCategory   =$_REQUEST['vCategory'];
		$eStatus     =$_REQUEST['eStatus'];
		$iMemberId   =$_REQUEST['iMemberId'];
		$vIcon=$this->input->get('vIcon');
		$category=$this->webservice_model->category_getid($iCategoryId);
		//echo $iCategoryId;exit;
		$filename=$_FILES['vIcon']['tmp_name'];
		$fileUrl=$this->data['base_url'].'uploads/category_icons/'.$iCategoryId .'/' .$vIcon;
		//echo $fileUrl;exit;
		$category=$this->webservice_model->category_get($fileUrl);
		header('Content-type: application/json');
		$callback = '';
		if (isset($_REQUEST['callback']))
		{
			$callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
		}
		$main = json_encode($category);
		echo $callback . ''.$main.'';
		exit;
	}
}

