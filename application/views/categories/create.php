<section>
  <h1>Create Category</h1>
  <hr>
  <?php echo validation_errors(); ?>
  <?php echo form_open('/categories/store'); ?>
    <label for="name">Name</label>
    <br>
    <input type="text" name="name" id="name" placeholder="Category...">
    <br><br>
    <input type="submit" value="Create">
  </form>
</section>