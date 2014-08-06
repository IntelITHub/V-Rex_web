<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Staticpage_model extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    
    #count all static pages
    function count_staticpage(){
        return $this->db->count_all("static_pages");
    }

    #get listing of static pages
    function get_staticpage($limit,$start){
        $this->db->select('iSPageId,vpagename,eStatus,tContent_en');
        $this->db->from('static_pages');
        $this->db->order_by('iSPageId desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    #add static page
    function add_staticpage($data){
        $this->db->insert('static_pages', $data);
        return $this->db->insert_id();
    }

    #update static page
    function edit_staticpage($data){
        $this->db->update("static_pages", $data, array('iSPageId' => $data['iSPageId']));
        return $this->db->affected_rows();   
    } 

 
    #get static page details
    function get_staticpage_details($iSPageId){ 
        $this->db->select('iSPageId,vpagename,eStatus,tContent_en');
        $this->db->from('static_pages');
        $this->db->where('iSPageId', $iSPageId);     
        $query = $this->db->get();
        return $query->row_array();
    }

    #update all
    function get_update_all($ids,$action){
        $data = array('eStatus' =>$action);
        $this->db->where_in('iSPageId', $ids);
        $this->db->update('static_pages', $data); 
        return $this->db->affected_rows();   
    }

    #delete multiple record
    function delete_all($ids){
        $this->db->where_in('iSPageId', $ids);
        $this->db->delete('static_pages'); 
    }

    

    #get listing of static pages
    function get_staticpage_list(){
        $this->db->select('iSPageId,vpagename,tContent_en,vFile,eStatus');
        $this->db->from('static_pages');
        $this->db->order_by('iSPageId desc');
        $query = $this->db->get();
        return $query->result_array();
    }

}
?>
