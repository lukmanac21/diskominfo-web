<?php
defined('BASEPATH') or exit('No direct script access allowed');

class c_pengumuman extends MY_Controller
{
    
    public function __construct(){
        parent::__construct();

    }
    public function index(){
      
        $this->load->view('templates/v_header');
        $this->load->view('page_informasi/pengumuman.php');
        $this->load->view('templates/v_footer');

    }
    function detail(){
       
        $this->load->view('templates/v_header');
        $this->load->view('page_informasi/detail_pengumuman');
        $this->load->view('templates/v_footer');
        }
}