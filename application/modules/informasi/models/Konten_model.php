<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Konten_model extends MY_Model {
    
    function __construct() {
        parent::__construct();
    }
    function get_konten(){
    	$this->db->select('p.*, k.name');
    	$this->db->from('konten p');
        $this->db->join('kategori_konten k','p.kategori_id = k.id');
    	return $this->db->get()->result();
    }
    function get_kategori(){
    	$this->db->select('*');
    	$this->db->from('kategori_konten');
    	return $this->db->get()->result();
    }

}