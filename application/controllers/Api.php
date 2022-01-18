<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
use Restserver\Libraries\REST_Controller;

class Api extends REST_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('Api_model', 'am', true);
        $this->methods['users_get']['limit'] = 500; 
        $this->methods['users_post']['limit'] = 100;
        $this->methods['users_delete']['limit'] = 50;
    }

    public function index_get(){
        $this->get_data_get();  
    }

    public function get_data_get(){
        $key = $this->get('key');
        if($key == config_item('rest_key_name')){
            $data = $this->am->get_settings();
            if($data){
                $this->response($data, REST_Controller::HTTP_OK);
            }else{
                $this->response(['status' => FALSE, 'message' => 'NO DATA'], REST_Controller::HTTP_NOT_FOUND);
            }  
        }else{
            $this->response(['status' => FALSE, 'message' => 'INVALID API KEY'], REST_Controller::HTTP_BAD_REQUEST);
        }   
    }

    public function insert_data_post(){
        $key = $this->post('key');
        if($key == config_item('rest_key_name')){
            $this->set_response(['status' => TRUE, 'message' => 'INVALID API KEY'], REST_Controller::HTTP_CREATED);
        }else{
            $this->response(['status' => FALSE, 'message' => 'INVALID API KEY'], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function delete_data_delete(){
        $key = $this->delete('key');
        if($key == config_item('rest_key_name')){
            $id = $this->delete('id');
            if (empty($id)){
                $this->response(['status' => FALSE, 'message' => 'BAD REQUEST'], REST_Controller::HTTP_BAD_REQUEST); 
            }else{
                $this->set_response(['status' => TRUE,'message' => 'SUCCESS'], REST_Controller::HTTP_OK);
            }            
        }else{
            $this->response(['status' => FALSE, 'message' => 'INVALID API KEY'], REST_Controller::HTTP_BAD_REQUEST);
        }
        
    }

    public function update_data_put(){
        $key = $this->put('key');
        if($key == config_item('rest_key_name')){
            $id = $this->put('id');
            $data = array('name' => 'asd', 'email' => 'email');
            if (empty($id)){
                $this->response(['status' => FALSE, 'message' => 'BAD REQUEST'], REST_Controller::HTTP_BAD_REQUEST); 
            }else{
                $this->set_response(['status' => TRUE,'message' => 'SUCCESS'], REST_Controller::HTTP_OK);
            }            
        }else{
            $this->response(['status' => FALSE, 'message' => 'INVALID API KEY'], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}