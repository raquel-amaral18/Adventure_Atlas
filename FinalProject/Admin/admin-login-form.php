<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Check if the username and password match
  if ($username === 'admin' && $password === '1234') {
    // Redirect to the list.php page
    header("Location: list.php");
    exit();
  } else {
    // Display an error message
    echo "Invalid username or password.";
  }
}
?>