<!DOCTYPE html>
<html lang="en">

<head>
  <title>WorldMovies | Your personal movie database</title>
  <meta name="description" content="Your page description (150 characters)" />

  <?php
    if (session_status() == PHP_SESSION_NONE) {
      session_start();
    }

    include 'inc/top.php';
    include_once 'inc/dbc.php';
  ?>


  <!-- START: MAIN CONTAINER -->
  <div id="main-container">

    <!-- START: CATEGORIES -->
    <nav id="categories">
      <h4 id="categories-title">Browse by Category</h4>

      <div class="category-item">
        <a href="#" class="category-selected">All</a>
      </div>
      <div class="category-item">
        <a href="#">Action</a>
      </div>
      <div class="category-item">
        <a href="#">Adventure</a>
      </div>
      <div class="category-item">
        <a href="#">Comedy</a>
      </div>
      <div class="category-item">
        <a href="#">Romance</a>
      </div>
      <div class="category-item">
        <a href="#">Sci-Fi</a>
      </div>
    </nav>
    <!-- END: CATEGORIES -->

    <!-- START: MAIN -->
    <div id="main">

      <!-- START: MAIN TOP -->
      <div id="main-top">
        <h1>Movie Catalogue</h1>

        <div id="main-options">
          <div class="main-option">
            <label for="filter-year">Year:</label>
            <select name="filter-year" id="filter-year">
              <option value="all" selected>All</option>
              <option value="2022">2022</option>
              <option value="2021">2021</option>
              <option value="2020">2020</option>
              <option value="2019">2019</option>
              <option value="2018">2018</option>
            </select>
          </div>

          <div id="main-option-categories" class="main-option">
            <label for="filter-categories">Categories:</label>
            <select name="filter-categories" id="filter-categories">
              <option value="all" selected>All</option>
              <option value="action">Action</option>
              <option value="adventure">Adventure</option>
              <option value="comedy">Comedy</option>
              <option value="romance">Romance</option>
              <option value="sci-Fi">Sci-Fi</option>
            </select>
          </div>
        </div>

      </div>
      <!-- END: MAIN TOP -->

      <!-- START: MAIN BODY -->
      <div id="main-body">
        <?php
          $userFavourites = [];

          if (isset($_SESSION["USER_ID"])) {
            $query_favourites = "SELECT * FROM favourite WHERE userid = :userid";
            $stmt_favourites = $pdo->prepare($query_favourites);
            $stmt_favourites->execute([
              ':userid' => $_SESSION["USER_ID"]
            ]);

            if ($stmt_favourites->rowCount() > 0) {
              while($result_favourites = $stmt_favourites->fetch()) {
                array_push($userFavourites, $result_favourites['movieid']);
              }
            }
          }

          $query_allmovies = "SELECT * FROM movie";
          $stmt = $pdo->prepare($query_allmovies);
          $stmt->execute();

          if ($stmt->rowCount() == 0) {
            echo "No movies where found...";
          } else {
            while($result = $stmt->fetch()) {
              echo "<div class=\"movie\" data-movieid=\"" . $result['movieid'] . "\">
                <div class=\"movie-img\" style=\"background-image: url('" . $result['posterthumb'] . "')\">";

                if (isset($_SESSION["USER_ID"])) {
                  if (in_array($result['movieid'], $userFavourites)) {
                    echo "<div class=\"favourite\">
                      <i class=\"fas fa-heart\"></i>
                    </div>";
                  } else {
                    echo "<div class=\"favourite\">
                      <i class=\"far fa-heart\"></i>
                    </div>";
                  }
                }

              echo  "</div>
              <div class=\"movie-body\">
                  <h3 class=\"movie-title\">" . $result['title'] . " (" . $result['year'] . ")</h3>
                  <div class=\"movie-review\">
                    <div class=\"movie-star point\"></div>
                    <div class=\"movie-star point\"></div>
                    <div class=\"movie-star point\"></div>
                    <div class=\"movie-star point\"></div>
                    <div class=\"movie-star\"></div>
                  </div>
                </div>
              </div>";
            }
          }
        ?>

      </div>
      <!-- END: MAIN BODY -->

    </div>
    <!-- END: MAIN -->


  </div>
  <!-- END: MAIN CONTAINER -->

  <?php
    include 'inc/bottom.php';
  ?>
