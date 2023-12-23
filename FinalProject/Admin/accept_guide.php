<?php
// Connect to the database
include '../DatabaseConnection/db_connect.php';

// Check if the guide_id parameter is provided in the URL
if (isset($_GET['id'])) {
    $guide_id = $_GET['id'];

    // Update the accepted column for the corresponding guide_id
    $sql = "UPDATE guides SET accepted = 1 WHERE guide_id = $guide_id";

    // Execute the query
    $result = mysqli_query($link, $sql);

    if ($result) {
        // Guide accepted successfully
        header("location:list.php");
    } else {
        // Error occurred while accepting the guide
        echo "Error accepting the guide. Please try again.";
    }
} else {
    // Guide_id parameter is missing
    echo "Invalid request.";
}
?>
