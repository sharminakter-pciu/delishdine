<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurant_management";

// Connect to DB
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get POST data
$user = $_POST['username'];
$pass = $_POST['password'];

// Check user in database
$sql = "SELECT * FROM customers WHERE username = '$user'";
$result = $conn->query($sql);

if ($result->num_rows === 1) {
  $row = $result->fetch_assoc();

  if (password_verify($pass, $row['password'])) {
    $_SESSION['username'] = $user;
    header("Location: booking.html"); // successful login
    exit();
  } else {
    echo "<h3>❌ Incorrect password.</h3>";
  }
} else {
  echo "<h3>❌ Username not found.</h3>";
}

$conn->close();
?>