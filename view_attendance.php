<?php
// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'attendance_system');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch attendance records
$sql = "SELECT a.attendance_id, s.student_name, c.class_name, a.attendance_date, a.status 
        FROM attendance a
        JOIN students s ON a.student_id = s.student_id
        JOIN classes c ON a.class_id = c.class_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Attendance Records</h2>";
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Student Name</th><th>Class Name</th><th>Date</th><th>Status</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['attendance_id']}</td>
                <td>{$row['student_name']}</td>
                <td>{$row['class_name']}</td>
                <td>{$row['attendance_date']}</td>
                <td>{$row['status']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No attendance records found.";
}

$conn->close();
?>
