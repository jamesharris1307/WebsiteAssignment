<?php

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
  <title>View Caravan Page</title>
  <link rel="stylesheet" href="styleSheet.css" />

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

        <!-- <?php else : ?>
          <a href="logout.php">Login<? "Logout" ?></a>
        <?php endif; ?>-->
    </nav>
  </header>

  <!--Seperate Welcome Message-->
  <div class="seperate-index"></div>

  <!--Welcome Title-->
  <section>
    <h1 class="welcome">View Caravans</h1>
  </section>

  <!--Display Image-->
  <div>
    <table class="table">
      <tr>
        <th class="image"></th>
      </tr>
  </div>


  <?php

  // Include the Database
  include("user-connect.php");

  //Get From Database
  $sql = "SELECT caravanID, image FROM caravan";
  $result = $connect->query($sql);

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td><a href='caravan-details.php? caravanID=" . $row["caravanID"] . "'><img src='" . $row["image"] . "' alt='Product Image'></a></td>";
      echo "</tr>";
    }
  } else {
    echo "0 Results";
  }

  //Close Connection
  $connect->close();
  ?>

  </table>

</body>

</html>