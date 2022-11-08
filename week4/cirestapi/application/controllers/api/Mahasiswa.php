<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Mahasiswa extends REST_Controller {
    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->model('MahasiswaModel', 'model');
    }

    public function index_get() {
        $data = $this->model->getMahasiswa();
        $this->set_response([
            'status' => TRUE,
            'code' => 200,
            'message'=> 'Success',
            'data'   => $data ,
            ], REST_Controller::HTTP_OK);
    }

    public function sendmail_post()
    {
		$from_email = 'felix@tes.bryanmembosankan.my.id';
        $to_email = $this->post('email');
        $this->load->library('email');
        $this->email->from($from_email, "Felix");
        $this->email->to($to_email);
        $this->email->subject('Verify Your Account');
        $this->email->message('Verify your email by click this link https://tes.bryanmembosankan.my.id/felix/cirestapi/');

		if($this->email->send()){
			$this->set_response([
				'status' => TRUE,
				'code' => 200,
                'message'=> 'Success'
                 ], REST_Controller::HTTP_OK);
        } else {
			$this->set_response([
				'status' => FALSE,
				'code' => 404,
				'message'=> 'Failed'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}
}
