<?php
// Include the database connection file
include "connect.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password']; // Note: In a production environment, you should use secure methods to store passwords, like password hashing.

    // SQL query to insert a new teacher into the teachers table
    $query = "INSERT INTO teachers (first_name, last_name, email, password) VALUES ('$first_name', '$last_name', '$email', '$password')";

    // Execute the query
    if (mysqli_query($conn, $query)) {
        echo " تم اضافة البيانات بنجاح";
        echo '<meta http-equiv="refresh" content="1; url=teacher.php" /> ' ;
        exit();
    } else {
        // If an error occurs, display an error message
        echo "خطاء في الاضافة" . mysqli_error($conn);
        echo '<meta http-equiv="refresh" content="1; url=teacher.php" /> ' ;
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
