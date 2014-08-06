<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Apk_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    //get Apk 
    function get_all_apk(){
        $this->db->select('');
        $this->db->from('apk_download');
        $this->db->order_by('iApkId desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    //add Apk 
    function add_apk($data){
        $this->db->insert('apk_download', $data);
        return $this->db->insert_id();
    }

    //edit Apk 
    function edit_apk($data){
         $this->db->update("apk_download", $data, array('iApkId' => $data['iApkId']));
        return $this->db->affected_rows();
    }

    //get Apk details
    function get_apk_details($iApkId){
        $this->db->select('');
        $this->db->from('apk_download');
        $this->db->where('iApkId',$iApkId);   
        $query = $this->db->get();
        return $query->row_array();
    }

    //delete multiple record
    function delete_all($ids){
        $this->db->where_in('iApkId', $ids);
        $this->db->delete('apk_download'); 
    }

    //delete icon
    function delete_icon($iApkId){ 
        $data['vFile'] = '';
        $this->db->where('iApkId', $iApkId);
        return $this->db->update('apk_download', $data);
    }
}
?>