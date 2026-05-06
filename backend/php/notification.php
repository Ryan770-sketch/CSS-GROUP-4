<!DOCTYPE html>
<html>
<head>
    <title>Notifications</title>
</head>
<body>

<div style="padding:20px;">

    <h2>Notifications</h2>

    <?php
    // establishig connection to database 
$conn = new mysqli("localhost", "root", "", "disability_requests");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// executing query to get all requests
$result = $conn->query("SELECT * FROM requests ORDER BY id DESC");

// displaying requests
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "
            <div style='background:white; margin-bottom:15px; padding:15px; border-radius:8px; box-shadow:0 3px 10px rgba(0,0,0,0.1);'>
                
                <strong>{$row['name']}</strong> (ID: {$row['student_id']})<br>
                Disability: {$row['disability']}<br>
                Notes: {$row['notes']}

            </div>
            ";
        }
    } else {
        echo "No requests yet.";
    }
    ?>

</div>
</body>
</html> 