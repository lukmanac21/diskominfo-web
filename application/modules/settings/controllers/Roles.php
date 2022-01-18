<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Roles extends Admin_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('Roles_model', 'rm', true);
        if(!$this->auth->isSuperAdministrator()){
        	access_denied();
        }
    }

	public function index()
	{
		$data['table'] = $this->rm->get_roles();
		$data['list'] = TRUE;
		$this->layout->view('roles', $data);
		// $this->load->view('layout/default');
	}
	public function add_data(){
		$roles = $this->input->post('roles');
		$level = $this->input->post('level');
		$data = array(
			'name' => $roles,
			'is_superadmin' => $level,
			'created_at' => date('Y-m-d H:i:s')
		);

		$insert = $this->rm->insert('roles', $data); 
		if($insert != 0){
			$this->session->set_flashdata('status', ['status' => 'success', 'msg' => 'Berhasil Tambah Data']);
		} else{
			$this->session->set_flashdata('status', ['status' => 'error', 'msg' => 'Gagal Tambah Data']);
		}

		redirect('roles');
	}
	public function edit_data($id)
	{
		$where = array('id' => $id);
		$data['table'] = $this->db->get_where('roles',$where)->result();
		$data['edit'] = TRUE;
		$this->layout->view('roles', $data);
		// $this->load->view('layout/default');
	}
	public function update_data(){
		$id = $this->input->post('edit_id');
		$roles = $this->input->post('edit_roles');
		$level = $this->input->post('edit_level');
		$data = array(
			'name' => $roles,
			'is_superadmin' => $level,
			'updated_at' => date('Y-m-d H:i:s')
		);

		$update = $this->rm->update('roles', $data, array('id' => $id)); 
		if($update != 0){
			$this->session->set_flashdata('status', ['status' => 'success', 'msg' => 'Berhasil Edit Data']);
		} else{
			$this->session->set_flashdata('status', ['status' => 'error', 'msg' => 'Gagal Edit Data']);
		}

		redirect('roles');
	}

	public function delete_data(){
		$id = $this->input->post('delete_id');
        $delete = $this->rm->delete('roles', array('id' => $id)); 
        if($delete != 0){
			$this->session->set_flashdata('status', ['status' => 'success', 'msg' => 'Berhasil Hapus Data']);
		} else{
			$this->session->set_flashdata('status', ['status' => 'error', 'msg' => 'Gagal Hapus Data']);
		}
        redirect('roles');
    }
	public function permision_edit($id){
		$data['table'] = $this->rm->get_permision($id);
		echo $this->db->last_query();die();
		$data['perm'] = TRUE;
		$this->layout->view('roles', $data);
	}
}
