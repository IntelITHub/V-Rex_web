<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class State_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    #get listing of states
    function get_all_state(){
        $this->db->select('s.iStateId,s.iCountryId,s.vState,s.eStatus,c.vCountry');
        $this->db->from('state as s');
        $this->db->join('country as c','s.iCountryId =c.iCountryId');
        $this->db->order_by('vState');
        //$this->db->order_by('iStateId desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    //add countries 
    function add_state($data){
        $this->db->insert('state', $data);
        return $this->db->insert_id();
    }

    //get countries details
    function get_state_details($iStateId){ 
        $this->db->select('');
        $this->db->from('state');
        $this->db->where('iStateId', $iStateId);        
        $query = $this->db->get();
        return $query->row_array();
    }

    //edit countries 
    function edit_state($data){
        $this->db->update("state", $data, array('iStateId' => $data['iStateId']));
        return $this->db->affected_rows();   
    }

    function get_country(){
        $this->db->select('iCountryId,vCountry');
        $this->db->from('country');
        $query = $this->db->get();
        return $query->result_array();
    }

    #count all states
    function count_state(){
         return $this->db->count_all("state");
    }

    #get listing of states
    function get_state($limit,$start){
        $this->db->select('');
        $this->db->from('state');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result_array();
    }

    #update all state
    function get_update_all($ids,$action){
        $data = array('eStatus' =>$action);
        $this->db->where_in('iStateId', $ids);
        $this->db->update('state', $data); 
        return $this->db->affected_rows();   
    }
}
?>