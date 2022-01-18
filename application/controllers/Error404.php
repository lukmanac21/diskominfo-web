<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error404 extends MY_Controller {

	public function index()
	{
		$this->load->view('error404');
		// $this->load->view('layout/default');
	}
}
