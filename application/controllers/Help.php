<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Help extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model(['m_auth', 'm_flashdata', 'm_user','m_news']);
		setWIB();
	}

	public function index() {
		$data['title'] = 'Pusat Bantuan';
		$data['news_ordered'] = $this->m_news->get_time_desc();
		$this->load->view('templates/v_header', $data);
		$this->load->view('templates/v_topbar', $data);
		$this->load->view('main/v_help', $data);
		$this->load->view('templates/v_footer', $data);
	}

}
?>
