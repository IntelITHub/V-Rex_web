<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Staticpage extends MY_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('staticpage_model', '', TRUE);
    }    

    function index(){
        $this->data['tpl_name']= "staticpages/view-static.tpl";
        $this->data['message'] = $this->session->flashdata('message');
        $this->breadcrumb->add('Dashboard', base_url());
        $this->breadcrumb->add('View Static Pages', '');
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        $this->smarty->assign('data', $this->data);
        $this->smarty->view('template.tpl'); 
    }

    function create(){
        $eStatuses = field_enums('static_pages','eStatus');
        if($this->input->post()){
            $staticpage = $this->input->post('data');
            $iSPageId = $this->staticpage_model->add_staticpage($staticpage);
            $this->session->set_flashdata('message',"Static Page Added Successfully");
            redirect($this->data['base_url'] . 'staticpage');
            exit;
        }   
        $this->data['function']='create';
        $this->breadcrumb->add('Dashboard', base_url());
        $this->breadcrumb->add('View Static Pages', base_url()."staticpage");
        $this->breadcrumb->add('Add Static Pages', '');
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        $this->data['tpl_name']= "staticpages/edit-static.tpl";	
        $this->smarty->assign('data', $this->data);
        $this->smarty->assign('eStatuses', $eStatuses);
        $this->smarty->view('template.tpl'); 
    }
   
    function update(){
        $eStatuses = field_enums('static_pages','eStatus');
        $iSPageId = $this->uri->segment(3);
        $this->data['staticpage'] = $this->staticpage_model ->get_staticpage_details($iSPageId);
        if($this->input->post()){
            $staticpage = $this->input->post('data');
            $iSPageId = $this->staticpage_model->edit_staticpage($staticpage);
            $this->session->set_flashdata('message',"Static Page Updated Successfully");
            redirect($this->data['base_url'] . 'staticpage');
            exit;
        }
        $this->data['function']='update/'.$iSPageId;   
        $this->breadcrumb->add('Dashboard', base_url());
        $this->breadcrumb->add('View Static Pages', base_url()."staticpage");
        $this->breadcrumb->add('Edit Static Page', '');
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        $this->data['tpl_name']= "staticpages/edit-static.tpl";
        $this->smarty->assign('data', $this->data);
        $this->smarty->assign('eStatuses', $eStatuses);
        $this->smarty->view('template.tpl'); 
    }

    function action_update(){
        $ids = $this->input->post('iId');
        $action=$this->input->post('action');
        $tableData['tablename']='static_pages';
        $tableData['update_field']='iSPageId';   
        $count=$this->update_status($ids,$action,$tableData);    
        if($action=='Delete'){
            $count=count($ids);
            $this->session->set_flashdata('message',"Total  ($count)  Record deleted successfully");
        }
        else{
            $count=$count;
            $this->session->set_flashdata('message',"Total  ($count)  Record updated successfully");
        }           
        redirect($this->data['base_url'] . 'staticpage');
    }

    //get coutrylisting    
    function get_staticpage_listing(){
        $staticpages = $this->staticpage_model->get_staticpage_list();
        if(count($staticpages) > 0){
            foreach ($staticpages as $key => $value){
                $alldata[$key]['id'] = '<input type="checkbox" name="iId[]" id="iId" value="'.$value['iSPageId'].'">';
                $alldata[$key]['staticpagename'] = $value['vpagename'];
                $alldata[$key]['status'] = $value['eStatus'];
                $alldata[$key]['editlink'] = '<a href="'.$this->data['base_url'].'staticpage/update/'.$value['iSPageId'].'">Edit</a>';
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

/* End of file staticpage.php */
/* Location: ./application/controllers/staticpage.php */


