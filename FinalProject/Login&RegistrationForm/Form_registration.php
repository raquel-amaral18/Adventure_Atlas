<?php
include '../DatabaseConnection/db_connect.php';

// Escape user inputs for security
$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$password = md5($_REQUEST['password']);

// Attempt insert query execution
$sql = "INSERT INTO register (name, email, password)
VALUES('$name', '$email', '$password')";

$ret = mysqli_query($link, $sql);

if ($ret) {
    header("Location: success.php");
    exit;
} else {
    echo "ERROR: Could not execute $sql. " .mysqli_error($link);
}