<?php
include '../../DatabaseConnection/db_connect.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $guide_id = $_GET['guide_id'];
    $comment_id = $_POST['comment_id'];
    $reply_name = $_POST['reply_name'];
    $reply_content = mysqli_real_escape_string($link, nl2br($_POST['reply_content']));

    // Insert the reply into the database
    $query = "INSERT INTO comment_replies (comment_id, reply_name, reply_content) VALUES ('$comment_id', '$reply_name', '$reply_content')";

    if (mysqli_query($link, $query)) {
        // Reply inserted successfully
        header("Location: ../Guides.php?guide_id=" . $guide_id . '#comments-section');
        exit;
    } else {
        // Error occurred while inserting the reply
        echo "Error: " . mysqli_error($link);
    }
}
?>
