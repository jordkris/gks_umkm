<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model(['m_auth', 'm_flashdata', 'm_extra','m_product', 'm_news', 'm_user_temp', 'm_user']);
		setWIB();
		is_logged_in();
		is_password_match();
	}

	public function index() {
		$this->member(1);
	}

	public function member_temp($tab = 1) {
		$data['title'] = 'Kelola Anggota UMKM';
		$data['profile'] = $this->m_auth->get_session();
		$data['member'] = $this->m_user_temp->get_all();
		$data['member_count'] = $this->m_user_temp->count_all();
		$status = [];
		$status['add'] = ''; $status['view'] = ''; $status['edit'] = ''; $status['photo'] = '';
		if ($tab == 0) {
			$status['add'] = 'active';
		} else if ($tab == 1) {
			$status['view'] = 'active';
		} 
		$data['status'] = $status;
		$this->load->view('admin_templates/v_header', $data);
		$this->load->view('admin_templates/v_sidebar');
		$this->load->view('admin_templates/v_topbar');
		$this->load->view('admin/v_member_temp');
		$this->load->view('admin_templates/v_footer');
	}

	public function add_member_temp() {
		$profile = $this->m_auth->get_session();
		$new_data = [
			'name' => $this->input->post('name'),
			'nib' => $this->input->post('nib'),
			'product_name' => $this->input->post('product_name'),
			'rw' => $this->input->post('rw'),
			'rt' => $this->input->post('rt')
		];
		$this->m_user_temp->add($new_data);
		$this->m_flashdata->set('success', 'Selamat! Anggota telah berhasil ditambahkan.');
		redirect('admin/member_temp/0');
	}

	public function edit_member_temp() {
		$total_users_temp = $this->m_user_temp->count_all();
		for ($i=1; $i<=$total_users_temp; $i++) {
			$id_users_temp = $this->input->post('id-'.$i);
			$new_data = [
				'name' => $this->input->post('name-'.$i),
				'nib' => $this->input->post('nib-'.$i),
				'product_name' => $this->input->post('product_name-'.$i),
				'rw' => $this->input->post('rw-'.$i),
				'rt' => $this->input->post('rt-'.$i)
			];
			$this->m_user_temp->update_all($id_users_temp, $new_data);
		}
		
		$this->m_flashdata->set('success', 'Profil anggota telah berhasil diubah!');
		redirect('admin/member_temp/1');
	}

	public function delete_member_temp($id_member) {
		$member = $this->m_user_temp->get($id_member);
		$this->m_flashdata->set('success', 'Akun '.$member['name'].' berhasil dihapus!');
		$this->m_user_temp->delete($id_member);
		redirect('admin/member_temp/1');
	}

//--------------------------------------------------------------------------------------------------------------------------
	public function member($tab = 1) {
		$data['title'] = 'Kelola Akun Terdaftar Anggota UMKM';
		$data['profile'] = $this->m_auth->get_session();
		$data['member'] = $this->m_user->get_all();
		$data['member_count'] = $this->m_user->count_all();
		$data['category'] = $this->m_product->get_all_category();
		$status = [];
		$status['add'] = ''; $status['view'] = ''; $status['edit'] = ''; $status['photo'] = '';
		if ($tab == 0) {
			$status['add'] = 'active';
		} else if ($tab == 1) {
			$status['view'] = 'active';
		} else if ($tab == 2) {
			$status['edit'] = 'active';
		} 
		$data['status'] = $status;
		$this->load->view('admin_templates/v_header', $data);
		$this->load->view('admin_templates/v_sidebar');
		$this->load->view('admin_templates/v_topbar');
		$this->load->view('admin/v_member');
		$this->load->view('admin_templates/v_footer');
	}

	public function add_member() {
		$profile = $this->m_auth->get_session();
		$password1 = $this->input->post('password1');
		$password2 = $this->input->post('password2');
		$username = $this->input->post('username');
		$alluser = $this->m_user->get_all();
		// $phone_wa = handle_phone_format($this->input->post('phone'));
		// $gmap = handle_google_map($this->input->post('gmap'));
 		if($password1 != $password2) {
			$this->m_flashdata->set('danger', 'Konfirmasi password baru salah');
			redirect('admin/member/0');
		}
		foreach ($alluser as $au) {
			if($username == $au['username']) {
				$this->m_flashdata->set('danger', 'Username ini telah terdaftar di sistem! ('.$username.')');
				redirect('admin/member/0');
			}
		}
		$new_data = [
			'name' => htmlspecialchars($this->input->post('name', true)),
			'username' => htmlspecialchars($username),
			'password' => md5($password1),
			'role_id' => 2,
			'is_active' => 1,
			'photo' => 'default-profile.jpg',
			'cover' => 'default-cover.jpg',
			'date_created' => time()
		];
		$this->m_user->add($new_data);
		$this->m_flashdata->set('success', 'Selamat! Akun Anggota telah berhasil ditambahkan.');
		redirect('admin/member/0');
	}

	public function edit_member() {
		$total_member = $this->m_user->count_all();
		for ($i=0; $i<$total_member-1; $i++) {
			$id_member = $this->input->post('id-'.$i);
			$phone_wa = handle_phone_format($this->input->post('phone-'.$id_member));
			$gmap = $this->input->post('gmap-'.$id_member); 
			if(substr($gmap, 0, 7) == '<iframe') {
				$gmap = handle_google_map($gmap);	
			}
			$new_data = [
				'name' => $this->input->post('name-'.$id_member),
				'username' => $this->input->post('username-'.$id_member),
				'nib' => $this->input->post('nib-'.$id_member),
				'phone' => $this->input->post('phone-'.$id_member),
				'phone_wa' => $phone_wa,
				'address' => $this->input->post('address-'.$id_member),
				'rw' => $this->input->post('rw-'.$id_member),
				'rt' => $this->input->post('rt-'.$id_member),
				'gmap' => $gmap
			];
			$this->m_user->update_all($id_member, $new_data);
		}
		
		$this->m_flashdata->set('success', 'Profil anggota telah berhasil diubah!');
		redirect('admin/member/2');
	}

	public function change_activation($id_member) {
		$member = $this->m_user->get($id_member);
		if($member['is_active'] == 0) {
			$this->m_user->set_activation(1, $id_member);
			$this->m_flashdata->set('success', 'Akun '.$member["name"].' telah berhasil diaktifkan!');
		} else {
			$this->m_user->set_activation(0, $id_member);
			$this->m_flashdata->set('success', 'Akun '.$member["name"].' telah berhasil dinonaktifkan!');
		}
		redirect('admin/member/1');
	}

	public function delete_member($id_member) {
		$member = $this->m_user->get($id_member);
		$this->m_flashdata->set('success', 'Akun '.$member['name'].' berhasil dihapus!');
		$this->m_user->delete($id_member);
		redirect('admin/member/1');
	}

	public function news($tab = 1) {
		$data['title'] = 'Kelola Berita';
		$data['profile'] = $this->m_auth->get_session();
		$data['news'] = $this->m_news->get_all();
		$data['news_count'] = count($data['news']);
		$status['add'] = ''; $status['view'] = ''; $status['edit'] = ''; $status['photo'] = '';
		if ($tab == 0) {
			$status['add'] = 'active';
		} else if ($tab == 1) {
			$status['view'] = 'active';
		} else if ($tab == 2) {
			$status['edit'] = 'active';
		} 
		$data['status'] = $status;
		$this->load->view('admin_templates/v_header', $data);
		$this->load->view('admin_templates/v_sidebar');
		$this->load->view('admin_templates/v_topbar');
		$this->load->view('admin/v_news');
		$this->load->view('admin_templates/v_footer');
	}

	public function add_news_photo() {
		$data['profile'] = $this->m_auth->get_session();
		$data['width'] = 700;
		$data['height'] = 350;
		$data['random_str'] = $this->m_extra->randomStr();
		$this->load->view('admin/v_preview_add', $data);
	}

	public function upload_photo($random_str) {
		$folderPath = './assets/img/news/';
        $image_parts = explode(";base64,", $_POST['image']);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $photo_name = 'news-'.$random_str.'.jpg';
        $file = $folderPath . $photo_name;
        file_put_contents($file, $image_base64);
        $data = [
        	'random_str' => $random_str,
        	'title' => '',
        	'image' => $photo_name,
        	'image_caption' => '',
        	'main' => '',
        	'author' => '',
        	'date_created' => time()
        ];
        $this->m_news->add_photo($data);
        $this->m_flashdata->set('success', 'Gambar berita berhasil diupload.');
		redirect('admin/preview_news/'.$random_str);
	}

	public function preview_news($str = '') {
		if($str != '') {
			$data['title'] = 'Edit Berita';
			$data['profile'] = $this->m_auth->get_session();
			$data['news'] = $this->m_news->get_by_str($str);
			$data['random_str'] = $str;
			if(count($data['news']) != 0) {
				$this->load->view('admin_templates/v_header', $data);
				$this->load->view('admin_templates/v_sidebar');
				$this->load->view('admin_templates/v_topbar');
				$this->load->view('admin/v_preview_news');
				$this->load->view('admin_templates/v_footer');	
			} else {
				echo 'Halaman Tidak Ada';
			}
		} else {
			echo 'Halaman Tidak Ada';
		}
	}

	public function edit_news_photo($random_str) {
		$data['profile'] = $this->m_auth->get_session();
		$data['width'] = 700;
		$data['height'] = 350;
		$data['random_str'] = $random_str;
		$this->load->view('admin/v_preview_edit', $data);
	}

	public function edit_upload_photo($random_str) {
		$folderPath = './assets/img/news/';
        $image_parts = explode(";base64,", $_POST['image']);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $photo_name = 'news-'.$random_str.'.jpg';
        $file = $folderPath . $photo_name;
        file_put_contents($file, $image_base64);
        $this->m_flashdata->set('success', 'Gambar berita diubah.');
		redirect('admin/preview_news/'.$random_str);
	}

	public function add_news($str) {
		$profile = $this->m_auth->get_session();
		$news = $this->m_news->get_by_str($str);
		$new_data = [
			'title' => $this->input->post('title'),
			'image_caption' => $this->input->post('image_caption'),
			'main' => $this->input->post('main'),
			'author' => $this->input->post('author'),
			'date_created' => time()
		];
		$this->m_news->add_current_news($str, $new_data);
		$this->m_flashdata->set('success', 'Berita berhasil ditambahkan');
		redirect('admin/news/1');
	}

	public function delete_news($str) {
		$news = $this->m_news->get_by_str($str);
		$this->m_flashdata->set('success', 'Berita telah berhasil dihapus!');
		$this->m_news->delete($str);
		redirect('admin/news/1');
	}

	public function about() {
		$data['title'] = 'Kelola Halaman Tentang';
		$data['profile'] = $this->m_auth->get_session();
		$data['about'] = $this->m_extra->get_about();
		$this->load->view('admin_templates/v_header', $data);
		$this->load->view('admin_templates/v_sidebar');
		$this->load->view('admin_templates/v_topbar');
		$this->load->view('admin/v_about');
		$this->load->view('admin_templates/v_footer');
	}

	public function handle_about() {
		$data['profile'] = $this->m_auth->get_session();
		$new_data = [
			'left_title' => $this->input->post('left_title'),
			'right_title' => $this->input->post('right_title'),
			'left_main' => $this->input->post('left_main'),
			'right_main' => $this->input->post('right_main')
		];
		$this->m_extra->update_about(1, $new_data);
		$this->m_flashdata->set('success', 'Halaman Tentang telah berhasil diperbarui!');
		redirect('admin/about');
	}

	public function feedback() {
		$data['title'] = 'Feedback Pengguna';
		$data['profile'] = $this->m_auth->get_session();
		$data['feedback'] = $this->m_extra->get_feedback();
		$data['feedback_count'] = count($data['feedback']);
		$this->load->view('admin_templates/v_header', $data);
		$this->load->view('admin_templates/v_sidebar');
		$this->load->view('admin_templates/v_topbar');
		$this->load->view('admin/v_feedback');
		$this->load->view('admin_templates/v_footer');
	}
}
?>
