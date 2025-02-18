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

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $vehicle_license = $_POST['vehicle_license'];
    $vehicle_type = $_POST['vehicle_type'];
    $complaint_type = $_POST['complaint_type'];
    $comments = $_POST['comments'];
    $imageUpload = "";

    // Handle image upload
    if (isset($_FILES['imageUpload']) && $_FILES['imageUpload']['error'] == 0) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["imageUpload"]["name"]);
        if (move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $target_file)) {
            $imageUpload = $target_file;
        } else {
            $imageUpload = "";
        }
    }

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO reports (name, vehicle_license, vehicle_type, complaint_type, comments, imageUpload) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $name, $vehicle_license, $vehicle_type, $complaint_type, $comments, $imageUpload);

    // Execute the query
    if ($stmt->execute()) {
        $response = array("success" => true, "message" => "Report submitted successfully.");
    } else {
        $response = array("success" => false, "message" => "Error: " . $stmt->error);
    }

    $stmt->close();
    $conn->close();

    // Return the response as JSON
    echo json_encode($response);
}
?>
