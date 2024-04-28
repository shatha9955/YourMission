<?php
include "connect.php";

if (isset($_POST["assignment_id"]) && isset($_POST["new_status"])) {
    $assignment_id = mysqli_real_escape_string($conn, $_POST["assignment_id"]);
    $new_status = mysqli_real_escape_string($conn, $_POST["new_status"]);

    $query = "UPDATE teacher_lesson_assignment SET lesson_status = '$new_status' WHERE assignment_id = '$assignment_id'";

    if (mysqli_query($conn, $query)) {
        echo "تم تحديث الحالة بنجاح";
    } else {
        echo "حدث خطأ أثناء تحديث الحالة: " . mysqli_error($conn);
    }
} else {
    echo "معلمات غير صالحة";
}

mysqli_close($conn);
?>
