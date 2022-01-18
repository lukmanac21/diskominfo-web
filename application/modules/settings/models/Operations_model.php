<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Operations_model extends MY_Model {
    
    function __construct() {
        parent::__construct();
       
    }

    function get_operations(){
    	$this->db->select('mo.id, mo.name, mo.slug, mo.can_view, mo.can_add, mo.can_edit, mo.can_delete, mg.name as module_name, mg.id as module_id');
    	$this->db->from('module_operations mo');
    	$this->db->join('module_groups mg', 'mg.id = mo.m_group_id');
    	$this->db->order_by('mg.id');
    	$this->db->order_by('mo.id');
    	return $this->db->get()->result();
    }

    function get_module(){
    	$this->db->select('*');
    	$this->db->from('module_groups');
    	return $this->db->get()->result();
    }
	function get_op_edit($id){
    	$this->db->select('mo.id, mo.name, mo.slug, mo.can_view, mo.can_add, mo.can_edit, mo.can_delete, mg.name as module_name, mg.id as module_id');
    	$this->db->from('module_operations mo');
    	$this->db->join('module_groups mg', 'mg.id = mo.m_group_id');
    	$this->db->where('mo.id',$id);
    	return $this->db->get()->result();
	}

}