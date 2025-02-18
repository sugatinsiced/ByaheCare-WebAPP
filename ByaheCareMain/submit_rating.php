<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

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

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO ratings (name, vehicle_license, vehicle_type, rating, notes, created_at) VALUES (?, ?, ?, ?, ?, NOW())");
$stmt->bind_param("sssis", $name, $vehicleLicense, $vehicleType, $rating, $notes);

// Set parameters and execute
$rating = $_POST['rating'];
$vehicleLicense = $_POST['license'];
$vehicleType = $_POST['vehicleType'];
$name = !empty($_POST['name']) ? $_POST['name'] : null;
$notes = !empty($_POST['notes']) ? $_POST['notes'] : null;

if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'Rating submitted successfully.']);
} else {
    echo json_encode(['success' => false, 'message' => 'Error submitting rating: ' . $stmt->error]);
}

$stmt->close();
$conn->close();
?>
