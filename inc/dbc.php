<?php

  $username = "root";
  $password = "1234";
  $host = "localhost";
  $db = "worldmoviesdb";
  $charset = "utf8mb4";

  $options = [
    PDO::ATTR_ERRMODE             => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE  => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES    => false
  ];

  $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

  try {
    $pdo = new PDO($dsn, $username, $password, $options);
  } catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int) $e->getCode());
  }

?>
