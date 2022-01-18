<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class OPD_model extends MY_Model {
    
    function __construct() {
        parent::__construct();
    }
    function get_opd(){
    	$this->db->select('p.*, k.name');
    	$this->db->from('portal p');
        $this->db->join('kategori_portal k','p.kategori_id = k.id');
        $this->db->where('k.id',1);
    	return $this->db->get()->result();
    }

}