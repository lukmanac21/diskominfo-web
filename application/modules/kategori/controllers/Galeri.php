<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends Admin_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('Galeri_model', 'km', true);
        if(!$this->auth->isSuperAdministrator()){
        	access_denied();
        }
        
    }

	public function index()
	{	
		$data['table'] = $this->km->get_kategori_galeri();
		$data['list'] = TRUE;
		$this->layout->view('galeri', $data);
	}

	public function add_data(){
		$name = $this->input->post('name');
		$data = array(
			'name' => $name	
		);
		$insert = $this->km->insert('kategori_galeri', $data); 
		if($insert != 0){
			$this->session->set_flashdata('status', ['status' => 'success', 'msg' => 'Berhasil Tambah Data']);
		} else{
			$this->session->set_flashdata('status', ['status' => 'error', 'msg' => 'Gagal Tambah Data']);
		}

		redirect('kategori/galeri');
	}
	public function edit_data($id){
		$data['table'] = $this->db->get_where('kategori_galeri',array ('id' => $id))->result();
		// echo $this->db->last_query();die();
		$data['edit'] = TRUE;
		$this->layout->view('galeri', $data);
	}
	public function update_data(){
		$id = $this->input->post('id');
		$name = $this->input->post('name');
		$data = array(
			'name' => $name
		);
		$update = $this->km->update('kategori_galeri', $data, array('id' => $id)); 
		if($update != 0){
			$this->session->set_flashdata('status', ['status' => 'success', 'msg' => 'Berhasil Edit Data']);
		} else{
			$this->session->set_flashdata('status', ['status' => 'error', 'msg' => 'Gagal Edit Data']);
		}

		redirect('kategori/galeri');
	}
	public function delete_data(){
		$id = $this->input->post('delete_id');
        $delete = $this->km->delete('kategori_galeri', array('id' => $id)); 
        if($delete != 0){
			$this->session->set_flashdata('status', ['status' => 'success', 'msg' => 'Berhasil Hapus Data']);
		} else{
			$this->session->set_flashdata('status', ['status' => 'error', 'msg' => 'Gagal Hapus Data']);
		}
        redirect('kategori/galeri');
    }
}
