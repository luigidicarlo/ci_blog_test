<div class="Post">
  <h1><?php echo $title; ?></h1>
  <hr>
  <div>
    <img src="<?php echo base_url().'application/assets/img/posts/'.$post['image']; ?>" alt="<?php echo $post['title'] ?>">
  </div>
  <p>
    <strong>
      <?php $date = strtotime($post['created_at']); echo date('d-m-Y h:i:s', $date); ?>
    </strong>
  </p>
  <p>
    <?php echo $post['body']; ?>
  </p>
  <a href="/posts/edit/<?php echo $post['id']; ?>">Edit Post</a>
  <br><br>
  <?php echo form_open('posts/delete/'.$post['id']); ?>
    <input type="submit" value="Delete Post">
  </form>
  <br>
</div>