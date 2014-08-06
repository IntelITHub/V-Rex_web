<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Apk extends MY_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('apk_model', '', TRUE);
        $this->load->library('upload');
        $this->load->library('image_lib');
    }    

    function index(){
        $this->data['tpl_name']= "apk/view_apk.tpl";
        $this->data['message'] = $this->session->flashdata('message');
        $this->breadcrumb->add('Dashboard', base_url());
        $this->breadcrumb->add('View Apk', '');
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        $this->smarty->assign('data', $this->data);
        $this->smarty->view('template.tpl'); 
    }

    function create(){
        if($this->input->post()){            
            $apk = $this->input->post('data');            
            $iApkId = $this->apk_model->add_apk($apk);
            if($_FILES['vFile']['name']!=''){
                $apk['vFile']=$_FILES['vFile']['name'];
                $icon_uploaded = $this->do_uploadicon($iApkId);
                $apk['vFile'] = $_FILES["vFile"]["name"];
                $apk['iApkId'] = $iApkId;
                $iApkId = $this->apk_model->edit_apk($apk);
            }
            $this->session->set_flashdata('message',"Apk added successfully");
            redirect($this->data['base_url'] . 'apk');
        }   
        $this->data['function']='create';
        $this->breadcrumb->add('Dashboard', base_url());
        $this->breadcrumb->add('View Apk', base_url()."apk");
        $this->breadcrumb->add('Add Apk', '');
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        $this->data['tpl_name']= "apk/apk.tpl";	
        $this->smarty->assign('data', $this->data);
        $this->smarty->assign('eStatuses', $eStatuses);
        $this->smarty->view('template.tpl'); 
    }
   
    function update(){
        $iApkId = $this->uri->segment(3);
        $this->data['function']='update/'.$iApkId;
        $this->data['apk'] = $this->apk_model ->get_apk_details($iApkId);
        if($this->input->post()){
            $apk = $this->input->post('data');            
            if(isset($_FILES) && $_FILES['vFile']['name']!= ""){
                $apk['vFile']=$_FILES['vFile']['name'];
                $icon_uploaded = $this->do_uploadicon($apk['iApkId']);
                $apk['vFile'] = $_FILES["vFile"]["name"];
            }
            $iApkId = $this->apk_model->edit_apk($apk);
            $this->session->set_flashdata('message',"Apk updated successfully");
            redirect($this->data['base_url'] . 'apk');
            exit;
        }   
        $this->breadcrumb->add('Dashboard', base_url());
        $this->breadcrumb->add('View Apk', base_url()."apk");
        $this->breadcrumb->add('Edit Apk', '');
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        $this->data['tpl_name']= "apk/apk.tpl";   
        $this->smarty->assign('data', $this->data);
        $this->smarty->assign('eStatuses', $eStatuses);
        $this->smarty->view('template.tpl'); 
    }

    function action_update(){
        $ids = $this->input->post('iId'); 
        switch($this->input->post('action')){
            case "Delete":
            $upload_path = $this->config->item('base_path');                    
            foreach ($ids as $row){
                $data= $this->apk_model->get_apk_details($row);
                unlink($upload_path.'uploads/'.'apk_icons/'.$row.'/'.$data['vFile']);
                rmdir($upload_path.'uploads/'.'apk_icons/'.$row);
            }
            $iId = $this->apk_model->delete_all($ids);
            $this->session->set_flashdata('message',"Total ".count($ids)." Record(s) Deleted successfully");
            redirect($this->data['base_url'] . 'apk');
            exit;
            break;
        }
    }

    function do_uploadicon($iconId){
        $path=$this->data['base_path'].'uploads/apk_icons/'.$iconId;
        if(!is_dir('uploads/apk_icons/')){
            @mkdir('uploads/apk_icons/', 0777);
        }
        if(!is_dir('uploads/apk_icons/'.$iconId)){
            @mkdir('uploads/apk_icons/'.$iconId, 0777);
        }
        move_uploaded_file($_FILES["vFile"]["tmp_name"],$path.'/'.$_FILES["vFile"]["name"]);
    }

    function deleteicon(){
        $upload_path = $this->config->item('base_path');        
        $iApkId = $_REQUEST['id'];
        $data = $this->apk_model->get_apk_details($iApkId);
        $var=unlink($upload_path.'uploads/'.'apk_icons/'.$iApkId.'/'.$data['vFile']);
        $var1 = $this->apk_model->delete_icon($iApkId);
        redirect($this->data['base_url'].'apk/update/'.$iApkId);
    }

    function get_apk_listing(){
        $all_apk = $this->apk_model->get_all_apk();
        if(count($all_apk) > 0){
            foreach ($all_apk as $key => $value){
                $alldata[$key]['id'] = '<input type="checkbox" name="iId[]" id="iId" value="'.$value['iApkId'].'">';
                $alldata[$key]['vTitle'] = $value['vTitle'];
                $alldata[$key]['vFile'] = $value['vFile'];
                $alldata[$key]['vVersion'] = $value['vVersion'];
                $alldata[$key]['dCreatedDate'] = $value['dCreatedDate'];
                $alldata[$key]['editlink'] = '<a href="'.$this->data['base_url'].'apk/update/'.$value['iApkId'].'">Edit</a>          <a href="'.$this->data['base_url'].'apk/download/'.$value['iApkId'].'"> Download </a>';
            }        
            $aData['aaData'] =  $alldata;
        }
        else{
            $aData['aaData'] = '';
        }   
        $json_lang = json_encode($aData);
        echo $json_lang;exit;
    }

    function download(){
        $iApkId = $this->uri->segment(3);
        $apk = $this->apk_model ->get_apk_details($iApkId);
        $filename=$apk['vFile'];
        $file = $this->data['base_path'].'uploads/'.'apk_icons/'.$iApkId.'/'.$apk['vFile'];
        if (file_exists($file)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/vnd.android.package-archive');
            header("Content-Disposition:attachment; filename=\"$filename\"");
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            ob_clean();
            flush();
            readfile($file);
            exit;
        }
    }
}
/* End of file apk.php */
/* Location: ./application/controllers/apk.php */