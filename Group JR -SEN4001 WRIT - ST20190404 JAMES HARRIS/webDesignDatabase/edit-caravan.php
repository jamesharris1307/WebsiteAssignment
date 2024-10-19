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
  <title>Edit Caravan Page</title>
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

      <?php else : ?>
        <a href="logout.php">Login<? "Logout" ?></a>
      <?php endif; ?>
    </nav>
  </header>

  <!--Seperate Welcome Message-->
  <div class="seperate-index"></div>

  <!--Welcome Title-->
  <section>
    <h1 class="welcome">Edit Caravans</h1>
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

  //Display Information
  $sql = "SELECT caravanID, image FROM caravan WHERE userID = $sessionUserID ";
  $result = $connect->query($sql);

  if ($result->num_rows > 0) {
    // Display caravans associated with the user
    echo "<table class='table'>";
    while ($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td>
            <a href='edit-caravan-details.php?caravanID=" . $row["caravanID"] . "'><img src='" . $row["image"] . "' alt='Product Image'></a>
            <a href='edit-caravan-details.php?caravanID=" . $row["caravanID"] . "></a>
            <a href='delete-caravan.php?caravanID=" . $row["caravanID"] . "></a>
            </td>";
      echo "</tr>";
    }
  } elseif (!$sessionUserID == $userDB) {
    echo "No caravans Found";
    header('location:error-page.html');
  } else {
    echo "User not found";
  }

  //Close Connection
  $connect->close();
  ?>

  </table>

</body>

</html>