<?php 
$conn = new mysqli("localhost", "root", "", "disability_requests");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$student_id = $_POST['student_id'];
$disability = $_POST['disability'];
$notes = $_POST['notes'];

$sql = "INSERT INTO requests (name, student_id, disability, notes)
        VALUES ('$name', '$student_id', '$disability', '$notes')";

if ($conn->query($sql) === TRUE) {
    echo "Request sent successfully!";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
