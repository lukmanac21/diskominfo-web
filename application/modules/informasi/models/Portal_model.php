<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Portal_model extends MY_Model {
    
    function __construct() {
        parent::__construct();
    }
    function get_portal(){
    	$this->db->select('p.*, k.name');
    	$this->db->from('portal p');
        $this->db->join('kategori_portal k','p.kategori_id = k.id');
    	return $this->db->get()->result();
    }
    function get_kategori(){
    	$this->db->select('*');
    	$this->db->from('kategori_portal');
    	return $this->db->get()->result();
    }

}