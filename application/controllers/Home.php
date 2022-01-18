<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('post_model');
        $this->load->helper('text');

    }
    public function index(){
        $data['pengunjunghariini']=$this->post_model->getPengunjungHariIni();
        $data['totalpengunjung']=$this->post_model->getTotalPengunjung();
        $data['pengunjungonline']=$this->post_model->getPengunjungOnline();
        $data['sosialmedia'] = $this->post_model->get_sosialmedia();
        $data['slider'] = $this->post_model->get_slider();
        $data['tentang'] = $this->post_model->get_tentang();
        $data['general'] = $this->post_model->get_setting();
        $data['berita'] = $this->post_model->get_content(1);
        $data['opd'] = $this->post_model->get_portal(1);
        $this->load->view('home',$data);
    }
    public function visimisi(){
        $data['sosialmedia'] = $this->post_model->get_sosialmedia();
        $data['pengunjunghariini']=$this->post_model->getPengunjungHariIni();
        $data['totalpengunjung']=$this->post_model->getTotalPengunjung();
        $data['pengunjungonline']=$this->post_model->getPengunjungOnline();
        $data['general'] = $this->post_model->get_setting();
        $data['vimi'] = $this->post_model->get_visimisi();
        $this->load->view('visimisi',$data);
    }
    public function tupoksi(){
        $data['sosialmedia'] = $this->post_model->get_sosialmedia();
        $data['pengunjunghariini']=$this->post_model->getPengunjungHariIni();
        $data['totalpengunjung']=$this->post_model->getTotalPengunjung();
        $data['pengunjungonline']=$this->post_model->getPengunjungOnline();
        $data['general'] = $this->post_model->get_setting();
        $data['tupoksi'] = $this->post_model->get_tupoksi();
        $this->load->view('tupoksi',$data);
    }
    public function struktur(){
        $data['sosialmedia'] = $this->post_model->get_sosialmedia();
        $data['pengunjunghariini']=$this->post_model->getPengunjungHariIni();
        $data['totalpengunjung']=$this->post_model->getTotalPengunjung();
        $data['pengunjungonline']=$this->post_model->getPengunjungOnline();
        $data['general'] = $this->post_model->get_setting();
        $data['struktur'] = $this->post_model->get_struktur();
        $this->load->view('struktur',$data);
    }
    

    // public function index()
    // {
    //     $data['tentang'] = $this->post_model->get_content(4);
    //     $data['ppid'] = $this->post_model->get_content(6);
    //     $data['egov'] = $this->post_model->get_content(7);
    //     $data['berita'] = $this->post_model->get_content(2);
    //     $data['opd'] = $this->post_model->get_content(9);
    //     $data['kec'] = $this->post_model->get_content(10);
    //     $data['visimisi'] = $this->post_model->get_visimisi();
    //     $data['general'] = $this->post_model->get_setting();
    //     $data['tupoksi'] = $this->post_model->get_tupoksi();
    //     $data['sosialmedia'] = $this->post_model->get_sosialmedia();
        
    //     // echo $this->db->last_query();die();
    //     // $data['slider'] = $this->post_model->getSlider();
    //     // $data['logo'] = $this->post_model->getLogo();
    //     // $data['Kontak'] = $this->post_model->getKontak();
    //     // $data['about_dept'] = $this->post_model->getAllpost();
    //     // $data['portal_opd'] = $this->post_model->getAllportal();
    //     // $data['portal_opd'] = $this->post_model->getPortal();
    //     // $data['newslimit'] = $this->post_model-> getnewslimit3();
    //     // $data['link'] = $this->post_model-> getLink();
    //     // $data['linkMap'] = $this->post_model-> getLinkMap();
    //     $data['pengunjunghariini']=$this->post_model->getPengunjungHariIni();
    //     $data['totalpengunjung']=$this->post_model->getTotalPengunjung();
    //     $data['pengunjungonline']=$this->post_model->getPengunjungOnline();

    //     $this->load->view('templates/v_header',$data);
    //     $this->load->view('templates/v_slider',$data);
    //     $this->load->view('templates/v_tentang',$data);
    //     // $this->load->view('templates/v_youtube',$data);
    //     $this->load->view('templates/v_portal',$data);
    //     $this->load->view('templates/v_bondMelesat',$data);
    //     // $this->load->view('page_layanan/layanan',$data);
    //     $this->load->view('templates/v_portofolio',$data);
    //     $this->load->view('templates/v_beritaTerbaru',$data);
    //     // $this->load->view('templates/v_garisBiru',$data);
    //     // $this->load->view('page_tentang/tentang',$data);
    //     $this->load->view('templates/v_kontak',$data);      
    //     $this->load->view('templates/v_footer',$data);


    // }
    
}