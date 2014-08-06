<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Post extends MY_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('post_model', '', TRUE);
        $this->load->model('post_categories_model', '', TRUE);
        $this->load->library('upload');     
    }    

    function index()
    {
        $this->data['tpl_name']= "post/view-post.tpl";
        
        $total_rows = $this->post_model->count_post();
        $this->data['pagination']['base_url'] = $this->data['base_url'].'post';
        $this->data['pagination']['total_rows'] = $total_rows;
        $this->pagination->initialize($this->data['pagination']); 
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $this->data['post']  =  $this->post_model->get_post($this->data['pagination']["per_page"],$page);
        //echo "<pre>";print_r($this->data['post']);exit;
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
        $this->breadcrumb->add('View Post', '');
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        //ends

        $this->smarty->assign('data', $this->data);
        $this->smarty->view('template.tpl'); 
    }
    
    # add post 
    function create()
    {
    	//get all dropdowns
    	$all_members = get_array('member','iMemberId');
    	$all_categories = get_array('categories','iCategoryId');
    	$eFileTypes = field_enums('post','eFileType');
    	$visiblities = field_enums('post','eVisiblity');
    	$eStatuses = field_enums('post','eStatus');

    	//if form is posted
        if($this->input->post())
        { 
            $post = $this->input->post('data');
            $post['dCreatedDate'] = date('Y-m-d H:i:s');
            $iCategoryId = $this->input->post('iCategoryId');
            $iPostId = $this->post_model->add_post($post);

            //add multiple categories
            $post_categories = array();
            for($j=0; $j<count($iCategoryId); $j++)
            {
                $post_categories['iCategoryId'] = $iCategoryId[$j];
                $post_categories['iPostId'] = $iPostId;
                $iPostcatId = $this->post_categories_model->edit_post_categories($post_categories);

            }       

            //add video or image
            if($_FILES['vFile']['name']!='')
                {
		            $post['vFile']=$_FILES['vFile']['name'];
                    $video_uploaded = $this->do_uploadvideo($iPostId);
                    $post['vFile'] = $video_uploaded;
                    $post['iPostId'] = $iPostId;
                    $iPostId = $this->post_model->edit_post($post);
                }

            $this->session->set_flashdata('message',"Post Added Successfully");
            redirect($this->data['base_url'] . 'post');
            exit;
        }   

        //breadcrumb 
        $this->breadcrumb->add('Dashboard', base_url());
        $this->breadcrumb->add('View Post', base_url()."post");
        $this->breadcrumb->add('Add Post', '');
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        //ends

        # get all countries
        $country = $this->post_model->get_country();
        $this->data['country']=$country;

        # get all states
        $state= $this->post_model->get_allstates();
        $this->data['all_state']=$state;

        //load template file
        $this->data['tpl_name']= "post/new-post.tpl";

        //smarty assign variables
        $this->smarty->assign('data', $this->data);
        $this->smarty->assign('all_members', $all_members);
        $this->smarty->assign('all_categories', $all_categories);
        $this->smarty->assign('eFileTypes', $eFileTypes);
        $this->smarty->assign('visiblities', $visiblities);
        $this->smarty->assign('eStatuses', $eStatuses);

        $this->smarty->view('template.tpl'); 
    }

    # update post
    function update()
    {
    	//get all dropdowns
    	$all_members = get_array('member','iMemberId');
    	$all_categories = get_array('categories','iCategoryId');
    	$eFileTypes = field_enums('post','eFileType');
    	$visiblities = field_enums('post','eVisiblity');
    	$eStatuses = field_enums('post','eStatus');
        $iPostId = $this->uri->segment(3);
        $this->data['post'] = $this->post_model->get_post_details($iPostId);
        $iCategoryId = $this->input->post('iCategoryId');

        $postcategories = $this->post_categories_model->get_postcategories_details($iPostId);
        
        
        $postcategories = array_values($postcategories);
        
        $pCat = array();
        for($j=0; $j<count($postcategories); $j++)
        {   
            $pCat[] = $postcategories[$j]['iCategoryId'];

        }
      
       
        $this->data['comment'] = $this->post_model->get_comment_details($iPostId);
        $this->data['like'] = $this->post_model->get_like_details($iPostId);

        if($this->input->post())
        {
            $post = $this->input->post('data');
            if(isset($_FILES) && $_FILES['vFile']['name']!= "")
            {
                $post['vFile']=$_FILES['vFile']['name'];
                $video_uploaded = $this->do_uploadvideo($post['iPostId']);
                $post['vFile'] = $video_uploaded;
            } 

            //insert post categories
            $this->post_categories_model->delete_post_categories($post['iPostId']);
            for($i=0; $i<count($iCategoryId); $i++)
            {
                $pdata['iPostId'] = $post['iPostId'];
                $pdata['iCategoryId'] = $iCategoryId[$i];
                $this->post_categories_model->edit_post_categories($pdata);
            }
            //ends here
            $iPostId = $this->post_model->edit_post($post);
            $this->session->set_flashdata('message',"Post Updated Successfully");
            redirect($this->data['base_url'] . 'post');
            exit;
        }   
   
        //breadcrumb 
        $this->breadcrumb->add('Dashboard', base_url());
        $this->breadcrumb->add('View Post', base_url()."post");
        $this->breadcrumb->add('Edit Post', '');
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        //ends

        # get all countries
        $countries = $this->post_model->get_country();
        $this->data['all_country']=$countries;

        # get all states 
        $state= $this->post_model->get_allstates();
        $this->data['all_state']=$state;
        
        //load template file
        $this->data['tpl_name']= "post/edit-post.tpl";

        //smarty assign variables  
        $this->smarty->assign('data', $this->data);
        $this->smarty->assign('all_members', $all_members);
        $this->smarty->assign('all_categories', $all_categories);
        $this->smarty->assign('eFileTypes', $eFileTypes);
        $this->smarty->assign('visiblities', $visiblities);
        $this->smarty->assign('eStatuses', $eStatuses);
        $this->smarty->assign('pCat', $pCat);
        $this->smarty->view('template.tpl'); 
    }

    #post private,public or delete
    function action_update()
    {  
   
        $ids = $this->input->post('iId');  
        switch($this->input->post('action'))
        {
            case "Private":
            case "Public":
                    
                    $iId = $this->post_model->get_update_all($ids,$this->input->post('action'));
                    $this->session->set_flashdata('message',"Total ".count($ids)." Record(s) updated successfully");
                    redirect($this->data['base_url'] . 'post');
                    exit;
                    break;
            case "Delete":
                    $upload_path = $this->config->item('base_path'); 
                    foreach ($ids as $row) {
                        $data= $this->post_model->get_post_details($row);
                        unlink($upload_path.'uploads/'.'post/'.$row.'/200x200_'.$data['vFile']);
                        unlink($upload_path.'uploads/'.'post/'.$row.'/'.$data['vFile']);
                        rmdir($upload_path.'uploads/'.'post/'.$row);
                    }
                    $iId = $this->post_model->delete_all($ids);
                    $this->session->set_flashdata('message',"Total ".count($ids)." Record(s) Deleted successfully");
                    redirect($this->data['base_url'] . 'post');
                    exit;
                    break;
        }
    }
    function action_update_comment()
    {  
        $ids = $this->input->post('iId');  
       // print_r($ids);exit;
        switch($this->input->post('action'))
        {
            case "Delete":
                    $upload_path = $this->config->item('base_path'); 
                    $iId = $this->post_model->delete_all_comment($ids);
                    $this->session->set_flashdata('message',"Total ".count($ids)." Record(s) Deleted successfully");
                    redirect($this->data['base_url'] . 'post');
                    exit;
                    break;
            case "Approve":
                    $upload_path = $this->config->item('base_path'); 
                    $iId = $this->post_model->approve_all_comment($ids);
                    $this->session->set_flashdata('message',"Total ".count($ids)." Record(s) Deleted successfully");
                    redirect($this->data['base_url'] . 'post');
                    exit;
                    break;                    
        }
    }
    function action_update_like()
    {  
        $ids = $this->input->post('iId');  
        switch($this->input->post('action'))
        {
            case "Delete":
                    $upload_path = $this->config->item('base_path'); 
                    $iId = $this->post_model->delete_all_like($ids);
                    $this->session->set_flashdata('message',"Total ".count($ids)." Record(s) Deleted successfully");
                    redirect($this->data['base_url'] . 'post');
                    exit;
                    break;
        }
    }
    #get states by country
    function get_all_states()
    {
        $iCountryId = $this->uri->segment(3);
        $states = $this->post_model->get_states($iCountryId);
        $options = '';
        if(count($states) > 0)
        {
            for($i=0;$i<count($states);$i++)
            {
                $options .= '<option value="'.$states[$i]['iStateId'].'">'.$states[$i]['vState'].'</option>';
            }    
        }
        else
        {
            $options .= '<option value="">-- Select State--</option>';
        }
        
        $json_lang = json_encode($options);   
        print $json_lang;
        exit;
     }

    # For uploaded video
    function do_uploadvideo($videoId)
    {

        if(!is_dir('uploads/post/')){
            @mkdir('uploads/post/', 0777);
        }
        if(!is_dir('uploads/post/'.$videoId)){
            @mkdir('uploads/post/'.$videoId, 0777);
        }
       
        $config = array(
          'allowed_types' => '3gp|MPG|mp4|avi|x-flv|wmv|mpg|3gpp|x-ms-wmv|mpeg|3gpp|MP4|flv|png|jpg|jpeg|gif',
          'upload_path' => 'uploads/post/'.$videoId,
          'file_name' => str_replace(' ','',$_FILES['vFile']['name']),
          'max_size'=>5380334
        );
        $this->upload->initialize($config);
        $this->upload->do_upload('vFile'); //do upload
        $video_data = $this->upload->data(); //get video data
        $video_uploaded = $video_data['file_name'];
        //echo $video_uploaded ;exit;
        return $video_uploaded;
    }
    
    # for delete video
     function deletevideo()
    {
        $upload_path = $this->config->item('base_path');  
        $iPostId = $_REQUEST['id'];
        $data = $this->post_model->get_post_details($iPostId);
        $var=unlink($upload_path.'uploads/'.'post/'.$iPostId.'/'.$data['vFile']);
        $var1 = $this->post_model->delete_video($iPostId);
        redirect($this->data['base_url'].'post/update/'.$iPostId);
    }
    
    // post listin using datatable
    function post_listing(){
    	$all_posts = $this->post_model->get_all_post();
    	
    	if(count($all_posts) > 0){
            foreach ($all_posts as $key => $value){
                $alldata[$key]['id'] = '<input type="checkbox" name="iId[]" id="iId" value="'.$value['iPostId'].'">';
               	
                if($all_posts[$key]['eFileType'] == 'Video'){
                	$value['vFile'] = $value['vVideothumbnail'];
                }else{
                	$value['vFile'] = '200x200_'.$value['vFile'];
                }
                
                $alldata[$key]['posttype'] = '<img src="'.$this->data['base_url'].'uploads/post/'.$value['iPostId'].'/'.$value['vFile'].'" height="100px" width="100px"/>';
               	
                $alldata[$key]['member'] = $value['vName'];
                $alldata[$key]['posttitle'] = $value['tPost'];
                $alldata[$key]['vIP'] = $value['vIP'];
                $alldata[$key]['postdate'] = date('d  F  Y  H:i:s A',strtotime($value['dCreatedDate']));
                $alldata[$key]['editlink'] = '<a href="'.$this->data['base_url'].'post/update/'.$value['iPostId'].'">Edit</a>';
            }        
            $aData['aaData'] =  $alldata;
        }
        else{
            $aData['aaData'] = '';
        }
        $json_lang = json_encode($aData);
        echo $json_lang;exit;
    }
    
    // post comment
    function comment_listing(){
    	$iPostId = $this->input->get('iPostId');
    	$getPostComment = $this->post_model->get_comment_details($iPostId);
    	if(count($getPostComment) > 0){
            foreach ($getPostComment as $key => $value){
                $alldata[$key]['id'] = '<input type="checkbox" name="iId[]" id="iId" value="'.$value['iCommentId'].'">';
                
                $alldata[$key]['vName'] = $value['vName'];
                $alldata[$key]['tDescription'] = $value['tDescription'];
                $alldata[$key]['eStatus'] = $value['eStatus'];
                $alldata[$key]['dCreatedDate'] = date('d  F  Y  H:i:s A',strtotime($value['dCreatedDate']));
                #$alldata[$key]['editlink'] = '<a href="'.$this->data['base_url'].'post/update/'.$value['iCommentId'].'">Edit</a>';
            }        
            $aData['aaData'] =  $alldata;
        }
        else{
            $aData['aaData'] = '';
        }
        
        $json_lang = json_encode($aData);
        echo $json_lang;exit;
    }
    
    // post likes
    function likes_listing(){
    	$iPostId = $this->input->get('iPostId');
    	$getPostLikes = $this->post_model->get_like_details($iPostId);
    	if(count($getPostLikes) > 0){
            foreach ($getPostLikes as $key => $value){
                $alldata[$key]['id'] = '<input type="checkbox" name="iId[]" id="iId" value="'.$value['iLikeId'].'">';
                
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
    
}
/* End of file post.php */
/* Location: ./application/controllers/post.php */
?>
