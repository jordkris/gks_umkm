<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Example extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model(['m_auth', 'm_flashdata', 'm_user']);
		setWIB();
	}

	public function index() {
		// $data['title'] = 'Produk';
		// $data['profile'] = $this->m_auth->get_session();
		// $this->load->view('templates/v_header', $data);
		// $this->load->view('templates/v_topbar', $data);
		// $this->load->view('main/v_product', $data);
		$this->load->view('example/v_example1');
	}

	public function two() {
		// $data['title'] = 'Produk';
		// $data['profile'] = $this->m_auth->get_session();
		// $this->load->view('templates/v_header', $data);
		// $this->load->view('templates/v_topbar', $data);
		// $this->load->view('main/v_product', $data);
		$this->load->view('example/v_example2');
	}

	public function twoo() {
		// $data['title'] = 'Produk';
		// $data['profile'] = $this->m_auth->get_session();
		// $this->load->view('templates/v_header', $data);
		// $this->load->view('templates/v_topbar', $data);
		// $this->load->view('main/v_product', $data);
		$this->load->view('example/v_example2-2');
	}

	public function three() {
		// $data['title'] = 'Produk';
		// $data['profile'] = $this->m_auth->get_session();
		// $this->load->view('templates/v_header', $data);
		// $this->load->view('templates/v_topbar', $data);
		// $this->load->view('main/v_product', $data);
		$this->load->view('example/v_example3');
	}
}
?>
