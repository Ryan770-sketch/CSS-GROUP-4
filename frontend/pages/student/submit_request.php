
<?php
$conn = new mysqli("localhost", "root", "", "disability_requests");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data safely
$name = $_POST['name'] ?? '';
$student_id = $_POST['student_id'] ?? '';
$disability = $_POST['disability'] ?? '';
$notes = $_POST['notes'] ?? '';

// Insert into database
$sql = "INSERT INTO requests (name, student_id, disability, notes)
        VALUES ('$name', '$student_id', '$disability', '$notes')";

if ($conn->query($sql) === TRUE) {

    // 🔥 Fetch the latest inserted record
    $result = $conn->query("SELECT * FROM requests ORDER BY id DESC LIMIT 1");

    if ($row = $result->fetch_assoc()) {

        echo "
        <div style='font-family: Arial; padding:20px; background:#f4f4f4;'>
            <div style='max-width:500px; margin:auto; background:white; padding:25px; border-radius:10px; box-shadow:0 5px 15px rgba(0,0,0,0.2);'>

                <h2 style='color:#0d6efd; text-align:center;'>Request Submitted ✅</h2>

                <p><strong>Name:</strong> {$row['name']}</p>
                <p><strong>Student ID:</strong> {$row['student_id']}</p>
                <p><strong>Disability:</strong> {$row['disability']}</p>
                <p><strong>Notes:</strong> {$row['notes']}</p>

                <hr>

                <p style='text-align:center; color:green; font-weight:bold;'>
                    Your request has been received and is under review.
                </p>

            </div>
        </div>
        ";
    }

} else {
    echo "Error: " . $conn->error;
}
?>