<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model(['m_auth', 'm_flashdata', 'm_user', 'm_news']);
		setWIB();
	}

	public function index() {
		redirect('news/page/1');
	}

	public function page($page = 1) {
		$data['title'] = 'Berita';
		$data['subtitle'] = 'Semua Berita';

		$num_per_page = 2;
		$data['news'] = pagination($this->m_news->get_time_desc(), $num_per_page);
		$data['current_page'] = $page;
		$data['count_pages'] = ceil(count($data['news'])/$num_per_page);
		$data['status_prev'] = ''; $data['status_next'] = '';
		$data['prev'] = ''; $data['next'] = '';
		if($page == 1) {
			$data['status_prev'] = 'disabled';
			$data['next'] = 2;
		} else if($page == $data['count_pages']) {
			$data['status_next'] = 'disabled';
			$data['prev'] = $page - 1;
		} else {
			$data['prev'] = $page - 1;
			$data['next'] = $page + 1;
		}
		$data['news_ordered'] = $this->m_news->get_views_desc();
		$data['news_ordered_asc'] = $this->m_news->get_views_asc();
		$this->load->view('templates/v_header', $data);
		$this->load->view('templates/v_topbar');
		$this->load->view('main/v_news');
		$this->load->view('templates/v_footer');
	}

	public function details($random_str) {
		$data['news'] = $this->m_news->get_by_str($random_str);
		$views = $data['news']['views'];
		$views++;
		$this->m_news->update_views($random_str, $views);
		$data['news'] = $this->m_news->get_by_str($random_str);
		$data['title'] = $data['news']['title'];
		$data['news_ordered'] = $this->m_news->get_views_desc();
		$data['news_ordered_asc'] = $this->m_news->get_views_asc();
		$this->load->view('templates/v_header', $data);
		$this->load->view('templates/v_topbar');
		$this->load->view('main/v_news_details');
		$this->load->view('templates/v_footer');
	}

}
?>
