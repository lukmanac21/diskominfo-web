<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Rbac {

    private $userRoles = array();
    protected $permissions;
    var $permissions_category;

    function __construct() {

        $this->CI = & get_instance();
        $this->permissions = array();
        $this->permissions_category = array('can_view', 'can_add', 'can_edit', 'can_delete');
        $this->CI->load->model('Role_permissions_model', 'rpm', TRUE);
        self::loadPermission();
    }

    function loadPermission() {
        $session = $this->CI->session->userdata('roles_id');
        $this->userRoles = $this->getPermission($session); 
    }

    function getPermission($role_id) {
        $role_perm = $this->CI->rpm->get_permissions($role_id);
        foreach ($role_perm as $result1 => $role_value) {
            foreach ($this->permissions_category as $result2 => $permissions_value) {
                if ($role_value->$permissions_value == 1) {
                    $this->permissions[$role_value->module_slug . "-" . $permissions_value] = true;
                }
            }
        }
        return $role_perm;
    }

    function hasPrivilege($category = null, $permission = null) {
        $perm = trim($category) . "-" . trim($permission);
        $roles = $this->CI->session->userdata('roles_id');
        if ($this->CI->session->userdata('is_superadmin') == 1) {
            return true;
        }
        foreach ($this->userRoles as $role) {
            if ($this->hasPermission($perm)) {
                return true;
            }else{
                return false;
            } 
        }               
    }

    function hasPermission($permission) {
        return isset($this->permissions[$permission]);
    }

}
