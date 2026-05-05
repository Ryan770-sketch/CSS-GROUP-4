<?php
$conn = new mysqli("localhost", "root", "", "disability_requests");

$sql = "SELECT * FROM requests ORDER BY created_at DESC";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()) {
    echo "<div class='notification'>";
    echo "<b>" . $row['name'] . "</b> requested accommodation<br>";
    echo "Disability: " . $row['disability'] . "<br>";
    echo "Notes: " . $row['notes'] . "<br>";
    echo "<hr>";
    echo "</div>";
}

$conn->close();
?>