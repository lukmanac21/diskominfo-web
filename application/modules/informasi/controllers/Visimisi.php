<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Visimisi extends Admin_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('Visimisi_model', 'vm', true);
        if(!$this->auth->isSuperAdministrator()){
        	access_denied();
        }
    }
	public function index()
	{	
		$data['table'] = $this->vm->get_visimisi();
		$data['list'] = TRUE;
		$this->layout->view('visimisi', $data);
	}

	public function add_data(){
		$tahun = $this->input->post('tahun');
		$misi = $this->input->post('misi');
		$visi = $this->input->post('visi');
		$data = array(
			'tahun' => $tahun,
			'misi' => $misi,
			'visi' => $visi
		);
		$insert = $this->vm->insert('visimisi', $data);
		if($insert != 0){
			$this->session->set_flashdata('status', ['status' => 'success', 'msg' => 'Berhasil Tambah Data']);
		} else{
			$this->session->set_flashdata('status', ['status' => 'error', 'msg' => 'Gagal Tambah Data']);
		}

		redirect('visimisi');
	}
	public function edit_data($id){
		$data['table'] = $this->db->get_where('visimisi', array('id' => $id))->result();
		$data['edit'] = TRUE;
		$this->layout->view('visimisi', $data);
	}
	public function update_data(){
		$id = $this->input->post('id');
		$tahun = $this->input->post('tahun');
		$misi = $this->input->post('misi');
		$visi = $this->input->post('visi');
		$data = array(
			'tahun' => $tahun,
			'misi' => $misi,
			'visi' => $visi
		);
		$update = $this->vm->update('visimisi', $data, array('id' => $id)); 
		if($update != 0){
			$this->session->set_flashdata('status', ['status' => 'success', 'msg' => 'Berhasil Edit Data']);
		} else{
			$this->session->set_flashdata('status', ['status' => 'error', 'msg' => 'Gagal Edit Data']);
		}

		redirect('visimisi');
	}
	public function delete_data(){
		$id = $this->input->post('delete_id');
        $delete = $this->vm->delete('visimisi', array('id' => $id)); 
        if($delete != 0){
			$this->session->set_flashdata('status', ['status' => 'success', 'msg' => 'Berhasil Hapus Data']);
		} else{
			$this->session->set_flashdata('status', ['status' => 'error', 'msg' => 'Gagal Hapus Data']);
		}
        redirect('visimisi');
    }

}
