<?php

//Start Session
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

//Get User Input
$updateMake = $_POST["make"];
$updateModel = $_POST["model"];
$updateBodyType = $_POST["bodyType"];
$updateFuelType = $_POST["fuelType"];
$updateMileage = $_POST["mileage"];
$updateLocation = $_POST["location"];
$updateYear = $_POST["year"];
$updateNumDoors = $_POST["numDoors"];
$updateImage = $_POST["image"];

//Data Validation
if (!$updateMake) {
  die("Make Required");
} else if (!$updateModel) {
  die("Model Required");
} else if (!$updateBodyType) {
  die("BodyType Required");
} else if (!$updateFuelType) {
  die("FuelType Required");
} else if (!$updateMileage) {
  die("Mileage Required");
} else if (!$updateLocation) {
  die("Location Required");
} else if (!$updateYear) {
  die("Year Required");
} else if (!$updateNumDoors) {
  die("Number of Doors Required");
} else if (!$updateImage) {
  die("Image Required");
}

//Error Handling
if (mysqli_connect_errno()) {
  die("Connection error: " . mysqli_connect_error());
}

//Update data in Database
$sql = "UPDATE caravan SET make = '$updateMake', 
                           model = '$updateModel', 
                           bodyType = '$updateBodyType',
                           fuelType = '$updateFuelType',
                           mileage = '$updateMileage',
                           location = '$updateLocation',
                           year = '$updateYear',
                           numDoors = '$updateNumDoors',
                           image = '$updateImage' 
        WHERE caravanID = $caravanID";

if ($connect->query($sql) == FALSE) {
  echo "FAIL";
} else {
  header("Location: home.php");
}
