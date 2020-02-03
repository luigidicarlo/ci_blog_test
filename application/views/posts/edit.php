<a href="/posts/<?php echo $post['slug']; ?>">Go Back</a>
<h1><?php echo $title; ?></h1>
<hr>
<?php echo validation_errors(); ?>

<?php echo form_open_multipart('posts/update/'.$post['id']); ?>
  <label for="title">Title</label>
  <br>
  <input type="text" name="title" id="title" value="<?php echo $post['title']; ?>">
  <br>
  <label for="image">Featured Image</label>
  <br>
  <img src="<?php echo base_url().'application/assets/img/posts/'.$post['image']; ?>" alt="<?php echo $post['image']; ?>">
  <br>
  <input type="file" name="userfile" id="image" size="20">
  <br>
  <label for="body">Body</label>
  <br>
  <textarea name="body" id="body" cols="30" rows="10"><?php echo $post['body']; ?></textarea>
  <br><br>
  <label for="category">Category</label>
  <br>
  <select name="category_id" id="category">
    <?php foreach($categories as $category) : ?>
      <option value="<?php echo $category['id'] ?>" <?php if ($category['id'] === $selectedCategory['id']) { echo 'selected'; } ?>><?php echo ucfirst($category['name']); ?></option>
    <?php endforeach; ?>
  </select>
  <br><br>
  <input type="submit" value="Update">
</form>

<script>
  CKEDITOR.replace('body');
</script>