<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {
  public function index($page = 'home') {
    $fileRequested = APPPATH."views/pages/$page.php";

    if (!file_exists($fileRequested)) {
      show_404();
    }

    $data['title'] = ucfirst($page);

    $this->load->view('templates/header');
    $this->load->view("pages/$page", $data);
    $this->load->view('templates/footer');
  }
}
