<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Country extends MY_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('country_model', '', TRUE);
    }    

    function index(){
        $this->data['tpl_name']= "country/view-country.tpl";
        $this->data['message'] = $this->session->flashdata('message');
        $this->breadcrumb->add('Dashboard', base_url());
        $this->breadcrumb->add('View Country', '');
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        $this->smarty->assign('data', $this->data);
        $this->smarty->view('template.tpl'); 
    }
    //create country
    function create(){
        $eStatuses = field_enums('country','eStatus');
        if($this->input->post()){            
            $country = $this->input->post('data');            
            $iCountryId = $this->country_model->add_country($country);
            $this->session->set_flashdata('message',"Country added successfully");
            redirect($this->data['base_url'].'country');
            exit;
        }   
        $this->breadcrumb->add('Dashboard', $this->data['base_url'].'home');
        $this->breadcrumb->add('View Country', $this->data['base_url']."country");
        $this->breadcrumb->add('Add Country', '');
        $this->data['function']='create';
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        $this->data['tpl_name']= "country/country.tpl";   
        $this->smarty->assign('data', $this->data);
        $this->smarty->assign('eStatuses', $eStatuses);
        $this->smarty->view('template.tpl'); 
    }

    //udpate country
    function update(){
        $eStatuses = field_enums('country','eStatus');
        $iCountryId = $this->uri->segment(3);
        //echo $iCountryId;exit;        
        $this->data['country'] = $this->country_model ->get_country_details($iCountryId);
        if($this->input->post()){
            $country = $this->input->post('data');            
            $iCountryId = $this->country_model->edit_country($country);
            $this->session->set_flashdata('message',"Country updated successfully");            
            redirect($this->data['base_url'].'country');
            exit;
        }
        $this->data['function']='update/'.$iCountryId;
        $this->breadcrumb->add('Dashboard', $this->data['base_url'].'home');
        $this->breadcrumb->add('View Country', $this->data['base_url']."country");
        $this->breadcrumb->add('Edit Country', '');
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        $this->data['tpl_name']= "country/country.tpl";  
        $this->smarty->assign('data', $this->data);
        $this->smarty->assign('eStatuses', $eStatuses);
        $this->smarty->view('template.tpl'); 
    }

    //create country active,inactive,delete
    function action_update(){
        $ids = $this->input->post('iId');      
        $action=$this->input->post('action');
        $tableData['tablename']='country';
        $tableData['update_field']='iCountryId';   
        $count=$this->update_status($ids,$action,$tableData);    
        if($action=='Delete'){
            $count=count($ids);
        }
        else{
            $count=$count;
        }           
        $this->session->set_flashdata('message',"Total  ($count)  Record updated successfully");
        redirect($this->data['base_url'] . 'country');
    }

    //get coutrylisting    
    function get_country_listing(){
        $all_country = $this->country_model->get_all_country();
        if(count($all_country) > 0){
            foreach ($all_country as $key => $value){
                $alldata[$key]['id'] = '<input type="checkbox" name="iId[]" id="iId" value="'.$value['iCountryId'].'">';
                $alldata[$key]['countryname'] = $value['vCountry'];
                $alldata[$key]['countrycode'] = $value['vCountryCode'];
                $alldata[$key]['countryisdcode'] = $value['vISDcode'];
                $alldata[$key]['status'] = $value['eStatus'];
                $alldata[$key]['editlink'] = '<a href="'.$this->data['base_url'].'country/update/'.$value['iCountryId'].'">Edit</a>';
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
/* End of file Country.php */
/* Location: ./application/controllers/Country.php */
?>