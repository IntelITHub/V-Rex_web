<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Common_model extends CI_Model{
    
    function __construct(){
        parent::__construct();
    }

// USE FOR DELETE MEMBER 
    function deleteexpiremember(){
        $this->db->where('eStatus','Inactive');
        $this->db->where('vActivationCode !=','');
        $this->db->where('dRegisterDate <',date('Y-m-d H:i:s', strtotime('-24 hours')));
        return $this->db->delete('member'); 
        /*$sql= "delete FROM `member` WHERE (`dRegisterDate` < DATE_SUB(now(), INTERVAL 1 DAY) AND eStatus='Inactive' AND vActivationCode != '')";
        return $this->db->query($sql);      */
    }

// USE FOR DELETE IMAGE
    function list_sysemaildata($EmailCode){  
        $this->db->select('');  
        $this->db->from('emailtemplate');
        $this->db->where('vEmailCode',$EmailCode);
        return $this->db->get();
    }   

// update the status of record (single or multiple)
    function get_update_all($ids,$action,$tableData){
        $data = array('eStatus'=>$action);
        $this->db->where_in($tableData['update_field'], $ids);
        $this->db->update($tableData['tablename'], $data); 
        return $this->db->affected_rows();   
    }

// USE FOR GET ALL CATEGORIE'S IMAGE
    function get_category_details($fieldId,$tableData){ 
        $this->db->select($tableData['image_field']);
        $this->db->from($tableData['tablename']);
        $this->db->where($tableData['update_field'],$fieldId);   
        $query = $this->db->get();
        return $query->row_array();
    }

// USE FOR DELETE RECORDS
    function delete_record($ids,$tableData){
        $this->db->where_in($tableData['update_field'], $ids);
        $this->db->delete($tableData['tablename']); 
    }

// USE FOR DELETE IMAGE
    function delete_image($tableData){ 
        $data[$tableData['image_field']] = '';
        $this->db->where($tableData['update_field'], $tableData['field_id']);
        return $this->db->update($tableData['tablename'], $data);        
    }

// Get All Categories list
    function getallcategories(){ 
        $this->db->select('iCategoryId,iParentCategoryId,vTitle,vCategoryImage,eType');
        $this->db->from('categories');
        $this->db->where('iParentCategoryId',0);       
        $this->db->where('eStatus','Active');   
        return $this->db->get()->result_array();
    }

    // Get All Categories list
    function getallsubcategories($iParentCategoryId){ 
        $this->db->select('iCategoryId,iParentCategoryId,vTitle,vCategoryImage,eType');
        $this->db->from('categories');
        $this->db->where('iParentCategoryId',$iParentCategoryId);       
        $this->db->where('eStatus','Active');   
        return $this->db->get()->result_array();
    }
}
?>