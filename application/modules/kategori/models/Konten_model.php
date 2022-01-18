<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Konten_model extends MY_Model {
    
    function __construct() {
        parent::__construct();
    }

    function get_kategori_konten(){
    	$this->db->select('*');
    	$this->db->from('kategori_konten');
    	return $this->db->get()->result();
    }
}