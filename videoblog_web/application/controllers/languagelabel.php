<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Languagelabel extends MY_Controller
{
	function __construct()
    {
        parent::__construct();
        $this->load->model('languagelabel_model', '', TRUE);
    }
    function index()
	{   
        $this->data['tpl_name']= "languagelabel/view-languagelabel.tpl";
        $this->data['message'] = $this->session->flashdata('message');
        $this->breadcrumb->add('Dashboard', base_url());
        $this->breadcrumb->add('View Language Labels', '');
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        $this->smarty->assign('data', $this->data);
        $this->smarty->view('template.tpl'); 
	}
    //create langlabel
	function create()
	{
		$eStatuses = field_enums('lang_label','eStatus');
		if($this->input->post())
        {            
            $languagelabel = $this->input->post('data');
            $iLabelId = $this->languagelabel_model->add_languagelabel($languagelabel);
            $this->session->set_flashdata('message',"Language Label Added Successfully");
            redirect($this->data['base_url'] . 'languagelabel');
            exit;
        }
        $this->breadcrumb->add('Dashboard', $this->data['base_url'].'home');
        $this->breadcrumb->add('View Language Labels', $this->data['base_url']."languagelabel");
        $this->breadcrumb->add('Add Language Label', '');
        $this->data['function']='create';
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        $this->data['tpl_name']= "languagelabel/languagelabel.tpl";   
        $this->smarty->assign('data', $this->data);
        $this->smarty->assign('eStatuses', $eStatuses);
        $this->smarty->view('template.tpl');  
	}
    //update langlabel
	function update()
	{
		$eStatuses = field_enums('lang_label','eStatus');
		$iLabelId = $this->uri->segment(3);
        $this->data['languagelabel'] = $this->languagelabel_model->get_languagelabel_details($iLabelId);
        if($this->input->post())
        {
            $languagelabel = $this->input->post('data');
            $languagelabel['vValue_en'] = addslashes($_REQUEST['data']['vValue_en']);
            $languagelabel['vValue_pt'] = addslashes($_REQUEST['data']['vValue_pt']);
            //echo '<pre>';print_r($languagelabel);exit;
            $iLabelId = $this->languagelabel_model->edit_languagelabel($languagelabel);
            $this->session->set_flashdata('message',"Language Label Updated Successfully");
            redirect($this->data['base_url'] . 'languagelabel');
            exit;
        }
        $this->data['function']='update/'.$iLabelId;
        $this->breadcrumb->add('Dashboard', $this->data['base_url'].'home');
        $this->breadcrumb->add('View Language Label', $this->data['base_url']."languagelabel");
        $this->breadcrumb->add('Edit Language Label', '');
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        $this->data['tpl_name']= "languagelabel/languagelabel.tpl";  
        $this->smarty->assign('data', $this->data);
        $this->smarty->assign('eStatuses', $eStatuses);
        $this->smarty->view('template.tpl');    
	}
    //langlabel active,inactive,delete
	function action_update()
    {
        $ids = $this->input->post('iId');      
        $action=$this->input->post('action');
        $tableData['tablename']='lang_label';
        $tableData['update_field']='iLabelId';   
        $count=$this->update_status($ids,$action,$tableData);    
        if($action=='Delete'){
            $count=count($ids);
        }
        else{
            $count=$count;
        }           
        $this->session->set_flashdata('message',"Total  ($count)  Record updated successfully");
        redirect($this->data['base_url'] . 'languagelabel');
    }
    //listing langlabels
    function get_languagelabel_listing(){
        $all_languagelabel = $this->languagelabel_model->get_all_languagelabel();
        //echo "<pre>";print_r($all_user);exit;
        if(count($all_languagelabel) > 0){
            foreach ($all_languagelabel as $key => $value){
                $alldata[$key]['id'] = '<input type="checkbox" name="iId[]" id="iId" value="'.$value['iLabelId'].'">';
                $alldata[$key]['labelname'] = $value['vName'];
                $alldata[$key]['usaenglish'] = $value['vValue_en'];
                $alldata[$key]['portuguese'] = $value['vValue_pt'];
                $alldata[$key]['status'] = $value['eStatus'];
                $alldata[$key]['editlink'] = '<a href="'.$this->data['base_url'].'languagelabel/update/'.$value['iLabelId'].'">Edit</a>';
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
?>