<?php
// Include the database connection file
include "connect.php";

// Check if the assignment ID is set in the URL
if (isset($_GET['id'])) {
    // Retrieve the assignment ID from the URL
    $assignment_id = $_GET['id'];

    // SQL query to delete the teacher lesson assignment from the teacher_lesson_assignment table
    $query = "DELETE FROM teacher_lesson_assignment WHERE assignment_id = $assignment_id";

    // Execute the query
    if (mysqli_query($conn, $query)) {
        // If the query is successful, redirect to the teacher lesson assignments page
        header("Location: taskcom.php");
        exit();
    } else {
        // If an error occurs, display an error message
        echo "Error deleting record: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    // If the assignment ID is not set, redirect to the teacher lesson assignments page
    header("Location: taskcom.php");
    exit();
}
?>
