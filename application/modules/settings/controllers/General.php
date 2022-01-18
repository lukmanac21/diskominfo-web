<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class General extends Admin_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('General_model', 'gm', true);
        if(!$this->auth->isSuperAdministrator()){
        	access_denied();
        }
        
    }

	public function index()
	{	
		$data['settings'] = $this->gm->get_settings();
		$this->layout->view('general', $data);
	}

	public function load_edit($id){
		$data = array('id' => $id);
        $query = $this->gm->get_single('settings', $data);
        echo json_encode($query);
    }

	public function update_data(){
		$title = $this->input->post('title');
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$telepon = $this->input->post('telepon');
		$alamat = $this->input->post('alamat');
		$footer = $this->input->post('footer');
		$quotes = $this->input->post('quotes');
		$instagram = $this->input->post('instagram');
		$youtube = $this->input->post('youtube');

		$data = array(
			'site_title' => $title,
			'name' => $name,
			'email' => $email,
			'phone' => $telepon,
			'address' => $alamat,
			'footer' => $footer,
			'quotes' => $quotes,
			'instagram' => $instagram,
			'youtube' => $youtube
		);
		$data['updated_at'] = date('Y-m-d H:i:s');
		$update = $this->gm->update('settings', $data, array('id' => 0));
		// echo $this->db->last_query();die(); 
		if($update != 0){
			$this->session->set_flashdata('status', ['status' => 'success', 'msg' => 'Berhasil Edit General']);
		} else{
			$this->session->set_flashdata('status', ['status' => 'error', 'msg' => 'Gagal Edit General']);
		}	

		redirect('general');
	}
	public function logo_update(){
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

			);
		}
		else{
			$data = array(
			'logo_fo' => $file ? $file : ''
			);
		}
		// var_dump($data);die();
		// echo $this->db->last_query();die(); 
		$update = $this->gm->update('settings', $data, array('id' => 0));

		if($update != 0){
			$this->session->set_flashdata('status', ['status' => 'success', 'msg' => 'Berhasil Edit General']);
		} else{
			$this->session->set_flashdata('status', ['status' => 'error', 'msg' => 'Gagal Edit General']);
		}	

		redirect('general');
	}

	public function icon_update(){
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
			);
		}
		else{
			$data = array(
			'icon_fo' => $file ? $file : ''
			);
		}
		$update = $this->gm->update('settings', $data, array('id' => 0));
		// echo $this->db->last_query();die(); 
		if($update != 0){
			$this->session->set_flashdata('status', ['status' => 'success', 'msg' => 'Berhasil Edit General']);
		} else{
			$this->session->set_flashdata('status', ['status' => 'error', 'msg' => 'Gagal Edit General']);
		}	

		redirect('general');
	}
	public function bga_update(){
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
			);
		}
		else{
			$data = array(
			'picture_1' => $file ? $file : ''
			);
		}
		$update = $this->gm->update('settings', $data, array('id' => 0));
		// echo $this->db->last_query();die(); 
		if($update != 0){
			$this->session->set_flashdata('status', ['status' => 'success', 'msg' => 'Berhasil Edit General']);
		} else{
			$this->session->set_flashdata('status', ['status' => 'error', 'msg' => 'Gagal Edit General']);
		}	

		redirect('general');
	}
	public function bgt_update(){
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
			);
		}
		else{
			$data = array(
			'picture_2' => $file ? $file : ''
			);
		}
		$update = $this->gm->update('settings', $data, array('id' => 0));
		// echo $this->db->last_query();die(); 
		if($update != 0){
			$this->session->set_flashdata('status', ['status' => 'success', 'msg' => 'Berhasil Edit General']);
		} else{
			$this->session->set_flashdata('status', ['status' => 'error', 'msg' => 'Gagal Edit General']);
		}	

		redirect('general');
	}
	public function bgf_update(){
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
			);
		}
		else{
			$data = array(
			'picture_3' => $file ? $file : ''
			);
		}
		$update = $this->gm->update('settings', $data, array('id' => 0));
		// echo $this->db->last_query();die(); 
		if($update != 0){
			$this->session->set_flashdata('status', ['status' => 'success', 'msg' => 'Berhasil Edit General']);
		} else{
			$this->session->set_flashdata('status', ['status' => 'error', 'msg' => 'Gagal Edit General']);
		}	

		redirect('general');
	}
	public function upload_file(){    
        $this->load->library('upload'); // Load librari upload        
        $config['upload_path'] = './assets/images/fo/';
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
