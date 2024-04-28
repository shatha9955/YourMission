<?php
// Include the database connection file
include "connect.php";

// Check if the form is submitted with POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the teacher_id from the form
    $teacher_id = $_POST['teacher_id'];

    // Escape user inputs for security
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // SQL query to update teacher's information
    $query = "UPDATE teachers SET first_name='$first_name', last_name='$last_name', email='$email', password='$password' WHERE teacher_id='$teacher_id'";

    // Execute the query
    if (mysqli_query($conn, $query)) {
        // If the query is successful, set a success message
        session_start();
        $_SESSION['message'] = "تم تحديث بيانات المعلم بنجاح.";
        // Redirect to the teachers page
        header("Location: teacher.php");
        echo '<meta http-equiv="refresh" content="2; url=teacher.php" /> ' ;
        exit();
    } else {
        // If an error occurs, set an error message
        session_start();
        $_SESSION['error'] = "حدث خطأ أثناء تحديث بيانات المعلم: " . mysqli_error($conn);
        // Redirect back to the edit page
        header("Location: edit_teacher.php?id=$teacher_id");
        exit();
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    // If the form is not submitted with POST method, redirect to the teachers page
    header("Location: teacher.php");
    exit();
}
?>
 