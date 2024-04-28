<?php
// تضمين ملف اتصال قاعدة البيانات
include "connect.php";

// تحقق اذا كان معرف الاستاذ قد تم توفيره عبر GET
if(isset($_GET['id'])) {
    // استرجاع معرف المعلم من GET
    $teacher_id = $_GET['id'];

    // استعلام SQLلحذف الاستاذ باستخدام استعلام المعرف 
    $query = "DELETE FROM teachers WHERE teacher_id = $teacher_id";

    // تنفيذ الاستعلام
    if (mysqli_query($conn, $query)) {
        // اذا كان الاستعلام ناجح توجهه الى صفحة الاساتذة
        echo '<meta http-equiv="refresh" content="1; url=teacher.php" /> ' ;
        exit();
    } else {
        // في حال حدوث خطا اعرض رسالة خطا
        echo "Error deleting record: " . mysqli_error($conn);
    }

    // اغلاق قاعدة البيانات
    mysqli_close($conn);
} else {
    // اذا لم يتوفر معرف الاستاذ قم بالتوجهه الى صفحة الاساتذه
    header("Location: teachers.php");
    exit();
}
?>
