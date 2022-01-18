<?php

class Custom_lib {

    private $allModules = array();
    protected $modules;
    var $perm_category;

	public function __construct()
    {
        $this->CI = &get_instance();
        $this->CI->load->database();
        $this->modules = array();
        $this->CI->load->model('Role_permissions_model', 'rpm', TRUE);
        self::loadModule();
    }

	function system_setting(){
		$this->CI = &get_instance();
        $this->CI->load->database();
		$data = $this->CI->db->get_where('settings', array('id' => 0))->row();
        if(!empty($data)){
            $this->setting = $data;
        }	
        return $this->setting;
    }

    function loadModule() {
        $this->allModules = $this->CI->rpm->get();
        if (!empty($this->allModules)) {
            foreach ($this->allModules as $mod_key => $mod_value) {
                if ($mod_value->is_active == 1) {
                    $this->modules[$mod_value->short_code] = true;
                } else {
                    if($this->CI->session->userdata('is_superadmin') == 1){
                        $this->modules[$mod_value->short_code] = true;
                    }else{
                        $this->modules[$mod_value->short_code] = false;
                    }                    
                }
            }
        }
    }

    function hasActive($module = null) {
        if ($this->modules[$module]) {
            return true;
        }
        return false;
    }
   

}

