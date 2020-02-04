<?php

defined('BASEPATH') or exit('No direct access to scripts allowed');

class Users extends CI_Controller {
  public function create() {
    $this->load->view('templates/header');
    $this->load->view('users/registration');
    $this->load->view('templates/footer');
  }

  public function store() {
    $this->form_validation->set_rules('username', 'Username', 'required|min_length[4]|max_length[24]|is_unique[users.username]');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|max_length[32]');
    $this->form_validation->set_rules('repeatPassword', 'Repeat Password', 'required|matches[password]');

    if (!$this->form_validation->run()) {
      $this->load->view('templates/header');
      $this->load->view('users/registration');
      $this->load->view('templates/footer');
    } else {
      $result = $this->User->register_user();
      
      if ($result) {
        $this->session->set_flashdata('user_registered', 'User registration successful');
        redirect('/');
      } else {
        $this->session->set_flashdata('user_registered', 'User registration failed');
        redirect('/register');
      }
    }
  }
}
