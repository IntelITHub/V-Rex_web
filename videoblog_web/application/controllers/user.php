<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class User extends MY_Controller
{
	function __construct()
	{
        parent::__construct();
        $this->load->model('user_model', '', TRUE);
        $this->load->model('role_model', '', TRUE);
	}
	function index()
	{   //echo "hi";exit;
        $this->data['tpl_name']= "user/view-user.tpl";
        $this->data['message'] = $this->session->flashdata('message');
        $this->breadcrumb->add('Dashboard', base_url());
        $this->breadcrumb->add('View User', '');
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        $this->smarty->assign('data', $this->data);
        $this->smarty->view('template.tpl'); 
	}
	//create user
	function create(){
        $eStatuses = field_enums('user', 'eStatus');
        $eRoles = $this->role_model->get_all_roles();
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
            $user['vPassword'] = md5($user['vPassword']);
            $iUserId = $this->user_model->add_user($user);
            $this->session->set_flashdata('message',"User added successfully");
            redirect($this->data['base_url'] . 'user');
            exit;
        }   
        $country = $this->user_model->get_country();
        $this->data['all_country']=$country;
        $state= $this->user_model->get_allstates();
        $this->data['all_state']=$state;
        $this->breadcrumb->add('Dashboard', $this->data['base_url'].'home');
        $this->breadcrumb->add('View User', $this->data['base_url']."user");
        $this->breadcrumb->add('Add User', '');
        $this->data['function']='create';
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        $this->data['tpl_name']= "user/user.tpl";   
        $this->smarty->assign('data', $this->data);
        $this->smarty->assign('eStatuses', $eStatuses);
        $this->smarty->assign('eRoles', $eRoles);
        $this->smarty->view('template.tpl'); 
    }
    //update user
    function update()
    {
        $eStatuses = field_enums('user','eStatus');
        $eRoles = $this->role_model->get_all_roles();
        $iUserId = $this->uri->segment(3);      
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
            if($user['vPassword']!=""){
            	$user['vPassword'] = md5($user['vPassword']);
            }else{
            	unset($user['vPassword']);
            }
            $iUserId = $this->user_model->edit_user($user);
            $this->session->set_flashdata('message',"User updated successfully");            
            redirect($this->data['base_url'].'user');
            exit;
        }
        $countries = $this->user_model->get_country();
        $this->data['all_country']=$countries;
        $state= $this->user_model->get_allstates();
        $this->data['all_state']=$state;
        $this->data['function']='update/'.$iUserId;
        $this->breadcrumb->add('Dashboard', $this->data['base_url'].'home');
        $this->breadcrumb->add('View User', $this->data['base_url']."user");
        $this->breadcrumb->add('Edit User', '');
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        $this->data['tpl_name']= "user/user.tpl";  
        $this->smarty->assign('data', $this->data);
        $this->smarty->assign('eStatuses', $eStatuses);
        $this->smarty->assign('eRoles', $eRoles);
        $this->smarty->view('template.tpl'); 
    }
    //create user active,inactive,delete
    function action_update()
    {
        $ids = $this->input->post('iId');      
        $action=$this->input->post('action');
        $tableData['tablename']='user';
        $tableData['update_field']='iUserId';   
        $count=$this->update_status($ids,$action,$tableData);    
        if($action=='Delete'){
            $count=count($ids);
        }
        else{
            $count=$count;
        }           
        $this->session->set_flashdata('message',"Total  ($count)  Record updated successfully");
        redirect($this->data['base_url'] . 'user');
    }
    //get userlisting
    function get_user_listing(){
        $all_user = $this->user_model->get_all_user();
        if(count($all_user) > 0){
            foreach ($all_user as $key => $value){
                $alldata[$key]['id'] = '<input type="checkbox" name="iId[]" id="iId" value="'.$value['iUserId'].'">';
                $alldata[$key]['name'] = $value['vFirstName'];
                $alldata[$key]['role'] = $value['vTitle'];
                $alldata[$key]['email'] = $value['vEmail'];
                $alldata[$key]['phone'] = $value['vPhone'];
                $alldata[$key]['status'] = $value['eStatus'];
                $alldata[$key]['editlink'] = '<a href="'.$this->data['base_url'].'user/update/'.$value['iUserId'].'">Edit</a>';
            }        
            $aData['aaData'] =  $alldata;
        }
        else{
            $aData['aaData'] = '';
        }   
        $json_lang = json_encode($aData);
        echo $json_lang;exit;
    }
    //get all states
    function get_all_states()
    {
        $iCountryId = $this->uri->segment(3);
        $states = $this->user_model->get_states($iCountryId);
        $options = '';
        if(count($states) > 0)
        {
            for($i=0;$i<count($states);$i++)
            {
                $options .= '<option value="'.$states[$i]['iStateId'].'">'.$states[$i]['vState'].'</option>';
            }    
        }
        else
        {
            $options .= '<option value="">-- Select State--</option>';
        }
        
        $json_lang = json_encode($options);   
        print $json_lang;
        exit;
    }  
}
?>