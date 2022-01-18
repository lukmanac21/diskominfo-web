<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Tentang_model extends MY_Model {
    
    function __construct() {
        parent::__construct();
    }
    function get_tentang(){
    	$this->db->select('*');
    	$this->db->from('about');
    	return $this->db->get()->result();
    }

}