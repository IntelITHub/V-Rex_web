<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Category extends MY_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('category_model', '', TRUE);
        $this->load->library('upload');
        $this->load->library('image_lib');
    }    

    function index(){
        $this->data['tpl_name']= "category/view-category.tpl";
        $this->data['message'] = $this->session->flashdata('message');
        $this->breadcrumb->add('Dashboard', base_url());
        $this->breadcrumb->add('View Categories', '');
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        $this->smarty->assign('data', $this->data);
        $this->smarty->view('template.tpl'); 
    }

    function create(){
        $eStatuses = field_enums('categories','eStatus');
        if($this->input->post()){            
            $category = $this->input->post('data');            
            $iCategoryId = $this->category_model->add_category($category);
            if($_FILES['vIcon']['name']!=''){
                $category['vIcon']=$_FILES['vIcon']['name'];
                $icon_uploaded = $this->do_uploadicon($iCategoryId);
                $category['vIcon'] = $icon_uploaded;
                $category['iCategoryId'] = $iCategoryId;
                $iCategoryId = $this->category_model->edit_category($category);
            }
            $this->session->set_flashdata('message',"Category added successfully");
            redirect($this->data['base_url'] . 'category');
        }   
        $this->data['function']='create';
        $this->breadcrumb->add('Dashboard', base_url());
        $this->breadcrumb->add('View Categories', base_url()."category");
        $this->breadcrumb->add('Add Category', '');
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        $this->data['tpl_name']= "category/category.tpl";	
        $this->smarty->assign('data', $this->data);
        $this->smarty->assign('eStatuses', $eStatuses);
        $this->smarty->view('template.tpl'); 
    }
   
    function update(){
        $eStatuses = field_enums('categories','eStatus');
        $iCategoryId = $this->uri->segment(3);
        $this->data['function']='update/'.$iCategoryId;
        $this->data['category'] = $this->category_model ->get_category_details($iCategoryId);
        if($this->input->post()){
            $category = $this->input->post('data');            
            if(isset($_FILES) && $_FILES['vIcon']['name']!= ""){
                $category['vIcon']=$_FILES['vIcon']['name'];
                $icon_uploaded = $this->do_uploadicon($category['iCategoryId']);
                $category['vIcon'] = $icon_uploaded;
            }
            $iCategoryId = $this->category_model->edit_category($category);
            $this->session->set_flashdata('message',"Category updated successfully");
            redirect($this->data['base_url'] . 'category');
            exit;
        }   
        $this->breadcrumb->add('Dashboard', base_url());
        $this->breadcrumb->add('View Categories', base_url()."category");
        $this->breadcrumb->add('Edit Category', '');
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        $this->data['tpl_name']= "category/category.tpl";   
        $this->smarty->assign('data', $this->data);
        $this->smarty->assign('eStatuses', $eStatuses);
        $this->smarty->view('template.tpl'); 
    }

    function action_update(){
        $ids = $this->input->post('iId');      
        $action=$this->input->post('action');
        $tableData['tablename']='categories';
        $tableData['update_field']='iCategoryId';   
        $count=$this->update_status($ids,$action,$tableData);    
        if($action=='Delete'){
            $count=count($ids);
        }
        else{
            $count=$count;
        }           
        $this->session->set_flashdata('message',"Total  ($count)  Record updated successfully");
        redirect($this->data['base_url'] . 'category');
        
    	/*$ids = $this->input->post('iId'); 
        switch($this->input->post('action')){
            case "Delete":
            $upload_path = $this->config->item('base_path');                    
            foreach ($ids as $row){
                $data= $this->category_model->get_category_details($row);
                unlink($upload_path.'uploads/'.'category_icons/'.$row.'/'.$data['vIcon']);
                rmdir($upload_path.'uploads/'.'category_icons/'.$row);
            }
            $iId = $this->category_model->delete_all($ids);
            $this->session->set_flashdata('message',"Total ".count($ids)." Record(s) Deleted successfully");
            redirect($this->data['base_url'] . 'category');
            exit;
            break;
        }*/
    }

    function do_uploadicon($iconId){
        if(!is_dir('uploads/category_icons/')){
            @mkdir('uploads/category_icons/', 0777);
        }
        if(!is_dir('uploads/category_icons/'.$iconId)){
            @mkdir('uploads/category_icons/'.$iconId, 0777);
        }
        $config = array(
          'allowed_types' => 'gif|GIF|JPG|jpg|JPEG|jpeg||PNG|png',
          'upload_path' => 'uploads/category_icons/'.$iconId,
          'file_name' => str_replace(' ','',$_FILES['vIcon']['name']),
          'max_size'=>5380334
        );
        $this->upload->initialize($config);
        $this->upload->do_upload('vIcon'); //do upload
        $icon_data = $this->upload->data(); //get icon data
        $icon_uploaded = $icon_data['file_name'];
        return $icon_uploaded;
    }

    function deleteicon(){
        $upload_path = $this->config->item('base_path');        
        $iCategoryId = $_REQUEST['id'];
        $data = $this->category_model->get_category_details($iCategoryId);
        $var=unlink($upload_path.'uploads/'.'category_icons/'.$iCategoryId.'/'.$data['vIcon']);
        $var1 = $this->category_model->delete_icon($iCategoryId);
        redirect($this->data['base_url'].'category/update/'.$iCategoryId);
    }

    function get_category_listing(){
        $all_category = $this->category_model->get_all_category();
        if(count($all_category) > 0){
            foreach ($all_category as $key => $value){
                $alldata[$key]['id'] = '<input type="checkbox" name="iId[]" id="iId" value="'.$value['iCategoryId'].'">';
                $alldata[$key]['categoryname'] = $value['vCategory'];
                $alldata[$key]['status'] = $value['eStatus'];
                $alldata[$key]['editlink'] = '<a href="'.$this->data['base_url'].'category/update/'.$value['iCategoryId'].'">Edit</a>';
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
/* End of file category.php */
/* Location: ./application/controllers/category.php */