<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_extra extends CI_Model {
	public function randomStr() {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < 32; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	} 
	
	public function get_about() {
		return $this->db->get_where('about',['id' => 1])->row_array();
	}

	public function update_about($id, $new_data) {
		$this->db->set('left_title', $new_data['left_title']);
		$this->db->set('right_title', $new_data['right_title']);
		$this->db->set('left_main', $new_data['left_main']);
		$this->db->set('right_main', $new_data['right_main']);
		$this->db->where('id',$id);
		$this->db->update('about');
	}

	public function get_feedback() {
		return $this->db->get('feedback')->result_array();
	}

	public function add_feedback($data) {
		$this->db->insert('feedback', $data);
	}
}

?>