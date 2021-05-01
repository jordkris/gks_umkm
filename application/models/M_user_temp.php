<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user_temp extends CI_Model {

	public function add($data) {
		$this->db->insert('users_temp', $data);
	}

	public function get($id) {
		return $this->db->get_where('users_temp', ['id' => $id])->row_array();
	}

	public function delete($id) {
		$this->db->delete('users_temp', ['id' => $id]);
	}

	public function get_u($username) {
		return $this->db->get_where('users_temp', ['username' => $username])->row_array();
	}

	public function get_all() {
		return $this->db->get('users_temp')->result_array();
	}

	public function count_all() {
	    return $this->db->get('users_temp')->num_rows();
	}

	public function get_role($role_id) {
		return $this->db->get_where('user_role',['id' => $role_id])->row_array();
	}

	public function get_all_role() {
		return $this->db->get('user_role')->result_array();
	}

	public function set_ava($id_user, $photo) {
		$this->db->set('foto', $photo);
		$this->db->where('id', $id_user);
		$this->db->update('users_temp');
	}

	public function set_activation($num, $id_user) {
		$this->db->set('is_active', $num);
		$this->db->where('id', $id_user);
		$this->db->update('users_temp');
	}

	public function update_all($id_user, $new_data) {
		$this->db->set('name', $new_data['name']);
		$this->db->set('nib', $new_data['nib']);
		$this->db->set('product_name', $new_data['product_name']);
		$this->db->set('rw', $new_data['rw']);
		$this->db->set('rt', $new_data['rt']);
		$this->db->where('id', $id_user);
		$this->db->update('users_temp');
	}

	public function get_product_owner($username) {
		return $this->db->get_where('users_temp', ['username' => $username])->row_array();
	}

	public function update_password($id_user, $password) {
		$this->db->set('password', $password);
		$this->db->where('id', $id_user);
		$this->db->update('users_temp');
	}

	public function update_photo($id_user, $photo) {
		$this->db->set('photo', $photo);
		$this->db->where('id', $id_user);
		$this->db->update('users_temp');
	}

	public function update_cover_photo($id_user, $photo) {
		$this->db->set('cover', $photo);
		$this->db->where('id', $id_user);
		$this->db->update('users_temp');
	}

	public function set_active_time($id_user) {
		$this->db->set('active_time', time());
		$this->db->where('username', $id_user);
		$this->db->update('users_temp');
	}
}

?>