<?php 
function system_setting(){
	$CI = & get_instance();
    $data = $CI->db->get_where('settings', array('id' => 0))->row();
    if(!empty($data)){
       return $data;
    }
}

function access_denied(){
	redirect('error404');
}

function get_operations_by_module($module_id){
	$CI = & get_instance();
	$CI->db->select('*');
	$CI->db->from('module_operations mo');
	$CI->db->where('m_group_id', $module_id);
	$CI->db->order_by('m_group_id');
	$CI->db->order_by('mo.name', 'asc');
	return $CI->db->get()->result();
}

function get_permission_by_role($role_id, $operation_id){
	$CI = & get_instance();
    $CI->db->select('*');
    $CI->db->from('roles_permissions');
    $CI->db->where('role_id', $role_id);
    $CI->db->where('m_operation_id', $operation_id);
    return $CI->db->get()->row();
}

function send_email($email, $message){
	$CI = & get_instance();
	ini_set("SMTP","smtp.gmail.com");
    ini_set("smtp_port","25");
    $config = array(
        'protocol' => 'smtp',
        'smtp_host' => 'smtp.gmail.com',
        'smtp_port' => 465,
        'smtp_user' => 'siprausupers@gmail.com', 
        'smtp_pass' => 'siprausuper123', 
        'mailtype' => 'text',
        'charset' => 'iso-8859-1',
        'smtp_crypto'=>'ssl', 
        'wordwrap' => TRUE
    );
    $CI->email->initialize($config);
    $CI->email->set_newline("\r\n");
    $CI->email->from('siprausuper@norelpy.com');
    $CI->email->subject('RESET PASSWORD');
    $CI->email->message($message);
    $CI->email->to($email);
     
    if (!$CI->email->send()){
        return false;
	}else{
		return true;
	}
}


?>