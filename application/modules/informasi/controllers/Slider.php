<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends Admin_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('Slider_model', 'mm', true);
        if(!$this->auth->isSuperAdministrator()){
        	access_denied();
        }
        
    }

	public function index()
	{	
		$data['table'] = $this->mm->get_slider();
		$data['list'] = TRUE;
		$this->layout->view('slider', $data);
	}

	public function add_data(){
		$name = $this->input->post('name');
		$file="";
        $upload = $this->upload_file();
		if ($upload['result'] == "success") {
			$file = $upload['file']['file_name'];
		} else { 
			$upload['upload_error'] = $upload['error']; 
		}
		$data = array(
            'name' => $name,
            'is_active' => 1,	
            'picture' => $file ? $file : ''
		);
		$insert = $this->mm->insert('slider', $data); 
		if($insert != 0){
			$this->session->set_flashdata('status', ['status' => 'success', 'msg' => 'Berhasil Tambah Data']);
		} else{
			$this->session->set_flashdata('status', ['status' => 'error', 'msg' => 'Gagal Tambah Data']);
		}

		redirect('slider');
	}
	public function edit_data($id){
		$data['table'] = $this->mm->get_sliders($id);
		// echo $this->db->last_query();die();
		$data['edit'] = TRUE;
		$this->layout->view('slider', $data);
	}
	public function update_data(){
		$id = $this->input->post('id');
		$name = $this->input->post('name');
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
                'name' => $name,
                'is_active' => 1	
			);
		}
		else{
			$data = array(
                'name' => $name,
                'is_active' => 1,	
			    'picture' => $file ? $file : ''
			);
		}
		$update = $this->mm->update('slider', $data, array('id' => $id)); 
		if($update != 0){
			$this->session->set_flashdata('status', ['status' => 'success', 'msg' => 'Berhasil Edit Data']);
		} else{
			$this->session->set_flashdata('status', ['status' => 'error', 'msg' => 'Gagal Edit Data']);
		}

		redirect('slider');
	}
	public function delete_data(){
		$id = $this->input->post('delete_id');
        $delete = $this->mm->delete('slider', array('id' => $id)); 
        if($delete != 0){
			$this->session->set_flashdata('status', ['status' => 'success', 'msg' => 'Berhasil Hapus Data']);
		} else{
			$this->session->set_flashdata('status', ['status' => 'error', 'msg' => 'Gagal Hapus Data']);
		}
        redirect('slider');
    }
    public function change_status(){
		$id = $this->input->post('id');
		$status = $this->input->post('status');
		$data = array(
			'is_active' => $status
		);

		$update = $this->mm->update('slider', $data, array('id' => $id)); 
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
		$update = $this->mm->update('slider', $data, array('id' => $id)); 
		redirect('slider');
	}
    public function upload_file(){    
        $this->load->library('upload'); // Load librari upload        
        $config['upload_path'] = './assets/frontend/slider/';
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
