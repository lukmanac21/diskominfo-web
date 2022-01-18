<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model', 'lm', true);
    }
    public function index()
	{
		if ($this->auth->logged_in()) {
            redirect('dashboard');
        }else{
        	$this->load->view('login');
        }
	}
    public function check_login()
    {
        if ($this->auth->logged_in()) {
            $this->auth->is_logged_in();
        } else {
            $data_login = array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password')
            );
            $get_user = $this->lm->check_login($data_login);

            if ($get_user) {
                if ($get_user->is_active == 1) {
                    $session_data = array(
                        'id' => $get_user->id,
                        'username' => $get_user->username,
                        'nama_lengkap' => $get_user->nama_lengkap,
                        'is_superadmin' => $get_user->is_superadmin
                    );
                    $this->session->set_userdata($session_data);
                    $this->session->set_flashdata('status', ['status' => 'success', 'msg' => 'Selamata Datang!']);
                    redirect('dashboard');
                } else {
                    $this->session->set_flashdata('status', ['status' => 'error', 'msg' => 'Akun Tidak Aktif. Hubungi Administrator!']);
                    redirect('adm-kominfo');
                }
            } else {
               $this->session->set_flashdata('status', ['status' => 'error', 'msg' => 'Gagal login, harap periksa username dan password']);
                redirect('adm-kominfo');
            }
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('adm-kominfo');
    }
}