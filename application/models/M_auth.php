<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model {

	public function set_session($id, $is_active, $password) {
		$data = [
			'id' => $id,
			'is_active' => $is_active,
			'password' => $password
		];
		$this->session->set_userdata($data);
	}

	public function unset_all_sessions() {
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('is_active');
		$this->session->unset_userdata('password');
		shell_exec('rmdir /s "'.APPPATH.'cache\session" /q');
	}

	public function get_session() {
		return $this->db->get_where('users', ['id' => $this->session->userdata('id')])->row_array();
	}

	public function get_session_password() {
		return $this->session->userdata('password');
	}
}

?>