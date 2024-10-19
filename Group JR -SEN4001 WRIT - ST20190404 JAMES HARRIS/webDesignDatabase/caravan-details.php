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
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Caravan Details Page</title>
    <link rel="stylesheet" href="view.css" />

  </head>
  <body class="body-home">
    <!--Banner -->
    <header class="headerNotFixed">
        <a href="welcome.html" class="logo">RentMyCaravan</a>
      <nav class="navbar">
        <a href="home.php">Home</a>
        <a href="about.html">About</a>

        <?php if (isset($_SESSION["user_id"])): ?>
          <a href="logout.php">Logout <?=($_SESSION["firstName"]);
          ?>
        </a>

       <!-- <?php else: ?>
          <a href="logout.php">Login<?"Logout"?></a>
        <?php endif; ?>-->
      </nav>
    </header>

    <!--Seperate Welcome Message-->
    <div class="seperate-index"></div>

    <!--Display Details-->
    <div class="container-form">
      <table class="table">
        <tr>
            <th>Make</th>
            <th>Model</th>
            <th>Body Type</th>
            <th>Fuel Type</th>
            <th>Mileage</th>
            <th>Location</th>
            <th>Year</th>
            <th>Number of Doors</th>
        </tr>
    </div>


<?php

//Include Connection
include("user-connect.php");

//Check Caravan ID
if (isset($_GET['caravanID'])) {
  $caravanID = $_GET['caravanID'];
}

//Get Details
$sql = "SELECT make, model, bodyType, fuelType, mileage, location, year, numDoors, image FROM caravan WHERE caravanID = '$caravanID'";
$result = $connect->query($sql);

if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<img class='image'src='" . $row["image"] . "' alt='Caravan Image'>";
        echo "<br>";
        echo "<br>";
        echo "<td>" . $row["make"] . "</td>";
        echo "<td>" . $row["model"] . "</td>";
        echo "<td>" . $row["bodyType"] . "</td>";
        echo "<td>" . $row["fuelType"] . "</td>";
        echo "<td>" . $row["mileage"] . "</td>";
        echo "<td>" . $row["location"] . "</td>";
        echo "<td>" . $row["year"] . "</td>";
        echo "<td>" . $row["numDoors"] . "</td>";
} elseif (!isset($_GET['caravanID'])) {
  echo "Caravan ID not provided";
} else {
  echo "Caravan not found";
}

//Close Connection
$connect->close();

?>

</table>

    <!--Seperate Welcome Message-->
    <div class="seperate-index"></div>
    <!---------------------------->

</body>
</html>