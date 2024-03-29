<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{

		//initialize all required variables
		function __construct()
		{			
			parent::__construct();			
			$this->load->helper('cookie');
			$this->load->library('session');
			$this->load->helper('date');
			$this->load->helper('url');
			$this->load->helper('common_func');
			$this->load->helper('global_variable');
			$this->load->library('Breadcrumb');
			$this->load->library('pagination');
			$this->load->database();
			$this->load->library('curl');
			$this->load->library('email');
			$this->load->helper('file');
			$this->load->model('common_model');
			getGeneralVar();
        	$this->data=$GLOBALS['Configration_value'];
			$this->data['base_url'] 		= $this->config->item('base_url');
			$this->data['base_path'] 		= $this->config->item('base_path');
			$this->data['base_css'] 		= $this->config->item('base_css');
			$this->data['bootstrap_css'] 	= $this->config->item('bootstrap_css');
			$this->data['bootstrap_js'] 	= $this->config->item('bootstrap_js');
			$this->data['base_js'] 			= $this->config->item('base_js');
			$this->data['base_image'] 		= $this->config->item('base_image');
			$this->data['base_logo'] 		= $this->config->item('base_logo');
			$this->data['base_livesupport'] = $this->config->item('base_livesupport');
			$this->data['base_upload']		= $this->config->item('base_upload');
			$this->data['fancybox_path']    = $this->config->item('fancybox_path');
			$this->data['url_name'] = $this->uri->segment(1, 0);
			$this->data['user_info']     = $this->session->userdata('user_info');
			
        	$this->data['category_icon_url'] = $this->config->item('category_icon_url');
			$this->data['post_file_url'] = $this->config->item('post_file_url');
			
			
			if($this->data['user_info']   == "")
			{
				if($this->router->class !="authentication"){
					redirect($this->data['base_url'] . 'authentication');	
					exit;
				}
			}

			##paging configurations
			$this->data['pagination']['per_page'] = $this->data['ADMIN_REC_LIMIT']; 
			$this->data['pagination']['full_tag_open'] = '<ul>';
			$this->data['pagination']['full_tag_close'] = '</ul>';
			$this->data['pagination']['uri_segment'] = 2;
			$this->data['pagination']['first_link'] = 'First';
			$this->data['pagination']['first_tag_open'] = '<li>';
			$this->data['pagination']['first_tag_close'] = '</li>';
			$this->data['pagination']['use_page_numbers'] = false;
			$this->data['pagination']['cur_tag_open'] = '<li class="active"><span>';
			$this->data['pagination']['cur_tag_close'] = '</span></li>';
			$this->data['pagination']['next_tag_open'] = '<li>';
			$this->data['pagination']['next_link'] = 'Next';
			$this->data['pagination']['next_tag_close'] = '</li>';
			$this->data['pagination']['prev_link'] = 'Prev';
			$this->data['pagination']['prev_tag_open'] = '<li>';
			$this->data['pagination']['prev_tag_close'] = '</li>';
			$this->data['pagination']['num_tag_open'] = '<li>';
			$this->data['pagination']['num_tag_close'] = '</li>';
			$this->data['pagination']['last_tag_open'] = '<li>';
			$this->data['pagination']['last_tag_close'] = '</li>';
			$this->data['pagination']['last_tag_close'] = '</li>';
			##ends here
		}

		function update_status($ids,$action,$tableData){
		switch($this->input->post('action')){
			case "Inactive":
			case "Active":		
				$iId = $this->common_model->get_update_all($ids,$action,$tableData);  								                                       
				return $iId;                    
				break;
			case "Delete":		            
				$upload_path =$this->data['base_path'];		            
				foreach ($ids as $row){		            	
				   $data= $this->common_model->get_category_details($row,$tableData);		            	
				   unlink($upload_path.'uploads/'.$tableData['folder_name'].'/'.$row.'/'.$data[$tableData['image_field']]);
				   rmdir($upload_path.'uploads/'.$tableData['folder_name'].'/'.$row);
				}		            
				$iId = $this->common_model->delete_record($ids,$tableData);
				return $iId;                    
				break;
        }
    }

       
}
?>