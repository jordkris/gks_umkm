<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_flashdata extends CI_Model {
	public function set($color, $description) {
		if($color == 'success') {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="fas fa-exclamation-circle"></i> '.$description.'<button type="button" class="close" data-dismiss="alert" aria-label="close" style="position: sticky;"><span aria-hidden="true">&times;</span></button></div>');
		} else if($color == 'warning') {
			$this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert"><i class="fas fa-exclamation-circle"></i> '.$description.'<button type="button" class="close" data-dismiss="alert" aria-label="close" style="position: sticky;"><span aria-hidden="true">&times;</span></button></div>');
		} else if ($color == 'danger') {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="fas fa-exclamation-circle"></i> '.$description.'<button type="button" class="close" data-dismiss="alert" aria-label="close" style="position: sticky;"><span aria-hidden="true">&times;</span></button></div>');
		}
	}

	public function set_custom($var, $value) {
		$this->session->set_flashdata($var, $value);
	}
}
?>