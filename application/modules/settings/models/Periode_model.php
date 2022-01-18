<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Periode_model extends MY_Model{
	
	function __construct(){
		parent::__construct();
	}

	public function get_periode(){
		$this->db->select('*');
		$this->db->from('periode');
		$this->db->order_by('periode', 'asc');
		return $this->db->get()->result();
	}
}