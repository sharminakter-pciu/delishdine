<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurant_management";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Receive form data
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$user = $_POST['username'];
$pass = password_hash($_POST['password'], PASSWORD_DEFAULT); // secure

// Insert into database
$sql = "INSERT INTO customers (fullname, email, username, password) 
        VALUES ('$fullname', '$email', '$user', '$pass')";

if ($conn->query($sql) === TRUE) {
    echo "<h2>Signup Successful!</h2><p><a href='login.html'>Click here to login</a></p>";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>