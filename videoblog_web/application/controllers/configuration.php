<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class configuration extends MY_Controller{
    
    function __construct(){
        parent::__construct();      
        $this->load->model('configuration_model', '', TRUE);   
	}   

    //load configuration data
    function index(){
	   $db_config = $this->configuration_model->loadcofig()->result();
	   $this->smarty->assign("db_config",$db_config);
	   $this->breadcrumb->add('Dashboard', $this->data['base_url'].'home');
	   $this->breadcrumb->add('Edit Configuration', '');
	   $this->data['breadcrumb'] = $this->breadcrumb->output();	   
	   $this->data['message'] = $this->session->flashdata('message');
	   $this->data['tpl_name']= "edit-configuration.tpl";  
	   $this->smarty->assign('data', $this->data);
	   $this->smarty->view('template.tpl');
    }
    
    //update configuration data.
    function update(){
	   if($this->input->post()){
		  $Data = $this->input->post('Data');
		  foreach($Data as $key=>$val) {
			 $Value = array(
					   'vValue'=>$val
					   );
			 $where = ' vName  = "'.$key.'"';
			 $result = $this->configuration_model->update($Value, $key);
		  }
		  $this->session->set_flashdata('message',"configuration updated successfully");            
		  redirect($this->data['base_url'].'configuration');
		  exit;
	   }
	   $this->breadcrumb->add('Dashboard', $this->data['base_url'].'home');
	   $this->breadcrumb->add('Edit Configuration', '');
	   $this->data['breadcrumb'] = $this->breadcrumb->output();
	   $this->data['tpl_name']= "edit-configuration.tpl";  
	   $this->smarty->assign('data', $this->data);
	   $this->smarty->view('template.tpl'); 
    }

}
/* End of file configuration.php */
/* Location: ./application/controllers/configuration.php */