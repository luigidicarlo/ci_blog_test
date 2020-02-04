<div class="UserRegistration">
  <h1>Sign Up</h1>
  <p>
    Sign up to get access to advanced features such as writing your own posts.
  </p>
  <hr>
  <?php echo form_open('users/store'); ?>
    <label for="username">Username</label>
    <br>
    <input type="text" name="username" id="username" placeholder="Username...">
    <br>
    <label for="email">Email</label>
    <br>
    <input type="email" name="email" id="email" placeholder="example@domain.com">
    <br>
    <label for="password">Password</label>
    <br>
    <input type="password" name="password" id="password" placeholder="Password...">
    <br>
    <label for="repeatPassword">Repeat Password</label>
    <br>
    <input type="password" name="repeatPassword" id="repeatPassword" placeholder="Repeat Password...">
    <br><br>
    <input type="submit" value="Register">
  </form>
</div>