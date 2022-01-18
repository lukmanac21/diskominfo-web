<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends Admin_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Dashboard_model', 'dm', true);
		// $this->load->model('Suratmasuk_model', 'smm', true);
	} 

	public function index()
	{
		$this->layout->view('dashboard');

	}
}
