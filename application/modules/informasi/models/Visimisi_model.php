<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Visimisi_model extends MY_Model {
    
    function __construct() {
        parent::__construct();
    }
    function get_visimisi(){
    	$this->db->select('*');
    	$this->db->from('visimisi');
    	return $this->db->get()->result();
    }

}