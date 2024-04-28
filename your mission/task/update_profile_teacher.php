<?php
session_start();
include "connect.php";
include "sesstion_message.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password']; // You might want to handle password hashing
    
    // Update teacher's profile
    $query = "UPDATE teachers SET first_name = '$first_name', last_name = '$last_name', password = '$password' WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    
    if ($result) {
        // Profile updated successfully
        $_SESSION['success_message'] = "تم تحديث الملف الشخصي بنجاح.";
        // Redirect to teacher profile page or any other page
        header("Location: teacher_profile.php");
        exit();
    } else {
        // Error updating profile
        $_SESSION['error_message'] = "حدث خطأ أثناء تحديث الملف الشخصي: " . mysqli_error($conn);
        // Redirect back to the form page
        header("Location: teacher_profile.php");
        exit();
    }
} else {
    // If the form is not submitted, redirect back to the form page
    header("Location: teacher_profile.php");
    exit();
}
?>
