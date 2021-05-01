<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model(['m_auth', 'm_flashdata', 'm_user', 'm_product', 'm_news']);
		setWIB();
	}

	public function index() {
		redirect('product/page/1');
	}

	public function page($page = 1) {
		$data['title'] = 'Produk';
		$data['subtitle'] = 'Semua Produk';
		$data['product_category'] = $this->m_product->get_all_category();
		$data['users'] = $this->m_user->get_all();
		$data['product_photo'] = $this->m_product->get_all_photo();
		//custom
		$num_per_page = 3;
		$data['product'] = pagination($this->m_product->get_all(), $num_per_page);
		$data['current_page'] = $page;
		$data['count_pages'] = ceil(count($data['product'])/$num_per_page);
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
		$data['news_ordered'] = $this->m_news->get_time_desc();
		$this->load->view('templates/v_header', $data);
		$this->load->view('templates/v_topbar');
		$this->load->view('main/v_product');
		$this->load->view('templates/v_footer');
	}

	public function show_product($id) {
		// $data['title'] = 'Produk';
		$data['product_category'] = $this->m_product->get_all_category();
		$data['users'] = $this->m_user->get_all();
		$data['product'] = $this->m_product->get_all();
		$data['product_photo'] = $this->m_product->get_all_photo();
		$data['id_product'] = $id;
		$this->load->view('templates/v_header', $data);
		// $this->load->view('templates/v_topbar');
		$this->load->view('main/v_product_grid', $data);
		// $this->load->view('templates/v_footer');
	}

	public function owner($username) {
		$product_owner = $this->m_user->get_product_owner($username);
		$data['id_owner'] = $product_owner['id'];
		$data['title'] = 'Produk '.$product_owner['name'];
		$data['subtitle'] = $product_owner['name'];
		$data['product_category'] = $this->m_product->get_all_category();
		$data['users'] = $this->m_user->get_all();
		$data['product'] = $this->m_product->get_all();
		$data['product_photo'] = $this->m_product->get_all_photo();
		$data['news_ordered'] = $this->m_news->get_views_asc();
		$this->load->view('templates/v_header', $data);
		$this->load->view('templates/v_topbar');
		$this->load->view('main/v_product_owner');
		$this->load->view('templates/v_footer');
	}

	public function show_profile($id_owner) {
		// $data['title'] = 'Produk';
		$data['product_category'] = $this->m_product->get_all_category();
		$data['users'] = $this->m_user->get_all();
		$data['product'] = $this->m_product->get_all();
		$data['product_photo'] = $this->m_product->get_all_photo();
		$data['id_owner'] = $id_owner;
		// $this->load->view('owner_templates/v_header', $data);
		// $this->load->view('templates/v_topbar');
		$this->load->view('main/v_profile_grid', $data);
		// $this->load->view('owner_templates/v_footer');
	}

	public function category($unicode) {
		$product_category = $this->m_product->get_product_category($unicode);
		$data['id_category'] = $product_category['id'];
		$data['title'] = 'Produk '.$product_category['name'];
		$icon = $product_category['icon'];
		$data['subtitle'] = 'Produk Usaha <i class="'.$icon.'"></i> '.$product_category['name'];
		$data['product_category'] = $this->m_product->get_all_category();
		$data['users'] = $this->m_user->get_all();
		$data['product'] = $this->m_product->get_all();
		$data['product_photo'] = $this->m_product->get_all_photo();
		$data['news_ordered'] = $this->m_news->get_views_asc();
		$this->load->view('templates/v_header', $data);
		$this->load->view('templates/v_topbar');
		$this->load->view('main/v_product_category');
		$this->load->view('templates/v_footer');
	}
}
?>
