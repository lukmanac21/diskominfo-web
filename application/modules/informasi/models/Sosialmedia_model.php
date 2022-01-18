<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Sosialmedia_model extends MY_Model {
    
    function __construct() {
        parent::__construct();
    }
    function get_sosialmedia(){
    	$this->db->select('*');
    	$this->db->from('sosialmedia');
    	return $this->db->get()->result();
    }

}