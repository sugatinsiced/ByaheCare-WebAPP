<?php
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

// Delete complaint
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    // Prepare and bind
    $stmt = $conn->prepare("DELETE FROM reports WHERE id = ?");
    $stmt->bind_param("i", $id);

    // Execute the query
    if ($stmt->execute()) {
        echo "Report deleted successfully.";
    } else {
        echo "Error deleting report: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
