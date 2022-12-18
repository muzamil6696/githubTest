<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="css/fontawesome6.css" />
<link rel="stylesheet" href="css/main.css" />

<script src="js/jquery.min.js"></script>
<script src="js/main.js"></script>
</head>

<body>
<!-- START: HEADER -->
<header>
  <img id="logo" src="images/logo-white.png" />

  <nav id="menu">
    <div class="menu-item">
      <a href="index.php">
        <i class="fa-solid fa-film"></i>
        Movies</a>
    </div>
    <div class="menu-item">
      <a href="about-us.php">
        <i class="fa-solid fa-building"></i>
        About Us</a>
    </div>
    <div class="menu-item">
      <a href="contact.php">
        <i class="fa-solid fa-paper-plane"></i>
        Contact</a>
    </div>
    <?php
      if (session_status() == PHP_SESSION_NONE) {
        session_start();
      }

      if (isset($_SESSION["USER_ID"])) {
        echo "<div class=\"menu-item\">
          <a href=\"myaccount.php\">
            <i class=\"fa-solid fa-user\"></i>
            My Account</a>
        </div>";
      } else {
        echo "<div class=\"menu-item\">
          <a href=\"loginregister.php\">
            <i class=\"fa-solid fa-right-to-bracket\"></i>
            Sign In / Register</a>
        </div>";
      }
    ?>

  </nav>

  <div id="menu-toggle" onclick="toggleDisplay('#menu')">
    <i class="fa-solid fa-bars"></i>
  </div>
</header>
<!-- END: HEADER -->
