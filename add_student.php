<?php
// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'attendance_system');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get student name from form
$student_name = $_POST['student_name'];

// Insert student into database
$sql = "INSERT INTO students (student_name) VALUES ('$student_name')";
if ($conn->query($sql) === TRUE) {
    echo "Student added successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
