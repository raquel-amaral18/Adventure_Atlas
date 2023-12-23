<?php
// Connect to the database
include '../DatabaseConnection/db_connect.php';

// Get the id from the url
$guide_id = $_REQUEST['guide_id'];

// Delete record from database
$sql = "DELETE FROM guides WHERE guide_id = $guide_id";

// Execute the query
$result = mysqli_query($link, $sql);

// Redirect to list.php
header("location:my_adventures.php");