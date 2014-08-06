<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Language_model extends CI_Model 
{

    function __construct()
    {
        parent::__construct();
    }

    #count all language
    function count_language()
    {
         return $this->db->count_all("language");
    }

    #get listing of language
    function get_language($limit,$start)
    {
        $this->db->select('iLanguageId,vLanguage,vLangCode,eStatus');
        $this->db->from('language');
        $this->db->order_by('iLanguageId desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    #add language
    function add_language($data)
    {
        $this->db->insert('language', $data);
        return $this->db->insert_id();
    }

    #update language
    function edit_language($data)
    {
        $this->db->update("language", $data, array('iLanguageId' => $data['iLanguageId']));
        return $this->db->affected_rows();   
    } 

 
    #get language details
    function get_language_details($iLanguageId)
    { 
        $this->db->select('iLanguageId,vLanguage,vLangCode,eStatus');
        $this->db->from('language');
        $this->db->where('iLanguageId', $iLanguageId);     
        $query = $this->db->get();
        return $query->row_array();
    }
    #update all
    function get_update_all($ids,$action)
    {
        $data = array('eStatus' =>$action);
        $this->db->where_in('iLanguageId', $ids);
        $this->db->update('language', $data); 
        return $this->db->affected_rows();   
    }
    #delete multiple record
    function delete_all($ids)
    {
        $this->db->where_in('iLanguageId', $ids);
        $this->db->delete('language'); 
    }
	
    function get_all_language()
    {
        $this->db->select('');
        $this->db->from('language');
        $this->db->order_by('iLanguageId desc');
        $query = $this->db->get();
        return $query->result_array();
    }
}
?>
