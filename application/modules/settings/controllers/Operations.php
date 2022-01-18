<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Operations extends Admin_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('Operations_model', 'om', true);
        if(!$this->auth->isSuperAdministrator()){
        	access_denied();
        }
        
    }

	public function index()
	{	
		$data['table'] = $this->om->get_operations();
		$data['module'] = $this->om->get_module();
		$data['list'] = TRUE;
		$this->layout->view('operations', $data);
		// $this->load->view('layout/default');
	}
    public function add_data(){
		$group = $this->input->post('module_id');
		$name = $this->input->post('name');
		$slug = strtolower($this->input->post('slug'));
		$can_view = ($this->input->post('can_view') != null) ? 1 : 0;
		$can_add = ($this->input->post('can_add') != null) ? 1 : 0;
		$can_edit = ($this->input->post('can_edit') != null) ? 1 : 0;
		$can_delete = ($this->input->post('can_delete') != null) ? 1 : 0;
		$data = array(
			'm_group_id' => $group,
			'name' => $name,
			'slug' => $slug,
			'can_view' => $can_view,
			'can_add' => $can_add,
			'can_edit' => $can_edit,
			'can_delete' => $can_delete	
		);

		$insert = $this->om->insert('module_operations', $data); 
		if($insert != 0){
			$this->session->set_flashdata('status', ['status' => 'success', 'msg' => 'Berhasil Tambah Data']);
		} else{
			$this->session->set_flashdata('status', ['status' => 'error', 'msg' => 'Gagal Tambah Data']);
		}

		redirect('operations');
	}
	public function edit_data($id){
		$where = array('id' => $id);
		$data['module'] = $this->om->get_module();
		$data['table'] = $this->db->get_where('module_operations', $where)->result();
		$data['edit'] = TRUE;
		$this->layout->view('operations', $data);
	}

	public function update_data(){
		$id = $this->input->post('edit_id');
		$group = $this->input->post('module_id');
		$name = $this->input->post('name');
		$slug = strtolower($this->input->post('slug'));
		$can_view = ($this->input->post('can_view') != null) ? 1 : 0;
		$can_add = ($this->input->post('can_add') != null) ? 1 : 0;
		$can_edit = ($this->input->post('can_edit') != null) ? 1 : 0;
		$can_delete = ($this->input->post('can_delete') != null) ? 1 : 0;
		$data = array(
			'm_group_id' => $group,
			'name' => $name,
			'slug' => $slug,
			'can_view' => $can_view,
			'can_add' => $can_add,
			'can_edit' => $can_edit,
			'can_delete' => $can_delete
		);

		$update = $this->om->update('module_operations', $data, array('id' => $id)); 
		if($update != 0){
			$this->session->set_flashdata('status', ['status' => 'success', 'msg' => 'Berhasil Edit Data']);
		} else{
			$this->session->set_flashdata('status', ['status' => 'error', 'msg' => 'Gagal Edit Data']);
		}

		redirect('operations');
	}

	public function delete_data(){
		$id = $this->input->post('delete_id');
        $delete = $this->om->delete('module_operations', array('id' => $id)); 
        if($delete != 0){
			$this->session->set_flashdata('status', ['status' => 'success', 'msg' => 'Berhasil Hapus Data']);
		} else{
			$this->session->set_flashdata('status', ['status' => 'error', 'msg' => 'Gagal Hapus Data']);
		}
        redirect('operations');
    }

}
