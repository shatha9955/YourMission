<?php
// تضمين ملف قاعدة البيانات
include "connect.php";

// التحقق من توفر معرف المهمه عن طريق get
if(isset($_GET['id'])) {
    // استرداد معرف المهمه من GET
    $lesson_id = $_GET['id'];
    
    // استعلام لحذف الدرس من قاعدة البيانات
    $query = "DELETE FROM lessons WHERE lesson_id = $lesson_id";
    $result = mysqli_query($conn, $query);
    
    if($result) {
        // اعادة التوجهه الى صفحةالمهام بعد الحذف الناجح
        echo '<script>alert("تم حذف المهمة");</script>';
        echo '<meta http-equiv="refresh" content="1; url=task.php" /> ' ;
        exit();
    } else {
        echo "Error deleting lesson.";
    }
} else {
    //اعادة التوجهه الى صفحةالمهام اذا لم يتوفر معرف المهمه
    echo '<meta http-equiv="refresh" content="2; url=task.php" /> ' ;
    exit();
}
?>

<?php
// اغلاق اتصال قاعدة البيانات
mysqli_close($conn);
?>
