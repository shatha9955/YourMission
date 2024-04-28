<?php
// Include the database connection file
include "connect.php";

// Check if the teacher ID is provided via GET request
if(isset($_GET['id'])) {
    // Retrieve the teacher ID from the GET request
    $teacher_id = $_GET['id'];

    // SQL query to delete the teacher with the provided ID
    $query = "DELETE FROM teachers WHERE teacher_id = $teacher_id";

    // Execute the query
    if (mysqli_query($conn, $query)) {
        // If the query is successful, redirect to the teachers page
        echo '<meta http-equiv="refresh" content="1; url=teacher.php" /> ' ;
        exit();
    } else {
        // If an error occurs, display an error message
        echo "Error deleting record: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    // If no teacher ID is provided, redirect to the teachers page
    header("Location: teachers.php");
    exit();
}
?>
