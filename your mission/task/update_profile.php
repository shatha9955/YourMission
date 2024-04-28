<?php 
include "connect.php";

// تحقق مرة أخرى من أنه تم بدء الجلسة
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // الحصول على البيانات المرسلة من الفورم
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password']; // إضافة حقل كلمة المرور

    // استعدل الاستعلام ليتم التعديل على بيانات المستخدم
    $updateQuery = "UPDATE admins SET first_name='$first_name', last_name='$last_name',email='$email', password='$password' WHERE email='$email'";
    
    // تنفيذ الاستعلام
    if(mysqli_query($conn, $updateQuery)) {
        // تحديث البيانات بنجاح، قم بإعادة التوجيه إلى الصفحة السابقة

       echo " تحديث البيانات بنجاح";
        echo '<meta http-equiv="refresh" content="2; url=admin_profile.php" /> ' ;
       
        exit(); // توقف تنفيذ البرنامج بعد إعادة التوجيه
    } else {
        echo "حدث خطأ أثناء تحديث بيانات المستخدم: " . mysqli_error($conn);
    }
}
?>
