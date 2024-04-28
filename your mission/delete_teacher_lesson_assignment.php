<?php
// تضمين ملف اتصال قاعدة البيانات
include "connect.php";

// URLتحقق من تعيين معرف المهمه  في عنوان 
if (isset($_GET['id'])) {
    // URLاسترجاع معرف المهمه  من عنوان 
    $assignment_id = $_GET['id'];

    // SQL query to delete the teacher lesson assignment from the teacher_lesson_assignment table
    $query = "DELETE FROM teacher_lesson_assignment WHERE assignment_id = $assignment_id";

    // تنفيذ الاستعلام
    if (mysqli_query($conn, $query)) {
        // اذا نجح الاستعلام قم باعادة التوجهه لصفحة مهام الاستاذ
        header("Location: taskcom.php");
        exit();
    } else {
        // في حال حدوث خطا اعرض رسالة خطا
        echo "Error deleting record: " . mysqli_error($conn);
    }

    // اغلاق قاعدة البيانات
    mysqli_close($conn);
} else {
    // اذا لم يتم تعيين معرف المهمه قم باعادة التوجهه لصفحة تعيين مهام الاساتذه
    header("Location: taskcom.php");
    exit();
}
?>
