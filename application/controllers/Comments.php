<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Comments extends CI_Controller
{
  public function store($post_id)
  {
    $slug = $this->input->post('slug');
    
    $post = $this->Post->get_posts($slug);
    $comments = $this->Comment->get_comments($post['id']);
    $title = $post['title'];

    $data = compact(['post', 'comments', 'title']);

    $this->form_validation->set_rules('user', 'Name', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('content', 'Comment', 'required|min_length[10]');

    if (!$this->form_validation->run()) {
      $this->load->view('templates/header');
      $this->load->view('posts/show', $data);
      $this->load->view('templates/header');
    } else {
      $this->Comment->store_comment($post_id);
      $comments = $this->Comment->get_comments($post['id']);

      $data['comments'] = $comments;

      redirect('/posts/'.$slug);
    }
  }

  public function delete()
  {
  }
}
