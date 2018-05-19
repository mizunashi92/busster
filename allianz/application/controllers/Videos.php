<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Videos extends CI_Controller {

	public function index() {
		
		$data['title'] = 'Update Video';
		
		$data['video'] = $this->Video_model->get_video();
		//print_r($data['video']);
		
		$this->load->view('member_area/templates/header');
		$this->load->view('videos/index', $data);
		$this->load->view('member_area/templates/footer');

	}

	public function update() {

		$this->Video_model->update_video();
		redirect('videos');

	}
}
