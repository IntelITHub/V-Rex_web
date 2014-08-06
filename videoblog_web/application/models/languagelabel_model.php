<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Languagelabel_model extends CI_Model 
{

    function __construct()
    {
        parent::__construct();
    }

    //count all language label
    function count_languagelabel()
    {
         return $this->db->count_all("lang_label");
    }

    //get listing of language label
    function get_languagelabel($limit,$start)
    {
        $this->db->select('iLabelId,vName,vValue_en,vValue_fr,vValue_pt,eStatus');
        $this->db->from('lang_label');
        $this->db->order_by('iLabelId desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    //add language label
    function add_languagelabel($data)
    {
        $this->db->insert('lang_label', $data);
        return $this->db->insert_id();
    }

    //update language label
    function edit_languagelabel($data)
    {
    	$this->db->update("lang_label", $data, array('iLabelId' => $data['iLabelId']));
        return $this->db->affected_rows();   
    } 

 
    //get language label details
    function get_languagelabel_details($iLabelId)
    { 
        $this->db->select('iLabelId,vName,vValue_en,vValue_fr,vValue_pt,eStatus');
        $this->db->from('lang_label');
        $this->db->where('iLabelId ', $iLabelId);     
        $query = $this->db->get();
        return $query->row_array();
    }
    //update all
    function get_update_all($ids,$action)
    {
        $data = array('eStatus' =>$action);
        $this->db->where_in('iLabelId', $ids);
        $this->db->update('lang_label', $data); 
        return $this->db->affected_rows();   
    }
    //delete multiple record
    function delete_all($ids)
    {
        $this->db->where_in('iLabelId', $ids);
        $this->db->delete('lang_label'); 
    }
    function get_all_languagelabel()
    {
        $this->db->select('');
        $this->db->from('lang_label');
        $this->db->order_by('iLabelId desc');
        $query = $this->db->get();
        return $query->result_array();
    }
	
    // get language
    function get_language_code($iMemberId){
    	$this->db->select('m.iMemberId,m.iLangId,l.iLanguageId,l.vLangCode');
        $this->db->from('member AS m');
        $this->db->join('language AS l','m.iLangId=l.iLanguageId','LEFT');
        $this->db->where('m.iMemberId',$iMemberId);
        $query = $this->db->get();
        return $query->row_array();
    }
    
    // get laguage lable
    function get_language_lable($langKey){
    	$this->db->select('');
        $this->db->from('lang_label');
        $this->db->where('vName',$langKey);
        $query = $this->db->get();
        return $query->row_array();
    }
    
}
?>
