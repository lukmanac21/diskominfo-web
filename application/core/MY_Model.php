<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class MY_Model extends CI_Model {

    function __construct() {

        parent::__construct();
    }

    function insert($table_name, $data_array) {
    	$this->db->insert($table_name, $data_array);
    	return $this->db->affected_rows();
    }

    function insert_batch($table_name, $data_array) {
    	$this->db->insert_batch($table_name, $data_array);
    	return $this->db->insert_id();
    }

    function update($table_name, $data_array, $index_array) {
    	$this->db->update($table_name, $data_array, $index_array);
    	return $this->db->affected_rows();
    }

    function delete($table_name, $index_array) {
        $this->db->delete($table_name, $index_array);
        return $this->db->affected_rows();
    }

    function get_single($table_name, $index_array, $columns = null) {
        if ($columns){
            $this->db->select($columns);
        }
        $this->db->order_by('id', 'desc');
        $this->db->limit(1);
        $row = $this->db->get_where($table_name, $index_array)->row();
        return $row;
    }

    function check_data($table_name, $index_array = null) {
        if ($index_array){
            $row = $this->db->get_where($table_name, $index_array)->num_rows();
        }else{
            $row = $this->db->get($table_name)->num_rows();
        }
        
        return $row;
    }
}