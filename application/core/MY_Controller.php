<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

require APPPATH."third_party/MX/Controller.php";

class MY_Controller extends MX_Controller{
	
	function __construct(){
		parent::__construct();
	}
}

class Admin_Controller extends MY_Controller{
	public function __construct(){
        parent::__construct();
        $this->auth->is_logged_in();
    }
}