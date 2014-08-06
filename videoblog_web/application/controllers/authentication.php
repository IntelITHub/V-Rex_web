<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Authentication extends MY_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('user_model', '', TRUE);
         $this->load->model('loginlogs_model', '', TRUE);
    }    

    function index()
    {
        $this->data['message'] = $this->session->flashdata('message');
        if($this->input->post())
         {  
            $vEmail = $this->input->post('vEmail');
            $vPassword = md5($this->input->post('vPassword'));
          
            $auth_exists = $this->user_model->check_auth($vEmail,$vPassword);
          
            if($auth_exists)
            {
                $auth_exists['logged_in'] = TRUE;
                $datestring = "%Y-%m-%d  %h:%i:%s";
                $time = time();
                $dLoginDate = mdate($datestring, $time);
                $logindata['iUserId'] = $auth_exists['iUserId'];
                $logindata['vFirstName'] = $auth_exists['vFirstName'];
                $logindata['vLastName'] = $auth_exists['vLastName'];
                $logindata['vEmail'] = $auth_exists['vEmail'];
                $logindata['vIP'] = $this->input->ip_address();
                $logindata['dLoginDate'] = $dLoginDate;
                $iLoginLogId = $this->loginlogs_model->loginentry($logindata);
                $auth_exists['iLoginLogId'] = $iLoginLogId;
                $this->session->set_userdata('user_info', $auth_exists);
                redirect($this->data['base_url'] . 'home');
                exit;
            }else{
                $this->session->set_flashdata('message',"Sorry , Username or Password is wrong !");
                redirect($this->data['base_url'] . 'authentication');
                exit;
            }
        }
        $this->data['tpl_name']= "login.tpl";
        $this->smarty->assign('data', $this->data);
        $this->smarty->view('login.tpl'); 
    }

    function logout()
    {
        $datestring = "%Y-%m-%d  %h:%i:%s";
        $time = time();
        $dLogoutDate = mdate($datestring, $time);
        $logindata['iLoginLogId'] = $this->data['user_info']['iLoginLogId'];
        $logindata['dLogoutDate'] = $dLogoutDate;
        $iLoginLogId = $this->loginlogs_model->logoutentry($logindata);
        $this->session->unset_userdata("user_info");
        redirect($this->data['base_url'] . 'authentication');
        exit();
    }
    
    // Forgotten password
	function forgotpassword(){
		
		$vEmail 	= $this->input->post('vEmail');
		if(!empty($vEmail)){
			$memberData = $this->user_model->find_member_by_email($vEmail);
			
			if($memberData){
				
				// Set new password;
				$iMemberId = $memberData['iUserId'];
				$passwordLength = 10;
				$genaratNewPassword = $this->getRandomStringPassword($passwordLength);
				
				$updatePassword = $this->user_model->update_new_password($iMemberId,$genaratNewPassword);
				
				if($updatePassword){
					$memberData['vPassword'] = $genaratNewPassword;
					$result = $this->Send($memberData);
					if($result){
						$this->session->set_flashdata('message',"Forgot password mail sent successfully.");
						redirect($this->data['base_url'] . 'authentication');
					}
					else{
						$this->session->set_flashdata('message',"Error in sending mail.");
						redirect($this->data['base_url'] . 'authentication');
					}
				}else{
					$this->session->set_flashdata('message',"Error in sending mail.");
					redirect($this->data['base_url'] . 'authentication');
				}
			}else{
				$this->session->set_flashdata('message',"Error: Sorry email ID not match!");
				redirect($this->data['base_url'] . 'authentication');
			}
		}else{
			$this->session->set_flashdata('message',"Error: Enter your email ID!");
			redirect($this->data['base_url'] . 'authentication');
		}
		redirect($this->data['base_url'] . 'authentication');
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
	
    /**
	 * Function: send mail to user with new password, email and username
	 */
	function Send($data){ 
		$headers = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
		$headers .= 'From: videoblog <support@videoblog.com>' . "\r\n".
				'Reply-To: videoblog <support@videoblog.com>'. "\r\n".
				'Return-Path: videoblog <support@videoblog.com>' . "\r\n".
				'X-Mailer: PHP/' . phpversion();
				
		$Subject = strtr('Your Password at Videoblog', "\r\n" , "  " );          
		$To = stripcslashes('ghansyam.gohel@php2india.com'); //$data['vEmail']
		$htmlMail = '	
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		     <html xmlns="http://www.w3.org/1999/xhtml">
		     <head>
		     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		     <title>Calender System</title>
		     </head>
		     
		     <body style="padding:0; margin:0; border:0;">
			  <div class="mainwrap" style="float:left; width:650px; background:#e5e9ec; padding:5px;">
			       <div class="imconpart" style="float:left; width:98%; background:#f2f5f7; border-radius:5px; border-right:1px solid #d3d9dd; border-bottom:1px solid #d3d9dd; padding:1%;">
				    <div style="background:#363F49; padding: 10px 10px 10px 10px;"><p><font size=50px; color=#497CD2>Videoblog</font></p></div>
						<table width="100%">
							<tr>
								<td colspan="2">Dear '.$data['vFirstName'].' '.$data['vLastName'].'</td>
							</tr>
							<tr>
								<td colspan="2">Please find your new login credential</td>
							</tr>
							<tr>
								<td width="20%">Username:</td>
								<td width="80%">'.$data['vEmail'].'</td>
							</tr>
							<tr>
								<td>Your New Password:</td>
								<td><b>'.$data['vPassword'].'</b></td>
							</tr>
						</table>
				    </div>
			       </div>
			  </div>
		     </body>
		</html>';
		
		if($_SERVER['SERVER_ADDR'] == '192.168.1.41'){ // for localhost server			  
			require_once "Mail.php";
			require_once "Mail/mime.php";
			$from = "demo3.testing3@gmail.com";			   
			//echo $from;exit;
			$to =$To;
			$subject = strtr('Your Password at Videoblog', "\r\n" , "  " );
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
    
}

/* End of file authentication.php */
/* Location: ./application/controllers/authentication.php */


