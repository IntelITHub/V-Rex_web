<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class role_model extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
    }

    #count all role
    function count_role()
    {
         return $this->db->count_all("role");
    }

    #get listing of role
    function get_role($limit,$start)
    {
        $this->db->select('iRoleId,vTitle,eStatus');
        $this->db->from('role');
        $this->db->order_by('iRoleId asc');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    #add role
    function add_role($data)
    {
        $this->db->insert('role', $data);
        return $this->db->insert_id();
    }

    #update role
    function edit_role($data)
    {
        $this->db->update("role", $data, array('iRoleId' => $data['iRoleId']));
        return $this->db->affected_rows();   
    }

    #get role details
    function get_role_details($iRoleId)
    { 
        $this->db->select('iRoleId,vTitle,eStatus');
        $this->db->from('role');
		$this->db->where('iRoleId', $iRoleId);		
        $query = $this->db->get();
        return $query->row_array();
	}

    #update all
    function get_update_all($ids,$action)
    {
        $data = array('eStatus' =>$action);
        $this->db->where_in('iRoleId', $ids);
        $this->db->update('role', $data); 
        return $this->db->affected_rows();   
    }

    #delete multiple record
    function delete_all($ids)
    {
        $this->db->where_in('iRoleId', $ids);
        $this->db->delete('role'); 
    }

    #get all roles
    function get_all_roles()
    {
        $this->db->select('iRoleId,vTitle,eStatus');
        $this->db->from('role');
        $this->db->order_by('iRoleId asc');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    #get listing of role
    function get_role_list(){
        $this->db->select('iRoleId,vTitle,eStatus');
        $this->db->from('role');
        $this->db->order_by('iRoleId asc');
        $query = $this->db->get();
        return $query->result_array();
    }
    
}
?>