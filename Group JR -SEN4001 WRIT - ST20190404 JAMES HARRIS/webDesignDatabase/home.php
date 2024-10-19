<?php

//Start Session
session_start();

// Check if User is logged In
if (isset($_SESSION["user_id"])) {
  //print_r($_SESSION);
  $sessionUserID = $_SESSION["user_id"];
} else {
  header("Location: login.html");
  exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home Page</title>
  <link rel="stylesheet" href="styleSheet.css" />
</head>

<body class="body-home">

  <!--Banner -->
  <header class="header">
    <a href="welcome.html" class="logo">RentMyCaravan</a>
    <nav class="navbar">
      <a href="about.html">About</a>

      <?php if (isset($_SESSION["user_id"])) : ?>
        <a href="logout.php">Logout <?= ($_SESSION["firstName"]);
                                    ?>
        </a>

      <?php else : ?>
        <a href="logout.php">Login<? "Logout" ?></a>
      <?php endif; ?>
    </nav>
  </header>

  <!--Seperate Welcome Message-->
  <div class="sep-home"></div>

  <!--Welcome Title-->
  <section>
    <h1 class="welcome">Home</h1>
  </section>

  <!--View Caravan Button-->
  <div>
    <div class="button-position">
      <div>
        <a href="view-caravan.php">
          <button>View Caravans</button>
        </a>
      </div>

      <!--Seperate Welcome Message-->
      <div class="seperate-home-buttons"></div>

      <!--Add Caravan Button-->
      <div>
        <a href="add-caravan.php">
          <button>Add Caravan</button>
        </a>
      </div>
    </div>

    <!--Edit Caravan Button-->
    <div class="button-position">
      <div>
        <a href="edit-caravan.php">
          <button>Edit Caravan</button>
        </a>
      </div>
    </div>
  </div>
  <!----------------------------->
</body>

</html>