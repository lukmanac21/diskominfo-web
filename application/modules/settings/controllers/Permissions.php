<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permissions extends Admin_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('Permissions_model', 'pm', true);
        if(!$this->auth->isSuperAdministrator()){
        	access_denied();
        }
        
    }

	public function index($id)
	{	
		$data['role_id'] = $id;
		$data['table'] = $this->pm->get_module();
		$data['edit'] = TRUE;
		$this->layout->view('permissions', $data);
		// $this->load->view('layout/default');
	}

	public function edit_data(){
		$role_id = $this->input->post('role_id');
		$operation = $this->input->post('operation');
		foreach ($operation as $result) {
			$data = array();
			$data['role_id'] = $role_id;
			$data['m_operation_id'] = $result;
			$data['can_view'] = !empty($_POST['can_view'][$result]) ? $_POST['can_view'][$result] : 0;
			$data['can_add'] = !empty($_POST['can_add'][$result]) ? $_POST['can_add'][$result] : 0;
			$data['can_edit'] = !empty($_POST['can_edit'][$result]) ? $_POST['can_edit'][$result] : 0;
			$data['can_delete'] = !empty($_POST['can_delete'][$result]) ? $_POST['can_delete'][$result] : 0;
			
			$check = $this->pm->get_single('roles_permissions', array('role_id' => $role_id, 'm_operation_id' => $result));
			if($check){
				$this->pm->update('roles_permissions', $data, array('role_id' => $role_id, 'm_operation_id '=> $result));
			}else{
				$this->pm->insert('roles_permissions', $data);
			}
		}

		$this->session->set_flashdata('status', ['status' => 'success', 'msg' => 'Berhasil Edit Data']);
		redirect('roles');
	}

}
