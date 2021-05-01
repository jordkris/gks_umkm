<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model(['m_auth', 'm_flashdata', 'm_user','m_extra']);
		setWIB();
	}

	public function index() {
		$data['title'] = 'Tentang';
		$data['about'] = $this->m_extra->get_about();
		$this->load->view('templates/v_header', $data);
		$this->load->view('templates/v_topbar', $data);
		$this->load->view('main/v_about', $data);
		$this->load->view('templates/v_footer', $data);
	}

}
?>
