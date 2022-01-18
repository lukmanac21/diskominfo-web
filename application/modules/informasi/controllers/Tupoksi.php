<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tupoksi extends Admin_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('Tupoksi_model', 'tm', true);
        if(!$this->auth->isSuperAdministrator()){
        	access_denied();
        }
    }
	public function index()
	{	
		$data['table'] = $this->tm->get_tupoksi();
		$data['list'] = TRUE;
		$this->layout->view('tupoksi', $data);
	}

	public function add_data(){
		$tugas = $this->input->post('tugas');
		$fungsi = $this->input->post('fungsi');
		$data = array(
			'tugas' => $tugas,
			'fungsi' => $fungsi
		);
		$insert = $this->tm->insert('tupoksi', $data);
		if($insert != 0){
			$this->session->set_flashdata('status', ['status' => 'success', 'msg' => 'Berhasil Tambah Data']);
		} else{
			$this->session->set_flashdata('status', ['status' => 'error', 'msg' => 'Gagal Tambah Data']);
		}

		redirect('tupoksi');
	}
	public function edit_data($id){
		$data['table'] = $this->db->get_where('tupoksi', array('id' => $id))->result();
		$data['edit'] = TRUE;
		$this->layout->view('tupoksi', $data);
	}
	public function update_data(){
		$id = $this->input->post('id');
		$tugas = $this->input->post('tugas');
		$fungsi = $this->input->post('fungsi');
		$data = array(
			'tugas' => $tugas,
			'fungsi' => $fungsi
		);
		$update = $this->tm->update('tupoksi', $data, array('id' => $id)); 
		if($update != 0){
			$this->session->set_flashdata('status', ['status' => 'success', 'msg' => 'Berhasil Edit Data']);
		} else{
			$this->session->set_flashdata('status', ['status' => 'error', 'msg' => 'Gagal Edit Data']);
		}

		redirect('tupoksi');
	}
	public function delete_data(){
		$id = $this->input->post('delete_id');
        $delete = $this->tm->delete('tupoksi', array('id' => $id)); 
        if($delete != 0){
			$this->session->set_flashdata('status', ['status' => 'success', 'msg' => 'Berhasil Hapus Data']);
		} else{
			$this->session->set_flashdata('status', ['status' => 'error', 'msg' => 'Gagal Hapus Data']);
		}
        redirect('tupoksi');
    }

}
