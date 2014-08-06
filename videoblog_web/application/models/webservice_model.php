<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);

class webservice_model extends CI_Model {
      function __construct()
      {
	    parent::__construct();
	    $this->load->library('upload');
      }
      function verify_login($vEmail,$vPassword)
      {
	    $this->db->select('iMemberId,vEmail,vPassword');
	    $this->db->from('member');
	    $this->db->where('vEmail',$vEmail);
	    $this->db->where('vPassword',$vPassword);
	    $query = $this->db->get();
	    return $query->row_array();
      }
      function check_user($vEmail){		  
	    $this->db->select('vName,vEmail,vPassword,vUsername');
	    $this->db->from('member');
	    $this->db->where('vEmail',$vEmail);		
	    $query = $this->db->get();
	    return $query->row_array();
      }
      function save_user($Data){
	    $this->db->insert('member',$Data);
	    return $this->db->insert_id();
      }
      function update_user($vEmail,$fileUrl,$vName,$vPassword,$vUsername,$Data){
	    $this->db->where('vEmail', $vEmail);
	    return $this->db->update('member',$Data);
      }
      function category_get($fileUrl){
	    $this->db->select('p.iMemberId,c.iCategoryId,c.vCategory,c.eStatus,c.vIcon,p.vVideo');
	    $this->db->from('categories c');
	    $this->db->join('post p','c.iCategoryId=p.iCategoryId','left');
	    //$this->db->where('p.iMemberId',$iMemberId);
	    //$this->db->where('vCategory',$vCategory);
	    $query = $this->db->get();
	    return $query->result_array();
      //echo "<pre>";print_r($query->result_array());exit;
      }
      function category_getid($iCategoryId){
	    $this->db->select('iCategoryId,vCategory,eStatus,vIcon');
	    $this->db->from('categories');
	    $this->db->where('iCategoryId',$iCategoryId);
	    $query = $this->db->get();
	    return $query->result_array();
      } 
}