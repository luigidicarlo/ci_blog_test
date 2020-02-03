<div class="Categories">
  <a href="/categories/create">Add Category</a>
  <hr>
  <?php foreach($categories as $category) : ?>
    <div class="Category">
      <h3><?php echo $category['name']; ?></h3>
      <h4>Created on: <?php $date = strtotime($category['created_at']); echo date('d/m/Y - h:i:s A', $date); ?></h4>
      <a href="/categories/<?php echo $category['id']; ?>">View Posts</a>
      <br><br>
      <a href="/categories/edit/<?php echo $category['id']; ?>">Edit</a>
      <br><br>
      <?php if (intval($category['id']) !== 1) : ?>
        <?php echo form_open('/categories/delete/'.$category['id']) ?>
          <input type="submit" value="Delete">
        </form>
      <?php endif; ?>
      <hr>
    </div>
  <?php endforeach; ?>
</div>