<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Mahasiwa extends REST_Controller{
    function __construct($config = 'rest'){
        parent::__construct($config);
        $this->load->model('Mahasiswamodel', 'model');
    }

    public function index_get(){
        $data = $this->model->getMahasiswa();
        var_dump(json_encode($data));
    }

}