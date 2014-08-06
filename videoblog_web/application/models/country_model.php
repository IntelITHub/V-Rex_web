<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Country_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    //get countries 
    function get_all_country(){
        $this->db->select('');
        $this->db->from('country');
        $this->db->order_by('vCountry');
        //$this->db->order_by('iCountryId desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    //add countries 
    function add_country($data){
        $this->db->insert('country', $data);
        return $this->db->insert_id();
    }

    //get countries details
    function get_country_details($iCountryId){ 
        $this->db->select('');
        $this->db->from('country');
        $this->db->where('iCountryId', $iCountryId);        
        $query = $this->db->get();
        return $query->row_array();
    }

    //edit countries 
    function edit_country($data){
        $this->db->update("country", $data, array('iCountryId' => $data['iCountryId']));
        return $this->db->affected_rows();   
    }

    #update all
    function get_update_all($ids,$action){
        $data = array('eStatus' =>$action);
        $this->db->where_in('iCountryId', $ids);
        $this->db->update('country', $data); 
        return $this->db->affected_rows();   
    }

    #get listing of countries
    function get_country($limit,$start){
        $this->db->select('');
        $this->db->from('country');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result_array();
    }

    #count all countries
    function count_country(){
        return $this->db->count_all("country");
    }

}
?>