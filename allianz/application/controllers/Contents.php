<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contents extends CI_Controller {

	public function index() {
		
		$data['title'] = 'CMS';

		$this->load->view('templates/header');
		$this->load->view('contents/index', $data);
		$this->load->view('templates/footer');

	}

}
