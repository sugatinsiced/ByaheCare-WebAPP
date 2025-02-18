<?php
$servername = "localhost";
$username = "root"; // Default XAMPP username
$password = ""; // Leave empty if no password is set
$dbname = "byahecare_db"; // The database name you created

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
