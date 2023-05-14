<?php

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Get form data
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Connect to database
  $conn = mysqli_connect('localhost', 'root', '', 'spicy_regs');

  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Prepare insert statement
  $sql = "INSERT INTO user_login(username, email, psw) VALUES ('$username', '$email', '$password')";

  // Execute insert statement
  if (mysqli_query($conn, $sql)) {
    echo "Record inserted successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

  // Close connection
  mysqli_close($conn);
}

?>
