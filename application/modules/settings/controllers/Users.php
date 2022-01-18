<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends Admin_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('Users_model', 'um', true);
        if(!$this->auth->isAdministrator()){
        	access_denied();
        }
    }
    
	public function index(){
		if(!$this->rbac->hasPrivilege('users', 'can_view')){
			access_denied();
		}
		$data['table'] = $this->um->get_users();
		$data['list'] = TRUE;
		$data['roles'] = $this->um->get_roles();
		$this->layout->view('users', $data);
	}

	public function edit_data($id){
		$data['table'] = $this->um->get_users();
		$data['roles'] = $this->um->get_roles();
        $query = $this->um->user($id);
		$data['edit'] = $query;
		// var_dump($data['edit'][0]);
		// die();
		$this->layout->view('users', $data);
    }

	public function load_edit($id){
		$data['table'] = $this->um->get_users();
        $query = $this->um->user($id);
		$data['edit_password'] = $query;
		$this->layout->view('users', $data);
    }

	public function add_data(){
		$username = $this->input->post('username');
		$nama = $this->input->post('nama');
		$telepon = $this->input->post('telepon');
		$email = $this->input->post('email');
		$password = $this->encrypt_lib->passHashEnc($this->input->post('password'));
		$roles = $this->input->post('roles');

		$data = array(
			'roles_id' => $roles,
			'username' => $username,
			'contact_no' => $telepon,
			'nama_lengkap' => $nama,
			'email' => $email,
			'password' => $password,
			'is_active' => 1,
			'created_at' => date('Y-m-d')
		);
		$insert = $this->um->insert('users', $data); 
		if($insert != 0){
			$this->session->set_flashdata('status', ['status' => 'success', 'msg' => 'Berhasil Tambah Data']);
		} else{
			$this->session->set_flashdata('status', ['status' => 'error', 'msg' => 'Gagal Tambah Data']);
		}

		redirect('users');
	}

	public function update_data(){
		$id = $this->input->post('id');
		$username = $this->input->post('username');
		$nama = $this->input->post('nama');
		$telepon = $this->input->post('telepon');
		$email = $this->input->post('email');
		// $password = $this->encrypt_lib->passHashEnc($this->input->post('edit_password'));
		$roles = $this->input->post('roles');
		// $opd = $this->input->post('edit_opd');
		$data = array(
			'roles_id' => $roles,
			'username' => $username,
			'contact_no' => $telepon,
			'nama_lengkap' => $nama,
			'email' => $email,
			// 'password' => $password,
			// 'opd' => $opd,
			'updated_at' => date('Y-m-d')
		);

		if($_FILES['gambar']['name'] != null){
            $upload = $this->upload_file('edit_gambar');
            if($upload == false){
                $image = null;
            }else{
                $image = $upload;
            }
            $data['images'] = $image;
        }

		$update = $this->um->update('users', $data, array('id' => $id)); 
		if($update != 0){
			$this->session->set_flashdata('status', ['status' => 'success', 'msg' => 'Berhasil Edit Data']);
		} else{
			$this->session->set_flashdata('status', ['status' => 'error', 'msg' => 'Gagal Edit Data']);
		}

		redirect('users');
	}

	public function delete_data(){
		$id = $this->input->post('delete_id');
        $delete = $this->um->delete('users', array('id' => $id)); 
        if($delete != 0){
			$this->session->set_flashdata('status', ['status' => 'success', 'msg' => 'Berhasil Hapus Data']);
		} else{
			$this->session->set_flashdata('status', ['status' => 'error', 'msg' => 'Gagal Hapus Data']);
		}
        redirect('users');
    }

    public function change_pass(){
		$id = $this->input->post('pass_id');
		$old_pass = $this->input->post('old_pass');
		$current_pass = $this->input->post('current_pass');
		$new_pass = $this->encrypt_lib->passHashEnc($this->input->post('new_pass'));
		
		// $pass_verify = $this->encrypt_lib->passHashDyc($current_pass, $new_pass);
		// var_dump($pass_verify);
		// die();
		if($old_pass == $current_pass){
			$data = array(
				'password' => $new_pass,
			);

			$update = $this->um->update('users', $data, array('id' => $id)); 
			
			if($update != 0){
				$this->session->set_flashdata('status', ['status' => 'success', 'msg' => 'Berhasil Ubah Password']);
			} else{
				$this->session->set_flashdata('status', ['status' => 'error', 'msg' => 'Gagal Ubah Password']);
			}
		}else{
			$this->session->set_flashdata('status', ['status' => 'error', 'msg' => 'Password Tidak Sama']);
		}
		redirect('users');
	}

	public function upload_file($param){
        
        $nama_file = time().'_'.$_FILES[$param]['name'];
        $konversi_nama = str_replace(" ","_", $nama_file);
        $config['upload_path'] = ('./files/users/');
        
        $config['allowed_types'] = 'jpg|jpeg|png'; 
        $config['overwrite'] = FALSE;
        $config['max_size'] = 10240000; 
        $config['file_name'] = $konversi_nama; 
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        
        if ($this->upload->do_upload($param)){
            return $konversi_nama;
        }else{
            return false;
        }
    }

    public function change_status(){
		$id = $this->input->post('id');
		$status = $this->input->post('status');
		$data = array(
			'is_active' => $status
		);

		$update = $this->um->update('users', $data, array('id' => $id)); 
		if($update != 0){
			$resp = 1;
		} else{
			$resp = 0;
		}
		echo $resp;
	}

	public function reset_password($id){
		$query = $this->um->get_single('users', array('id' => $id));
		$randomPass = "123456";
		$message = 'PASSWORD '.strtoupper($query->nama_lengkap).' DI RESET MENJADI '.$randomPass;
		$newPass = $this->encrypt_lib->passHashEnc($randomPass);
		$data =  array('password' => $newPass);
		$update = $this->um->update('users', $data, array('id' => $id));

		if($update){
			if(send_email($query->email, $message)){
				$this->session->set_flashdata('status', ['status' => 'success', 'msg' => 'Password Berhasil Direset. Password Baru Telah Dikirim']);
			}else{
				$this->session->set_flashdata('status', ['status' => 'error', 'msg' => 'Password Berhasil Direset. Password Gagal Dikirim']);
				
			}
		}else{
			$this->session->set_flashdata('status', ['status' => 'error', 'msg' => 'Gagal Reset Password']);
			
		}
		
		redirect('users');
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
		$update = $this->um->update('users', $data, array('id' => $id)); 
		redirect('users');
	}
}
