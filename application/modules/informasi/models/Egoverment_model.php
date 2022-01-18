<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Egoverment_model extends MY_Model {
    
    function __construct() {
        parent::__construct();
    }
    function get_egoverment(){
    	$this->db->select('*');
    	$this->db->from('egoverment');
    	return $this->db->get()->result();
    }

}