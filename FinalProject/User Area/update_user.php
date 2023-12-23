<?php
session_start();
include '../DatabaseConnection/db_connect.php';

$user_id = $_SESSION['user_id'];

// Handle the description update
if (isset($_POST['description']) && !empty($_POST['description'])) {
    $description = mysqli_real_escape_string($link, nl2br($_POST['description']));

    // Update the description in the database
    $sql = "UPDATE register SET description = '$description' WHERE user_id = '$user_id'";
    mysqli_query($link, $sql); // Execute the SQL query
}

if (isset($_FILES['image']) && is_uploaded_file($_FILES['image']['tmp_name'])) {
    $targetDir = 'uploads/';

    // Generate new file name
    $fileName = $user_id . '.jpg';
    $targetPath = $targetDir . $fileName;

    // Delete previous image if it exists
    $previousImage = $targetDir . $fileName;
    if (file_exists($previousImage)) {
        unlink($previousImage);
    }

    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
        $user_image = $targetPath; // Update the user image path

    }
}

// Redirect to my_adventures.php
header("Location: my_adventures.php");
exit();
?>
