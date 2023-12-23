<?php
include '../../DatabaseConnection/db_connect.php';

// Retrieve the form data
$guide_id = $_GET['guide_id'];
$rating = $_POST['rating'];
$name = $_POST['name'];
$comment = mysqli_real_escape_string($link, nl2br($_POST['opinion']));

// Insert the comment into the comments table
$sql = "INSERT INTO comments (guide_id, name, score, comment) VALUES ('$guide_id', '$name', '$rating', '$comment')";

$ret = mysqli_query($link, $sql);

if ($ret) {
    header('Location: ../Guides.php?guide_id=' . $guide_id . '#comments-section');
    exit();
} else {
    echo "Error submitting the comment: " . mysqli_error($link);
}

?>