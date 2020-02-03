<a href="/posts">Go Back</a>
<h1><?php echo $title; ?></h1>
<hr>
<?php echo validation_errors(); ?>

<?php echo form_open_multipart('posts/create'); ?>
<label for="title">Title</label>
<br>
<input type="text" name="title" id="title">
<br>
<label for="image">Featured Image</label>
<br>
<input type="file" name="userfile" id="image" size="20">
<br>
<label for="body">Body</label>
<br>
<textarea name="body" id="body" cols="30" rows="10"></textarea>
<br><br>
<label for="category">Category</label>
<br>
<select name="category_id" id="category">
  <?php foreach ($categories as $category) : ?>
    <option value="<?php echo $category['id'] ?>"><?php echo ucfirst($category['name']); ?></option>
  <?php endforeach; ?>
</select>
<br><br>
<input type="submit" value="Create">
</form>

<script>
  CKEDITOR.replace('body');
</script>