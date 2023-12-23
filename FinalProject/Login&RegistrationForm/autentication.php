<?php
include '../DatabaseConnection/db_connect.php';

session_start();

// Check if the login form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
	$email = $_POST["email"];
	$password = md5($_POST["password"]);

	// Query the database to check if the user exists
	$query = "SELECT * FROM register WHERE email='$email' AND password='$password'";
	$result = mysqli_query($link, $query);

	// Check if a matching row was found
	if (mysqli_num_rows($result) === 1) {
		// Fetch the user_id and username from the result
        $row = mysqli_fetch_assoc($result);
        $user_id = $row['user_id'];
		$username = $row['name'];

        // Store the email and user_id and username in the session
        $_SESSION['email'] = $email;
        $_SESSION['user_id'] = $user_id;
		$_SESSION['username'] = $username;

		// Redirect to a protected page
		header('Location: ../Main Page/MainPage.php');
		exit();
	} else {
		// User does not exist or incorrect credentials
		echo "Invalid email or password.";
	}
}

// Close the database connection
mysqli_close($link);
