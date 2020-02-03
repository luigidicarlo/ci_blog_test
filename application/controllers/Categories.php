<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Categories extends CI_Controller
{
  public function index()
  {
    $categories = $this->Category->index();

    $data = compact(['categories']);

    $this->load->view('templates/header');
    $this->load->view('categories/index', $data);
    $this->load->view('templates/footer');
  }

  public function show($id)
  {
    $category = $this->Category->show($id);
    $posts = $this->Category->list_posts_by_category($id);

    $data = compact(['category', 'posts']);

    $this->load->view('templates/header');
    $this->load->view('categories/show', $data);
    $this->load->view('templates/footer');
  }

  public function create()
  {
    $this->load->view('templates/header');
    $this->load->view('categories/create');
    $this->load->view('templates/footer');
  }

  public function store()
  {
    $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[3]');

    if ($this->form_validation->run() === false) {
      $this->load->view('templates/header');
      $this->load->view('categories/create');
      $this->load->view('templates/footer');
    } else {
      $this->Category->store();
      redirect('/categories');
    }
  }

  public function edit($id)
  {
    $category = $this->Category->show($id);

    $data = compact(['category']);

    $this->load->view('templates/header');
    $this->load->view('categories/edit', $data);
    $this->load->view('templates/footer');
  }

  public function update($id)
  {
    $category = $this->Category->show($id);

    $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[3]');

    $data = compact(['category']);

    if ($this->form_validation->run() === false) {
      $this->load->view('templates/header');
      $this->load->view('categories/edit', $data);
      $this->load->view('templates/footer');
    } else {
      $this->Category->update($id);
      redirect('/categories');
    }
  }

  public function delete($id)
  {
    $this->Category->delete($id);
    redirect('/categories');
  }
}
