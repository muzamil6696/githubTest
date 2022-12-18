<?php
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  include_once 'inc/dbc.php';

  if (isset($_POST['login'])) {
    $query = "SELECT * FROM users WHERE email = :email";

    $stmt = $pdo->prepare($query);
    $stmt->execute([
      ':email' => $_POST['login-email']
    ]);

    if ($stmt->rowCount() == 0) {
      header("Location: /worldmovies/loginregister.php?login=incorrect");
      exit();
    } else {
      while($result = $stmt->fetch()) {
        if(!password_verify($_POST['login-password'], $result['password'])) {
          header("Location: /worldmovies/loginregister.php?login=incorrect");
          exit();
        } else {
          $_SESSION["USER_ID"] = $result['userid'];
          $_SESSION["USER_NAME"] = $result['name'];
          $_SESSION["USER_EMAIL"] = $result['email'];

          header("Location: /worldmovies/myaccount.php");
          exit();
        }
      }
    }
  }

  if (isset($_POST['register'])) {
    // Check if user name is valid
    if(!preg_match("/^[a-zA-Z]+(([\'\,\.\- ][a-zA-Z ])?[a-zA-Z]*)*$/", $_POST['register-name'])) {
      header("Location: /worldmovies/loginregister.php?register=nameinvalid");
      exit();
    }

    // Check if email is valid
    if(!filter_var($_POST['register-email'], FILTER_VALIDATE_EMAIL)) {
      header("Location: /worldmovies/loginregister.php?register=emailinvalid");
      exit();
    }

    // Check if password and repeat password match
    if ($_POST['register-password'] !== $_POST['register-password2']) {
      header("Location: /worldmovies/loginregister.php?register=passwordmismatch");
      exit();
    }

    // Check if email is unique
    $query_registeremailunique = "SELECT * FROM users WHERE email = :email";

    $stmt = $pdo->prepare($query_registeremailunique);
    $stmt->execute([
      ':email' => $_POST['register-email']
    ]);

    if ($stmt->rowCount() > 0) {
      // If email is not unique return to login page
      header("Location: /worldmovies/loginregister.php?register=emailexists");
      exit();
    } else {
      // If email is unique, hash the password and insert new user in the database. Redirect to myaccount.
      $hashedPassword = password_hash($_POST['register-password'], PASSWORD_DEFAULT);

      $query_registerinsertuser = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";

      $stmt = $pdo->prepare($query_registerinsertuser);
      $stmt->execute([
        ':name' => $_POST['register-name'],
        ':email' => $_POST['register-email'],
        ':password' => $hashedPassword
      ]);

      $id = $pdo->lastInsertId();

      $_SESSION["USER_ID"] = $id;
      $_SESSION["USER_NAME"] = $_POST['register-name'];
      $_SESSION["USER_EMAIL"] = $_POST['register-email'];

      // Send email to registered user
      $to = $_POST['register-email'];
      $subject = "Welcome to WorldMovies";
      $message = "Hello " . $_POST['register-name'] . ",\n\nThank you for registering on our website.";
      $headers = "From: no-reply@worldmovies.abc";

      // $headers = 'Content-Type: text/html; charset=UTF-8' . "\r\n" .
      //           'From: no-reply@worldmovies.abc' . "\r\n";

      try {
        mail($to, $subject, $message, $headers);
      } catch (Exception $e) {

      }

      header("Location: /worldmovies/myaccount.php");
      exit();
    }
  }


?>
