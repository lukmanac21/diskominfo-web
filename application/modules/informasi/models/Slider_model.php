<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Slider_model extends MY_Model {
    
    function __construct() {
        parent::__construct();
       
    }

    function get_slider(){
    	$this->db->select('*');
    	$this->db->from('slider');
    	return $this->db->get()->result();
    }

}