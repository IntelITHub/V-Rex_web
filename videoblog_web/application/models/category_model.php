<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class category_model extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
    }

    //count all category
    function count_category()
    {
         return $this->db->count_all("categories");
    }
    
	//get listing of category
    function get_all_category(){
        $this->db->select('iCategoryId,vCategory,eStatus');
        $this->db->from('categories');
        $this->db->order_by('iCategoryId desc');
        $query = $this->db->get();
        return $query->result_array();
    }
    //get listing of category
    function get_category($limit,$start)
    {
        $this->db->select('iCategoryId,vCategory,vIcon,eStatus');
        $this->db->from('categories');
        $this->db->order_by('iCategoryId desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    //add category
    function add_category($data)
    {
        $this->db->insert('categories', $data);
        return $this->db->insert_id();
    }

    //update category
    function edit_category($data)
    {
        $this->db->update("categories", $data, array('iCategoryId' => $data['iCategoryId']));
        return $this->db->affected_rows();   
    }

    //get category details
    function get_category_details($iCategoryId)
    { 
        $this->db->select('iCategoryId,vCategory,vIcon,eStatus');
        $this->db->from('categories');
		$this->db->where('iCategoryId',$iCategoryId);	
        $query = $this->db->get();
        return $query->row_array();
	}

    //delete multiple record
    function delete_all($ids)
    {
        $this->db->where_in('iCategoryId', $ids);
        $this->db->delete('categories'); 
    }
    
    //get listing of category
    function category_count($limit,$start)
    {
        $this->db->select('*');
        $this->db->from('categories');
        $query = $this->db->get();        
        return $query->num_rows();
    }

    //delete icon
    function delete_icon($iCategoryId)
    { 
        $data['vIcon'] = '';
        $this->db->where('iCategoryId', $iCategoryId);
        return $this->db->update('categories', $data);
    }
    
    //get all categories with image and path
    function getallcategories()
    {
        $this->db->select('iCategoryId,vCategory,vIcon,eStatus');
        $this->db->from('categories');
        $this->db->order_by('iCategoryId desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_all_categories()
    {
        $this->db->select('iCategoryId,vCategory,vIcon,eStatus');
        $this->db->from('categories');
        $this->db->order_by('iCategoryId desc');
        $query = $this->db->get();
        return $query->result_array();
    }


}
?>
