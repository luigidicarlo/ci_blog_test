<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Comment extends CI_Model
{
  public function __construct()
  {
    $this->load->database();
  }

  public function get_comments($post_id)
  {
    $this->db->where('post_id', $post_id);
    $query = $this->db->get('comments');
    return $query->result_array();
  }

  public function store_comment($post_id)
  {
    $data = array(
      'user' => $this->input->post('user'),
      'email' => $this->input->post('email'),
      'content' => $this->input->post('content'),
      'post_id' => $post_id
    );

    return $this->db->insert('comments', $data);
  }
}
