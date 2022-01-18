<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Roles_model extends MY_Model {
    
    function __construct() {
        parent::__construct();
       
    }   

    function get_roles(){
    	$this->db->select('*');
    	$this->db->from('roles');
    	return $this->db->get()->result();
    }
}