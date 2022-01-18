<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Satker_model extends MY_Model {
    
    function __construct() {
        parent::__construct();
        $this->db2 = $this->load->database('simpeg', TRUE);
       
    }   

    function get_satker(){
    	$this->db->select('*');
    	$this->db->from('satker');
    	return $this->db->get()->result();
    }

    function get_by_nama() {
        $this->db->select('p.id, p.nip, p.nama_lengkap, sk.id as id_satker, sk.satuan_kerja');
        $this->db->from('simpeg.pegawai p');
        $this->db->join('simpeg.riwayat_jabatan rj', 'rj.id = p.id_jabatan');
        $this->db->join('simpeg.satuan_kerja sk', 'sk.id = rj.satuan_kerja_id');
        return $this->db->get()->result();
    }

}