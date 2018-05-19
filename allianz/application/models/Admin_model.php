<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Admin_model extends CI_Model{

		public function __construct() {
			
			$this->load->database();

		}

		public function get_users($id = FALSE) {

			if($id === FALSE) {

				$this->db->order_by('id', 'DESC');
				$query = $this->db->get_where('agents',array('valid' => '0'));
				return $query->result_array();

			}

			$query = $this->db->get_where('agents', array('id' => $id));

			return $query->row_array();
		}

		public function get_profile($id) {

			$agent = $this->db->get_where('agents',array('id' => $id));

			return $agent->row_array();

		}	

		public function accept_users($username) {

			$personal = array('created_by' => $username);
			$this->db->insert('personal',$personal);
			$this->db->insert('personal',$personal);
			
			$data = array(
					'valid' => '1'
				);

			$this->db->where('username', $username);
			return $this->db->update('agents', $data);
		}
		
		public function reject_users($id) {

			$this->db->where('id', $id);
			$this->db->delete('agents');

			return true;

		}

	}