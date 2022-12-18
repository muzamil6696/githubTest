<!DOCTYPE html>
<html lang="en">

<?php
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

  include_once 'inc/dbc.php';
?>
<head>
  <title>WorldMovies | </title>
  <meta name="description" content="Your page description (150 characters)" />

  <?php
    include 'inc/top.php';
  ?>


  <!-- START: MAIN CONTAINER -->
  <div id="main-container">

    <!-- START: MAIN -->
    <div id="main">
      <?php
        if (isset($_GET['id']) && (int) $_GET['id'] > 0) {
          // get movie details from database
          $query_getmovie = "SELECT * FROM movie WHERE movieid = :movieid";
          $stmt_getmovie = $pdo->prepare($query_getmovie);
          $stmt_getmovie->execute([
            ':movieid' => $_GET['id']
          ]);

          if ($stmt_getmovie->rowCount() > 0) {
            while($result_getmovie = $stmt_getmovie->fetch()) {
              // pass them on the page
              echo "<div id=\"main-top\">
                <h1>" . $result_getmovie['title'] . "</h1>
              </div>

              <div id=\"main-body\">
                <img src=/worldmovies/" . $result_getmovie['poster'] . "><br>
                Year: " . $result_getmovie['year'] . "<br>
                Description: " . $result_getmovie['description'] . "
              </div>";
            }
          }
        }
      ?>

    </div>
    <!-- END: MAIN -->


  </div>
  <!-- END: MAIN CONTAINER -->

  <?php
    include 'inc/bottom.php';
  ?>
