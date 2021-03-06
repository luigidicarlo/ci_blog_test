<div class="Post">
  <h1><?php echo ucfirst($category['name']); ?></h1>
  <?php if ($posts) : ?>
    <?php foreach ($posts as $post) : ?>
      <div class="Post">
        <h2><?= $post['title']; ?></h2>
        <img style="max-width: 512px" src="<?php echo base_url() . 'application/assets/img/posts/' . $post['image']; ?>" alt="<?php echo $post['title']; ?>">
        <h4>
          Published on <?php $date = strtotime($post['created_at']);
                        echo date('d-m-Y h:i:s', $date); ?>
        </h4>
        <h4>
          Category: <?php echo ucfirst($post['name']); ?>
        </h4>
        <p>
          <?= word_limiter($post['body'], 25); ?>
        </p>
        <p>
          <a href="<?= base_url() . 'posts/' . $post['slug']; ?>">
            Read more
          </a>
        </p>
      </div>
      <hr>
    <?php endforeach; ?>
  <?php else : ?>
    <h3>No posts to show</h3>
  <?php endif; ?>
</div>