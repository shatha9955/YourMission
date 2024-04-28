<?php
// Include database connection file
include "connect.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $lesson_id = $_POST['lesson_id'];
    $lesson_name = $_POST['lesson_name'];
    $lesson_day_of_week = $_POST['lesson_day_of_week'];
    $lesson_time = $_POST['lesson_time'];
    
    // Update lesson in the database
    $query = "UPDATE lessons SET lesson_name = '$lesson_name', lesson_day_of_week = '$lesson_day_of_week', lesson_time = '$lesson_time' WHERE lesson_id = $lesson_id";
    $result = mysqli_query($conn, $query);
    
    if ($result) {
        // Redirect to lessons page after successful update
        echo '<script>alert("تم التعديل");</script>';
        echo '<meta http-equiv="refresh" content="2; url=task.php" /> ' ;
        exit();
    } else {
        echo '<script>alert("لم يتم التعديل");</script>';
    }
} else {
    // Redirect to edit_lesson page if form is not submitted
    echo '<meta http-equiv="refresh" content="2; url=task.php" /> ' ;
    exit();
}
?>

<?php
// Close database connection
mysqli_close($conn);
?>
