<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Productpage extends CI_Controller {
	public function index() {
		#Posts Section
		$section = "p";
		$slug = FALSE;
		//$data['title_post'] = 'Latest Products';
		$data['posts'] = $this->Post_model->get_posts($slug,$section);
		//print_r($data['posts']);
		
		$this->load->view('templates/header');
		$this->load->view('product/index', $data);
		$this->load->view('templates/footer');
		
	}
}