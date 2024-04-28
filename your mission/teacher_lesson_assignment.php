<?php
// Include the database connection file
include "connect.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from form inputs
    $teacher_id = $_POST['teacher_id'];
    $lesson_id = $_POST['lesson_id'];
    $day_of_week = $_POST['day_of_week'];
    $lesson_time = $_POST['lesson_time'];
    $lesson_date = $_POST['lesson_date'];

    // SQL query to insert data into teacher_lesson_assignment table
    $query = "INSERT INTO teacher_lesson_assignment (teacher_id, lesson_id, day_of_week, lesson_time,lesson_date) VALUES ('$teacher_id', '$lesson_id', '$day_of_week', '$lesson_time','$lesson_date')";

    // Execute the query
    if (mysqli_query($conn, $query)) {
        // If the query is successful, redirect to the page displaying teacher lesson assignments
        header("Location: taskcom.php");
        exit();
    } else {
        // If an error occurs, display an error message
        echo "Error البيانات غير صحيحة" . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
