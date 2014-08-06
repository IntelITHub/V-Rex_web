<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Tag extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('tag_model', '', TRUE);
    }    

    function index()
    {
        $this->data['tpl_name']= "view-tag.tpl";
        $total_rows = $this->tag_model->count_tag();
        $this->data['pagination']['base_url'] = $this->data['base_url'].'tag';
        $this->data['pagination']['total_rows'] = $total_rows;
        $this->pagination->initialize($this->data['pagination']); 
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $this->data['tag']  =  $this->tag_model->get_tag($this->data['pagination']["per_page"],$page);
        $this->data['create_links'] =  $this->pagination->create_links();
        if($total_rows > 0)
        {
            if($page !=0){
                $end = (($page+$this->data['pagination']['per_page'])/$this->data['pagination']['per_page'])*$this->data['pagination']['per_page'];
                $start = $end - ( $this->data['pagination']['per_page'] -1 );
                if($end > $total_rows)
                $end = $total_rows;            
            }
            else{
                $end = $this->data['pagination']['per_page'];
                if($end > $total_rows)
                    $end = $total_rows;
                $start = 1;
            }
            $this->data['paging_message']  = 'Showing Records '. $start.' to '. $end.' out of '.$total_rows;
        }
        else
        {
            $this->data['paging_message']  = 'No Records Found';
        }
        $this->data['message'] = $this->session->flashdata('message');
        
        //breadcrumb 
        $this->breadcrumb->add('Dashboard', base_url());
        $this->breadcrumb->add('View Tag', '');
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        //ends
        $this->smarty->assign('data', $this->data);
        $this->smarty->view('template.tpl'); 
    }

    function create()
    {
        if($this->input->post())
        {
            $tag = $this->input->post('data');
            $iTagId = $this->tag_model->add_tag($tag);
            $this->session->set_flashdata('message',"Tag added successfully");
            redirect($this->data['base_url'] . 'tag');
            exit;
        }   
        //breadcrumb 
        $this->breadcrumb->add('Dashboard', base_url());
        $this->breadcrumb->add('View Tag', base_url()."tag");
        $this->breadcrumb->add('Add Tag', '');
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        //ends
        $this->data['tpl_name']= "new-tag.tpl";	
        $this->smarty->assign('data', $this->data);
        $this->smarty->view('template.tpl'); 
    }
   
    function update()
    {
        $iTagId = $this->uri->segment(3);
        $this->data['tag'] = $this->tag_model ->get_tag_details($iTagId);
        if($this->input->post())
        {
            $tag = $this->input->post('data');
            $iTagId = $this->tag_model->edit_tag($tag);
            $this->session->set_flashdata('message',"Tag updated successfully");
            redirect($this->data['base_url'] . 'tag');
            exit;
        }   
        //breadcrumb 
        $this->breadcrumb->add('Dashboard', base_url());
        $this->breadcrumb->add('View Tag', base_url()."tag");
        $this->breadcrumb->add('Edit Tag', '');
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        //ends
        $this->data['tpl_name']= "edit-tag.tpl";  
        $this->smarty->assign('data', $this->data);
        $this->smarty->view('template.tpl'); 
    }

    function action_update()
    {
        $ids = $this->input->post('iId'); 
        switch($this->input->post('action'))
        {
            case "Delete":
                    $iId = $this->tag_model->delete_all($ids);
                    $this->session->set_flashdata('message',"Total  (".count($ids).")s  Record Deleted successfully");
                    redirect($this->data['base_url'] . 'tag');
                    exit;
                    break;
        }
    }
}
/* End of file tag.php */
/* Location: ./application/controllers/tag.php */