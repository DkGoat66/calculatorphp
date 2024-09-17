<!-- view_grades.php -->
<!DOCTYPE html>
<html>
<head>
    <title>View Grades</title>
</head>
<body>
    <h1>Student Grades</h1>
    
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

    // Fetch all student grades
    $sql = "SELECT student_id, grade FROM students_grades";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output the data
        echo "<table border='1'>
                <tr>
                    <th>Student ID</th>
                    <th>Grade</th>
                </tr>";
        
        $total_grade = 0;
        $count = 0;

        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row['student_id'] . "</td>
                    <td>" . $row['grade'] . "</td>
                  </tr>";
            $total_grade += $row['grade'];
            $count++;
        }

        echo "</table>";

        // Calculate and display the average grade
        $average_grade = $total_grade / $count;
        echo "<h3>Average Grade: " . round($average_grade, 2) . "</h3>";

    } else {
        echo "No grades found.";
    }

    $conn->close();
    ?>
</body>
</html>
