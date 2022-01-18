<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Api_model extends MY_Model {

    public function __construct() {
        parent::__construct();
        // $this->db2 = $this->load->database('simpeg', TRUE);
    }

    function get_settings(){
        $this->db->select('*');
        $this->db->from('settings');
        return $this->db->get()->result();    
    }    

}