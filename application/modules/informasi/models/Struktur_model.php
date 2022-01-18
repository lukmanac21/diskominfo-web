<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Struktur_model extends MY_Model {
    
    function __construct() {
        parent::__construct();
    }
    function get_struktur(){
    	$this->db->select('*');
    	$this->db->from('struktur');
    	return $this->db->get()->result();
    }

}