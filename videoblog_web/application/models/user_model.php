<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user_model extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
    }

    #check authentication
    function check_auth($vEmail,$vPassword)
    {
        $this->db->select('u.iUserId,u.vFirstName,u.vLastName,u.vEmail,u.iRoleId,u.eStatus');
        $this->db->from('user as u');
        $this->db->where('u.eStatus', 'Active');
        $this->db->where('u.vEmail', $vEmail);
        $this->db->where('u.vPassword', $vPassword);
        $query = $this->db->get();
        return $query->row_array();
    }

    #count all users
    function count_user()
    {
        $this->db->select('u.iUserId,u.vFirstName,u.vLastName,u.vEmail,u.vPhone,u.eStatus,u.iRoleId,r.vTitle');
        $this->db->from('user as u');
        $this->db->join('role as r','u.iRoleId =r.iRoleId');
        $this->db->order_by('iUserId desc');
        return $this->db->count_all_results();
    }

    #get listing of users
    function get_user($limit,$start)
    {
        $this->db->select('u.iUserId,u.vFirstName,u.vLastName,u.vEmail,u.vPhone,u.eStatus,u.iRoleId,r.vTitle');
        $this->db->from('user as u');
        $this->db->join('role as r','u.iRoleId =r.iRoleId');
        $this->db->order_by('iUserId desc');
        if(!empty($limit)){
        	$this->db->limit($limit, $start);
        }
        $query = $this->db->get();
        return $query->result_array();
    }
    
    #add user
    function add_user($data)
    {
        $query=$this->db->insert('user', $data);
        return $this->db->insert_id();
    }
    
    #update user
    function edit_user($data)
    {
        $this->db->update("user", $data, array('iUserId' => $data['iUserId']));
        return $this->db->affected_rows();   
    }

    #get user details
    function get_user_details($iUserId)
    { 
        $this->db->select('u.iUserId,u.vFirstName,u.vLastName,u.vEmail,u.vAddress,u.vPhone,u.vCity,u.vZipCode,u.iCountryId,u.iStateId,u.iRoleId,r.vTitle,u.vStateCode,u.vCountryCode,u.eStatus,c.iCountryId,c.vCountry,c.vCountryCode,s.iStateId,s.vState,s.vStateCode');
        $this->db->from('user as u');
        $this->db->join('role as r','u.iRoleId =r.iRoleId');
        $this->db->join('country AS c','u.iCountryId=c.iCountryId','LEFT');
        $this->db->join('state AS s','u.iStateId=s.iStateId','LEFT');
        $this->db->where('iUserId', $iUserId);      
        $query = $this->db->get();
        return $query->row_array();
    }

    #update user
    function get_update_all($ids,$action)
    {
        $data = array('eStatus' =>$action);
        $this->db->where_in('iUserId', $ids);
        $this->db->update('user', $data); 
        return $this->db->affected_rows();   
    }
    #delete multiple record
    function delete_all($ids)
    {
        $this->db->where_in('iUserId', $ids);
        $this->db->delete('user'); 
    }

    #get countries
    function get_country()
    {
        $this->db->select('iCountryId,vCountry');
        $this->db->from('country');
        $query = $this->db->get();
        return $query->result_array();
    }

    #get country code
    function get_country_code($iCountryId)
    {
        $this->db->select('iCountryId,vCountry,vCountryCode');
        $this->db->from('country');
        $this->db->where('iCountryId', $iCountryId);      
        $query = $this->db->get();
        return $query->result_array();
    }

    #get states
    function get_states($iCountryId)
    {
        $this->db->select('iStateId,iCountryId,vState,vStateCode');
        $this->db->from('state');
        $this->db->where('iCountryId',$iCountryId);
        $query = $this->db->get();
        return $query->result_array();
    }

    #get state code
    function get_states_code($iStateId)
    {
        $this->db->select('iStateId,iCountryId,vState,vStateCode');
        $this->db->from('state');
        $this->db->where('iStateId',$iStateId);
        $query = $this->db->get();
        return $query->result_array();
    }

    #get states by status
    function get_allstates()
    {
        $this->db->select('iStateId,vState,vStateCode');
        $this->db->from('state');
        $this->db->where('eStatus', 'Active');      
        $query = $this->db->get();
        return $query->result_array();
    }
    
     // Find member by email ID
    public function find_member_by_email($email){
    	$this->db->select('*');
        $this->db->from('user');
        $this->db->where('vEmail',$email);      
        $query = $this->db->get();
        return $query->row_array();
    }
    // Update new password depends on forgot password
    public function update_new_password($iMemberId,$genaratNewPassword){
        $newsPassword['vPassword'] = md5($genaratNewPassword);
    	$this->db->where('iUserId', $iMemberId);
        $this->db->update('user', $newsPassword); 
        return $this->db->affected_rows();   
    }
    
    function get_all_user()
    {
        $this->db->select('');
        $this->db->from('role r');
        $this->db->join('user u','r.iRoleId=u.iRoleId');
        $this->db->order_by('iUserId desc');
        $query = $this->db->get();
        return $query->result_array();
    }
}
?>