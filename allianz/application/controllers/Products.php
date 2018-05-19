<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

	public function index() {

		$data['title'] = "Products";

		#Posts Section
		$section = "p";
		$slug = FALSE;
		$data['title_post'] = 'Latest Products';
		$data['posts'] = $this->Post_model->get_posts($slug,$section);
		//print_r($data['posts']);
		
		$this->load->view('member_area/templates/header');
		$this->load->view('member_area/products', $data);
		$this->load->view('member_area/templates/footer');
		
	}

}