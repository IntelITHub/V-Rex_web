<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Role extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('role_model', '', TRUE);
    }    

    function index(){
        $this->data['tpl_name']= "role/view-role.tpl";
        $this->data['message'] = $this->session->flashdata('message');
        $this->breadcrumb->add('Dashboard', base_url());
        $this->breadcrumb->add('View Role', '');
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        $this->smarty->assign('data', $this->data);
        $this->smarty->view('template.tpl'); 
    }

    function create(){
        if($this->input->post()){
            $role = $this->input->post('data');
            $iRoleId = $this->role_model->add_role($role);
            $this->session->set_flashdata('message',"Role added successfully");
            redirect($this->data['base_url'] . 'role');
            exit;
        }   
        $this->data['function']='create';
        $this->breadcrumb->add('Dashboard', base_url());
        $this->breadcrumb->add('View Role', base_url()."role");
        $this->breadcrumb->add('Add Role', '');
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        $this->data['tpl_name']= "role/edit-role.tpl";	
        $this->smarty->assign('data', $this->data);
        $this->smarty->view('template.tpl'); 
    }
   
    function update(){
        $iRoleId = $this->uri->segment(3);
        $this->data['role'] = $this->role_model ->get_role_details($iRoleId);
        if($this->input->post()){
            $role = $this->input->post('data');
            $iRoleId = $this->role_model->edit_role($role);
            $this->session->set_flashdata('message',"Role updated successfully");
            redirect($this->data['base_url'] . 'role');
            exit;
        }   
        $this->data['function']='update/'.$iRoleId;
        $this->breadcrumb->add('Dashboard', base_url());
        $this->breadcrumb->add('View Role', base_url()."role");
        $this->breadcrumb->add('Edit Role', '');
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        $this->data['tpl_name']= "role/edit-role.tpl";  
        $this->smarty->assign('data', $this->data);
        $this->smarty->view('template.tpl'); 
    }

    function action_update(){
        $ids = $this->input->post('iId');      
        $action=$this->input->post('action');
        $tableData['tablename']='role';
        $tableData['update_field']='iRoleId';   
        $count=$this->update_status($ids,$action,$tableData);    
        if($action=='Delete'){
            $count=count($ids);
            $this->session->set_flashdata('message',"Total  ($count)s  Record Deleted successfully");
        }
        else{
            $count=$count;
            $this->session->set_flashdata('message',"Total  ($count)  Record updated successfully");
        }    
        redirect($this->data['base_url'] . 'role');       
    }

    function get_role_listing(){
        $all_role = $this->role_model->get_role_list();
        if(count($all_role) > 0){
            foreach ($all_role as $key => $value){
                $alldata[$key]['id'] = '<input type="checkbox" name="iId[]" id="iId" value="'.$value['iRoleId'].'">';
                $alldata[$key]['name'] = $value['vTitle'];
                $alldata[$key]['status'] = $value['eStatus'];
                $alldata[$key]['editlink'] = '<a href="'.$this->data['base_url'].'role/update/'.$value['iRoleId'].'">Edit</a>';
            }        
            $aData['aaData'] =  $alldata;
        }
        else{
            $aData['aaData'] = '';
        }   
        $json_lang = json_encode($aData);
        echo $json_lang;exit;
    }
}
/* End of file role.php */
/* Location: ./application/controllers/role.php */