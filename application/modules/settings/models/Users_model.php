<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends MY_Model {
    
    function __construct() {
        parent::__construct();
       
    }

    function get_users(){
    	$this->db->select('u.*, r.is_superadmin');
    	$this->db->from('users u');
        $this->db->join('roles r', 'r.id = u.roles_id');
        if($this->session->userdata('is_superadmin') != 1){
            $this->db->where('r.is_superadmin != 1');
        }        
    	$this->db->where_not_in('u.id', $this->session->userdata('id'));
        
    	return $this->db->get()->result();
    }

    function get_roles(){
    	$this->db->select('*');
    	$this->db->from('roles');
        if($this->session->userdata('is_superadmin') != 1){
            $this->db->where_not_in('is_superadmin', 1);
        }
    	return $this->db->get()->result();
    }
    function user($id){
        $this->db->select('*');
    	$this->db->from('users');
        $this->db->where('id',$id);
    	return $this->db->get()->result();
    }

}