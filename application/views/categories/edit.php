<section>
  <h1>Update Category <?php echo $category['name']; ?></h1>
  <hr>
  <?php echo validation_errors(); ?>
  <?php echo form_open('/categories/update/'.$category['id']); ?>
    <label for="name">Name</label>
    <br>
    <input type="text" name="name" id="name" placeholder="Category..." value="<?php echo $category['name']; ?>">
    <br><br>
    <input type="submit" value="Update">
  </form>
</section>