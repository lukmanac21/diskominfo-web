<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Module extends Admin_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('Module_model', 'mm', true);
        if(!$this->auth->isSuperAdministrator()){
        	access_denied();
        }
        
    }

	public function index()
	{	
		$data['table'] = $this->mm->get_settings();
		$data['list'] = TRUE;
		$this->layout->view('module', $data);
	}

	public function add_data(){
		$name = $this->input->post('name');
		$short_code = $this->input->post('short_code');
		$data = array(
			'name' => $name,
			'short_code' => $short_code,
			'icon' => null,
			'is_active' => 1	
		);
		$insert = $this->mm->insert('module_groups', $data); 
		if($insert != 0){
			$this->session->set_flashdata('status', ['status' => 'success', 'msg' => 'Berhasil Tambah Data']);
		} else{
			$this->session->set_flashdata('status', ['status' => 'error', 'msg' => 'Gagal Tambah Data']);
		}

		redirect('module');
	}
	public function edit_data($id){
		$data['table'] = $this->mm->get_modules($id);
		// echo $this->db->last_query();die();
		$data['edit'] = TRUE;
		$this->layout->view('module', $data);
	}
	public function update_data(){
		$id = $this->input->post('id');
		$name = $this->input->post('name');
		$short_code = $this->input->post('short_code');
		$data = array(
			'name' => $name,
			'short_code' => $short_code,
			'icon' => null,
			'is_active' => 1	
		);
		$update = $this->mm->update('module_groups', $data, array('id' => $id)); 
		if($update != 0){
			$this->session->set_flashdata('status', ['status' => 'success', 'msg' => 'Berhasil Edit Data']);
		} else{
			$this->session->set_flashdata('status', ['status' => 'error', 'msg' => 'Gagal Edit Data']);
		}

		redirect('module');
	}
	public function delete_data(){
		$id = $this->input->post('delete_id');
        $delete = $this->mm->delete('module_groups', array('id' => $id)); 
        if($delete != 0){
			$this->session->set_flashdata('status', ['status' => 'success', 'msg' => 'Berhasil Hapus Data']);
		} else{
			$this->session->set_flashdata('status', ['status' => 'error', 'msg' => 'Gagal Hapus Data']);
		}
        redirect('module');
    }
    public function change_status(){
		$id = $this->input->post('id');
		$status = $this->input->post('status');
		$data = array(
			'is_active' => $status
		);

		$update = $this->mm->update('module_groups', $data, array('id' => $id)); 
		if($update != 0){
			$resp = 1;
		} else{
			$resp = 0;
		}
		echo $resp;
	}

	public function update_checkbox(){
		$check = $this->input->post('checkbox');
		$id = $this->input->post('id');
		if (isset($check)) {
			$data = array(
				'is_active' => '1'
			);
		} else {
			$data = array(
				'is_active' => '0'
			);
		}
		$update = $this->mm->update('module_groups', $data, array('id' => $id)); 
		redirect('module');
	}
}
