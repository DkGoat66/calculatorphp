<!-- submit_grade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Grade Submission</title>
</head>
<body>
    <h1>Submit Your Grade</h1>
    <form method="POST" action="process_grade.php">
        <label for="student_id">Student ID:</label>
        <input type="text" id="student_id" name="student_id" required><br><br>
        <label for="grade">Grade:</label>
        <input type="number" id="grade" name="grade" step="0.01" min="0" max="100" required><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
