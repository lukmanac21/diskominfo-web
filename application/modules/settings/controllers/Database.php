<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Database extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Database_model', 'dm', true);
        $this->load->library('session');
        if (!$this->auth->isSuperAdministrator()) {
            access_denied();
        }
    }

    public function index()
    {
        $path = "./files/backup/";
        $data['file'] = directory_map($path);
        $this->layout->view('database', $data);
    }

    public function backup_db()
    {
        $this->load->dbutil();
        $filename = $this->db->database . '_' . date('Y-m-d_His') . '.sql';
        $prefs = array(
            'ignore' => array(),
            'format' => 'text',
            'add_drop' => TRUE,
            'add_insert' => TRUE,
            'newline' => "\n"
        );
        $backup = $this->dbutil->backup($prefs);
        $this->load->helper('file');
        write_file('./files/backup/' . $filename, $backup);
        $this->session->set_flashdata('status', ['status' => 'success', 'msg' => 'Berhasil membackup database']);
        redirect('backup');
    }

    public function restore_db()
    {
        if ($_FILES['restore']['name'] != null) {
            $fileName = $_FILES['restore']['name'];
            move_uploaded_file($_FILES['restore']['tmp_name'], './files/temp/' . $fileName);
            $file = file_get_contents('./files/temp/' . $fileName);
            $fileString = rtrim($file, '\n;');
            $fileArray = explode(';', $fileString);
            foreach ($fileArray as $query) {
                $trimQuery = trim($query);
                if (!empty($trimQuery)) {
                    $this->db->query($query);
                }
            }
            unlink('./files/temp/' . $fileName);
            $this->session->set_flashdata('status', ['status' => 'success', 'msg' => 'Berhasil restore database']);
            // success('Database Berhasil Direstore');
            redirect('database');
        } else {
            $this->session->set_flashdata('status', ['status' => 'erorr', 'msg' => 'gagal restore database']);
            // danger('Database Berhasil Direstore');
            redirect('backup');
        }
    }

    public function download_db($dbname)
    {
        $data = file_get_contents('./files/backup/' . $dbname);
        force_download($dbname, $data);
    }



    public function delete_db($dbname)
    {
        unlink('./files/backup/' . $dbname);
        $this->session->set_flashdata('status', ['status' => 'success', 'msg' => 'Berhasil hapus database']);
        redirect('backup');
    }
}
