<?php
// قم بتضمين ملف الاتصال بقاعدة البيانات
include "connect.php";

// تحقق مما إذا كانت الطريقة المستخدمة للصفحة POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // استقبل بيانات المحاضرة من النموذج
    $lesson_name = $_POST['lesson_name'];
    $lesson_day = $_POST['lesson_day'];
    $lesson_time = $_POST['lesson_time'];

    // استعد الاستعلام لإدراج المحاضرة في جدول الدروس
    $query = "INSERT INTO lessons (lesson_name, lesson_day_of_week, lesson_time) 
              VALUES ('$lesson_name', '$lesson_day', '$lesson_time')";

    // قم بتنفيذ الاستعلام
    if (mysqli_query($conn, $query)) {
        echo " تم اضافة البيانات بنجاح";
        echo '<meta http-equiv="refresh" content="2; url=task.php" /> ' ;
    } else {
        echo "حدث خطأ أثناء إضافة المهمة: " . mysqli_error($conn);
    }
    
    // أغلق الاتصال بقاعدة البيانات
    mysqli_close($conn);
}
?>
