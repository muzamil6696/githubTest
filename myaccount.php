<!DOCTYPE html>
<html lang="en">

<head>
  <title>WorldMovies | My Account</title>
  <meta name="description" content="Your page description (150 characters)" />

  <?php
    include 'inc/top.php';

    if (session_status() == PHP_SESSION_NONE) {
      session_start();
    }

    if (!isset($_SESSION["USER_ID"])) {
      header("Location: /worldmovies/loginregister.php");
      exit();
    }
  ?>


  <!-- START: MAIN CONTAINER -->
  <div id="main-container">

    <!-- START: MAIN -->
    <div id="main">
      <div id="main-top">
        <h1>My Account</h1>
      </div>

      <div id="main-body">
        <?php
          if (isset($_SESSION["USER_NAME"])) {
            echo "Welcome " . $_SESSION["USER_NAME"] . "!";
          }
        ?>
        <br><br>
        <a href="/worldmovies/logout.php">Logout</a>
      </div>
    </div>
    <!-- END: MAIN -->


  </div>
  <!-- END: MAIN CONTAINER -->

  <?php
    include 'inc/bottom.php';
  ?>
