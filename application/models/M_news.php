<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_news extends CI_Model {

	public function add_photo($data) {
		$this->db->insert('news', $data);
	}

	public function get_by_str($str) {
		return $this->db->get_where('news', ['random_str' => $str])->row_array();
	}

	public function get_all() {
		$this->db->order_by('id','ASC');
		return $this->db->get('news')->result_array();
	}

	public function get_views_asc() {
		$this->db->order_by('id', 'ASC');
		return $this->db->get('news')->result_array();	
	}

	public function get_views_desc() {
		$this->db->order_by('views', 'DESC');
		return $this->db->get('news')->result_array();	
	}

	public function get_time_desc() {
		$this->db->order_by('id', 'DESC');
		return $this->db->get('news')->result_array();	
	}

	public function add_current_news($random_str, $new_data) {
		$this->db->set('title', $new_data['title']);
		$this->db->set('image_caption', $new_data['image_caption']);
		$this->db->set('main', $new_data['main']);
		$this->db->set('author', $new_data['author']);
		$this->db->set('date_created', $new_data['date_created']);
		$this->db->where('random_str',$random_str);
		$this->db->update('news');
	}

	public function delete($str) {
		$news = $this->m_news->get_by_str($str);
		//delete photo
		$fullpath = './assets/img/news/'.$news['image'];
    	if (!unlink($fullpath)) {
		  $this->m_flashdata->set('danger', 'Logo gagal dihapus! '.$fullpath);
		  redirect('admin/news/1');
			}
    	//delete from db
    	$this->db->delete('news', ['random_str' => $str]);
	}

	public function update_views($random_str, $new_views) {
		$this->db->set('views', $new_views);
		$this->db->where('random_str', $random_str);
		$this->db->update('news');
	}


}

?>