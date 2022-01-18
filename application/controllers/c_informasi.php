<?php
defined('BASEPATH') or exit('No direct script access allowed');

class c_informasi extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('post_model');
        $this->load->helper('text');

    }
    public function index(){
       
        $this->load->view('templates/v_header');
        $this->load->view('page_informasi/berita.php');
        $this->load->view('templates/v_footer');

    }
    function detail(){
        
        $this->load->view('templates/v_header');
        $this->load->view('page_informasi/detail_berita');
        $this->load->view('templates/v_footer');
        }
}