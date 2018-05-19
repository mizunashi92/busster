<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class About extends CI_Controller {
	public function index() {
		
		
		$data['title'] = 'About';
		$slug  = $this->uri->segment(2);
		$url = current_url();
		
		$data['title_agent'] = "Profile";
		$data['agent'] = $this->Agent_model->get_agent($slug);
	
		if(empty($data['agent'])) {
			redirect('');
		}
		$data['title'] = "Home";
		$data['username'] = $slug;
		#Posts Section
		$slug = FALSE;
		$section = 'p';
		//$data['title_post'] = 'Latest Posts';
		//$data['posts'] = $this->Post_model->get_posts($slug,$section);
		//print_r($data['posts']);
		
		//$data['title_video'] = 'Latest Video';
		//$data['video'] = $this->Video_model->get_video();
		//print_r($data['video']);
		#Posts Section
		//$data['title_post'] = 'Personal Articles';
		//$slug = $this->session->userdata('username');

		$data['personal'] = $this->Agent_model->get_personal($slug);
		
		$this->load->view('templates/header');
		$this->load->view('about/index',$data);
		$this->load->view('templates/footer');
	}
}