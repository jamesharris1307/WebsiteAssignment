<?php

//Declare Variables
$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$dateBirth = $_POST["dateBirth"];
$email = $_POST["email"];
$username = $_POST["username"];
$password_hash = $_POST["password"];
$verifyPassword = $_POST["verifyPassword"];

// Data Validation
if (!$firstName) {
    die ("First Name is Required");
} else if (!$lastName) {
    die("Last Name is Required");
} else if (!$dateBirth) {
    die("Date of Birth is Required");
} else if (!$email) {
    die("Email is Required");
} else if (strpos($email, '@') === false) {
    die("Missing '@' in Email Address");
} else if (!$username) {
    die("Username is Required");
} else if (!$password_hash) {
    die("Password is Required");
} else if ($verifyPassword != $password_hash) {
    die("Passwords Do Not Match");
}

/* Hash Password
$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
*/

// Include the User Database
include("user-connect.php");

// Error Handling
if (mysqli_connect_errno()) {
    die("Connection error: " . mysqli_connect_error());
}

// Send to Database
$sql = "INSERT INTO user (firstName,
                          lastName,
                          dateBirth,
                          email,
                          username,
                          password_hash)
        VALUES (?, ?, ?, ?, ?, ?)";

$stmt = mysqli_stmt_init($connect);

if (!mysqli_stmt_prepare($stmt, $sql)) {
    die(mysqli_error($connect));
}

// Send to Database
mysqli_stmt_bind_param(
    $stmt,
    "ssssss",
    $firstName,
    $lastName,
    $dateBirth,
    $email,
    $username,
    $password_hash,
);

mysqli_stmt_execute($stmt);

// Send user to new page
header("Location: home.php");
