<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index() {

		$data['title'] = 'User Verification';

		$data['users'] = $this->Admin_model->get_users();

		$this->load->view('member_area/templates/header');
		$this->load->view('member_area/valid', $data);
		$this->load->view('member_area/templates/footer');
	
	}

	public function view($slug = NULL) {

		$data['agent'] = $this->Admin_model->get_profile($slug);
		//print_r($data['posts']);

		if(empty($data['agent'])) {
			show_404();
		}

		$data['title'] = $data['agent']['name'];

		$this->load->view('member_area/templates/header');
		$this->load->view('member_area/user', $data);
		$this->load->view('member_area/templates/footer');

	}

	public function accept($username) {

		$this->Admin_model->accept_users($username);
		redirect('users');
			
	}

	public function reject($id) {

		$this->Admin_model->reject_users($id);
		redirect('users');
			
	}
}