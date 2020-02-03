<?php

class Post extends CI_Model
{
  public function __construct()
  {
    $this->load->database();
  }

  private function normalizeSlug($str)
  {
    $normalizeChars = array(
      'Š' => 'S', 'š' => 's', 'Ð' => 'Dj', 'Ž' => 'Z', 'ž' => 'z', 'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A',
      'Å' => 'A', 'Æ' => 'A', 'Ç' => 'C', 'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I',
      'Ï' => 'I', 'Ñ' => 'N', 'Ń' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ø' => 'O', 'Ù' => 'U', 'Ú' => 'U',
      'Û' => 'U', 'Ü' => 'U', 'Ý' => 'Y', 'Þ' => 'B', 'ß' => 'Ss', 'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a',
      'å' => 'a', 'æ' => 'a', 'ç' => 'c', 'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i',
      'ï' => 'i', 'ð' => 'o', 'ñ' => 'n', 'ń' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ø' => 'o', 'ù' => 'u',
      'ú' => 'u', 'û' => 'u', 'ü' => 'u', 'ý' => 'y', 'ý' => 'y', 'þ' => 'b', 'ÿ' => 'y', 'ƒ' => 'f',
      'ă' => 'a', 'î' => 'i', 'â' => 'a', 'ș' => 's', 'ț' => 't', 'Ă' => 'A', 'Î' => 'I', 'Â' => 'A', 'Ș' => 'S', 'Ț' => 'T',
    );
    return strtr($str, $normalizeChars);
  }

  public function get_post($id)
  {
    $this->db->where('id', $id);
    $query = $this->db->get('posts');
    return $query->row_array();
  }

  public function get_posts($slug = false)
  {
    if ($slug === false) {
      $this->db->order_by('posts.id', 'DESC');
      $this->db->join('categories', 'categories.id = posts.category_id');
      $query = $this->db->get('posts');
      return $query->result_array();
    }

    $query = $this->db->get_where('posts', array('slug' => $slug));

    return $query->row_array();
  }

  public function save_post($image)
  {
    $slug = $this->normalizeSlug($this->input->post('title'));

    $data = array(
      'title' => $this->input->post('title'),
      'slug' => $slug,
      'body' => $this->input->post('body'),
      'category_id' => $this->input->post('category_id'),
      'image' => $image
    );
    return $this->db->insert('posts', $data);
  }

  public function update_post($id, $image)
  {
    $slug = $this->normalizeSlug($this->input->post('title'));

    $data = array(
      'title' => ucfirst($this->input->post('title')),
      'slug' => url_title(strtolower($slug)),
      'body' => $this->input->post('body'),
      'category_id' => $this->input->post('category_id'),
    );

    if (isset($image)) {
      $data['image'] = $image;
    }
    
    $this->db->where('id', $id);
    return $this->db->update('posts', $data);
  }

  public function delete_post($id)
  {
    $this->db->where('id', $id);
    return $this->db->delete('posts');
  }
}
