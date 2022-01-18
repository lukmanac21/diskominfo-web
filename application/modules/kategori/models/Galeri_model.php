<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Galeri_model extends MY_Model {
    
    function __construct() {
        parent::__construct();
    }

    function get_kategori_galeri(){
    	$this->db->select('*');
    	$this->db->from('kategori_galeri');
    	return $this->db->get()->result();
    }
}