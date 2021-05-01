<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model(array('m_auth', 'm_flashdata', 'm_user','m_news'));
		setWIB();
	}

	public function index() {
		$data['title'] = 'Home';
		// $data['profile'] = $this->m_auth->get_session();
		$data['news_ordered'] = $this->m_news->get_time_desc();
		$this->load->view('templates/v_header', $data);
		$this->load->view('templates/v_topbar', $data);
		$this->load->view('main/v_home', $data);
		$this->load->view('templates/v_footer', $data);
	}

}
?>
