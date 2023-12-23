<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../Login&RegistrationForm/Form.php");
    exit();
}

// Retrieve the follower_id from the session
$follower_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include '../DatabaseConnection/db_connect.php';

    // Get the user_id and action from the POST data
    $user_id = $_POST['user_id'];
    $action = $_POST['action'];

    // Check if the user is already following
    $check_query = "SELECT * FROM user_followers WHERE user_id = $user_id AND follower_id = $follower_id";
    $check_result = mysqli_query($link, $check_query);

    if ($check_result && mysqli_num_rows($check_result) > 0) {
        // User is already following, so unfollow
        $delete_query = "DELETE FROM user_followers WHERE user_id = $user_id AND follower_id = $follower_id";
        $delete_result = mysqli_query($link, $delete_query);

        if ($delete_result) {
            // Unfollow successful
            $_SESSION['follow_status'] = 'unfollowed';
        } else {
            // Unfollow failed
            $_SESSION['follow_status'] = 'error';
        }
    } else {
        // User is not following, so follow
        $insert_query = "INSERT INTO user_followers (user_id, follower_id) VALUES ($user_id, $follower_id)";
        $insert_result = mysqli_query($link, $insert_query);

        if ($insert_result) {
            // Follow successful
            $_SESSION['follow_status'] = 'followed';
        } else {
            // Follow failed
            $_SESSION['follow_status'] = 'error';
        }
    }

    // Redirect back to the previous page
    $return_url = $_POST['return_url'];
    header("Location: $return_url");
    exit();
} else {
    // Invalid request method
    // You can handle this according to your needs (e.g., show an error page)
    exit();
}
?>
