<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Post_model extends CI_Model{

		public function __construct() {
			
			$this->load->database();

		}

		public function get_posts($slug = FALSE,$section) {

			if($slug === FALSE) {

				$this->db->order_by('id', 'DESC');
				$query = $this->db->get_where('posts', array('section' => $section));
				return $query->result_array();

			}

			$query = $this->db->get_where('posts', array('slug' => $slug));

			return $query->row_array();
		}

		public function create_post($post_image) {

			$slug = url_title($this->input->post('title'));

			$data = array(
					'title' => $this->input->post('title'),
					'slug' => $slug,
					'body' => $this->input->post('body'),
					'section' => $this->input->post('section'),
					'image' => $post_image,
					'created_by' => $this->session->userdata('name')
				);

			return $this->db->insert('posts', $data);

		}

		public function delete_post($id) {

			$this->db->where('id', $id);
			$this->db->delete('posts');

			return true;

		}

		public function update_post($post_image) {

			$slug = url_title($this->input->post('title'));

			$data = array(
					'title' => $this->input->post('title'),
					'slug' => $slug,
					'body' => $this->input->post('body'),
					'section' => $this->input->post('section'),
					'image' => $post_image,
					'created_by' => $this->session->userdata('name')
				);

			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('posts', $data);
		}
		
		public function update_counter_product($slug,$ip,$url) {
				
				$data = array(
					'slug' => $slug,
					'url' => $url,
					'ip' => $ip
				);

				return $this->db->insert('hit_stat', $data);
		} 

	}