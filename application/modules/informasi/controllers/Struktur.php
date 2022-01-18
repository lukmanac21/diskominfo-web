<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Struktur extends Admin_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('Struktur_model', 'sm', true);
        if(!$this->auth->isSuperAdministrator()){
        	access_denied();
        }
    }
	public function index()
	{	
		$data['table'] = $this->sm->get_struktur();
		$data['list'] = TRUE;
		$this->layout->view('struktur', $data);
	}

	public function add_data(){
		$date = $this->input->post('date');
		$name = $this->input->post('name');
		$isi = $this->input->post('isi');
		$file="";
        $upload = $this->upload_file();
		if ($upload['result'] == "success") {
			$file = $upload['file']['file_name'];
		} else { 
			$upload['upload_error'] = $upload['error']; 
		}
		$data = array(
            'date' => $date,
			'name' => $name,
			'isi' => $isi,
			'picture' => $file ? $file : ''
		);
		$insert = $this->sm->insert('struktur', $data);
		if($insert != 0){
			$this->session->set_flashdata('status', ['status' => 'success', 'msg' => 'Berhasil Tambah Data']);
		} else{
			$this->session->set_flashdata('status', ['status' => 'error', 'msg' => 'Gagal Tambah Data']);
		}

		redirect('struktur');
	}
	public function edit_data($id){
		$data['table'] = $this->db->get_where('struktur', array('id' => $id))->result();
		$data['edit'] = TRUE;
		$this->layout->view('struktur', $data);
	}
	public function update_data(){
		$id = $this->input->post('id');
        $date = $this->input->post('date');
		$name = $this->input->post('name');
		$isi = $this->input->post('isi');
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
                'date' => $date,
                'name' => $name,
                'isi' => $isi
			);
		}
		else{
			$data = array(
                'date' => $date,
                'name' => $name,
                'isi' => $isi,
                'picture' => $file ? $file : ''
			);
		}
		$update = $this->sm->update('struktur', $data, array('id' => $id)); 
		if($update != 0){
			$this->session->set_flashdata('status', ['status' => 'success', 'msg' => 'Berhasil Edit Data']);
		} else{
			$this->session->set_flashdata('status', ['status' => 'error', 'msg' => 'Gagal Edit Data']);
		}

		redirect('struktur');
	}
	public function delete_data(){
		$id = $this->input->post('delete_id');
        $delete = $this->sm->delete('struktur', array('id' => $id)); 
        if($delete != 0){
			$this->session->set_flashdata('status', ['status' => 'success', 'msg' => 'Berhasil Hapus Data']);
		} else{
			$this->session->set_flashdata('status', ['status' => 'error', 'msg' => 'Gagal Hapus Data']);
		}
        redirect('struktur');
    }
	public function upload_file(){    
        $this->load->library('upload'); // Load librari upload        
        $config['upload_path'] = './assets/upload/struktur/';
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
