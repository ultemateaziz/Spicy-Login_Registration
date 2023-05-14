<?php

// Start session
session_start();

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Get form data
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Connect to database
  $conn = mysqli_connect('localhost', 'root', '', 'spicy_regs');

  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Prepare select statement
  $sql = "SELECT * FROM user_login WHERE email='$email'";

  // Execute select statement
  $result = mysqli_query($conn, $sql);

  // Check if email exists
  if (mysqli_num_rows($result) == 1) {
    // Get user data
    $row = mysqli_fetch_assoc($result);
    $stored_password = $row['psw'];
    echo $stored_password;
    echo $password;

    // Check if password is correct
    if ($password== $stored_password) {
      // Login successful
      $_SESSION['email'] = $email;
      header("Location: home.html");
      exit();
    } else {
      // Password is incorrect
      echo "Incorrect password";
    }
  } else {
    // Email does not exist
    echo "Email does not exist";
  }

  // Close connection
  mysqli_close($conn);
}

?>
