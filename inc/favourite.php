<?php
  include_once 'dbc.php';

  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

  if (!isset($_SESSION["USER_ID"])) {
    header("Location: /worldmovies/loginregister.php");
    exit();
  }

  if (isset($_POST['movieId']) && (isset($_POST['action']))) {
    if ($_POST['action'] == 'add') {
      $query_addfavourite = "INSERT INTO favourite VALUES (:userid, :movieid)";

      $stmt_addfavourite = $pdo->prepare($query_addfavourite);
      $stmt_addfavourite->execute([
        ':userid' => $_SESSION["USER_ID"],
        ':movieid' => $_POST['movieId']
      ]);

      echo "added";
    } elseif ($_POST['action'] == 'remove') {
      $query_removefavourite = "DELETE FROM favourite WHERE userid = :userid AND movieid = :movieid";

      $stmt_removefavourite = $pdo->prepare($query_removefavourite);
      $stmt_removefavourite->execute([
        ':userid' => $_SESSION["USER_ID"],
        ':movieid' => $_POST['movieId']
      ]);

      echo "removed";
    }

  }

?>
