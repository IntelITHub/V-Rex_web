<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Configuration_model extends CI_Model {
    function __construct(){
        parent::__construct();
    }

    function loadcofig(){
	    $this->db->order_by('iSettingId','desc');
	    return $this->db->get('configurations');
    }
    
    function update($data, $key){
	    $this->db->where('vName', $key);
	    $query = $this->db->update('configurations', $data);
	    return $query; 
    }
    
    // get Configuration by unique vName 
    function get_configuration($vName){ 
        $this->db->select('*');
        $this->db->from('configurations');
        $this->db->where('vName', $vName);      
        $query = $this->db->get();
        return $query->row_array();
    }
}
?>