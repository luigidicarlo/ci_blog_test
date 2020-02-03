<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Model {
  public function __construct()
  {
    $this->load->database();
  }

  public function index() {
    $this->db->order_by('name', 'ASC');
    $query = $this->db->get('categories');
    return $query->result_array();
  }

  public function show($id) {
    $this->db->where('id', $id);
    $query = $this->db->get('categories');
    return $query->row_array();
  }

  public function list_posts_by_category($id) {
    $this->db->where('posts.category_id', $id);
    $this->db->join('categories', 'categories.id = posts.category_id');
    $query = $this->db->get('posts');
    return $query->result_array();
  }

  public function store() {
    $data = array(
      'name' => $this->input->post('name')
    );
    return $this->db->insert('categories', $data);
  }

  public function update($id) {
    $this->db->where('id', $id);
    $data = array(
      'name' => $this->input->post('name')
    );
    return $this->db->update('categories', $data);
  }

  public function delete($id) {
    if ($id === 1) {
      return false;
    }
    
    $this->db->where('id', $id);
    return $this->db->delete('categories');
  }
}
