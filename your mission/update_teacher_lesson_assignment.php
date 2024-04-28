<?php
// Include the database connection file
include "connect.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are filled
    if (isset($_POST['assignment_id']) && isset($_POST['teacher_id']) && isset($_POST['lesson_id']) && isset($_POST['day_of_week']) && isset($_POST['lesson_time'])) {
        // Retrieve data from the form
        $assignment_id = $_POST['assignment_id'];
        $teacher_id = $_POST['teacher_id'];
        $lesson_id = $_POST['lesson_id'];
        $day_of_week = $_POST['day_of_week'];
        $lesson_time = $_POST['lesson_time'];

        // Prepare update query
        $query = "UPDATE teacher_lesson_assignment SET teacher_id='$teacher_id', lesson_id='$lesson_id', day_of_week='$day_of_week', lesson_time='$lesson_time' WHERE assignment_id='$assignment_id'";

        // Execute the update query
        if (mysqli_query($conn, $query)) {
            // If update is successful, redirect to the teacher lesson assignments page
            header("Location: taskcom.php");
            exit();
        } else {
            // If an error occurs, display an error message
            echo "Error updating record: " . mysqli_error($conn);
        }
    } else {
        // If required fields are not filled, display an error message
        echo "All fields are required.";
    }
} else {
    // If the form is not submitted, redirect to the teacher lesson assignments page
    header("Location: taskcom.php");
    exit();
}
?>
