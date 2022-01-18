<?php 

class post_model extends CI_Model
{
    function get_content($id){
        $this->db->select('kn.*, kt.name');
        $this->db->from('konten kn');
        $this->db->join('kategori_konten kt','kn.kategori_id = kt.id');
        $this->db->where('kn.kategori_id',$id);
        $this->db->order_by('kn.date', 'DESC');
        $this->db->limit(3);
        return $this->db->get()->result();
    }
    function get_portal($id){
        $this->db->select('*');
        $this->db->from('portal');
        $this->db->where('kategori_id',$id);
        return $this->db->get()->result();
    }
    function get_galeri(){
        $this->db->select('kn.*, kt.name');
        $this->db->from('konten kn');
        $this->db->join('kategori_galeri kt','kn.kategori_id = kt.id');
        $this->db->where('kn.kategori_id',$id);
        $this->db->order_by('kn.date', 'DESC');
        return $this->db->get()->result();
    }
    function get_setting(){
        $this->db->select('*');
        $this->db->from('settings');
        return $this->db->get()->row_array();
    }
    function get_visimisi(){
        $this->db->select('*');
        $this->db->from('visimisi');
        return $this->db->get()->result();
    }
    function get_struktur(){
        $this->db->select('*');
        $this->db->from('struktur');
        return $this->db->get()->result();
    }
    function get_sosialmedia(){
        $this->db->select('*');
        $this->db->from('sosialmedia');
        return $this->db->get()->result();
    }
    function get_tupoksi(){
        $this->db->select('*');
        $this->db->from('tupoksi');
        return $this->db->get()->result();
    }
    function get_slider(){
        $this->db->select('*');
        $this->db->from('slider');
        $this->db->where('is_active',1);
        return $this->db->get()->result();
    }
    function get_tentang(){
        $this->db->select('*');
        $this->db->from('about');
        return $this->db->get()->row_array();
    }


    public function getPengunjungHariIni(){
        $ip    = $this->input->ip_address(); // Mendapatkan IP user
        $date  = date("Y-m-d"); // Mendapatkan tanggal sekarang
        $waktu = time(); //
        $timeinsert = date("Y-m-d H:i:s");
          
        // Cek berdasarkan IP, apakah user sudah pernah mengakses hari ini
        $s = $this->db->query("SELECT * FROM visitor WHERE ip='".$ip."' AND date='".$date."'")->num_rows();
        $ss = isset($s)?($s):0;
          
         
        // Kalau belum ada, simpan data user tersebut ke database
        if($ss == 0){
        $this->db->query("INSERT INTO visitor(ip, date, hits, online, time) VALUES('".$ip."','".$date."','1','".$waktu."','".$timeinsert."')");
        }
         
        // Jika sudah ada, update
        else{
        $this->db->query("UPDATE visitor SET hits=hits+1, online='".$waktu."' WHERE ip='".$ip."' AND date='".$date."'");
        }
        $pengunjunghariini  = $this->db->query("SELECT * FROM visitor WHERE date='".$date."' GROUP BY ip")->num_rows(); // Hitung jumlah pengunjung
        return $pengunjunghariini;
    }
    public function getTotalPengunjung(){
        $ip    = $this->input->ip_address(); // Mendapatkan IP user
        $date  = date("Y-m-d"); // Mendapatkan tanggal sekarang
        $waktu = time(); //
        $timeinsert = date("Y-m-d H:i:s");
          
        // Cek berdasarkan IP, apakah user sudah pernah mengakses hari ini
        $s = $this->db->query("SELECT * FROM visitor WHERE ip='".$ip."' AND date='".$date."'")->num_rows();
        $ss = isset($s)?($s):0;
          
         
        // Kalau belum ada, simpan data user tersebut ke database
        if($ss == 0){
        $this->db->query("INSERT INTO visitor(ip, date, hits, online, time) VALUES('".$ip."','".$date."','1','".$waktu."','".$timeinsert."')");
        }
         
        // Jika sudah ada, update
        else{
        $this->db->query("UPDATE visitor SET hits=hits+1, online='".$waktu."' WHERE ip='".$ip."' AND date='".$date."'");
        }
        $dbpengunjung = $this->db->query("SELECT COUNT(hits) as hits FROM visitor")->row(); 
         
        $totalpengunjung = isset($dbpengunjung->hits)?($dbpengunjung->hits):0; // hitung total pengunjung
         return $totalpengunjung;
    }

    public function getPengunjungOnline(){
        $ip    = $this->input->ip_address(); // Mendapatkan IP user
        $date  = date("Y-m-d"); // Mendapatkan tanggal sekarang
        $waktu = time(); //
        $timeinsert = date("Y-m-d H:i:s");
          
        // Cek berdasarkan IP, apakah user sudah pernah mengakses hari ini
        $s = $this->db->query("SELECT * FROM visitor WHERE ip='".$ip."' AND date='".$date."'")->num_rows();
        $ss = isset($s)?($s):0;
          
         
        // Kalau belum ada, simpan data user tersebut ke database
        if($ss == 0){
        $this->db->query("INSERT INTO visitor(ip, date, hits, online, time) VALUES('".$ip."','".$date."','1','".$waktu."','".$timeinsert."')");
        }
         
        // Jika sudah ada, update
        else{
        $this->db->query("UPDATE visitor SET hits=hits+1, online='".$waktu."' WHERE ip='".$ip."' AND date='".$date."'");
        }
        $bataswaktu = time() - 300;
         
        $pengunjungonline  = $this->db->query("SELECT * FROM visitor WHERE online > '".$bataswaktu."'")->num_rows(); // hitung pengunjung online
        return $pengunjungonline;
    }
    

}