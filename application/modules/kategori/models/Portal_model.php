<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Portal_model extends MY_Model {
    
    function __construct() {
        parent::__construct();
    }

    function get_kategori_portal(){
    	$this->db->select('*');
    	$this->db->from('kategori_portal');
    	return $this->db->get()->result();
    }
}