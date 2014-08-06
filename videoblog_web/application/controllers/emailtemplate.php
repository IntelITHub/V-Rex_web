<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Emailtemplate extends MY_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('emailtemplate_model', '', TRUE);           
	} 
    
    //email templated listing
    function index(){
        $this->data['tpl_name']= "emailtemplate/view-emailtemplate.tpl";        
        $this->data['message'] = $this->session->flashdata('message');
        $this->breadcrumb->add('Dashboard',  $this->data['base_url'].'home');
        $this->breadcrumb->add('View Emailtemplate', '');
        $this->data['breadcrumb'] = $this->breadcrumb->output();        
        $this->smarty->assign('data', $this->data);
        $this->smarty->view('template.tpl'); 
    }

    //email templated listing
    function create(){
        $eStatuses = field_enums('emailtemplate','eStatus');
        if($this->input->post()){
            $emailtemplate = $this->input->post('data');
            $iEmailTemplateId= $this->emailtemplate_model->add_emailtemplate($emailtemplate);
            $this->session->set_flashdata('message',"Emailtemplate added successfully");
            redirect($this->data['base_url'] . 'emailtemplate');
            exit;
        } 
        $this->data['function']='create';  
        $this->breadcrumb->add('Dashboard',  $this->data['base_url'].'home');
        $this->breadcrumb->add('View Emailtemplate', $this->data['base_url']."emailtemplate");
        $this->breadcrumb->add('Add Emailtemplate', '');
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        $this->data['tpl_name']= "emailtemplate/edit-emailtemplate.tpl";	
        $this->smarty->assign('eStatuses', $eStatuses);
        $this->smarty->assign('data', $this->data);
        $this->smarty->view('template.tpl');
    }

    //update email template data.
    function update(){
        $eStatuses = field_enums('emailtemplate', 'eStatus');
        $iEmailTemplateId= $this->uri->segment(3);
        $this->data['function']='update/'.$iEmailTemplateId;
        $this->data['emailtemplate'] = $this->emailtemplate_model->get_emailtemplate_details($iEmailTemplateId);
        if($this->input->post()){
            $emailtemplate = $this->input->post('data');
            $emailtemplate['tEmailMessage']=$emailtemplate['tEmailMessage'];                        
            $iEmailTemplateId= $this->emailtemplate_model->edit_emailtemplate($emailtemplate);
            $this->session->set_flashdata('message',"Emailtemplate updated successfully");
            redirect($this->data['base_url'] . 'emailtemplate');
            exit;
        }
	    $this->breadcrumb->add('Dashboard', $this->data['base_url'].'home');
        $this->breadcrumb->add('View Emailtemplate',$this->data['base_url']."emailtemplate");
        $this->breadcrumb->add('Edit Emailtemplate', '');
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        $this->data['tpl_name']= "emailtemplate/edit-emailtemplate.tpl";  
        $this->smarty->assign('data', $this->data);
        $this->smarty->assign('eStatuses', $eStatuses);
        $this->smarty->view('template.tpl');
    }
    
    //update template status
    function action_update(){
        $ids = $this->input->post('iId');
        $action=$this->input->post('action');
        $tableData['tablename']='emailtemplate';
        $tableData['update_field']='iEmailTemplateId';   
        $count=$this->update_status($ids,$action,$tableData);    
        if($action=='Delete'){
            $count=count($ids);
            $this->session->set_flashdata('message',"Total  ($count) Record deleted successfully");
        }
        else{
            $count=$count;
            $this->session->set_flashdata('message',"Total  ($count) Record updated successfully");
        }           
        
        redirect($this->data['base_url'] . 'emailtemplate');
    }

    // get tempalte data.
    function get_emailtemplate_listing(){
        $all_emailtemplate = $this->emailtemplate_model->get_emailtemplate_list();
        if(count($all_emailtemplate) > 0){
            foreach ($all_emailtemplate as $key => $value){
                $alldata[$key]['id'] = '<input type="checkbox" name="iId[]" id="iId" value="'.$value['iEmailTemplateId'].'">';
                $alldata[$key]['emailtitle'] = $value['vEmailTitle'];
                $alldata[$key]['fromemail'] = $value['vFromEmail'];
                $alldata[$key]['emailcode'] = $value['vEmailCode'];
                $alldata[$key]['status'] = $value['eStatus'];
                $alldata[$key]['editlink'] = '<a href="'.$this->data['base_url'].'emailtemplate/update/'.$value['iEmailTemplateId'].'">Edit</a>';
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
/* End of file emailtemplate.php */
/* Location: ./application/controllers/emailtemplate.php */
?>