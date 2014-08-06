<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Language extends MY_Controller
{
	function __construct()
    {
        parent::__construct();
        $this->load->model('language_model', '', TRUE);
    }   
    function index()
	{   //echo "hi";exit;
        $this->data['tpl_name']= "language/view-language.tpl";
        $this->data['message'] = $this->session->flashdata('message');
        $this->breadcrumb->add('Dashboard', base_url());
        $this->breadcrumb->add('View Language', '');
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        $this->smarty->assign('data', $this->data);
        $this->smarty->view('template.tpl'); 
	}
	//add language
	function create()
	{
		$eStatuses = field_enums('language','eStatus');
        if($this->input->post())
        {            
            $language = $this->input->post('data');
            $iLanguageId = $this->language_model->add_language($language);
            $this->session->set_flashdata('message',"Language Added Successfully");
            redirect($this->data['base_url'] . 'language');
            exit;
        }  
        $this->breadcrumb->add('Dashboard', $this->data['base_url'].'home');
        $this->breadcrumb->add('View Language', $this->data['base_url']."language");
        $this->breadcrumb->add('Add Language', '');
        $this->data['function']='create';
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        $this->data['tpl_name']= "language/language.tpl";   
        $this->smarty->assign('data', $this->data);
        $this->smarty->assign('eStatuses', $eStatuses);
        $this->smarty->view('template.tpl');  
	}
	//update language
	function update()
    {
        $eStatuses = field_enums('language','eStatus');
        $iLanguageId = $this->uri->segment(3);
        $this->data['language'] = $this->language_model->get_language_details($iLanguageId);
        if($this->input->post())
        {
            $language = $this->input->post('data');
            $iLanguageId = $this->language_model->edit_language($language);
            $this->session->set_flashdata('message',"Language Updated Successfully");
            redirect($this->data['base_url'] . 'language');
            exit;
        }
        $this->data['function']='update/'.$iLanguageId;
        $this->breadcrumb->add('Dashboard', $this->data['base_url'].'home');
        $this->breadcrumb->add('View Language', $this->data['base_url']."language");
        $this->breadcrumb->add('Edit Language', '');
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        $this->data['tpl_name']= "language/language.tpl";  
        $this->smarty->assign('data', $this->data);
        $this->smarty->assign('eStatuses', $eStatuses);
        $this->smarty->view('template.tpl');  
    }
    //create language active,inactive,delete
    function action_update()
    {
        $ids = $this->input->post('iId');      
        $action=$this->input->post('action');
        $tableData['tablename']='language';
        $tableData['update_field']='iLanguageId';   
        $count=$this->update_status($ids,$action,$tableData);    
        if($action=='Delete'){
            $count=count($ids);
        }
        else{
            $count=$count;
        }           
        $this->session->set_flashdata('message',"Total  ($count)  Record updated successfully");
        redirect($this->data['base_url'] . 'language');
    }
    //language listing
    function get_language_listing(){
        $all_language = $this->language_model->get_all_language();
        //echo "<pre>";print_r($all_user);exit;
        if(count($all_language) > 0){
            foreach ($all_language as $key => $value){
                $alldata[$key]['id'] = '<input type="checkbox" name="iId[]" id="iId" value="'.$value['iLanguageId'].'">';
                $alldata[$key]['language'] = $value['vLanguage'];
                $alldata[$key]['languagecode'] = $value['vLangCode'];
                $alldata[$key]['status'] = $value['eStatus'];
                $alldata[$key]['editlink'] = '<a href="'.$this->data['base_url'].'language/update/'.$value['iLanguageId'].'">Edit</a>';
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