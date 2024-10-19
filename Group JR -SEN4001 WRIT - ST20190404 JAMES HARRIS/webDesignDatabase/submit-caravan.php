<?php

//Session Start
session_start();


//Declare Variables
$userID = $_SESSION["user_id"];
$make = $_POST["make"];
$model = $_POST["model"];
$bodyType = $_POST["bodyType"];
$fuelType = $_POST["fuelType"];
$mileage = $_POST["mileage"];
$location = $_POST["location"];
$year = $_POST["year"];
$numDoors = $_POST["numDoors"];
$image = $_POST["image"];

//Data Validation
if (!$make) {
  die("Make Required");
} else if (!$model) {
  die("Model Required");
} else if (!$bodyType) {
  die("BodyType Required");
} else if (!$fuelType) {
  die("FuelType Required");
} else if (!$mileage) {
  die("Mileage Required");
} else if (!$location) {
  die("Location Required");
} else if (!$year) {
  die("Year Required");
} else if (!$numDoors) {
  die("Number of Doors Required");
} else if (!$image) {
  die("Image Required");
}

// Include the User Database
include("user-connect.php");

// Error Handling
if (mysqli_connect_errno()) {
  die("Connection error: " . mysqli_connect_error());
}

//Send to Database
$sql = "INSERT INTO caravan (
                            userID,
                            make,
                            model,
                            bodyType,
                            fuelType,
                            mileage,
                            location,
                            year,
                            numDoors,
                            image)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_stmt_init($connect);

if (!mysqli_stmt_prepare($stmt, $sql)) {
  die(mysqli_error($connect));
}

// Send to Database
mysqli_stmt_bind_param(
  $stmt,
  "issssssiss",
  $userID,
  $make,
  $model,
  $bodyType,
  $fuelType,
  $mileage,
  $location,
  $year,
  $numDoors,
  $image,
);

mysqli_stmt_execute($stmt);

// Send user to new page
header("Location: home.php");
