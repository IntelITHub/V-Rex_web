<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Member extends MY_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->model('member_model', '', TRUE);
        $this->load->library('upload'); 
        $this->load->library('image_lib');
        $member_pic_path = $this->config->item('member_pic_path');
        $this->smarty->assign("member_pic_path",$member_pic_path);
        $fancybox_path= $this->config->item('fancybox_path');
        $this->smarty->assign("fancybox_path",$fancybox_path);
    } 
       
	// Mebmer listing
    function index(){
        $this->data['tpl_name']= "member/view-member.tpl";
        $this->data['message'] = $this->session->flashdata('message');        
        $this->breadcrumb->add('Dashboard', base_url());
        $this->breadcrumb->add('View Member', '');
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        $this->smarty->assign('data', $this->data);
        $this->smarty->view('template.tpl'); 
    }

    function create(){
        $all_countries = get_array('country','iCountryId');
        $all_states = get_array('state','iCountryId');
        $eStatuses = field_enums('member','eStatus');
        if($this->input->post()){
            $member = $this->input->post('data');
            $member['vPassword'] = md5($member['vPassword']);
            $member['dCreatedDate'] = date('Y-m-d H:i:s');
            $iMemberId = $this->member_model->add_member($member);
            if($_FILES['vPicture']!=''){
            	$member1 = true;
                $img_uploaded_partner = $this->do_upload_partner($iMemberId,$member1);
                $member['vPicture'] = $img_uploaded_partner;
                $member['iMemberId'] = $iMemberId;
                $iMemberId = $this->member_model->edit_member($member);
            }
            $this->session->set_flashdata('message',"Member added successfully");
            redirect($this->data['base_url'] . 'member');
            exit;
        }   
        $this->breadcrumb->add('Dashboard', base_url());
        $this->breadcrumb->add('View Member', base_url()."member");
        $this->breadcrumb->add('Add Member', '');
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        $this->data['tpl_name']= "member/new-member.tpl";
        $this->smarty->assign('data', $this->data);
        $this->smarty->assign('all_countries', $all_countries);
        $this->smarty->assign('all_states', $all_states);
        $this->smarty->assign('eStatuses', $eStatuses);
        $this->smarty->view('template.tpl'); 
    }
   
    function update(){
        $all_countries = get_array('country','iCountryId');
        $all_states = get_array('state','iCountryId');
        $eStatuses = field_enums('member','eStatus');
        $iMemberId = $this->uri->segment(3);
        $this->data['member'] = $this->member_model->get_member_details($iMemberId);
        
        if($this->input->post()){
            $member = $this->input->post('data');
            $iMemberId = $this->member_model->edit_member($member);
            if(isset($_FILES) && $_FILES['vPicture']['name'] != ""){
            	$member1 = true;
                $img_uploaded_partner = $this->do_upload_partner($member['iMemberId'],$member1);
                $member['vPicture'] = $img_uploaded_partner;
                $iMemberId = $this->member_model->edit_member($member);
            }
            $this->session->set_flashdata('message',"Member Updated Successfully");
            redirect($this->data['base_url'] . 'member');
            exit;
        }   
        $this->breadcrumb->add('Dashboard', base_url());
        $this->breadcrumb->add('View Member', base_url()."member");
        $this->breadcrumb->add('Edit Member', '');
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        $countries = $this->member_model->get_country();
        $this->data['all_country']=$countries;
        $state= $this->member_model->get_allstates();
        $this->data['all_state']=$state;
        $this->data['tpl_name']= "member/edit-member.tpl";
        $this->smarty->assign('data', $this->data);
        $this->smarty->assign('all_countries', $all_countries);
        $this->smarty->assign('all_states', $all_states);
        $this->smarty->assign('eStatuses', $eStatuses);
        $this->smarty->view('template.tpl');
    }

    function action_update(){
        $ids = $this->input->post('iId'); 
        switch($this->input->post('action')){
            case "Inactive":
            case "Active":
                    $iId = $this->member_model->get_update_all($ids,$this->input->post('action'));
                    $this->session->set_flashdata('message',"Total ".count($ids)." Record(s) updated successfully");
                    redirect($this->data['base_url'] . 'member');
                    exit;
                    break;
            case "Delete":
                    $iId = $this->member_model->delete_all($ids);
                    $this->session->set_flashdata('message',"Total ".count($ids)." Record(s) Deleted successfully");
                    redirect($this->data['base_url'] . 'member');
                    exit;
                    break;
        }
    }

    function do_upload_partner($iImageId,$member){        
        if(!is_dir('uploads/images/')){
            @mkdir('uploads/images/', 0777);
        }
        if(!is_dir('uploads/images/'.$iImageId)){
            @mkdir('uploads/images/'.$iImageId, 0777);
        }
    	if($member){
    		if(!is_dir('uploads/member/')){
	            @mkdir('uploads/member/', 0777);
	        }
    		if(!is_dir('uploads/member/'.$iImageId)){
	            @mkdir('uploads/member/'.$iImageId, 0777);
	        }	
    	}
        $config = array(
          'allowed_types' => "gif|GIF|JPG|jpg|JPEG|jpeg||PNG|png",
          'upload_path' => 'uploads/images/'.$iImageId,
          'file_name' => str_replace(' ','',$_FILES['vPicture']['name']),
          'max_size'=>5380334
        );
        if($member){
        	$config = array(
	          'allowed_types' => "gif|GIF|JPG|jpg|JPEG|jpeg||PNG|png",
	          'upload_path' => 'uploads/member/'.$iImageId,
	          'file_name' => str_replace(' ','',$_FILES['vPicture']['name']),
	          'max_size'=>5380334
	        );
        }
        $this->upload->initialize($config);
        $this->upload->do_upload('vPicture'); //do upload
        
        $image_data = $this->upload->data(); //get image data
        $config1 = array(
          'source_image' => $image_data['full_path'], //get original image
          'new_image' => 'uploads/images/'.$iImageId.'/204x50_'.$image_data['file_name'], //save as new image //need to create thumbs first
          'maintain_ratio' => false,
          'width' => 204,
          'height' => 50
        );
    	
        if($member){
        	$config1 = array(
	          'source_image' => $image_data['full_path'], //get original image
	          'new_image' => 'uploads/member/'.$iImageId.'/204x50_'.$image_data['file_name'], //save as new image //need to create thumbs first
	          'maintain_ratio' => false,
	          'width' => 204,
	          'height' => 50
	        );
        }
        $this->image_lib->initialize($config1);
        $test1 = $this->image_lib->resize();
                
        $image_data = $this->upload->data(); //get image data
        $config2 = array(
          'source_image' => $image_data['full_path'], //get original image
          'new_image' => 'uploads/images/'.$iImageId.'/52x52_'.$image_data['file_name'], //save as new image //need to create thumbs first
          'maintain_ratio' => false,
          'width' => 52,
          'height' => 52
        );
        if($member){
        	$config2 = array(
	          'source_image' => $image_data['full_path'], //get original image
	          'new_image' => 'uploads/member/'.$iImageId.'/52x52_'.$image_data['file_name'], //save as new image //need to create thumbs first
	          'maintain_ratio' => false,
	          'width' => 52,
	          'height' => 52
	        );
        }
        $this->image_lib->initialize($config2);
        $test2 = $this->image_lib->resize();
        $img_uploaded = $image_data['file_name'];
        return $img_uploaded;
    }

    function delete_image($iMemberId){
        $iMemberId = $this->input->get('id');        
        $member_pic_path = $this->config->item('member_pic_path');
        $data = $this->member_model->get_one_by_id($iMemberId)->result();
        $delete_path = $this->data['base_path'].'uploads/images/';
        $var =  unlink($delete_path.$iMemberId.'/'.$data[0]->vPicture);
                unlink($delete_path.$iMemberId.'/204x50_'.$data[0]->vPicture);
                unlink($delete_path.$iMemberId.'/52x52_'.$data[0]->vPicture);        
        $id = $this->member_model->delete_image($iMemberId);        
        if($id)
        {
            $this->session->set_flashdata('message',"Picture Deleted Successfully");
        }
        else
        {
            $var_msg = "Error-in delete";
        }
        redirect($this->data['base_url'].'member/update/'.$iMemberId);
        exit;
    }
    
    //get member listing
    function get_member_listing(){
        $all_member = $this->member_model->get_all_member();
        //echo '<pre>';print_r($all_member);exit;
        if(count($all_member) > 0){
            foreach ($all_member as $key => $value){
                $alldata[$key]['id'] = '<input type="checkbox" name="iId[]" id="iId" value="'.$value['iMemberId'].'">';
                $alldata[$key]['membername'] = $value['vName'];
                $alldata[$key]['memberemail'] = $value['vEmail'];
                $alldata[$key]['country'] = $value['iCountryId'];
                $alldata[$key]['state'] = $value['iStateId'];
                // $alldata[$key]['dob'] = date('d  F  Y',strtotime($value['dBirthDate']));
                $alldata[$key]['vIP'] = $value['vIP'];
                $alldata[$key]['dLoginDate'] = date('d  F  Y',strtotime($value['dLoginDate']));
                $alldata[$key]['dLogoutDate'] = date('d  F  Y',strtotime($value['dLogoutDate']));
                // $alldata[$key]['profilepicture'] = $value['vPicture'];
                $alldata[$key]['status'] = $value['eStatus'];
                $alldata[$key]['editlink'] = '<a href="'.$this->data['base_url'].'member/update/'.$value['iMemberId'].'">Edit</a>';
            }        
            $aData['aaData'] =  $alldata;
        }
        else{
            $aData['aaData'] = '';
        }   
        $json_lang = json_encode($aData);
        echo $json_lang;exit;
    }
    
    
    function member_followers(){
        $iMemberId = $this->input->get('iMemberId');
        $getmemberinformation = $this->member_model->get_follower_details($iMemberId);        
        if(count($getmemberinformation) > 0){
            foreach ($getmemberinformation as $key => $value){
                //$alldata[$key]['id'] = '<input type="checkbox" name="iId[]" id="iId" value="'.$value['iFollowerId'].'">';
                $alldata[$key]['vName'] = $value['vName'];
            }        
            $aData['aaData'] =  $alldata;
        }
        else{
            $aData['aaData'] = '';
        }
        $json_lang = json_encode($aData);
        echo $json_lang;exit;
    }

    function member_following(){
        $iMemberId = $this->input->get('iMemberId');
        $getmemberinformation = $this->member_model->get_following_details($iMemberId);
        //echo "<pre>"        ;print_r($getmemberinformation);exit;
        if(count($getmemberinformation) > 0){
            foreach ($getmemberinformation as $key => $value){
                //$alldata[$key]['id'] = '<input type="checkbox" name="iId[]" id="iId" value="'.$value['iMemberId'].'">';
                $alldata[$key]['vName'] = $value['vName'];
            }        
            $aData['aaData'] =  $alldata;
        }
        else{
            $aData['aaData'] = '';
        }
        $json_lang = json_encode($aData);
        echo $json_lang;exit;
    }

    function member_post(){
        $iMemberId = $this->input->get('iMemberId');
        $getmemberinformation = $this->member_model->get_mypost_details($iMemberId);
        if(count($getmemberinformation) > 0){
            foreach ($getmemberinformation as $key => $value){
                //$alldata[$key]['id'] = '<input type="checkbox" name="iId[]" id="iId" value="'.$value['iMemberId'].'">';
                $alldata[$key]['tPost'] = $value['tPost'];
                $alldata[$key]['tDescription'] = $value['tDescription'];
                $alldata[$key]['vName'] = $value['vName'];
                $alldata[$key]['eStatus'] = $value['eStatus'];
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

/* End of file member.php */
/* Location: ./application/controllers/member.php */