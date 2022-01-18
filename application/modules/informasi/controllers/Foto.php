<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Foto extends Admin_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('Foto_model', 'km', true);
        if(!$this->auth->isSuperAdministrator()){
        	access_denied();
        }
    }
	public function index()
	{	
		$data['table'] = $this->km->get_foto();
		$data['list'] = TRUE;
		$this->layout->view('foto', $data);
	}

	public function add_data(){
		$date = $this->input->post('date');
		$name = $this->input->post('name');
		$link = $this->input->post('link');
		$file="";
        $upload = $this->upload_file();
		if ($upload['result'] == "success") {
			$file = $upload['file']['file_name'];
		} else { 
			$upload['upload_error'] = $upload['error']; 
		}
		$data = array(
			'kategori_id' => 1,
			'date' => $date,
			'name' => $name,
            'link' => $link,
			'picture' => $file ? $file : ''
		);
		$insert = $this->km->insert('galeri', $data);
		if($insert != 0){
			$this->session->set_flashdata('status', ['status' => 'success', 'msg' => 'Berhasil Tambah Data']);
		} else{
			$this->session->set_flashdata('status', ['status' => 'error', 'msg' => 'Gagal Tambah Data']);
		}

		redirect('foto');
	}
	public function edit_data($id){
		$data['table'] = $this->db->get_where('galeri', array('id' => $id))->result();
		$data['edit'] = TRUE;
		$this->layout->view('foto', $data);
	}
	public function update_data(){
		$id = $this->input->post('id');
		$kategori_id = $this->input->post('kategori_id');
		$date = $this->input->post('date');
		$name = $this->input->post('name');
		$isi = $this->input->post('isi');
		$link = $this->input->post('link');
		$file="";
        $upload = $this->upload_file();
		if ($upload['result'] == "success") {
			$file = $upload['file']['file_name'];
		} else { 
			$upload['upload_error'] = $upload['error']; 
		}
		if($file== null)
		{
			$data = array(
				'date' => $date,
				'name' => $name,
				'link' => $link
			);
		}
		else{
			$data = array(
			'date' => $date,
			'name' => $name,
            'link' => $link,
			'picture' => $file ? $file : ''
			);
		}
		$update = $this->km->update('galeri', $data, array('id' => $id)); 
		if($update != 0){
			$this->session->set_flashdata('status', ['status' => 'success', 'msg' => 'Berhasil Edit Data']);
		} else{
			$this->session->set_flashdata('status', ['status' => 'error', 'msg' => 'Gagal Edit Data']);
		}

		redirect('foto');
	}
	public function delete_data(){
		$id = $this->input->post('delete_id');
        $delete = $this->km->delete('galeri', array('id' => $id));
        if($delete != 0){
			$this->session->set_flashdata('status', ['status' => 'success', 'msg' => 'Berhasil Hapus Data']);
		} else{
			$this->session->set_flashdata('status', ['status' => 'error', 'msg' => 'Gagal Hapus Data']);
		}
        redirect('foto');
    }
	public function upload_file(){    
        $this->load->library('upload');     
        $config['upload_path'] = './assets/upload/foto/';
        $config['allowed_types'] = '*';
        $config['overwrite'] = true;
        $config['file_name'] = '';
        $this->upload->initialize($config);
        if($this->upload->do_upload('file')){ 
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        }else{
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }

}
