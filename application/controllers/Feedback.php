<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model(['m_auth', 'm_flashdata', 'm_user', 'm_extra','m_news']);
		setWIB();
	}

	public function index() {
		$data['title'] = 'Feedback';
		// $data['profile'] = $this->m_auth->get_session();
		$data['news_ordered'] = $this->m_news->get_time_desc();
		$this->load->view('templates/v_header', $data);
		$this->load->view('templates/v_topbar', $data);
		$this->load->view('main/v_feedback', $data);
		$this->load->view('templates/v_footer', $data);
	}

	public function add() {
		$new_data = [
			'name' => $this->input->post('name'),
			'main' => $this->input->post('main'),
			'contact' => $this->input->post('contact')
		];
		$this->m_extra->add_feedback($new_data);
		$this->m_flashdata->set('success', 'Feedback berhasil ditambahkan, terima kasih atas waktunya!');
		redirect('feedback');
	}
}
?>
