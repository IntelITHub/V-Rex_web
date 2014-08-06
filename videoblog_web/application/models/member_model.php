<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class member_model extends CI_Model 
{

    function __construct()
    {
        parent::__construct();
    }

    #make login entry
    function loginentry($logindata)
    {
        $this->db->where('iMemberId', $logindata['iMemberId']);
        $this->db->update('member', $logindata);
        return $this->db->affected_rows();
    }

    #make logout entry
    function logoutentry($data)
    {
        $this->db->where('iMemberId', $data['iMemberId']);
        $this->db->update('member', $data);
        return $this->db->affected_rows();   
    }
    #count all member
    function count_member()
    {
         return $this->db->count_all("member");
    }

    #get listing of member
    function get_member($limit,$start)
    {
        $this->db->select('m.iMemberId,m.vName,m.vEmail,m.dBirthDate,m.vPicture,m.vCoverImage,m.eStatus,m.iCountryId,m.iStateId');
        $this->db->from('member AS m');
        /*$this->db->join('country AS c','m.iCountryId=c.iCountryId','LEFT');
        $this->db->join('state AS s','m.iStateId=s.iStateId','LEFT');*/
        $this->db->order_by('iMemberId desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        //echo "<pre>";print_r($query->result_array());exit;
        return $query->result_array();
    }
    
    #add member
    function add_member($data)
    {
    	unset($data['eLoginType']);
        $this->db->insert('member', $data);
        return $this->db->insert_id();
    }

    #update member
    function edit_member($data)
    {
        $res = $this->db->update("member", $data, array('iMemberId' => $data['iMemberId']));
        //echo $this->db->last_query();exit;
        return true;
        if($res){
        	$this->db->select('iMemberId,vName,vEmail,vUsername,vPhone,vURL,tDescription,vPicture,vCoverImage');
	        $this->db->from('member');
			$this->db->where('iMemberId',$data['iMemberId']);		
	        $query = $this->db->get();
	        return $query->row_array();
        }else{
        	return false;
        }
    }

    #get member details
    function get_member_details($iMemberId)
    { 
        $this->db->select('iMemberId,vName,vEmail,vUsername,vPhone,vURL,tDescription,dBirthDate,vPicture,vCoverImage,eStatus,iCountryId,iStateId,vCity,eCameraMode,iLangId');
        $this->db->from('member');
		$this->db->where('iMemberId',$iMemberId);		
        $query = $this->db->get();
        return $query->row_array();
	}

    #update all
    function get_update_all($ids,$action)
    {
        $data = array('eStatus' =>$action);
        $this->db->where_in('iMemberId', $ids);
        $this->db->update('member', $data); 
        return $this->db->affected_rows();   
    }

    #delete multiple record
    function delete_all($ids)
    {
        $this->db->where_in('iMemberId', $ids);
        $this->db->delete('member'); 
    }

    function get_one_by_id($id)
    { 
        $this->db->where('iMemberId', $id);     
        return $this->db->get('member');
    }

    function delete_image($iMemberId,$data)
    {
        $data = 'vCoverImage';
        $this->db->where('iMemberId', $iMemberId);
        return $this->db->update('member', $data);
    }

    function get_follower_details($iMemberId)
    {
        $this->db->select('f.iFollowerId,f.iMemberId,m.vName');
        $this->db->from('followers AS f');
        $this->db->join('member AS m','f.iMemberId=m.iMemberId','LEFT');
        $this->db->where('f.iMemberId',$iMemberId);      
        $query = $this->db->get();
        /*echo "<pre>";
        print_r($query->result_array());exit;*/
        return $query->result_array();
    }

    function get_follower_name($i,$iFollowerId)
    {

        /*$this->db->select('f.iFollowerId,f.iMemberId,m.vName');
        $this->db->from('followers AS f');
        $this->db->join('member AS m','f.iMemberId=m.iMemberId','LEFT');
        $this->db->where('f.iFollowerId',$iFollowerId);      
        $query = $this->db->get();
        return $query->result_array();*/

        //Create A Query which will be used as a Sub-Query
            $this->db->select('f.iFollowerId');
            $this->db->where("f.iFollowerId",$iFollowerId);
            $query = $this->db->get("followers as f");
             

            //save the sub query in variable
            //echo "<pre>";print_r($query->result_array());exit;
            //return $query->result_array();
            $sub_query = $query->result_array();
            
            //echo "<pre>";print_r($sub_query);exit;
            //echo "Value of subquery: " . $sub_query[0]['iFollowerId'];exit;
            //$sub_query = $this->db->last_query();

            //After creating the sub-query now create the main query
                $this->db->select("m.vName");
                //put sub query in where clause
                $this->db->where("m.iMemberId",$sub_query[0]['iFollowerId']);
                //notice the NULL, FALSE parameters. Important.
                $order = $this->db->get("member as m")->result_array();

                return $order;
    }

    function get_following_details($iMemberId)
    {
        $this->db->select('m.vName');
        $this->db->from('followers AS f');
        $this->db->join('member AS m','f.iMemberId=m.iMemberId');
        $this->db->where('f.iFollowerId',$iMemberId);      
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_mypost_details($iMemberId)
    {
        $this->db->select('p.iPostId,p.iMemberId,p.tPost,p.tDescription,m.vName,p.eStatus');
        $this->db->from('post AS p');
        $this->db->join('member AS m','p.iMemberId=m.iMemberId','LEFT');
        $this->db->where('p.iMemberId',$iMemberId);
        $query = $this->db->get();
        return $query->result_array();
    }

    //get states by status
    function get_allstates()
    {
        $this->db->select('iStateId,vState');
        $this->db->from('state');      
        $query = $this->db->get();
        return $query->result_array();
    }

    //get countries
    function get_country()
    {
        $this->db->select('iCountryId,vCountry');
        $this->db->from('country');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    /**
     * Get current member registraion
     */
    function get_current_member_registration(){
    	$limit = 10;
    	$start = 0;
    	$order = 'DESC';
    	
    	$this->db->select('m.iMemberId,m.vName,m.vEmail,m.dBirthDate,m.vPicture,m.vIP,m.dLoginDate,m.vCoverImage,m.eStatus,m.iCountryId,m.iStateId');
        $this->db->from('member AS m');
        /*$this->db->join('country AS c','m.iCountryId=c.iCountryId','LEFT');
        $this->db->join('state AS s','m.iStateId=s.iStateId','LEFT');*/
        $this->db->order_by('iMemberId desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        //echo "<pre>";print_r($query->result_array());exit;
        return $query->result_array();
    }

    function edit_member_details($iMemberId)
    {
        $this->db->select('iMemberId,vPicture,vCoverImage,vName,vUsername,vURL,tDescription,vEmail,vPhone,eCameraMode,iLangId');
        $this->db->from('member');
        $this->db->where('iMemberId',$iMemberId);
        $query = $this->db->get();
        return $query->row_array();
    }

     // Login authentication
    function check_authentication($vEmail,$vPassword, $data, $loginWithWhichField)
    {
    	
    	if($loginWithWhichField == 'EMAIL'){
    		$this->db->where('vEmail',$vEmail);
    	}
    	if($loginWithWhichField == 'USERNAME'){
    		$this->db->where('vUsername',$vEmail);
    	}
    	if($data['eLoginType'] != 'REGISTER' && $data['eLoginType'] == 'FACEBOOK'){
    		$this->db->where('vFacebookId',$data['vFacebookId']);
        	//$this->db->where('eLoginType' ,$data['eLoginType']);
    	}
    	if($data['eLoginType'] != 'REGISTER' && $data['eLoginType'] == 'TWITTER'){
    		$this->db->where('vTwitterId',$data['vTwitterId']);
        	//$this->db->where('eLoginType' ,$data['eLoginType']);
    	}
    	if($data['eLoginType'] == 'REGISTER'){
    		$this->db->where('vPassword',$vPassword);
    	}
        $this->db->select('iMemberId,vEmail,vPassword,eCameraMode,iLangId');
        $this->db->from('member');
        
        $query = $this->db->get();
        return $query->row_array();
    }
    
    // Get Followers Id
    public function get_followers_id($iFollowersId,$ifMyFeed){
    	
    	if($ifMyFeed == 'ME'){
    		$this->db->select('iFollowerId');
    		$fieldName = 'iFollowerId';
    	}else{
    		$this->db->select('iMemberId');
    		$fieldName = 'iMemberId';
    	}
        $this->db->from('followers');
        $this->db->where('iFollowerId',$iFollowersId);      
        $query = $this->db->get();
        $data['result'] = $query->result_array();
        $data['fieldName'] = $fieldName;
        return $data;
    }
    
    // Get followers
    public function get_followers($iFollowersId){
    	$this->db->select('iMemberId');
        $this->db->from('followers');
        $this->db->where('iFollowerId',$iFollowersId);      
        $query = $this->db->get();
        return $query->num_rows();
    }
	
    // Get following
    public function get_following($iMemberId){
    	$this->db->select('iFollowerId');
        $this->db->from('followers');
        $this->db->where('iMemberId',$iMemberId);      
        $query = $this->db->get();
        return $query->num_rows();
    }
    
    // Check profiler already following to current login member OR NOT
    public function get_profiler_following($iMemberId){
    	$sql = "select iFollowerId from followers WHERE iMemberId='".$iMemberId."'";
	    $query = $this->db->query($sql);
	    return $query->result_array();
	    
    	$this->db->select('iFollowerId');
        $this->db->from('followers');
        $this->db->where('iMemberId',$iMemberId);      
        $query = $this->db->get();
        return $query->row_array();
    }
	
    // add Follow
    function add_follow($data)
    {
        return $this->db->insert('followers', $data);
    }
    
    // add post comments
    /*public function add_post_comments($data){
    	$this->db->insert('post_comments', $data);
        return $this->db->insert_id();
    }*/
    
    // Update member picture with new name
    function update_profile_picture($data){
    	return $this->db->update("member", $data, array('iMemberId' => $data['iMemberId']));
    }
    
    // Validation for username OR email already exist or NOT
    public function check_username_or_email($data,$fieldName){
    	$this->db->select('*');
        $this->db->from('member');
        $this->db->where($fieldName,$data);      
        $query = $this->db->get();
        return $query->num_rows();
    }
    
    // Find member by email ID
    public function find_member_by_email($email){
    	$this->db->select('*');
        $this->db->from('member');
        $this->db->where('vEmail',$email);      
        $query = $this->db->get();
        return $query->row_array();
    }
    
    // Update new password depends on forgot password
    public function update_new_password($iMemberId,$genaratNewPassword){
    	$newsPassword['vPassword'] = md5($genaratNewPassword);
    	$this->db->where('iMemberId', $iMemberId);
        $this->db->update('member', $newsPassword); 
        return $this->db->affected_rows();   
    }
    
    // Set unfollow
    public function set_unfollow($iSessMemberId,$iProfilerId){
    	$this->db->where('iFollowerId',$iSessMemberId);
    	$this->db->where('iMemberId',$iProfilerId);
        $this->db->delete('followers');
        return $this->db->affected_rows();
    }
    
    public function change_password($iUserId,$genaratNewPassword){
        $newsPassword['vPassword'] = md5($genaratNewPassword);
        $this->db->where('iUserId', $iUserId);
        $this->db->update('user', $newsPassword); 
        return $this->db->affected_rows();   
    }
    
    //get listing of all member
    function get_all_member()
    {
        $this->db->select('m.iMemberId,m.vName,m.vEmail,m.dBirthDate,m.vIP,m.dLoginDate,m.dLogoutDate,m.vCoverImage,m.eStatus,m.iCountryId,m.iStateId');
        $this->db->from('member AS m');
        /*$this->db->join('country AS c','m.iCountryId=c.iCountryId','LEFT');
        $this->db->join('state AS s','m.iStateId=s.iStateId','LEFT');*/
        $this->db->order_by('iMemberId desc');
        $query = $this->db->get();
        return $query->result_array();
    }
    
     //get member details depens on social media
    function get_member_details_social_media_id($socialId,$fieldName)
    {
    	$this->db->select('iMemberId,vEmail,vPassword,eCameraMode,iLangId');
        $this->db->from('member');
        $this->db->where($fieldName,$socialId);
        $query = $this->db->get();
        return $query->row_array();
	}
	
	//get all information of member
    function get_all_info_of_member($iMemberId)
    { 
        $this->db->select('*');
        $this->db->from('member');
		$this->db->where('iMemberId',$iMemberId);		
        $query = $this->db->get();
        return $query->row_array();
	}
	
	// Update security token
	public function update_socialmedia_token($data){
		if($data['eLoginType'] == 'TWITTER'){
			$this->db->where('vTwitterId', $data['vTwitterId']);
		}else{
			$this->db->where('vFacebookId', $data['vFacebookId']);
		}
        unset($data['eLoginType']);
        $this->db->update('member', $data); 
        return $this->db->affected_rows();   
	}
	
	// get member device Id and token
	public function get_member_device_info($iMemberIds){
		$sql = "select iMemberId,vDeviceid,tDeviceToken from member WHERE iMemberId IN(".$iMemberIds.")";
		$query = $this->db->query($sql);
	    return $query->result_array();
		/*$this->db->select('*');
        $this->db->from('member');
        $this->db->where_in('iMemberId', $iMemberIds);
        $query = $this->db->get();
        return $query->result_array();   */
	}
	
	// Add social media information to logedin member
	function add_socialmedia_info($data){
		$this->db->where('iMemberId', $data['iMemberId']);
        $this->db->update('member', $data);
        return $this->db->affected_rows();
	}
	
	//device update
    function update_device($iMemberId,$deviceInfo){
    	$this->db->where('iMemberId', $iMemberId);
        $this->db->update('member',$deviceInfo);
        return $this->db->affected_rows();
    }
    
    // update language
    function update_member_language($data){
    	$this->db->where('iMemberId', $data['iMemberId']);
        return $this->db->update('member',$data);
    }

    // update member data
    function update_member_cameramode($data){
        $this->db->where('iMemberId', $data['iMemberId']);
        return $this->db->update('member',$data);
    }
    
    // set member settings
    function update_member_setting($data){
    	$this->db->where('iMemberId', $data['iMemberId']);
        return $this->db->update('member',$data);
    }
}
?>
