<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('member_model', '', TRUE);
        $this->load->model('category_model', '', TRUE);
        $this->load->model('Post_model', '', TRUE);
        $this->load->model('user_model', '', TRUE);
        $this->load->model('role_model', '', TRUE);
    }    

    function index()
    {
        //breadcrumb 
        $this->breadcrumb->add('Dashboard', "");
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        //ends
		$this->data['paging_message']  = 'No Records Found';
        
		// List of current registration members
		$members = $this->member_model->get_current_member_registration();
        foreach($members as $key=>$value){
            $members[$key]['dBirthDate']=date('d  F  Y',strtotime($value['dBirthDate']));
        }
        $this->data['member'] = $members;
        
		// Count total categories
		$totalCat = $this->category_model->category_count();
		$this->data['total_category'] = $totalCat;
        
		// Count total post
		$totalPost = $this->Post_model->count_post();
		$this->data['total_post'] = $totalPost;
		
		// Count total member
		$totalMember = $this->member_model->count_member();
		$this->data['total_member'] = $totalMember;
		
		// Count all post comment
		$totalPostComment = $this->Post_model->count_all_comments();
		$this->data['total_post_comment'] = $totalPostComment;
		
        $this->data['tpl_name']= "home.tpl";
        $this->smarty->assign('data', $this->data);
        $this->smarty->view('template.tpl'); 
    }
    
    function changepassword(){
    	
    	$this->breadcrumb->add('Dashboard', base_url());
        $this->breadcrumb->add('Changepassword', '');
        $this->data['breadcrumb'] = $this->breadcrumb->output();
    	$this->data['tpl_name']= "changepassword.tpl";
        $this->smarty->assign('data', $this->data);
        $this->smarty->view('template.tpl'); 	
        if($this->input->post('vPassword')){
        	$iUserId=$this->data['user_info']['iUserId'];
        	$genaratNewPassword=$this->input->post('vPassword');
        	$this->member_model->change_password($iUserId,$genaratNewPassword);
        	redirect($this->data['base_url'].'home');
        }
    }
    
    // edit my profile
    function Profile(){
        $eStatuses = field_enums('user','eStatus');
        $eRoles = $this->role_model->get_all_roles();
        $iUserId = $this->uri->segment(3);
        $iUserId=$this->data['user_info']['iUserId'];      
        $this->data['user'] = $this->user_model ->get_user_details($iUserId);
        if($this->input->post()){
            $user = $this->input->post('data');            
            $iStateId=$user[iStateId];                         
            $state = $this->user_model->get_states_code($iStateId);
            $vStateCode=$state[0][vStateCode];
            $user['vStateCode'] = $vStateCode;
            $iCountryId=$user[iCountryId];                         
            $country = $this->user_model->get_country_code($iCountryId);
            $vCountryCode=$country[0][vCountryCode];
            $user['vCountryCode'] = $vCountryCode;
            if($user['vPassword']!="")
            $user['vPassword'] = md5($user['vPassword']);
            $iUserId = $this->user_model->edit_user($user);
            $this->session->set_flashdata('message',"User updated successfully");            
            redirect($this->data['base_url']);
            exit;
        }
        $countries = $this->user_model->get_country();
        $this->data['all_country']=$countries;
        $state= $this->user_model->get_allstates();
        $this->data['all_state']=$state;
        $this->data['function']='update/'.$iUserId;
        $this->breadcrumb->add('Dashboard', $this->data['base_url']);
        $this->breadcrumb->add('My Profile', '');
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        $this->data['tpl_name']= "profile.tpl";  
        $this->smarty->assign('data', $this->data);
        $this->smarty->assign('eStatuses', $eStatuses);
        $this->smarty->assign('eRoles', $eRoles);
        $this->smarty->view('template.tpl'); 
    }
    
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */


