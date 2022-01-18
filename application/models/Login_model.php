<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends MY_Model
{
    public function get_by_username($username)
    {
        $this->db->select('u.id, u.roles_id, u.username, u.nama_lengkap, u.password, u.opd, u.is_active, r.is_superadmin');
        $this->db->from('users u');
        $this->db->join('roles r', 'r.id = u.roles_id');
        $this->db->where('u.username', $username);
        $this->db->where('u.is_active', 1);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return FALSE;
        }
    }

    public function check_login($data)
    {
        $result = $this->get_by_username($data['username']);
        if ($result) {
            $pass_verify = $this->encrypt_lib->passHashDyc($data['password'], $result->password);
            if ($pass_verify) {
                return $result;
            } else {
                return false;
            }
        }
        return false;
    }

}