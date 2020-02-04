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
  <hr>
  <h2>Comments (<?php echo count($comments); ?>)</h2>
  <?php if ($comments) : ?>
    <?php foreach ($comments as $comment) : ?>
      <h4><?php echo $comment['user']; ?> - [<?php echo $comment['email'] ?>]</h4>
      <small><?php $date = strtotime($comment['created_at']); echo date('d/m/Y - h:i:s A', $date); ?></small>
      <p><?php echo $comment['content']; ?></p>
    <?php endforeach; ?>
  <?php else : ?>
    <h4>No comments posted yet</h4>
  <?php endif; ?>
  <hr>
  <h3>Please, leave your comment below</h3>
  <?php echo form_open('/comments/store/'.$post['id']); ?>
    <label for="user">Name</label>
    <br>
    <input type="text" name="user" id="user" placeholder="Your name...">
    <br>
    <label for="email">Email</label>
    <br>
    <input type="email" name="email" id="email" placeholder="example@domain.com">
    <br>
    <label for="content">Comment</label>
    <br>
    <textarea name="content" id="content" cols="30" rows="10"></textarea>
    <input type="hidden" name="slug" value="<?php echo $post['slug']; ?>">
    <br><br>
    <input type="submit" value="Post Comment">
  </form>
  <br>
</div>