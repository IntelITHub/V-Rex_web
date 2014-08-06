<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class State extends MY_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->model('state_model', '', TRUE);
    }    

    function index(){
        $this->data['tpl_name']= "state/view-state.tpl";
        $this->data['message'] = $this->session->flashdata('message');
        $this->breadcrumb->add('Dashboard', base_url());
        $this->breadcrumb->add('View State', '');
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        $this->smarty->assign('data', $this->data);
        $this->smarty->view('template.tpl'); 
    }

    function action_update(){
        $ids = $this->input->post('iId');
        $action=$this->input->post('action');
        $tableData['tablename']='state';
        $tableData['update_field']='iStateId';   
        $count=$this->update_status($ids,$action,$tableData);    
        if($action=='Delete'){
            $count=count($ids);
        }
        else{
            $count=$count;
        }           
        $this->session->set_flashdata('message',"Total  ($count)  Record updated successfully");
        redirect($this->data['base_url'] . 'state');
    }

    //create state
    function create(){
        if($this->input->post()){            
            $state = $this->input->post('data');            
            $iStateId = $this->state_model->add_state($state);
            $this->session->set_flashdata('message',"State added successfully");
            redirect($this->data['base_url'].'state');
            exit;
        }       
        $this->data['function']='create';    
        $this->breadcrumb->add('Dashboard', $this->data['base_url'].'home');
        $this->breadcrumb->add('View State', $this->data['base_url']."state");
        $this->breadcrumb->add('Add State', '');
        $eStatuses = field_enums('state','eStatus');
        $countries = $this->state_model->get_country();
        $this->data['all_country']=$countries;
        $this->data['breadcrumb'] = $this->breadcrumb->output();        
        $this->data['tpl_name']= "state/state.tpl";   
        $this->smarty->assign('data', $this->data);
        $this->smarty->assign('eStatuses', $eStatuses);
        $this->smarty->view('template.tpl'); 
    }
    
    //update satate data.
    function update(){
        $eStatuses = field_enums('state','eStatus');
        $iStateId = $this->uri->segment(3);        

        $this->data['state'] = $this->state_model ->get_state_details($iStateId);
        if($this->input->post()){
            $state = $this->input->post('data');            
            $iStateId = $this->state_model->edit_state($state);
            $this->session->set_flashdata('message',"state updated successfully");            
            redirect($this->data['base_url'].'state');
            exit;
        }        
        $this->breadcrumb->add('Dashboard', $this->data['base_url'].'home');
        $this->breadcrumb->add('View State', $this->data['base_url']."state");
        $this->breadcrumb->add('Edit State', '');
        $this->data['function']='update/'.$iStateId;
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        $this->data['tpl_name']= "state/state.tpl";  
        $countries = $this->state_model->get_country();
        $this->data['all_country']=$countries;
        $this->smarty->assign('data', $this->data);
        $this->smarty->assign('eStatuses', $eStatuses);
        $this->smarty->view('template.tpl'); 
    }
    

    //get state listing
    function get_state_listing(){
        $all_state = $this->state_model->get_all_state();
        if(count($all_state) > 0){
            foreach ($all_state as $key => $value){
                $alldata[$key]['id'] = '<input type="checkbox" name="iId[]" id="iId" value="'.$value['iStateId'].'">';
                $alldata[$key]['statename'] = $value['vState'];
                $alldata[$key]['countryname'] = $value['vCountry'];
                $alldata[$key]['status'] = $value['eStatus'];
                $alldata[$key]['editlink'] = '<a href="'.$this->data['base_url'].'state/update/'.$value['iStateId'].'">Edit</i></a>';
            }        
            $aData['aaData'] =  $alldata;
        }else{
            $aData['aaData'] = '';
        }   
        $json_lang = json_encode($aData);
        echo $json_lang;exit;
    }  
}
/* End of file state.php */
/* Location: ./application/controllers/state.php */
?>