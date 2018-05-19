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
		$this->form_validation->set_rules('fname','Nama Lengkap','trim|min_length[2]|max_length[255]');
		$this->form_validation->set_rules('bdate','Tanggal Lahir','trim');
		$this->form_validation->set_rules('gender','Jenis Kelamin','trim');
		$this->form_validation->set_rules('occ','Pekerjaan','trim|');
		$this->form_validation->set_rules('smoker','Perokok','trim');
		$this->form_validation->set_rules('pplan','Sistem Pembayaran','trim');
		$this->form_validation->set_rules('amount','Jumlah Pembayaran','trim');
		$this->form_validation->set_rules('aplan','Asuransi Tambahan','trim');
		$this->form_validation->set_rules('phone','Nomor HP','trim');
		$this->form_validation->set_rules('email','Email','trim|valid_email');
		$this->form_validation->set_rules('sid','ID Sosial Media','trim');
		$this->form_validation->set_rules('stype','Tipe Sosial Media','trim');
		$this->form_validation->set_rules('city','Kota','trim');
		$this->form_validation->set_rules('zcode','Zip Code','trim');
		$this->form_validation->set_rules('iimpor','Pentingnya Asuransi','trim');
		$this->form_validation->set_rules('will','Asuransi TAPRO','trim');

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
				$this->Contact_model->insert();
				$this->load->library('email');
$body = "
Nama Lengkap  			 			:" .$this->input->fname ."
Tanggal Lahir 			 			:" .$this->input->bdate ."
Jenis Lengkap 			 			:" .$this->input->gender ."
Pekerjaan     			 			:" .$this->input->occ ."
Perokok 	  			 			:" .$this->input->smoker ."
Rencana Sistem Pembayaran Premi 	:" .$this->input->pplan ."
Rencana Jumlah Premi yang dibayar	:" .$this->input->amount ."
Asuransi Tambahan 					:" .$this->input->aplan ."
No Hp atau WA 						:" .$this->input->phone ."
Email 								:" .$this->input->email ."
ID Sosial Media 					:" .$this->input->sid ."
Tipe Sosial Media 					:" .$this->input->stype ."
Kota 								:" .$this->input->city ."
Kota 								:" .$this->input->zcode ."
Seberapa penting asuransi 			:" .$this->input->iimpor ."
Pengajuan asuransi TAPRO 			:" .$this->input->will 
;

				$this->email->from($this->input->post('fname'),'<'.$this->input->post('email').'>');
				$this->email->to($row['email']);
				$this->email->subject($this->input->post('subject'));
				$this->email->message($body);
				$this->email->send();
				redirect($pages);
			
			}else{
				redirect($pages);
			}
		}
	
	}
}