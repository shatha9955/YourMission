<?php
// Include database connection file
include "connect.php";

// Check if lesson_id is provided via GET method
if(isset($_GET['id'])) {
    // Retrieve lesson_id from GET parameters
    $lesson_id = $_GET['id'];
    
    // Query to delete lesson from the database
    $query = "DELETE FROM lessons WHERE lesson_id = $lesson_id";
    $result = mysqli_query($conn, $query);
    
    if($result) {
        // Redirect to lessons page after successful deletion
        echo '<script>alert("تم حذف المهمة");</script>';
        echo '<meta http-equiv="refresh" content="1; url=task.php" /> ' ;
        exit();
    } else {
        echo "Error deleting lesson.";
    }
} else {
    // Redirect to lessons page if lesson_id is not provided
    echo '<meta http-equiv="refresh" content="2; url=task.php" /> ' ;
    exit();
}
?>

<?php
// Close database connection
mysqli_close($conn);
?>
