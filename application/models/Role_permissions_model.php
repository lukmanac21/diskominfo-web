<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Role_permissions_model extends MY_Model {
    
    function __construct() {
        parent::__construct();
       
    }

    function get_permissions($role_id){
		$this->db->select('rp.*, mo.id as module_id, mo.name as module_name, mo.slug as module_slug');
	    $this->db->from('roles_permissions rp');
	    $this->db->join('module_operations mo', 'mo.id = rp.m_operation_id');
	    $this->db->where('rp.role_id', $role_id);
	    return $this->db->get()->result();
	}

	public function get($id = null) {
        return $this->db->select()->from('module_groups mg')->get()->result();
        // if ($id != null) {
        //     $this->db->where('mg.id', $id);
        // } else {
        //     $this->db->order_by('mg.id');
        // }
        // $query = $this->db->get();
        // if ($id != null) {
        //     return $query->row_array();
        // } else {
        //     return $query->result();
        // }
    }

}
