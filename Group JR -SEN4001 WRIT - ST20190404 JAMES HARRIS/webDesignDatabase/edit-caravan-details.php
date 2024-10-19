<?php

//Session Start
session_start();

// Check if User is logged In
if (isset($_SESSION["user_id"])) {
  //print_r($_SESSION);
  $sessionUserID = $_SESSION["user_id"];
} else {
  header("Location: login.html");
  exit();
}

// Check if Caravan ID exists
if (isset($_GET['caravanID'])) {
  $caravanID = $_GET['caravanID'];
  //echo "Caravan ID: " . $caravanID;
} else {
  header("Location: home.php");
  exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Edit Caravan Details Page</title>
  <link rel="stylesheet" href="styleSheet.css" />
  <script defer src="add-caravan-validate.js"></script>
</head>

<body class="body-login">
  <!--Banner -->
  <header class="headerNotFixed">
    <a href="welcome.html" class="logo">RentMyCaravan</a>
    <nav class="navbar">

      <a href="home.php">Home</a>
      <a href="about.html">About</a>

      <?php if (isset($_SESSION["user_id"])) : ?>
        <a href="logout.php">Logout <?= ($_SESSION["firstName"]);
                                    ?>
        </a>

        <!--<?php else : ?>
          <a href="logout.php">Login<? "Logout" ?></a>
        <?php endif; ?>-->
    </nav>
  </header>

  <!--Seperate-->
  <div class="seperate-register"></div>

  <!--Welcome Message-->
  <section>
    <h1 class="welcome">Edit Caravan</h1>
  </section>

  <!--Seperate-->
  <div class="seperate-register-2"></div>

  <!--Display Data Validation-->
  <div class="container-form errorMessage" id="error"></div>


  <!--Input Details-->
  <form action="update-caravan-details.php" method="post" class="container-form" id="form">
    <!--Caravan ID hidden input-->
    <input type="hidden" name="caravanID" value="<?php echo $caravanID; ?>">

    <!--Make of Caravan-->
    <input type="text" id="make" name="make" placeholder="Make:" />

    <!--Caravan Model-->
    <input type="text" id="model" name="model" placeholder="Model: " />

    <!--Caravan BodyType-->
    <input type="text" id="bodyType" name="bodyType" placeholder="Body Type:" />

    <!--Caravan FuelType-->
    <input type="text" id="fuelType" name="fuelType" placeholder="Fuel Type:" />

    <!--Caravan Mileage-->
    <input type="text" id="mileage" name="mileage" placeholder="Mileage:" />

    <!--Caravan Location-->
    <input type="text" id="location" name="location" placeholder="Location:" />

    <!--Caravan Year-->
    <input type="text" id="year" name="year" placeholder="Year:" />

    <!--Caravan Number of Doors-->
    <input type="text" id="numDoors" name="numDoors" placeholder="Number of Doors:" />

    <!--Caravan Image-->
    <input type="text" id="image" name="image" placeholder="Caravan Image URL:" />

    <!--Submit Details Button-->
    <input type="submit" value="Edit Caravan" class="continue" />
  </form>

  <form action="delete-caravan.php" method="post" class="container-form">
    <!--Caravan ID hidden input-->
    <input type="hidden" name="caravanID" value="<?php echo $caravanID; ?>">
    <!--Submit Details Button-->
    <input class="delete-button" type="submit" value="Delete Caravan" class="continue" />
  </form>


  <!--Seperate-->
  <div class="seperate-register-2"></div>
</body>

</html>