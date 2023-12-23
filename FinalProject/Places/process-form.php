<?php
session_start();

include '../DatabaseConnection/db_connect.php';

// Escape user inputs for security
$guideTitle = mysqli_real_escape_string($link, $_POST['guide-title']);
$location = $_POST['location'];
$travelTypes = isset($_POST['travel-type']) ? implode(", ", $_POST['travel-type']) : '';
$guideSummary = mysqli_real_escape_string($link, nl2br($_POST['guide-summary']));
$detailedParagraph = mysqli_real_escape_string($link, nl2br($_POST['detailed-paragraph']));
$t_section1 = mysqli_real_escape_string($link, $_POST['section1-title']);
$s_section1 = mysqli_real_escape_string($link, nl2br($_POST['section1-content']));
$t_section2 = mysqli_real_escape_string($link, $_POST['section2-title']);
$s_section2 = mysqli_real_escape_string($link, nl2br($_POST['section2-content']));
$t_section3 = mysqli_real_escape_string($link, $_POST['section3-title']);
$s_section3 = mysqli_real_escape_string($link, nl2br($_POST['section3-content']));
$t_section4 = mysqli_real_escape_string($link, $_POST['section4-title']);
$s_section4 = mysqli_real_escape_string($link, nl2br($_POST['section4-content']));

$email = $_SESSION['email'];

// Prepare the SQL query to retrieve the userID
$query = "SELECT user_id FROM register WHERE email = '$email'";

// Execute the query
$result = mysqli_query($link, $query);

// Check if the query was successful
if ($result) {
    // Check if any rows were returned
    if (mysqli_num_rows($result) > 0) {
        // Fetch the row and extract the userID
        $row = mysqli_fetch_assoc($result);
        $userId = $row['user_id'];
    }
}

// Prepare the query to insert the guide into the database
$sql = "INSERT INTO guides (user_id, guide_title, location, adventure_types, guide_summary, detailed_paragraph, t_section1, s_section1, t_section2, s_section2, t_section3, s_section3, t_section4, s_section4) 
        VALUES ('$userId', '$guideTitle', '$location', '$travelTypes', '$guideSummary', '$detailedParagraph', '$t_section1', '$s_section1', '$t_section2', '$s_section2', '$t_section3', '$s_section3', '$t_section4', '$s_section4')";

$ret = mysqli_query($link, $sql);

if ($ret) {
    // Retrieve the last inserted guide_id
    $guideId = mysqli_insert_id($link);

    // Handle image upload
    if (is_uploaded_file($_FILES['image']['tmp_name'])) {
        $targetDir = 'uploads/';
        $fileName = $guideId . '.jpg';
        $targetPath = $targetDir . $fileName;
    
        move_uploaded_file($_FILES['image']['tmp_name'], $targetPath);
    }

    header("Location: guide_success.php");
    exit;
} else {
    echo "ERROR: Could not execute $sql. " . mysqli_error($link);
}