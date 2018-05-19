<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hit extends CI_Controller {

	public function index() {
		
		$data['title'] = 'Hit Counter';
		
		$data['hits'] = $this->Hit_model->get_hit();
		//print_r($data['video']);
		
		$this->load->view('member_area/templates/header');
		$this->load->view('hit/index', $data);
		$this->load->view('member_area/templates/footer');

	}

}
