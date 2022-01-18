<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Profile_model extends MY_Model
{

    function __construct()
    {
        parent::__construct();
        $this->db2 = $this->load->database('simpeg', TRUE);
        $this->db3 = $this->load->database('sinkav3.', TRUE);
    }

    function get_profile($id) 
    {
        return $this->db->get_where('users', array('id' => $id))->row();
    }

    function get_profile_simpeg($id)
    {
        $this->db2->select('p.nama_lengkap, p.gelar_depan, p.gelar_belakang, p.nip, g.pangkat, g.golongan');
        $this->db2->from('pegawai p');
        $this->db2->join('riwayat_pangkat rp', 'rp.id = p.id_pangkat');
        $this->db2->join('golongan g', 'g.id = rp.golongan_id');
        $this->db2->where('p.id', $id);
        $this->db2->limit(1);
        return $this->db2->get()->row();
    }
    function get_by_satkerr($id_satuan_kerja)
    {
        $this->db->select('surat.*, jenis.nama_jenis, status.nama, p.nama_lengkap');
        $this->db->from('surat');
        $this->db->join('jenis', 'jenis.id = surat.id_jenis');
        $this->db->join('status', 'surat.status = status.no_status');
        $this->db->join('simpeg.pegawai p', 'p.id = surat.id_pegawai');
        $this->db->join('satker_settings', 'satker_settings.satker = surat.id_satuan_kerja');
        $this->db->like('satker', $id_satuan_kerja,'BOTH');
        return $this->db->get()->result();
    }
    function get_jabatan($satker, $jabatan = NULL, $staff = NULL){
        $this->db->select('s.*');
        $this->db->from('simpeg.satuan_kerja as s');

        if($staff != ""){
            $this->db->like('s.id',$satker,'after');
            $this->db->where('(s.kelas_jabatan = 8 OR s.kelas_jabatan = 9)');
        }else if($jabatan != NULL){
            $this->db->where('s.id', $jabatan);
        }else{
            $this->db->like('s.id',$satker,'both');
        }

        $this->db->order_by('s.kelas_jabatan DESC');
        return $this->db->get()->result();
    }

    function suratmasuk($id_penerima){
        $this->db->select('detail_surat.*, surat.perihal, surat.id_satuan_kerja, status.nama, jenis.id as id_jenis, id_penerima, status.no_status as status, jenis.nama_jenis, surat.created_at, kk.nama_satker as satkers');
        $this->db->from('detail_surat');
        $this->db->join('surat','surat.id = detail_surat.id_surat');
        $this->db->join('status', 'detail_surat.status = status.no_status');
        $this->db->join('jenis', 'jenis.id = surat.id_jenis');
        $this->db->join('kode_kantor kk', 'kk.id_satker = left(surat.id_satuan_kerja,2)');
        $this->db->where('detail_surat.id_penerima', $id_penerima, 'BOTH');
        $this->db2->join('simpeg.satuan_kerja','satuan_kerja.id = detail_surat.id_penerima');
        $this->db->where('MONTH(surat.created_at)', date('m'));
        return $this->db->get()->result();
    }

    function get_by_satker($id_satuan_kerja)
    {
        $this->db->select('surat.*, jenis.nama_jenis, status.nama, p.nama_lengkap');
        $this->db->from('surat');
        $this->db->join('jenis', 'jenis.id = surat.id_jenis');
        $this->db->join('status', 'surat.status = status.no_status');
        $this->db->join('simpeg.pegawai p', 'p.id = surat.id_pegawai');
        $this->db->join('satker_settings', 'satker_settings.satker = surat.id_satuan_kerja');
        $this->db->like('satker', $id_satuan_kerja,'BOTH');
        $this->db->where('MONTH(surat.created_at)', date('m'));
        $this->db->order_by('id', 'DESC');
        return $this->db->get()->result();
    }

    function get_riwayat_jab($id)
    {
        $this->db2->select('p.nama_lengkap, rj.judul_jabatan, sk.satuan_kerja, rj.no_sk, rj.tmt_sk');
        $this->db2->from('pegawai p');
        $this->db2->join('riwayat_jabatan rj', 'p.id = rj.pegawai_id');
        $this->db2->join('satuan_kerja sk', 'sk.id = rj.satuan_kerja_id');
        $this->db2->where('p.id', $id);
        $this->db2->order_by('rj.tmt_sk', 'desc');
        return $this->db2->get()->result();
    }

    function get_riwayat($id)
    {
        $this->db2->select('p.nama_lengkap, rj.judul_jabatan, sk.satuan_kerja, rj.no_sk, rj.tmt_sk, sk.parent_kode');
        $this->db2->from('pegawai p');
        $this->db2->join('riwayat_jabatan rj', 'p.id = rj.pegawai_id');
        $this->db2->join('satuan_kerja sk', 'sk.id = rj.satuan_kerja_id');
        $this->db2->where('p.id', $id);
        $this->db2->order_by('rj.tmt_sk', 'desc');
        $this->db2->limit(1);
        return $this->db2->get()->result();
    }

    function get_pegawaiopd()
    {
        $this->db2->select(' p.id, p.nip, p.nama_lengkap, p.status_pegawai_id, p.id_pangkat, p.id_jabatan,
        a.tanggal_sk, a.pegawai_id, a.jabatan_id, a.satuan_kerja_id, a.eselon_id, a.judul_jabatan, a.kelas_jabatan,
        b.id as id_satker, b.kode_satuan_kerja, b.satuan_kerja, b.parent_kode, b.kelas_jabatan, b.job_value,
        k.id as kj_id, k.pegawai_id as peg_kj, k.jobvalue_id,
        j.id as jv_id, j.kelas_jabatan as jv_kj, j.category, j.job_value as jv_jobvalue, j.ket');
        $this->db2->from('pegawai as p');
        $this->db2->join('riwayat_jabatan as a', 'p.id_jabatan = a.id');
        $this->db2->join('satuan_kerja as b', 'b.id = a.satuan_kerja_id');
        $this->db2->join('sinkav3.kelas_jabatan20 as k', 'k.pegawai_id = p.id');
        $this->db2->join('sinkav3.job_value20 as j', 'j.id = k.jobvalue_id');
        $this->db2->where('b.id LIKE "65%"');
        $this->db2->where('p.status_pegawai_id', 2);
        $this->db2->order_by('j.job_value DESC');
        return $this->db2->get()->result();
    }

    function get_jabatans(){
        $this->db2->select('a.satuan_kerja_id, b.satuan_kerja, a.judul_jabatan,b.kode_satuan_kerja,b.parent_kode');
        $this->db2->from('pegawai as p');
        $this->db2->join('riwayat_jabatan as a', 'p.id_jabatan = a.id');
        $this->db2->join('satuan_kerja as b', 'b.id = a.satuan_kerja_id');
        $this->db2->where('p.status_pegawai_id',2);
        $this->db2->where('length(job_value) = 4');
        $this->db2->where('eselon_id IS NOT NULL');
        $this->db2->order_by('a.eselon_id ASC');
        return $this->db2->get()->result();
        
   }

    public function get_opd($id_satker)
    {
        $this->db2->select('satuan_kerja');
        $this->db2->from('satuan_kerja');
        $this->db2->where('satuan_kerja.id', substr($this->session->userdata('satker_id'), 0, 2));
        return $this->db2->get()->result();
    }
}
