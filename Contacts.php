<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contacts extends CI_Controller {

	public function index() {
		
		$data['title'] = 'Contact';
		
		$this->load->view('templates/header');
		$this->load->view('contacts/index', $data);
		$this->load->view('templates/footer');

	}

	public function send() {
		$this->form_validation->set_rules('fname','FName','trim|required|min_length[2]|max_length[50]');
		$this->form_validation->set_rules('subject','Subject','trim|required|min_length[2]');
		$this->form_validation->set_rules('body','Body','trim|required|min_length[2]');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');

		$to = $this->input->post('to');
		if($to == "" or $to == "contact") {
			$pages = 'contact'; 
		}else{
			$pages = 'contact/'.$to;
		}

		if($this->form_validation->run() == FALSE) {

			redirect($pages);

		}else{

			if($row = $this->Agent_model->verify_agent()){
				//print_r($row['email']);
				$this->load->library('email');
				$this->email->from($this->input->post('fname').' '.$this->input->post('lname'),'<'.$this->input->post('email').'>');
				$this->email->to($row['email']);
				$this->email->subject($this->input->post('subject'));
				$this->email->message($this->input->post('body'));

				$this->email->send();

				redirect($pages);
			
			}else{
				redirect($pages);
			}

		}
	
	}

}
