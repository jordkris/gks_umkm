<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model(['m_auth', 'm_flashdata', 'm_user']);
		setWIB();
		is_logged_in();
	}

	
}
?>
