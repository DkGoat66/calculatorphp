<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Grades</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #f6d365 0%, #fda085 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }

        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        .table-container {
            background-color: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
            color: #333;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        h3 {
            color: #333;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Student Grades</h1>
    <div class="table-container">
        <?php
        $servername = "";
        $username = "";  // Change as needed
        $password = "";  // Change as needed
        $dbname = "";

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
            echo "<table>
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
            echo "<p>No grades found.</p>";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
