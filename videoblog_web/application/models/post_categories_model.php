<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class post_categories_model extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
    }


   

    function get_postcategories_details($iPostId)
    {
    	$this->db->select('iCategoryId');
        $this->db->from('post_categories');	
        $this->db->where('iPostId',$iPostId); 
        $query = $this->db->get();
        return $query->result_array();
    }

    //update post categories
    function edit_post_categories($data)
    {
        $this->db->insert('post_categories', $data);
        return $this->db->insert_id();
    }

    //delete post category where matches iPostId record
    function delete_post_categories($ids)
    {
        $this->db->where_in('iPostId', $ids);
        $this->db->delete('post_categories'); 
    }
    
    // Add post categories
    function add_post_category($data){
    	$this->db->insert('post_categories', $data);
        return $this->db->insert_id();
    }
    
}
?>