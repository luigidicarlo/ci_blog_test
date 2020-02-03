<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Posts extends CI_Controller
{
  private function upload_image()
  {
    $filename = explode('.', $_FILES['userfile']['name']);

    $image = time().'-'.url_title($filename[0]).'.'.$filename[1];

    // Handle file uploading
    $config['upload_path'] = './application/assets/img/posts';
    $config['allowed_types'] = 'jpg|png|gif';
    $config['overwrite'] = true;
    $config['max_size'] = '4096';
    $config['max_width'] = '1920';
    $config['max_height'] = '1080';
    $config['file_name'] = $image;

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload()) {
      $error = array('error' => $this->upload->display_errors());
      $post_image = 'noimage.jpg';
    } else {
      $data = array('upload_data' => $this->upload->data());
      $post_image = $image;
    }

    return $post_image;
  }

  public function index()
  {
    $title = 'Latest Posts';
    $posts = $this->Post->get_posts();
    $categories = $this->Category->index();

    $data = compact(['title', 'posts', 'categories']);

    $this->load->view('templates/header');
    $this->load->view('posts/index', $data);
    $this->load->view('templates/footer');
  }

  public function show($slug = null)
  {
    $post = $this->Post->get_posts($slug);

    if (empty($post)) {
      show_404();
    }

    $title = $post['title'];

    $data = compact(['title', 'post']);

    $this->load->view('templates/header');
    $this->load->view('posts/show', $data);
    $this->load->view('templates/footer');
  }

  public function create()
  {
    $title = 'Create Post';

    $categories = $this->Category->index();

    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('body', 'Body', 'required');
    $this->form_validation->set_rules('category_id', 'Category', 'required');

    $data = compact(['title', 'categories']);

    if ($this->form_validation->run() === false) {
      $this->load->view('templates/header');
      $this->load->view('posts/create', $data);
      $this->load->view('templates/footer');
    } else {
      $post_image = $this->upload_image();

      $this->Post->save_post($post_image);
      redirect('/posts');
    }
  }

  public function edit($id)
  {
    $post = $this->Post->get_post($id);
    $categories = $this->Category->index();
    $selectedCategory = $this->Category->show($post['category_id']);
    $title = "Edit Post";

    $data = compact(['post', 'title', 'categories', 'selectedCategory']);

    $this->load->view('templates/header');
    $this->load->view('posts/edit', $data);
    $this->load->view('templates/footer');
  }

  public function update($id)
  {
    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('body', 'Body', 'required');
    $this->form_validation->set_rules('category_id', 'Category', 'required');

    if ($this->form_validation->run() === false) {
      redirect('/posts/edit/' . $id);
    } else {
      if (!empty($_FILES['userfile']['name'])) {
        $post_image = $this->upload_image();
      }
      $this->Post->update_post($id, $post_image);
      redirect('/posts');
    }
  }

  public function delete($id)
  {
    $this->Post->delete_post($id);
    redirect('/posts');
  }
}
