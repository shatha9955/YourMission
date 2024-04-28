<?php
// Include the database connection file
include "connect.php";

// Check if the assignment ID is provided in the URL
if(isset($_GET['id'])) {
    // Get the assignment ID from the URL
    $assignmentId = $_GET['id'];

    // Update the status of the assignment to 'حاضر' in the database
    $updateQuery = "UPDATE teacher_lesson_assignment SET lesson_status = 'حاضر' WHERE assignment_id = '$assignmentId'";
    $result = mysqli_query($conn, $updateQuery);

    if($result) {
        // Redirect back to the page where the assignments are listed
        header("Location: dashboard.php");
        exit();
    } else {
        echo "حدث خطأ أثناء تحديث حالة المهمة.";
    }
} else {
    echo "لا يوجد معرف مهمة محدد في عنوان URL.";
}

// Close the database connection
mysqli_close($conn);
?>
