<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Egoverment extends Admin_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('Egoverment_model', 'em', true);
        if(!$this->auth->isSuperAdministrator()){
        	access_denied();
        }
    }
	public function index()
	{	
		$data['table'] = $this->em->get_egoverment();
		$data['list'] = TRUE;
		$this->layout->view('egoverment', $data);
	}

	public function add_data(){
		$judul = $this->input->post('judul');
		$isi = $this->input->post('isi');
        $tgl = $this->input->post('tgl');
		$data = array(
			'judul' => $judul,
			'isi' => $isi,
            'tgl' => $tgl
		);
		$insert = $this->em->insert('egoverment', $data);
		if($insert != 0){
			$this->session->set_flashdata('status', ['status' => 'success', 'msg' => 'Berhasil Tambah Data']);
		} else{
			$this->session->set_flashdata('status', ['status' => 'error', 'msg' => 'Gagal Tambah Data']);
		}

		redirect('egoverment');
	}
	public function edit_data($id){
		$data['table'] = $this->db->get_where('egoverment', array('id' => $id))->result();
		$data['edit'] = TRUE;
		$this->layout->view('egoverment', $data);
	}
	public function update_data(){
		$id = $this->input->post('id');
		$judul = $this->input->post('judul');
		$isi = $this->input->post('isi');
        $tgl = $this->input->post('tgl');
		$data = array(
			'judul' => $judul,
			'isi' => $isi,
            'tgl' => $tgl
		);
		$update = $this->em->update('egoverment', $data, array('id' => $id)); 
		if($update != 0){
			$this->session->set_flashdata('status', ['status' => 'success', 'msg' => 'Berhasil Edit Data']);
		} else{
			$this->session->set_flashdata('status', ['status' => 'error', 'msg' => 'Gagal Edit Data']);
		}

		redirect('egoverment');
	}
	public function delete_data(){
		$id = $this->input->post('delete_id');
        $delete = $this->em->delete('egoverment', array('id' => $id)); 
        if($delete != 0){
			$this->session->set_flashdata('status', ['status' => 'success', 'msg' => 'Berhasil Hapus Data']);
		} else{
			$this->session->set_flashdata('status', ['status' => 'error', 'msg' => 'Gagal Hapus Data']);
		}
        redirect('egoverment');
    }

}
