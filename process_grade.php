<!-- process_grade.php -->
<?php
$servername = "localhost";
$username = "root";  // Change as needed
$password = "";  // Change as needed
$dbname = "student_grades_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the submitted data
$student_id = $_POST['student_id'];
$grade = $_POST['grade'];

// Insert data into the database
$sql = "INSERT INTO students_grades (student_id, grade) VALUES ('$student_id', '$grade')";
if ($conn->query($sql) === TRUE) {
    header("Location: view_grades.php");  // Redirect to view grades
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
