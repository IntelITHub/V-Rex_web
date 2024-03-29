<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('field_enums'))
{
    function field_enums($table = '', $field = '')
    {
        $enums = array();
        if ($table == '' || $field == '') return $enums;
        $CI =& get_instance();
        preg_match_all("/'(.*?)'/", $CI->db->query("SHOW COLUMNS FROM {$table} LIKE '{$field}'")->row()->Type, $matches);
        foreach ($matches[1] as $key => $value) {
            $enums[$key] = $value; 
        }
        return $enums;
    }  
}


if ( ! function_exists('get_dropdown'))
{
    function get_array($table = '', $field = '')
    {
        //echo $table . $field;exit;
        $CI =& get_instance();
        $CI->db->select('*');
        $CI->db->from($table);
        $query = $CI->db->get();
        $data = $query->result_array();
        return  $data;
    }  
}  
	
?>