<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Module_model extends MY_Model {
    
    function __construct() {
        parent::__construct();
       
    }

    function get_settings(){
    	$this->db->select('*');
    	$this->db->from('module_groups');
    	return $this->db->get()->result();
    }
    function get_modules($id){
        $this->db->select('*');
    	$this->db->from('module_groups');
        $this->db->where('id',$id);
    	return $this->db->get()->result();
    }

}