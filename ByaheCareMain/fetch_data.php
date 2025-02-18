<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "byahecare_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch complaints
$sql = "SELECT id, name, vehicle_license, vehicle_type, complaint_type, comments, imageUpload, created_at FROM reports";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>Name</th><th>Vehicle License</th><th>Vehicle Type</th><th>Complaint Type</th><th>Comments</th><th>Image</th><th>Created At</th><th>Action</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['vehicle_license']) . "</td>";
        echo "<td>" . htmlspecialchars($row['vehicle_type']) . "</td>";
        echo "<td>" . htmlspecialchars($row['complaint_type']) . "</td>";
        echo "<td>" . htmlspecialchars($row['comments']) . "</td>";
        echo "<td><img src='" . htmlspecialchars($row['imageUpload']) . "' alt='Complaint Image' width='100'></td>";
        echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";
        echo "<td><form method='POST' action='delete_report.php'><input type='hidden' name='id' value='" . $row['id'] . "'><button type='submit'>Delete</button></form></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No complaints found.";
}

$conn->close();
?>
