<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends Admin_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Profile_model', 'pm', true);
	}
	public function index()
	{
		if (!$this->auth->isAdministrator()) {
			$id = $this->session->userdata('id');
			$id_satker = $this->session->userdata('satker');
			$data['profile'] = $this->pm->get_profile_simpeg($id);
			$data['riwayat_jabatan'] = $this->pm->get_riwayat_jab($id);
			$data['riwayat_jabatan1'] = $this->pm->get_riwayat($id);
			$data['jabatan'] = $this->pm->get_jabatan($id_satker);
			// echo $this->db->last_query();die();
			//var_dump($id_satker);
			//die;
			$data['suratmasuk'] = $this->pm->suratmasuk($this->session->userdata('satker'));
			$satker = $this->session->userdata('satker');
            $data['tablecount'] = $this->pm->get_by_satkerr($satker);
			$this->layout->view('profile2', $data);
		} else {
			$id = $this->session->userdata('id');
			$data['profile'] = $this->pm->get_profile($id);
			$data['suratmasuk'] = $this->pm->suratmasuk($this->session->userdata('satker'));
			$satker = $this->session->userdata('satker');
            $data['tablecount'] = $this->pm->get_by_satkerr($satker);
			$this->layout->view('profile', $data);
			
		}
	}
	public function atasanx(){
		$id_sakter = $this->input->post('satuan_kerja_id');
    	$atasan = $this->dm->get_nama_atasan($id_satker);
		$lists = "<option value=''>PILIH</option>";
		foreach($atasan as $data_atasan){
		$lists .= "<option value='".$data_atasan->satuan_kerja_id."'>".$data_atasan->judul_jabatan."</option>";
		}
		$callback = array('list_kota'=>$lists); 
		echo json_encode($callback); 
	}
	public function tambah_satker()
	{
		$data['nip'] = $this->session->userdata('username');
		$data['satker'] = $this->pm->get_pegawaiopd($this->session->userdata('satker_id'));
		$data['riwayat_jabatan'] = $this->pm->get_riwayat_jab($id);
	}

	public function edit_data()
	{
		$id = $this->input->post('id');
		$username = $this->input->post('username');
		$nama = $this->input->post('nama');
		$telepon = $this->input->post('telepon');
		$email = $this->input->post('email');
		$data = array(
			'username' => $username,
			'contact_no' => $telepon,
			'nama_lengkap' => $nama,
			'email' => $email,
			'updated_at' => date('Y-m-d')
		);

		if ($_FILES['gambar']['name'] != null) {
			$upload = $this->upload_file('gambar');
			if ($upload == false) {
				$image = null;
			} else {
				$image = $upload;
			}
			$data['images'] = $image;
		}

		$update = $this->pm->update('users', $data, array('id' => $id));
		if ($update != 0) {
			if (!empty($this->session->userdata('images'))) {
				unlink('files/users/' . $this->session->userdata('images'));
			}
			$this->session->unset_userdata('nama_lengkap');
			$this->session->unset_userdata('email');
			$this->session->unset_userdata('telepon');
			$this->session->unset_userdata('images');
			$this->session->set_userdata('nama_lengkap', $data['nama_lengkap']);
			$this->session->set_userdata('email', $data['email']);
			$this->session->set_userdata('telepon', $data['contact_no']);
			$this->session->set_userdata('images', $image);
			$this->session->set_flashdata('status', ['status' => 'success', 'msg' => 'Berhasil Edit Data']);
		} else {
			$this->session->set_flashdata('status', ['status' => 'error', 'msg' => 'Gagal Edit Data']);
		}

		redirect('profile');
	}

	public function change_pass()
	{
		$id = $this->input->post('pass_id');
		$old_pass = $this->input->post('old_pass');
		$current_pass = $this->input->post('current_pass');
		$new_pass = $this->encrypt_lib->passHashEnc($this->input->post('new_pass'));

		$pass_verify = $this->encrypt_lib->passHashDyc($current_pass, $old_pass);
		if ($pass_verify) {
			$data = array(
				'password' => $new_pass,
				'updated_at' => date('Y-m-d')
			);

			$update = $this->pm->update('users', $data, array('id' => $id));
			if ($update != 0) {
				$this->session->set_flashdata('status', ['status' => 'success', 'msg' => 'Berhasil Tambah Data']);
			} else {
				$this->session->set_flashdata('status', ['status' => 'error', 'msg' => 'Gagal Tambah Data']);
			}
		} else {
			$this->session->set_flashdata('status', ['status' => 'error', 'msg' => 'Password Tidak Sama']);
		}
		redirect('profile');
	}

	public function upload_file($param)
	{

		$nama_file = time() . '_' . $_FILES[$param]['name'];
		$konversi_nama = str_replace(" ", "_", $nama_file);
		$config['upload_path'] = ('./files/users/');

		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['overwrite'] = FALSE;
		$config['max_size'] = 10240000;
		$config['file_name'] = $konversi_nama;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if ($this->upload->do_upload($param)) {
			return $konversi_nama;
		} else {
			return false;
		}
	}
}
