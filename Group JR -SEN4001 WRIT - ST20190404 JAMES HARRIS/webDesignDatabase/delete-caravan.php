<?php

session_start();

//Check if User is logged In
if (isset($_SESSION["user_id"])) {
  //print_r($_SESSION);
  $sessionUserID = $_SESSION["user_id"];
} else {
  header("Location: login.php");
  //echo "fail";
  exit();
}

// Check if Caravan ID exists
if (isset($_POST['caravanID'])) {
  $caravanID = $_POST['caravanID'];
} else {
  echo "fail";
  header("Location: home.php");
  exit();
}

// Include the User Database
include("user-connect.php");

//Error Handling
if (mysqli_connect_errno()) {
  die("Connection error: " . mysqli_connect_error());
}

//Delete From Database
$sql = "DELETE FROM caravan WHERE caravanID = $caravanID";

//Redirect or Error Message
if ($connect->query($sql) == FALSE) {
  echo "FAIL";
} else {
  header("Location: home.php");
}
