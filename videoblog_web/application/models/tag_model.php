<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class tag_model extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
    }

    #count all tag
    function count_tag()
    {
         return $this->db->count_all("tag");
    }

    #get listing of tag
    function get_tag($limit,$start)
    {
        $this->db->select('iTagId,vTag');
        $this->db->from('tag');
        $this->db->order_by('iTagId desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    #add tag
    function add_tag($data)
    {
        $this->db->insert('tag', $data);
        return $this->db->insert_id();
    }

    #update tag
    function edit_tag($data)
    {
        $this->db->update("tag", $data, array('iTagId' => $data['iTagId']));
        return $this->db->affected_rows();   
    }

    #get tag details
    function get_tag_details($iTagId)
    { 
        $this->db->select('iTagId,vTag');
        $this->db->from('tag');
		$this->db->where('iTagId',$iTagId);		
        $query = $this->db->get();
        return $query->row_array();
	}

    #delete multiple record
    function delete_all($ids)
    {
        $this->db->where_in('iTagId', $ids);
        $this->db->delete('tag'); 
    }
}
?>
