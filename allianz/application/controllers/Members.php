<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Members extends CI_Controller {

	public function index() {
		
		$data['title'] = 'Manage Profile';
		
		$data['agent'] = $this->Member_model->get_profile();
		//print_r($data['agent']);
		$slug = $this->session->userdata('username');
		$data['personal'] = $this->Agent_model->get_personal($slug);
		//print_r($data['personal']);
		
		$this->load->view('member_area/templates/header');
		$this->load->view('member_area/index', $data);
		$this->load->view('member_area/templates/footer');

	}

	public function update_profile() {

		$data['title'] = 'Manage Profile';

		$this->form_validation->set_rules('name', 'Full name', 'trim|required|min_length[3]|max_length[100]');
		$this->form_validation->set_rules('polis_no', 'Polis Number', 'trim|required|min_length[2]|max_length[50]');
		$this->form_validation->set_rules('email','Email Address','trim|required|valid_email');
		$this->form_validation->set_rules('phone', 'Phone Number', 'trim|required|min_length[6]|max_length[20]');

		if($this->form_validation->run() === FALSE) {


			$data['agent'] = $this->Member_model->get_profile();

			$this->load->view('member_area/templates/header');
			$this->load->view('member_area/index', $data);
			$this->load->view('member_area/templates/footer');
		
		} else {

			$config['upload_path']          = './assets/agents/';
            $config['allowed_types']        = 'gif|jpg|jpeg|png';
            $config['max_size']             = 2048;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;
            $config['file_ext_tolower']		= TRUE;
            $config['remove_spaces']		= TRUE;
            $config['detect_mime']			= TRUE;
            $config['encrypt_name']			= TRUE;
           
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('userfile')) {
                
                $errors = array('error' => $this->upload->display_errors());
                $post_image = $this->input->post('image');

            }else{
               
            	$data = array('upload_data' => $this->upload->data());
              	$post_image = $this->upload->data('file_name');

            }

			$this->Member_model->update_profile($post_image);
			
			redirect('member');
		
		}
	
	}

	public function password() {
		
		$data['title'] = 'Change Password';
		
		$this->load->view('member_area/templates/header');
		$this->load->view('member_area/password', $data);
		$this->load->view('member_area/templates/footer');

	}

	public function update_password() {

		$data['title'] = 'Change Password';
		$data['agent'] = $this->Member_model->get_profile();

		$this->form_validation->set_rules('old', 'Old Password', 'trim|required|min_length[8]|max_length[100]');
		$this->form_validation->set_rules('password', 'New Password', 'trim|required|min_length[8]|max_length[100]');
		$this->form_validation->set_rules('repass', 'Retype Password', 'trim|required|matches[password]');
		
		if($this->form_validation->run() === FALSE){

			$this->load->view('member_area/templates/header');
			$this->load->view('member_area/password', $data);
			$this->load->view('member_area/templates/footer');

		}
		
		if($data['agent']['real_password'] != $this->input->post('old')){
			
			redirect('password');
		
		} else {

			$data['password'] = $this->Member_model->update_password();

			redirect('password');

		}

	}

	public function update_personal() {

		$config['upload_path']          = './assets/personals/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['max_size']             = 2048;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
        $config['file_ext_tolower']		= TRUE;
        $config['remove_spaces']		= TRUE;
        $config['detect_mime']			= TRUE;
        $config['encrypt_name']			= TRUE;	

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
                
            $errors = array('error' => $this->upload->display_errors());
            $post_image = $this->input->post('image');

        }else{
               
          	$data = array('upload_data' => $this->upload->data());
           	$post_image = $this->upload->data('file_name');

        }

		$this->Agent_model->update_personal($post_image);
		
		redirect('member');
	}

	public function mypage() {

		$slug  = $_SESSION['username'];

		$data['title_agent'] = "Business";
	
		$data['agent'] = $this->Agent_model->get_agent($slug);
	
		if(empty($data['agent'])) {
			redirect('member');
			
		}

		$data['title'] = "My Page";

		#Posts Section
		$data['title_post'] = 'Latest Posts';
		$slug = FALSE;
		$section = "b";
		$data['posts'] = $this->Post_model->get_posts($slug, $section);
		//print_r($data['posts']);
		
		$data['title_video'] = 'Latest Video';
		$data['video'] = $this->Video_model->get_video();
		//print_r($data['video']);

		#Posts Section
		$slug = $this->session->userdata('username');
		$data['personal'] = $this->Agent_model->get_personal($slug);
		//print_r($data['posts']);

		$this->load->view('member_area/templates/header');
		$this->load->view('member_area/mypage', $data);
		$this->load->view('member_area/templates/footer');
		
	}


	public function logout() {

		$this->session->sess_destroy();
		
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('name');
		$this->session->unset_userdata('polis_no');
		$this->session->unset_userdata('phone');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role');
		$this->session->unset_userdata('valid');
		$this->session->unset_userdata('phone');
		$this->session->unset_userdata('logged_in');

		redirect('','refresh');
	}

}
