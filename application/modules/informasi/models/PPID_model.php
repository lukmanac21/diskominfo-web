<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class PPID_model extends MY_Model {
    
    function __construct() {
        parent::__construct();
    }
    function get_ppid(){
    	$this->db->select('*');
    	$this->db->from('ppid');
    	return $this->db->get()->result();
    }

}