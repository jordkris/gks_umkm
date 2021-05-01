<?php
	function setWIB() {
		date_default_timezone_set("Asia/Jakarta");
	}

	function is_logged_in() {
		$ci = get_instance();
		$ci->load->model(['m_auth', 'm_user', 'm_flashdata']);
		if(!$ci->session->userdata('id')) {
			redirect('auth');
		} else {
			$user = $ci->m_auth->get_session();
			if($user['is_active'] == 1) {
				$role = $ci->m_user->get_role($user['role_id']);
				$role_uri = $ci->uri->segment(1);
				if($role_uri != $role['role']) {
					redirect('auth/blocked');
				}
			} else {
				$ci->m_auth->unset_all_sessions();
				$ci->m_flashdata->set('warning', 'Akun anda dinonaktifkan oleh admin.');
				redirect('auth');
			}
		}
	}

	function is_password_match() {
		$ci = get_instance();
		$ci->load->model(['m_auth', 'm_flashdata']);
		$profile = $ci->m_auth->get_session();
		$password_session = $ci->m_auth->get_session_password();
		if ($profile['password'] !=  $password_session) {
			redirect('auth/logout/0');
		}
	}

	function handle_phone_format($phone) {
		if (substr($phone, 0, 3) == '+62') {
			$new_phone = substr($phone, 1);
		} else if(substr($phone, 0, 2) == '08') {
			$new_phone = '62'.substr($phone, 1);
		} else if(substr($phone, 0, 1) == '8') {
			$new_phone = '62'.$phone;
		}
		return $new_phone;
	}

	function handle_google_map($gmap) {
		$temp = '';
		if($gmap != '') {
			$gmap_embed = substr($gmap, 50);
		    $i = 0;
		    while($gmap_embed[$i] != '"') {
		      $temp .= $gmap_embed[$i];
		      $i++;
		    }
		} 
	    return $temp;
	}

	function pagination($arr, $num_per_page) {
		$i = 1;
		$page = 1;
		while($i <= count($arr)) { 
			$arr[$i-1]['page'] = $page;
			if($i % $num_per_page == 0) {
				$page++;
			}
			$i++;
		}
		return $arr;	
	}
?>