<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portal extends Admin_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('Portal_model', 'km', true);
        if(!$this->auth->isSuperAdministrator()){
        	access_denied();
        }
    }
	public function index()
	{	
		$data['table'] = $this->km->get_portal();
		$data['kategori'] = $this->km->get_kategori();
		$data['list'] = TRUE;
		$this->layout->view('portal', $data);
	}

	public function add_data(){
		$kategori_id = $this->input->post('kategori_id');
		$judul = $this->input->post('judul');
		$file="";
        $upload = $this->upload_file();
		if ($upload['result'] == "success") {
			$file = $upload['file']['file_name'];
		} else { 
			$upload['upload_error'] = $upload['error']; 
		}
		$data = array(
			'kategori_id' => $kategori_id,
			'judul' => $judul,
			'picture' => $file ? $file : ''
		);
		$insert = $this->km->insert('portal', $data);
		if($insert != 0){
			$this->session->set_flashdata('status', ['status' => 'success', 'msg' => 'Berhasil Tambah Data']);
		} else{
			$this->session->set_flashdata('status', ['status' => 'error', 'msg' => 'Gagal Tambah Data']);
		}

		redirect('portal');
	}
	public function edit_data($id){
		$data['table'] = $this->db->get_where('portal', array('id' => $id))->result();
        $data['kategori'] = $this->km->get_kategori();
        // echo $this->db->last_query();die();
		$data['edit'] = TRUE;
		$this->layout->view('portal', $data);
	}
	public function update_data(){
		$id = $this->input->post('id');
		$kategori_id = $this->input->post('kategori_id');
		$judul = $this->input->post('judul');
		$file="";
        $upload = $this->upload_file();
		if ($upload['result'] == "success") {
			$file = $upload['file']['file_name'];
		} else { 
			$upload['upload_error'] = $upload['error']; 
		}
		if($images== null)
		{
			$data = array(
				'kategori_id' => $kategori_id,
				'judul' => $judul
			);
		}
		else{
			$data = array(
			'kategori_id' => $kategori_id,
			'judul' => $judul,
			'picture' => $file ? $file : ''
			);
		}
		$update = $this->km->update('portal', $data, array('id' => $id)); 
		if($update != 0){
			$this->session->set_flashdata('status', ['status' => 'success', 'msg' => 'Berhasil Edit Data']);
		} else{
			$this->session->set_flashdata('status', ['status' => 'error', 'msg' => 'Gagal Edit Data']);
		}

		redirect('portal');
	}
	public function delete_data(){
		$id = $this->input->post('delete_id');
        $delete = $this->km->delete('portal', array('id' => $id)); 
		// echo $this->db->last_query();die();
        if($delete != 0){
			$this->session->set_flashdata('status', ['status' => 'success', 'msg' => 'Berhasil Hapus Data']);
		} else{
			$this->session->set_flashdata('status', ['status' => 'error', 'msg' => 'Gagal Hapus Data']);
		}
        redirect('portal');
    }
	public function upload_file(){    
        $this->load->library('upload'); // Load librari upload        
        $config['upload_path'] = './assets/upload/file/';
        $config['allowed_types'] = '*';
        $config['overwrite'] = true;
        $config['file_name'] = '';
        $this->upload->initialize($config); // Load konfigurasi uploadnya
        if($this->upload->do_upload('file')){ // Lakukan upload dan Cek jika proses upload berhasil
            // Jika berhasil :
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        }else{
            // Jika gagal :
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }

}
