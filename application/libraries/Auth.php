<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Auth
{

    public $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
        $this->CI->load->database();
        //$this->CI->load->library('encrypt'); //for php 7.2+ support
    }

   

    public function logged_in()
    {
        return (bool) $this->CI->session->userdata('id');
    }

    public function is_logged_in($default_redirect = false)
    {
        $userdata = $this->CI->session->userdata('id');
        if (empty($userdata)) {
            redirect('/');
        } 
    }

    public function isSuperAdministrator(){
        if($this->CI->session->userdata('is_superadmin') == 1){
            return true;
        }else{
            return false;
        }
    }

    public function isAdministrator(){
        if($this->CI->session->userdata('is_superadmin') != 0){
            return true;
        }else{
            return false;
        }
    }


    public function reset_password($email)
    {
        $admin = $this->get_admin_by_email($email);
        if ($admin) {
            $this->CI->load->helper('string');
            $this->CI->load->library('email');

            $new_password      = random_string('alnum', 8);
            $admin['password'] = sha1($new_password);
            $this->save_admin($admin);

            $this->CI->email->from($this->CI->config->item('email'), $this->CI->config->item('site_name'));
            $this->CI->email->to($email);
            $this->CI->email->subject($this->CI->config->item('site_name') . ': Admin Password Reset');
            $this->CI->email->message('Your password has been reset to ' . $new_password . '.');
            $this->CI->email->send();
            return true;
        } else {
            return false;
        }
    }

    /*
    This function gets the admin by their email address and returns the values in an array
    it is not intended to be called outside this class
     */

    private function get_admin_by_email($email)
    {
        $this->CI->db->select('*');
        $this->CI->db->where('email', $email);
        $this->CI->db->limit(1);
        $result = $this->CI->db->get('admin');
        $result = $result->row_array();

        if (sizeof($result) > 0) {
            return $result;
        } else {
            return false;
        }
    }

    /*
    This function takes admin array and inserts/updates it to the database
     */

    public function save($admin)
    {
        if ($admin['id']) {
            $this->CI->db->where('id', $admin['id']);
            $this->CI->db->update('admin', $admin);
        } else {
            $this->CI->db->insert('admin', $admin);
        }
    }


}
