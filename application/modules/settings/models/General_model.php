<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class General_model extends MY_Model {
    
    function __construct() {
        parent::__construct();
       
    }

    function get_settings(){
    	$this->db->select('*');
    	$this->db->from('settings');
    	return $this->db->get()->row();
    }

}