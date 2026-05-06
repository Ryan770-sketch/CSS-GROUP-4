<?php
$conn = new mysqli("localhost", "root", "", "disability_requests");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM requests ORDER BY id DESC");
?>