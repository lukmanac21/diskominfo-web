<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sosialmedia extends Admin_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('Sosialmedia_model', 'sm', true);
        if(!$this->auth->isSuperAdministrator()){
        	access_denied();
        }
    }
	public function index()
	{	
		$data['table'] = $this->sm->get_sosialmedia();
		$data['list'] = TRUE;
		$this->layout->view('sosialmedia', $data);
	}

	public function add_data(){
		$name = $this->input->post('name');
		$link = $this->input->post('link');
        $icon = $this->input->post('icon');
		$data = array(
			'name' => $name,
			'link' => $link,
            'icon' => $icon
		);
		$insert = $this->sm->insert('sosialmedia', $data);
		if($insert != 0){
			$this->session->set_flashdata('status', ['status' => 'success', 'msg' => 'Berhasil Tambah Data']);
		} else{
			$this->session->set_flashdata('status', ['status' => 'error', 'msg' => 'Gagal Tambah Data']);
		}

		redirect('sosialmedia');
	}
	public function edit_data($id){
		$data['table'] = $this->db->get_where('sosialmedia', array('id' => $id))->result();
		$data['edit'] = TRUE;
		$this->layout->view('sosialmedia', $data);
	}
	public function update_data(){
		$id = $this->input->post('id');
		$name = $this->input->post('name');
		$link = $this->input->post('link');
        $icon = $this->input->post('icon');
		$data = array(
			'name' => $name,
			'link' => $link,
            'icon' => $icon
		);
		$update = $this->sm->update('sosialmedia', $data, array('id' => $id)); 
		if($update != 0){
			$this->session->set_flashdata('status', ['status' => 'success', 'msg' => 'Berhasil Edit Data']);
		} else{
			$this->session->set_flashdata('status', ['status' => 'error', 'msg' => 'Gagal Edit Data']);
		}

		redirect('sosialmedia');
	}
	public function delete_data(){
		$id = $this->input->post('delete_id');
        $delete = $this->sm->delete('sosialmedia', array('id' => $id)); 
        if($delete != 0){
			$this->session->set_flashdata('status', ['status' => 'success', 'msg' => 'Berhasil Hapus Data']);
		} else{
			$this->session->set_flashdata('status', ['status' => 'error', 'msg' => 'Gagal Hapus Data']);
		}
        redirect('sosialmedia');
    }

}
