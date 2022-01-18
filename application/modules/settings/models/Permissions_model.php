<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Permissions_model extends MY_Model {
    
    function __construct() {
        parent::__construct();
       
    }

    function get_module(){
    	$this->db->select('*');
    	$this->db->from('module_groups');
    	return $this->db->get()->result();
    }

}