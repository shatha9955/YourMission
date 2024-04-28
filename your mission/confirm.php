<?php
// تضمين ملف اتصال قاعدة البيانات
include "connect.php";

// URLتحقق اذا كان معرف المهمه موجود في عنوان 
if(isset($_GET['id'])) {
    // URLاحصل على معرف المهمه من عنوان 
    $assignmentId = $_GET['id'];

    // تحديث حالة المهمه الى "حاضر" في قاعدة البيانات
    $updateQuery = "UPDATE teacher_lesson_assignment SET lesson_status = 'حاضر' WHERE assignment_id = '$assignmentId'";
    $result = mysqli_query($conn, $updateQuery);

    if($result) {
        // يعيد التوجيه الى الصفحه التي تم ادراج المهام فيها
        header("Location: dashboard.php");
        exit();
    } else {
        echo "حدث خطأ أثناء تحديث حالة المهمة.";
    }
} else {
    echo "لا يوجد معرف مهمة محدد في عنوان URL.";
}

// اغلق اتصال قاعدة البيانات
mysqli_close($conn);
?>
