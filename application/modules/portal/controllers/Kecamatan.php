<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kecamatan extends Admin_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('Kecamatan_model', 'km', true);
        if(!$this->auth->isSuperAdministrator()){
        	access_denied();
        }
    }
	public function index()
	{	
		$data['table'] = $this->km->get_kecamatan();
		$data['list'] = TRUE;
		$this->layout->view('kecamatan', $data);
	}

	public function add_data(){
		$date = $this->input->post('date');
		$judul = $this->input->post('judul');
		$link = $this->input->post('link');
		$file="";
        $upload = $this->upload_file();
		if ($upload['result'] == "success") {
			$file = $upload['file']['file_name'];
		} else { 
			$upload['upload_error'] = $upload['error']; 
		}
		$data = array(
			'kategori_id' => 2,
			'date' => $date,
			'judul' => $judul,
            'link' => $link,
			'picture' => $file ? $file : ''
		);
		$insert = $this->km->insert('portal', $data);
		if($insert != 0){
			$this->session->set_flashdata('status', ['status' => 'success', 'msg' => 'Berhasil Tambah Data']);
		} else{
			$this->session->set_flashdata('status', ['status' => 'error', 'msg' => 'Gagal Tambah Data']);
		}

		redirect('kecamatan');
	}
	public function edit_data($id){
		$data['table'] = $this->db->get_where('portal', array('id' => $id))->result();
		$data['edit'] = TRUE;
		$this->layout->view('kecamatan', $data);
	}
	public function update_data(){
		$id = $this->input->post('id');
		$kategori_id = $this->input->post('kategori_id');
		$date = $this->input->post('date');
		$judul = $this->input->post('judul');
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
				'judul' => $judul,
				'link' => $link
			);
		}
		else{
			$data = array(
			'date' => $date,
			'judul' => $judul,
            'link' => $link,
			'picture' => $file ? $file : ''
			);
		}
		$update = $this->km->update('portal', $data, array('id' => $id)); 
		if($update != 0){
			$this->session->set_flashdata('status', ['status' => 'success', 'msg' => 'Berhasil Edit Data']);
		} else{
			$this->session->set_flashdata('status', ['status' => 'error', 'msg' => 'Gagal Edit Data']);
		}

		redirect('kecamatan');
	}
	public function delete_data(){
		$id = $this->input->post('delete_id');
        $delete = $this->km->delete('portal', array('id' => $id));
        if($delete != 0){
			$this->session->set_flashdata('status', ['status' => 'success', 'msg' => 'Berhasil Hapus Data']);
		} else{
			$this->session->set_flashdata('status', ['status' => 'error', 'msg' => 'Gagal Hapus Data']);
		}
        redirect('kecamatan');
    }
	public function upload_file(){    
        $this->load->library('upload');     
        $config['upload_path'] = './assets/upload/kecamatan/';
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
