<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_product extends CI_Model {

	public function get_all() {
		$this->db->order_by('id', 'ASC');
		return $this->db->get('product')->result_array();
	}

	public function get_by_user($id_user) {
		$this->db->order_by('id', 'ASC');
		return $this->db->get_where('product', ['id_user' => $id_user])->result_array();
	}

	public function get_by_id($id_product) {
		return $this->db->get_where('product', ['id' => $id_product])->row_array();
	}

	public function count($id_user) {
		return $this->db->get_where('product', ['id_user' => $id_user])->num_rows();
	}

	public function get_all_photo() {
		$this->db->order_by('id', 'ASC');
		return $this->db->get('product_photo')->result_array();
	}

	public function get_photo_count($id_product) {
		return $this->db->get_where('product_photo', ['id_product' => $id_product])->num_rows();
	}

	public function get_last_id() {
		$this->db->select_max('id');
		$result =  $this->db->get('product')->row_array();
		return $result['id']; 
	}

	public function get_last_id_photo() {
		$this->db->select_max('id');
		$result =  $this->db->get('product_photo')->row_array();
		return $result['id'] + 1;
	}

	public function get_all_category() {
		$this->db->order_by('id', 'ASC');
		return $this->db->get('product_category')->result_array();
	}

	public function get_product_category($unicode) {
		return $this->db->get_where('product_category',['icon_unicode' => $unicode])->row_array();
	}	

	public function update_product_logo($id_product, $photo) {
		$this->db->set('logo', $photo);
		$this->db->where('id', $id_product);
		$this->db->update('product');
	}

	public function count_product($id_user) {
		return $this->db->get_where('product',['id_user' => $id_user])->num_rows();
	}

	public function update_all($id_product, $new_data) {
		$this->db->set('name', $new_data['name']);
		$this->db->set('id_category', $new_data['id_category']);
		$this->db->set('description', $new_data['description']);
		$this->db->set('instagram', $new_data['instagram']);
		$this->db->where('id', $id_product);
		$this->db->update('product');
	}

	public function add_all($data) {
		$this->db->insert('product', $data);
	}

	public function add_product_photo($data) {
		$this->db->insert('product_photo', $data);
	}

	public function delete($id_product) {
		$product = $this->m_product->get_by_id($id_product);
		//delete logo
		if ($product['logo'] != 'default.png') {
			$fullpath = './assets/img/product/'.$product['logo'];
	    	if (!unlink($fullpath)) {
			  $this->m_flashdata->set('danger', 'Logo gagal dihapus! '.$fullpath);
			  redirect('owner/product/1');
			} else {
				$this->db->delete('product', ['id' => $id_product]);
			}
		} else {
			$this->db->delete('product', ['id' => $id_product]);
		}
		//delete all file photo product
		$product_photo = $this->db->get_where('product_photo', ['id' => $id_product])->result_array();
    	foreach ($product_photo as $pp) {
    		$fullpath = './assets/img/product/'.$pp['name'];
	    	if (!unlink($fullpath)) {
			  $this->m_flashdata->set('danger', '1 gambar gagal dihapus! '.$fullpath);
			  redirect('owner/product/3');
			} else {
				$this->db->delete('product_photo', ['id' => $pp['id']]);
			}
    	}
	}

    public function delete_product_photo($id_photo) {
    	$product_photo = $this->db->get_where('product_photo', ['id' => $id_photo])->row_array();
    	$fullpath = './assets/img/product/'.$product_photo['name'];
    	if (!unlink($fullpath)) {
		  $this->m_flashdata->set('danger', '1 gambar gagal dihapus! '.$fullpath);
		  redirect('owner/product/3');
		} else {
			$this->db->delete('product_photo', ['id' => $id_photo]);
		}
        
    }

	// public function add($data) {
	// 	$this->db->insert('tbl_notification', $data);
		
	// 	$this->db->select('MAX(id) AS last_id');
	// 	$last_id = $this->db->get('tbl_notification')->row_array();
	// 	$current_id = $last_id['last_id'];
	// 	if (strpos($data['link'], '?') !== false) {
	// 	    $data['link'] = $data['link'].'&notif_id='.$current_id;
	// 	} else {
	// 		$data['link'] = $data['link'].'?notif_id='.$current_id;
	// 	}
	// 	$this->db->set('link', $data['link']);
	// 	$this->db->where('id', $current_id);
	// 	$this->db->update('tbl_notification');
	// }

	// public function count_unread() {
	// 	return $this->db->get_where('tbl_notification',['is_clicked' => 0])->num_rows();
	// }

	// public function update($type, $description) {
	// 	$this->db->set('description', $description);
	// 	$this->db->where('type', $type);
	// 	$this->db->update('tbl_notification');
	// }

	// public function update_time($type) {
	// 	$this->db->set('date_notified', time());
	// 	$this->db->set('is_clicked', 0);
	// 	$this->db->where('type', $type);
	// 	$this->db->update('tbl_notification');
	// }

	// public function update_link($description, $link) {
	// 	$this->db->select('MAX(id) AS last_id');
	// 	$last_id = $this->db->get('tbl_notification')->row_array();
	// 	$current_id = $last_id['last_id'];
	// 	if (strpos($link, '?') !== false) {
	// 	    $link = $link.'&notif_id='.$current_id;
	// 	} else {
	// 		$link = $link.'?notif_id='.$current_id;
	// 	}
	// 	$this->db->set('link', $link);
	// 	$this->db->where('description', $description);
	// 	$this->db->update('tbl_notification');
	// }

	// public function click($id) {
	// 	$this->db->set('is_clicked', 1);
	// 	$this->db->where('id', $id);
	// 	$this->db->update('tbl_notification');
	// }

	// public function clear() {
	// 	$this->db->empty_table('tbl_notification');
	// }

	// public function count_type($type) {
	// 	return $this->db->get_where('tbl_notification', ['type' => $type])->num_rows();
	// }

	// public function get_menu() {
	// 	return $this->db->query("SELECT COUNT(id) AS ct FROM user_access_menu WHERE id IN
			
	// 	(SELECT id FROM user_access_menu WHERE menu_id IS NOT NULL)
	// 	GROUP BY menu_id")->num_rows();
	// }
}

?>