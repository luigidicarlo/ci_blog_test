<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Model {
  public function __construct()
  {
    $this->load->database();
  }

  public function register_user() {
    $data = array(
      'username' => $this->input->post('username'),
      'email' => $this->input->post('email'),
      'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT)
    );

    return $this->db->insert('users', $data);
  }
}
