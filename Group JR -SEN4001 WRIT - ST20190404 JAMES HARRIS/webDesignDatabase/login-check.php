<?php

// Include the User Database
include("user-connect.php");

// Declare Variables
$username = $_POST['username'];
$password = $_POST['password'];

if (!$username) {
    die("Username is Required");
}

if (!$password) {
    die("Password is Required");
}

// Find details from database
$sql = "select * from user where username = '$username' and password_hash = '$password'";

//Check Information
$sql = "SELECT * FROM user WHERE username = ? AND password_hash = ?";
$stmt = $connect->prepare($sql);
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$result = $stmt->get_result();
$count = $result->num_rows;

$user = $result->fetch_assoc();

if ($count == 1) {
    session_start();
    $_SESSION["user_id"] = $user["id"];
    $_SESSION["firstName"] = $user["firstName"];
    $_SESSION["lastName"] = $user["lastName"];
    $_SESSION["email"] = $user["email"];
    header("Location: home.php");
    exit;
} else {
    header("Location: login.html");
    exit;
}

$connect->close();
$stmt->close();
