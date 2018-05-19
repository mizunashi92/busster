<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agents extends CI_Controller {

	public function sign_in() {

		$this->form_validation->set_rules('username','Username','trim|required|min_length[8]|max_length[50]');
		$this->form_validation->set_rules('password','Password','trim|required|min_length[8]|max_length[100]');

		if($this->form_validation->run() == FALSE){

			redirect('');

		}else{

			$password = $this->input->input_stream('password',TRUE);
			$username    = $this->input->input_stream('username',TRUE);
			$password = $this->security->xss_clean($password);
			$username    = $this->security->xss_clean($username);


			if($agent = $this->Agent_model->validate($username)){
				
				$this->load->library('encryption_code');
				$verify = $this->encryption_code->hash_verify($password, $agent['password']);

				if($verify) {

					$session = array('id'  => $agent['id'],
									 'username'  => $agent['username'],
									 'name'  => $agent['name'],
							         'polis_no'  => $agent['polis_no'],
							         'phone'  => $agent['phone'],
							         'image'  => $agent['image'],
							         'email'  => $agent['email'],
							         'role'  => $agent['role'],
							         'valid'  => $agent['valid'],
							         'logged_in' => TRUE);

					switch($agent['role']){

						case 1:
							$this->session->set_userdata($session);
							redirect('member');
						break;

						case 0:
							$this->session->set_userdata($session);
							redirect('member');
						break;

						default:
							redirect('');
					}

				}else{

					redirect('');

				}
				

			}else{

				redirect('');

			}

		}

	}

	public function sign_up() {

		$data['title'] = 'Sign up!';

		$this->load->view('templates/header');
		$this->load->view('agents/sign_up',$data);
		$this->load->view('templates/footer');
	
	}

	public function validation_signup() {

		$data['title'] = 'Sign up!';

		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[8]|max_length[50]|is_unique[agents.username]');
		$this->form_validation->set_rules('name', 'Full name', 'trim|required|min_length[3]|max_length[100]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|max_length[100]');
		$this->form_validation->set_rules('repass', 'Retype Password', 'trim|required|matches[password]');
		$this->form_validation->set_rules('polis_no', 'Polis Number', 'trim|required|min_length[2]|max_length[50]|is_unique[agents.polis_no]');
		$this->form_validation->set_rules('email','Email Address','trim|required|valid_email|is_unique[agents.email]');
		$this->form_validation->set_rules('phone', 'Phone Number', 'trim|required|min_length[6]|max_length[20]');


		if($this->form_validation->run() === FALSE){

			$this->load->view('templates/header');
			$this->load->view('agents/sign_up',$data);
			$this->load->view('templates/footer');
		
		}else {

			$this->Agent_model->signup_agent();
			redirect('signup');

		}

	}

	public function forgot() {

		$data['title'] = 'Forgot Password';

		$this->load->view('templates/header');
		$this->load->view('agents/forgot',$data);
		$this->load->view('templates/footer');
	
	}

	public function validation_forgot() {

		$data['title'] = 'Forgot Password';

		$this->form_validation->set_rules('email','Email Address','trim|required|valid_email');

		if($this->form_validation->run() === FALSE) {

			$this->load->view('templates/header');
			$this->load->view('agents/forgot',$data);
			$this->load->view('templates/footer');

		}else{

			$agent = $this->Agent_model->forgot_password();
			
			if(empty($agent['email'])) {
				redirect('forgot',$data);
			}
			
			$this->load->library('email');
			$this->email->from('Team Development','<no-reply@team.development');
			$this->email->to($row->email);
			$this->email->subject('Forgot password');
			$this->email->message('Hi '. $agent['username'] .'

Your password here: 
'
. $agent['real_password'].'

Development Team
'
				);

				$this->email->send();

				redirect('forgot');
		}
			
	}

}