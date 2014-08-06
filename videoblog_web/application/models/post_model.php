<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post_model extends CI_Model 
{

    function __construct()
    {
        parent::__construct();
    }

    //count all post
    function count_post()
    {
        $this->db->select('p.iPostId,p.iMemberId,p.tPost,p.tDescription,p.iCountryId,p.iStateId,p.vFile,p.vCity,
            p.eFileType,p.vFile,p.tLikes,p.tComments,p.dCreatedDate,p.eVisiblity,m.vName,p.eStatus');
        $this->db->from('post As p');
        $this->db->join('member AS m','p.iMemberId=m.iMemberId','LEFT');
        /*$this->db->join('country AS c','p.iCountryId=c.iCountryId','LEFT');
        $this->db->join('state AS s','p.iStateId=s.iStateId','LEFT');*/
        $this->db->order_by('iPostId desc');
        return $this->db->count_all_results();
    }

    //get listing of post
    function get_post($limit,$start)
    {
        $this->db->select('p.iPostId,p.iMemberId,p.tPost,p.tDescription,p.iCountryId,p.iStateId,p.vCity,p.vVideothumbnail,
            p.eFileType,p.vFile,p.tLikes,p.tComments,p.dCreatedDate,p.eVisiblity,m.vName,p.eStatus');
        $this->db->from('post As p');
        $this->db->join('member AS m','p.iMemberId=m.iMemberId','LEFT');
        /*$this->db->join('country AS c','p.iCountryId=c.iCountryId','LEFT');
        $this->db->join('state AS s','p.iStateId=s.iStateId','LEFT');*/
        $this->db->order_by('iPostId desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result_array();
    }

    //add Post
    function add_post($data)
    {
        $this->db->insert('post', $data);
        return $this->db->insert_id();
    }

    //update Post
    function edit_post($data)
    {
        $this->db->update("post", $data, array('iPostId' => $data['iPostId']));
        return $this->db->affected_rows();   
    }

    //get Post details
    function get_post_details($iPostId)
    { 
        $this->db->select('p.iPostId,p.iMemberId,p.tPost,p.tDescription,p.iCountryId,p.iStateId,p.vCity,p.vVideothumbnail,
            p.eFileType,p.vFile,p.tLikes,p.tComments,p.dCreatedDate,p.eVisiblity,m.vName,p.eStatus');
        $this->db->from('post As p');
        $this->db->join('member AS m','p.iMemberId=m.iMemberId','LEFT');
        /*$this->db->join('country AS c','p.iCountryId=c.iCountryId','LEFT');
        $this->db->join('state AS s','p.iStateId=s.iStateId','LEFT');*/
        $this->db->where('iPostId',$iPostId); 
        $query = $this->db->get();
        return $query->row_array();
    }

    //update all
    function get_update_all($ids,$action)
    {
        $data = array('eVisiblity' =>$action);
        $this->db->where_in('iPostId', $ids);
        $this->db->update('post', $data); 
        return $this->db->affected_rows();   
    }

    //delete multiple record
    function delete_all($ids)
    {
        $this->db->where_in('iPostId', $ids);
        $this->db->delete('post'); 
    }
    ////delete multiple record comment
    function delete_all_comment($ids)
    {
        $this->db->where_in('iCommentId', $ids);
        $this->db->delete('post_comments'); 
    }

    ////delete multiple record Likes
    function delete_all_like($ids)
    {
        $this->db->where_in('iLikeId', $ids);
        $this->db->delete('post_likes'); 
    }

    //All Approve
    function approve_all_comment($ids){
         $data = array('eStatus' =>'Approve');
         $this->db->where_in('iCommentId', $ids);
         $this->db->update('post_comments', $data); 
        return $this->db->affected_rows(); 
    }

    //get countries
    function get_country()
    {
        $this->db->select('iCountryId,vCountry');
        $this->db->from('country');
        $query = $this->db->get();
        return $query->result_array();
    }

    //get states
    function get_states($iCountryId)
    {
        $this->db->select('iStateId,iCountryId,vState');
        $this->db->from('state');
        $this->db->where('iCountryId',$iCountryId);
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

    //delete video
    function delete_video($iPostId)
    { 
        $data['vFile'] = '';
        $this->db->where('iPostId', $iPostId);
        return $this->db->update('post', $data);
    }

    //get listing of comment
    function get_comment_details($iPostId)
    {
        $this->db->select('pc.iCommentId,pc.iMemberId,pc.iPostId,pc.tDescription,pc.dCreatedDate,pc.vIP,pc.eStatus,m.vName,p.tPost');
        $this->db->from('post_comments AS pc');
        $this->db->join('member AS m','pc.iMemberId=m.iMemberId','LEFT');
        $this->db->join('post AS p','pc.iPostId=p.iPostId','LEFT');
        $this->db->where('pc.iPostId',$iPostId);      
        $query = $this->db->get();
        return $query->result_array();
    }

    //get listing of like
    function get_like_details($iPostId)
    {
        $this->db->select('pl.iLikeId,pl.iPostId,pl.iMemberId,p.tPost,p.tDescription,m.vName');
        $this->db->from('post_likes AS pl');
        $this->db->join('member AS m','pl.iMemberId=m.iMemberId','LEFT');
        $this->db->join('post AS p','pl.iPostId=p.iPostId','LEFT');
        $this->db->where('pl.iPostId',$iPostId);      
        $query = $this->db->get();
        return $query->result_array();
    }
    
   //count all comments
    function count_all_comments(){
        $this->db->where('eStatus','Approve');
        $this->db->from('post_comments');
        $query = $this->db->get();
        return $query->num_rows();
    }

    //get all post
    function get_all_posts($iCategoryId,$limit,$start,$conditions)
    {
        $this->db->select('iPostId');
        $this->db->from('post_categories');
        $this->db->where('iCategoryId',$iCategoryId);
        $this->db->distinct();
        $query = $this->db->get();
        $all_post =  $query->result_array();
        $postids = array();
        for($i=0; $i< count($all_post); $i++)
        {
           $postids[] = $all_post[$i]['iPostId'];
        }
		
        if(!empty($postids)){
	        $this->db->select('p.iPostId,p.iMemberId,p.tPost,p.tDescription,p.eFileType,p.vFile,p.tLikes,p.vVideothumbnail,
	                p.tComments,p.dCreatedDate,p.eVisiblity,p.eStatus',FALSE);
	        $this->db->from('post as p');
	        $this->db->where_in('p.iPostId',$postids);
	        
	        if(!empty($conditions)){
	        	$this->db->where('p.vLattitude',$conditions['vLattitude']);
	        	$this->db->where('p.vLongitude',$conditions['vLongitude']);
	        }
			
	        if(!empty($limit)){
	    		$this->db->limit($limit, $start);
	    		$this->db->order_by('iPostId desc');
	    	}
	    	
	        $query = $this->db->get();
	        $postdetails =  $query->result_array();
        	return $postdetails;
        }else{
        	return array();
        }
    }

    function get_all_postdetails($iPostId)
    {
        $this->db->select('p.iPostId,p.iMemberId,p.tPost,p.tDescription,p.eFiletype,p.vVideothumbnail,
            c.vCountry,s.vState,p.vCity,p.vFile,p.tLikes,p.tComments,m.vName');
        $this->db->from('post As p');
        $this->db->join('member AS m','p.iMemberId=m.iMemberId','LEFT');
        $this->db->join('country AS c','p.iCountryId=c.iCountryId','LEFT');
        $this->db->join('state AS s','p.iStateId=s.iStateId','LEFT');
        $this->db->where('p.iPostId',$iPostId); 
        $query = $this->db->get();
        return $query->row_array();
    }
    
    // Count all post by profiler
    public function count_post_by_profiler_id($profilerId){
    	$this->db->where('eStatus','Approve');
    	$this->db->where('iMemberId',$profilerId);
        $this->db->from('post');
        $query = $this->db->get();
        return $query->num_rows();
    }
    
    // add post comments
    public function add_post_comments($data){
    	$this->db->insert('post_comments', $data);
        return $this->db->insert_id();
    }
    
    // Count Post Likes depends on Post ID
    public function count_total_post_likes($iPostId){
    	$this->db->where('iPostId',$iPostId);
        $this->db->from('post_likes');
        $query = $this->db->get();
        return $query->num_rows();
    }
    
    // Count Post Comments depends on Post ID
    public function count_total_post_comments($iPostId){
    	$this->db->where('eStatus','Approve');
    	$this->db->where('iPostId',$iPostId);
        $this->db->from('post_comments');
        $query = $this->db->get();
        return $query->num_rows();
    }
    
    // Add post LIKE
    public function add_post_like($data){
    	$this->db->insert('post_likes', $data);
        return $this->db->insert_id();
    }
    
    // Get post like status
    public function post_like_status($iPostId,$iSessMemberId){
    	$this->db->where('iPostId',$iPostId);
    	$this->db->where('iMemberId',$iSessMemberId);
        $this->db->from('post_likes');
        $query = $this->db->get();
        return $query->num_rows();
    }
    
    // Unlike Post
    public function unlike_post($iPostId,$iSessMemberId,$onPostDelete = ''){
    	
    	if($onPostDelete != 'ALL'){
    		$this->db->where('iMemberId',$iSessMemberId);
    	}
    	
    	$this->db->where('iPostId',$iPostId);
        $this->db->delete('post_likes');
        return $this->db->affected_rows();
    }
    
     // Get latest post for homepage
    public function get_latest_post($limit, $start,$conditions){
    	$this->db->select('p.iPostId,p.iMemberId,p.tPost,p.tDescription,p.iCountryId,p.iStateId,p.vFile,p.vCity,p.vVideothumbnail,p.vLattitude,p.vLongitude,
            p.eFileType,p.vFile,p.tLikes,p.tComments,p.dCreatedDate,p.eVisiblity,m.vUsername,m.vPicture,m.vName,p.eStatus');
        $this->db->from('post AS p');
        $this->db->where('p.eStatus','Approve');
        if(!empty($conditions)){
        	/*$this->db->where('p.vLattitude',$conditions['vLattitude']);
        	$this->db->where('p.vLongitude',$conditions['vLongitude']);*/
        	$this->db->where('p.vLattitude <=', $conditions['latN']);
            $this->db->where('p.vLattitude >=', $conditions['latS']);
            $this->db->where('p.vLongitude <=', $conditions['lonE']);
            $this->db->where('p.vLongitude >=', $conditions['lonW']);
        }
        $this->db->join('member AS m','p.iMemberId=m.iMemberId','LEFT');
        /*$this->db->join('country AS c','p.iCountryId=c.iCountryId','LEFT');
        $this->db->join('state AS s','p.iStateId=s.iStateId','LEFT');*/
        $this->db->order_by('iPostId desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    // update post file name
    public function update_post_file($data){
    	return $this->db->update("post", $data, array('iPostId' => $data['iPostId']));
    }
    
     // Add newsfeed (POST,COMMENTS and LIKE)
    public function add_newsfeed($data){
    	$this->db->insert('newsfeed', $data);
        return $this->db->insert_id();
    }
    
    // get newsfeed of followers
    public function get_followers_newsfeed($data,$limit,$start,$onlyPostShowInFeed,$eNewsFeedType){
    	$selectField = 'iMemberId';
    	if(!empty($limit)){
    		$this->db->limit($limit, $start);
    	}
    	
    	// IF only post display in newsFeed (service used => get public profile, get profile details)
    	if(!empty($onlyPostShowInFeed)){
    		$this->db->select('n.*,cat.vCategory,p.vCity');
	        $this->db->from('newsfeed as n');
	        $this->db->where('n.eFeedType', $onlyPostShowInFeed);  
	        $this->db->where_in('n.iMemberId', $data);
	        $this->db->join('post AS p','p.iPostId=n.iPostId','LEFT');
	        $this->db->join('post_categories AS pc','pc.iPostId=n.iPostId','LEFT');
		    $this->db->join('categories AS cat','cat.iCategoryId=pc.iCategoryId','LEFT');
	        $this->db->order_by('n.iNewsFeedId desc');
	        $query = $this->db->get();
	        return $query->result_array();
    	}
        
    	// When notification called data return for ME (who like my post, who comment on my post)
    	if($eNewsFeedType == 'ME'){
    		$this->db->select('iPostId,iMemberId');
		    $this->db->from('post');
		    $this->db->where_in('iMemberId', $data);
		    $query = $this->db->get();
		    $postData = $query->result_array();
		    
		    $iPostIds = array();
    		foreach($postData as $key => $value){
	    		$iPostIds[] = $value['iPostId'];
	    	}
		    
		    if(!empty($iPostIds)){
			   	$this->db->select('n.iNewsFeedId,n.iPostId,n.iCommentId,n.iLikeId,n.iMemberId,n.vUsername,n.tPost,n.tDescription,
			    	n.tComments,n.dCreatedDate,n.eFileType,n.vFile,n.vVideothumbnail,n.eFeedType,
			    	p.iPostId,p.iMemberId as postMemberId
			    	,m.vUsername as postUsername');
	    		 $this->db->from('newsfeed as n');
		    	$this->db->join('post AS p','p.iPostId=n.iPostId','LEFT');
		    	$this->db->join('post_categories AS pc','pc.iPostId=p.iPostId','LEFT');
		    	$this->db->join('categories AS cat','cat.iCategoryId=pc.iCategoryId','LEFT');
		    	$this->db->join('member AS m','p.iMemberId=m.iMemberId','LEFT');
		    	$this->db->where_in('n.iPostId', $iPostIds);
		        $this->db->order_by('iNewsFeedId desc');
		        $query = $this->db->get();
		        return $query->result_array();
		    }else{
		    	return array();
		    }
    	}else{
    		$this->db->select('n.iNewsFeedId,n.iPostId,n.iCommentId,n.iLikeId,n.iMemberId,n.vUsername,n.tPost,n.tDescription,
		    	n.tComments,n.dCreatedDate,n.eFileType,n.vFile,n.vVideothumbnail,n.eFeedType,cat.vCategory,,
		    	p.iPostId,p.iMemberId as postMemberId
		    	,m.vUsername as postUsername');
    		$this->db->from('newsfeed as n');
	    	$this->db->join('post AS p','p.iPostId=n.iPostId','LEFT');
	    	$this->db->join('member AS m','p.iMemberId=m.iMemberId','LEFT');
	    	$this->db->join('post_categories AS pc','pc.iPostId=p.iPostId','LEFT');
		    $this->db->join('categories AS cat','cat.iCategoryId=pc.iCategoryId','LEFT');
	    	$this->db->where_in('n.iMemberId', $data);
	        $this->db->order_by('iNewsFeedId desc');
	        $query = $this->db->get();
	        return $query->result_array();
    	}
    }
    
    // Count Newsfeed
    public function count_followers_newsfeed($data){
    	$this->db->where_in('iMemberId', $data);
        $this->db->from('newsfeed');
        $query = $this->db->get();
        return $query->num_rows();
    }
    
    // Delete Newsfeed depends on post unlike
    public function delete_newsfeed($id,$iSessMemberId,$fieldName,$allPost = ''){
    	
    	if(!empty($fieldName)){
    		$this->db->where($fieldName,$id);
    	}
    	// Trigger on post delete
    	if($allPost != 'ALL' ){
    		$this->db->where('iMemberId',$iSessMemberId);
    	}
    	
        $this->db->delete('newsfeed');
        return $this->db->affected_rows();
    }
    
    // delete comment of current logedin member
    public function delete_comment($iCommentId,$iSessMemberId,$iPostId = '',$deleteMyPostComment = ''){
    	// Trigger on post delete
    	if(!empty($iPostId)){
    		$this->db->where('iPostId',$iPostId);
    	}else{
	    	$this->db->where('iCommentId',$iCommentId);
	    	$this->db->where('iMemberId',$iSessMemberId);
    	}
    	if(!empty($iPostId) && $deleteMyPostComment){
    		$this->db->where('iPostId',$iPostId);
    		$this->db->where('iCommentId',$iCommentId);
    	}
        $this->db->delete('post_comments');
        return $this->db->affected_rows();
    }
    
    // Delete post
    public function delete_post_by_postid($iPostId, $iSessMemberId){
    	$this->db->where('iPostId',$iPostId);
    	//$this->db->where('iMemberId',$iSessMemberId);
        $this->db->delete('post');
        return $this->db->affected_rows();
    }
    
    //get listing of post
    function get_all_post(){
        $this->db->select('p.iPostId,p.iMemberId,p.tPost,p.tDescription,p.iCountryId,p.iStateId,p.vCity,p.vIP,
            p.eFileType,p.vFile,p.tLikes,p.tComments,p.dCreatedDate,p.eVisiblity,m.vName,p.eStatus,p.vVideothumbnail,
            c.vCountry,s.vState');
        $this->db->from('post As p');
        $this->db->join('member AS m','p.iMemberId=m.iMemberId','LEFT');
        $this->db->join('country AS c','p.iCountryId=c.iCountryId','LEFT');
        $this->db->join('state AS s','p.iStateId=s.iStateId','LEFT');
        $this->db->order_by('iPostId desc');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    // post retriction: restrict same post with same user on same day.
    function is_post_exist($iMemberId,$dCreatedDate,$tPostTitle){
    	$this->db->select('');
        $this->db->from('post');
        $this->db->where('iMemberId',$iMemberId);
        $this->db->like('dCreatedDate', $dCreatedDate, 'after'); 
        $this->db->where('tPost',$tPostTitle);
        $query = $this->db->get();
        return $query->result_array();
    }
}
?>