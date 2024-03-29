<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Emailtemplate_model extends CI_Model {
    function __construct(){
        parent::__construct();
    }

    function get_emailtemplate($limit,$start){
        $this->db->select('e.iEmailTemplateId,e.vEmailCode,e.vEmailTitle,e.vFromName,e.vFromEmail,e.eEmailFormat,e.vEmailSubject,e.tEmailMessage,e.vEmailFooter,e.eStatus,e.eSendType');
        $this->db->from('emailtemplate as e');
        $this->db->order_by('e.iEmailTemplateId desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function add_emailtemplate($data){
        $query=$this->db->insert('emailtemplate', $data);
        return $this->db->insert_id();
    }
    
    function edit_emailtemplate($data){
        $this->db->update("emailtemplate", $data, array('iEmailTemplateId' => $data['iEmailTemplateId']));
        return $this->db->affected_rows();   
    }

    function get_emailtemplate_details($iEmailTemplateId){ 
        $this->db->select('e.iEmailTemplateId,e.vEmailCode,e.vEmailTitle,e.vFromName,e.vFromEmail,e.eEmailFormat,e.vEmailSubject,e.tEmailMessage,e.vEmailFooter,e.eStatus,e.eSendType');
        $this->db->from('emailtemplate as e');
        $this->db->where('iEmailTemplateId', $iEmailTemplateId);      
        $query = $this->db->get();
        return $query->row_array();
    }

    function get_update_all($ids,$action){
        $data = array('eStatus' =>$action);
        $this->db->where_in('iEmailTemplateId', $ids);
        $this->db->update('emailtemplate', $data); 
        return $this->db->affected_rows();   
    }

    function count_email(){
        return $this->db->count_all("emailtemplate");
    }
    
    // get email templates by email code
    function get_email_template($vEmailCode){ 
        $this->db->select('*');
        $this->db->from('emailtemplate');
        $this->db->where('vEmailCode', $vEmailCode);      
        $query = $this->db->get();
        return $query->row_array();
    }
    
    function get_emailtemplate_list(){
        $this->db->select('e.iEmailTemplateId,e.vEmailCode,e.vEmailTitle,e.vFromName,e.vFromEmail,e.eEmailFormat,e.vEmailSubject,e.tEmailMessage,e.vEmailFooter,e.eStatus,e.eSendType');
        $this->db->from('emailtemplate as e');
        $this->db->order_by('e.iEmailTemplateId desc');
        $query = $this->db->get();
        return $query->result_array();
    }
    
}
?>