<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Tupoksi_model extends MY_Model {
    
    function __construct() {
        parent::__construct();
    }
    function get_tupoksi(){
    	$this->db->select('*');
    	$this->db->from('tupoksi');
    	return $this->db->get()->result();
    }

}