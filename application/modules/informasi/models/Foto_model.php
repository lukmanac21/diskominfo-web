<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Foto_model extends MY_Model {
    
    function __construct() {
        parent::__construct();
    }
    function get_foto(){
    	$this->db->select('g.*, k.name');
    	$this->db->from('galeri g');
        $this->db->join('kategori_galeri k','g.kategori_id = k.id');
        $this->db->where('k.id',1);
    	return $this->db->get()->result();
    }

}