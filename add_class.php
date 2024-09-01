<?php
// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'attendance_system');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get class name from form
$class_name = $_POST['class_name'];

// Insert class into database
$sql = "INSERT INTO classes (class_name) VALUES ('$class_name')";
if ($conn->query($sql) === TRUE) {
    echo "Class added successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
