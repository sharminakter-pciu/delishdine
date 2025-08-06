<?php
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
    $conn = new mysqli("localhost", "root", "", "restaurant");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch & sanitize input
    $name = $conn->real_escape_string($_POST['Name']);
    $address = $conn->real_escape_string($_POST['Address']);
    $email = $conn->real_escape_string($_POST['Email']);
    $phone = $conn->real_escape_string($_POST['Phone']);
    $date = $conn->real_escape_string($_POST['Date']);
    $type = $conn->real_escape_string($_POST['Type']);
    $table_number = (int) $_POST['Table_Number'];
    $time_in = $conn->real_escape_string($_POST['Time_In']);
    $time_out = $conn->real_escape_string($_POST['Time_Out']);

    // SQL Insert
    $sql = "INSERT INTO customer (Name, Address, Email, Phone, Date, Type, Table_Number, Time_In, Time_Out)
            VALUES ('$name', '$address', '$email', '$phone', '$date', '$type', $table_number, '$time_in', '$time_out')";

    if ($conn->query($sql) === TRUE) {
        $message = "<p class='success'>✅ Customer Registered Successfully!</p>";
    } else {
        $message = "<p class='error'>❌ Error: " . $conn->error . "</p>";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Customer Registration</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f2f2f2;
      padding: 30px;
    }
    .container {
      max-width: 480px;
      margin: auto;
      background: white;
      padding: 25px 30px;
      border-radius: 8px;
      box-shadow: 0 0 10px gray;
    }
    h2 {
      text-align: center;
      color: #333;
    }
    label {
      display: block;
      margin-top: 15px;
      font-weight: bold;
    }
    input, select {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      border: 1px solid #ccc;
      border-radius: 6px;
    }
    button {
      width: 100%;
      padding: 12px;
      background: #4caf50;
      color: white;
      border: none;
      font-size: 16px;
      margin-top: 20px;
      border-radius: 6px;
      cursor: pointer;
    }
    button:hover {
      background: #45a049;
    }
    .success {
      color: green;
      text-align: center;
      font-weight: bold;
    }
    .error {
      color: red;
      text-align: center;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Customer Registration</h2>
    <?= $message ?>
    <form method="POST" action="">
      <label for="name">Name</label>
      <input type="text" name="Name" required>

      <label for="address">Address</label>
      <input type="text" name="Address" required>

      <label for="email">Email</label>
      <input type="email" name="Email" required>

      <label for="phone">Phone</label>
      <input type="tel" name="Phone" required pattern="[0-9]{10,15}" placeholder="10-15 digits">

      <label for="date">Date</label>
      <input type="date" name="Date" required>

      <label for="type">Type</label>
      <select name="Type" required>
        <option value="">--Select--</option>
        <option value="Regular">Regular</option>
        <option value="VIP">VIP</option>
        <option value="New">New</option>
      </select>

      <label for="table_number">Table Number</label>
      <input type="number" name="Table_Number" required min="1">

      <label for="time_in">Time In</label>
      <input type="time" name="Time_In" required>

      <label for="time_out">Time Out</label>
      <input type="time" name="Time_Out" required>

      <button type="submit">Submit</button>
    </form>
  </div>
</body>
</html>