<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Owner extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model(['m_auth', 'm_flashdata', 'm_charts','m_product']);
		setWIB();
		is_logged_in();
		is_password_match();
	}

	public function index() {
		$this->profile();
	}

	public function profile() {
		$data['title'] = 'Profil Pengguna';
		$data['profile'] = $this->m_auth->get_session();
		// $data['gmap_begin'] = '<iframe src="https://www.google.com/maps/embed?pb=';
		// $data['gmap_end'] = '" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>';
		$this->load->view('owner_templates/v_header', $data);
		$this->load->view('owner_templates/v_sidebar');
		$this->load->view('owner_templates/v_topbar');
		$this->load->view('owner/v_profile');
		$this->load->view('owner_templates/v_footer');
	}

	public function edit_profile() {
		$data['profile'] = $this->m_auth->get_session();
		$alluser = $this->m_user->get_all();
		$phone_wa = handle_phone_format($this->input->post('phone'));
		$gmap = $this->input->post('gmap');
		if(substr($gmap, 0, 7) == '<iframe') {
			$gmap = handle_google_map($gmap);	
		}
		$new_data = [
			'name' => $this->input->post('name'),
			'username' => $this->input->post('username'),
			'nib' => $this->input->post('nib'),
			'phone' => $this->input->post('phone'),
			'phone_wa' => $phone_wa,
			'address' => $this->input->post('address'),
			'rw' => $this->input->post('rw'),
			'rt' => $this->input->post('rt'),
			'gmap' => $gmap
		];
		if($new_data['username'] != $data['profile']['username']) {
			foreach ($alluser as $au) {
				if($new_data['username'] == $au['username']) {
					$this->m_flashdata->set('danger', 'Username ini telah terdaftar di sistem! ('.$new_data['username'].')');
					redirect('owner/profile');
				}
			}
		}
		$this->m_user->update_all($data['profile']['id'], $new_data);
		$this->m_flashdata->set('success', 'Profil Anda telah berhasil diubah!');
		redirect('owner/profile');
	}

	public function change_photo($kind) {
		$data['profile'] = $this->m_auth->get_session();
		if ($kind=='profile') {
			$data['width'] = 700;
			$data['height'] = 700;
			$data['upload'] = 'upload_photo';
 		} else if ($kind=='cover') {
 			$data['width'] = 700;
			$data['height'] = 700/3;
			$data['upload'] = 'upload_cover_photo';
 		} else if (substr($kind, 0, 12) =='product_logo') {
 			$data['width'] = 700;
			$data['height'] = 700;
			$data['upload'] = 'upload_product_logo';
			$data['product_id'] = substr($kind, 13);
 		} else {
 			echo 'Halaman salah';
 			die;
 		}
		$this->load->view('owner/v_preview', $data);
	}

	public function upload_photo($id) {
		$folderPath = './assets/img/profile/';
        $image_parts = explode(";base64,", $_POST['image']);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $photo_name = 'profile-'.$id.'.jpg';
        $file = $folderPath . $photo_name;
        file_put_contents($file, $image_base64);
        $this->m_user->update_photo($id, $photo_name);
		redirect('owner/profile');
	}

	public function upload_cover_photo($id) {
		$folderPath = './assets/img/cover/';
        $image_parts = explode(";base64,", $_POST['image']);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $photo_name = 'cover-'.$id.'.jpg';
        $file = $folderPath . $photo_name;
        file_put_contents($file, $image_base64);
        $this->m_user->update_cover_photo($id, $photo_name);
		redirect('owner/profile');
	}

	public function product($tab = 1) {
		$data['title'] = 'Kelola Produk';
		$data['profile'] = $this->m_auth->get_session();
		$data['product'] = $this->m_product->get_by_user($data['profile']['id']);
		$data['product_photo'] = $this->m_product->get_all_photo();
		$data['product_count'] = $this->m_product->count($data['profile']['id']);
		// $data['product_photo_count'] = $this->m_product->get_photo_count();
		$data['category'] = $this->m_product->get_all_category();
		$status = [];
		$status['add'] = ''; $status['view'] = ''; $status['edit'] = ''; $status['photo'] = '';
		if ($tab == 0) {
			$status['add'] = 'active';
		} else if ($tab == 1) {
			$status['view'] = 'active';
		} else if ($tab == 2) {
			$status['edit'] = 'active';
		} else if ($tab == 3) {
			$status['photo'] = 'active';
		}
		$data['status'] = $status;
		$this->load->view('owner_templates/v_header', $data);
		$this->load->view('owner_templates/v_sidebar');
		$this->load->view('owner_templates/v_topbar');
		$this->load->view('owner/v_product');
		$this->load->view('owner_templates/v_footer');
	}

	public function upload_product_logo($id) {
		$profile = $this->m_auth->get_session();
		$folderPath = './assets/img/product/';
        $image_parts = explode(";base64,", $_POST['image']);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $photo_name = 'product_logo-'.$profile['id'].'-'.$id.'.jpg';
        $file = $folderPath . $photo_name;
        file_put_contents($file, $image_base64);
        $this->m_product->update_product_logo($id, $photo_name);
		redirect('owner/profile');
	}

	public function add_product() {
		$profile = $this->m_auth->get_session();
		$new_data = [
			'name' => $this->input->post('name'),
			'logo' => 'default.png',
			'id_user' => $profile['id'],
			'id_category' => $this->input->post('id_category'),
			'description' => $this->input->post('description'),
			'instagram' => $this->input->post('instagram'),
		];
		$this->m_product->add_all($new_data);
		// sleep(2);
		// $data = [];
		// $count = count($_FILES['photos']['name']);
		if(!empty($_FILES['photo']['name'])){
			$_FILES['file']['name'] = $_FILES['photo']['name'];
			$_FILES['file']['type'] = $_FILES['photo']['type'];
			$_FILES['file']['tmp_name'] = $_FILES['photo']['tmp_name'];
			$_FILES['file']['error'] = $_FILES['photo']['error'];
			$_FILES['file']['size'] = $_FILES['photo']['size'];

			$last_id_product = $this->m_product->get_last_id();
			$last_id_photo = $this->m_product->get_last_id_photo();
			// $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
			$ext = 'jpg';
			$file_name = 'product-'.$last_id_product.'-'.$last_id_photo.'.'.$ext;
			$config['upload_path'] = './assets/img/product/'; 
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['max_size'] = '10000';
			$config['file_name'] = $file_name;
			$this->load->library('upload',$config); 
			if($this->upload->do_upload('file')){
				$specific_data = [
					'id_product' => $last_id_product,
					'name' => $file_name
				];
				$this->m_product->add_product_photo($specific_data);
			}
		}
	 //    }
	 //    for($i=0;$i<$count;$i++){
	 //    	$last_id_product = $this->m_product->get_last_id();
		// 	$last_id_photo = $this->m_product->get_last_id_photo();
		// 	// $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
		// 	$ext = 'jpg';
		// 	if($i == 0) {
		// 		$file_name = 'product-'.$last_id_product.'-0.'.$ext;
		// 	} else {
		// 		$file_name = 'product-'.$last_id_product.'-0'.strval($i).'.'.$ext;
		// 	}
		// 	if(!empty($_FILES['photos']['name'][$i])){
		//     	$specific_data = [
		// 			'id_product' => $last_id_product,
		// 			'name' => $file_name
		// 		];
		// 		$this->m_product->add_product_photo($specific_data);
		// 	}
	 //    }
		$this->m_flashdata->set('success', 'Produk telah berhasil ditambahkan!');
		redirect('owner/product/1');
	}

	public function upload_product_photo($id_product) {
		$profile = $this->m_auth->get_session();
		$product = $this->m_product->get_by_id($id_product);
		if(!empty($_FILES['photo']['name'])){
			$_FILES['file']['name'] = $_FILES['photo']['name'];
			$_FILES['file']['type'] = $_FILES['photo']['type'];
			$_FILES['file']['tmp_name'] = $_FILES['photo']['tmp_name'];
			$_FILES['file']['error'] = $_FILES['photo']['error'];
			$_FILES['file']['size'] = $_FILES['photo']['size'];

			// $last_id_product = $this->m_product->get_last_id();
			$last_id_photo = $this->m_product->get_last_id_photo();
			// $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
			$ext = 'jpg';
			$file_name = 'product-'.$id_product.'-'.$last_id_photo.'.'.$ext;
			$config['upload_path'] = './assets/img/product/'; 
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['max_size'] = '10000';
			$config['file_name'] = $file_name;
			$this->load->library('upload',$config); 
			if($this->upload->do_upload('file')){
				$specific_data = [
					'id_product' => $id_product,
					'name' => $file_name
				];
				$this->m_product->add_product_photo($specific_data);
			}
		}
		// for($i=0;$i<$count;$i++){
			
	 //    }
	 //    for($i=0;$i<$count;$i++){
	 //    	// $last_id_product = $this->m_product->get_last_id();
		// 	$last_id_photo = $this->m_product->get_last_id_photo();
		// 	// $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
		// 	$ext = 'jpg';
		// 	if($i == 0) {
		// 		$file_name = 'product-'.$id_product.'-0.'.$ext;
		// 	} else {
		// 		$file_name = 'product-'.$id_product.'-0'.strval($i).'.'.$ext;
		// 	}
		// 	if(!empty($_FILES['photos']['name'][$i])){
		    	
		// 	}
	 //    }
		$this->m_flashdata->set('success', '1 gambar telah berhasil ditambahkan untuk produk '.$product['name']);
		redirect('owner/product/3');
	}

	public function edit_product() {
		$profile = $this->m_auth->get_session();
		$total_product = $this->m_product->count_product($profile['id']);
		for ($i=0; $i<$total_product; $i++) {
			$id_product = $this->input->post('id-'.$i);
			$new_data = [
				'name' => $this->input->post('name-'.$id_product),
				'id_category' => $this->input->post('id_category-'.$id_product),
				'description' => $this->input->post('description-'.$id_product),
				'instagram' => $this->input->post('instagram-'.$id_product),
			];
			$this->m_product->update_all($id_product, $new_data);
		}
		
		$this->m_flashdata->set('success', 'Produk telah berhasil diubah!');
		redirect('owner/product/2');
	}

	public function delete_product($id_product) {
		$product = $this->m_product->get_by_id($id_product);
		$this->m_flashdata->set('success', 'Produk '.$product['name'].' berhasil dihapus!');
		$this->m_product->delete($id_product);
		redirect('owner/product/1');
	}

	public function delete_product_photo($id_photo) {
		$this->m_flashdata->set('success', '1 gambar berhasil dihapus!');
		$this->m_product->delete_product_photo($id_photo);
		redirect('owner/close_tab');
	}

	public function close_tab() {
		$this->load->view('extra/close_tab');
	}

	public function password() {
		$data['title'] = 'Ubah Password';
		$data['profile'] = $this->m_auth->get_session();

		$this->load->view('owner_templates/v_header', $data);
		$this->load->view('owner_templates/v_sidebar');
		$this->load->view('owner_templates/v_topbar');
		$this->load->view('owner/v_password');
		$this->load->view('owner_templates/v_footer');
	}

	public function change_password() {
		$profile = $this->m_auth->get_session();
		$current_password = $this->input->post('current_password');
		$new_password = $this->input->post('new_password1');
		$new_password2 = $this->input->post('new_password2');
		if(!(md5($current_password) == $profile['password'])) {
			$this->m_flashdata->set('danger', 'Password lama salah!');
			redirect('owner/password');
		} else {
			if($current_password == $new_password) {
				$this->m_flashdata->set('danger', 'Password baru tidak boleh sama dengan password lama!');
				redirect('owner/password');
			} else {
				if($new_password2 != $new_password) {
					$this->m_flashdata->set('danger', 'Konfirmasi password baru salah');
					redirect('owner/password');
				} else {
					$password_hash = md5($new_password);
					$this->m_user->update_password($profile['id'], $password_hash);
					$this->m_auth->set_session($profile['id'], $profile['is_active'], $password_hash);
					$this->m_flashdata->set('success', 'Password telah berhasil diubah');
					redirect('owner/password');
				}
			}
		}
	}
}
?>
