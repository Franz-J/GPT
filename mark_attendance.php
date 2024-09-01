<?php
// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'attendance_system');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from form
$student_id = $_POST['student_id'];
$class_id = $_POST['class_id'];
$attendance_date = $_POST['attendance_date'];
$status = $_POST['status'];

// Insert attendance record into database
$sql = "INSERT INTO attendance (student_id, class_id, attendance_date, status) 
        VALUES ($student_id, $class_id, '$attendance_date', '$status')";
if ($conn->query($sql) === TRUE) {
    echo "Attendance marked successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
