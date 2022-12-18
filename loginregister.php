<!DOCTYPE html>
<html lang="en">

<head>
  <title>WorldMovies | Login / Register</title>
  <meta name="description" content="Your page description (150 characters)" />

  <?php
    include 'inc/top.php';
  ?>


  <!-- START: MAIN CONTAINER -->
  <div id="main-container">

    <!-- START: MAIN -->
    <div id="main">
      <div id="main-top">
        <h1>Login / Register</h1>
      </div>

      <?php
        if (isset($_GET['login']) && $_GET['login'] == "incorrect") {
          echo "<h5 class=\"notification errormsg\">Email or password incorrect.</h5>";
        }
        if (isset($_GET['logout']) && $_GET['logout'] == "success") {
          echo "<h5 class=\"notification successmsg\">You have been logged out!</h5>";
        }
        if (isset($_GET['register']) && $_GET['register'] == "nameinvalid") {
          echo "<h5 class=\"notification errormsg\">Name contains illegal characters.</h5>";
        }
        if (isset($_GET['register']) && $_GET['register'] == "emailinvalid") {
          echo "<h5 class=\"notification errormsg\">Email not in a valid format.</h5>";
        }
        if (isset($_GET['register']) && $_GET['register'] == "passwordmismatch") {
          echo "<h5 class=\"notification errormsg\">Password and Repeat Password do not match.</h5>";
        }
        if (isset($_GET['register']) && $_GET['register'] == "emailexists") {
          echo "<h5 class=\"notification errormsg\">Email already in use.</h5>";
        }
      ?>

      <div id="main-body">

        <div id="loginregister-body">
          <div id="login-block">
            <h2>Login</h2>
            <p>
              If you are a registered user, you can login using the form below.
            </p>

            <form id="login-form" name="login-form" action="auth.php" method="post">
              <label for="login-email">Email</label>
              <br>
              <input type="email" id="login-email" name="login-email" placeholder="Enter your email" required>
              <br><br>

              <label for="login-password">Password</label>
              <br>
              <input type="password" id="login-password" name="login-password" placeholder="Enter your password" required>
              <br><br>

              <input class="form-button" type="submit" name="login" value="Submit">
              <input class="form-button" type="reset" name="reset" value="Reset">
            </form>
          </div>

          <div id="register-block">
            <h2>Register</h2>
            <p>
              If you do not have an account yet, you can use the form below to register.
            </p>
            <form id="register-form" name="register-form" action="auth.php" method="post" >

              <label for="register-name">Name</label>
              <br>
              <input type="text" id="register-name" name="register-name" placeholder="Enter your name" required>
              <br><br>

              <label for="register-email">Email</label>
              <br>
              <input type="email" id="register-email" name="register-email" placeholder="Enter your email" required>
              <br><br>

              <label for="register-password">Password</label>
              <br>
              <input type="password" id="register-password" name="register-password" minlength="6" placeholder="Enter your password" required>
              <br><br>

              <label for="register-password2">Repeat Password</label>
              <br>
              <input type="password" id="register-password2" name="register-password2" minlength="6" placeholder="Re-enter your password" required>
              <br><br>

              <input class="form-button" type="submit" name="register" value="Submit">
              <input class="form-button" type="reset" name="reset" value="Reset">
            </form>
          </div>
        </div>


      </div>
    </div>
    <!-- END: MAIN -->


  </div>
  <!-- END: MAIN CONTAINER -->

  <?php
    include 'inc/bottom.php';
  ?>
