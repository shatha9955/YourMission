<?php
// تضمين ملف الاتصال بقاعدة البيانات
session_start();
include "connect.php";
$currentDate = date('Y-m-d');

// Fetch teacher's assignments from the database
$teacher_id = $_SESSION['email']; // Assuming email is the teacher's email
$query = "SELECT tla.assignment_id, l.lesson_name, tla.day_of_week, tla.lesson_time, tla.lesson_date, tla.lesson_status 
          FROM teacher_lesson_assignment tla
          INNER JOIN lessons l ON tla.lesson_id = l.lesson_id
          WHERE tla.lesson_date = '$currentDate' 
          AND tla.lesson_status != 'حاضر' 
          AND tla.teacher_id IN (SELECT teacher_id FROM teachers WHERE email = '$teacher_id')";
        
$result = mysqli_query($conn, $query);

// التحقق من نجاح الاستعلام
if ($result) {
    // إنشاء الجدول لعرض المهام
    $tasksHTML = "<table>";
    $tasksHTML .= "<tr><th>رقم المهمة</th><th>المهمة</th><th>اليوم</th><th>الوقت</th><th>التاريخ</th><th> الحضور</th><th> تاكيد الحضور</th></tr>";


    // عرض البيانات
    while ($row = mysqli_fetch_assoc($result)) {
        $tasksHTML .= "<tr>";
       
        $tasksHTML .= "<td>" . $row['assignment_id'] . "</td>";
              $tasksHTML .= "<td>" . $row['lesson_name'] . "</td>";
        $tasksHTML .= "<td>" . $row['day_of_week'] . "</td>";
        $tasksHTML .= "<td>" . $row['lesson_time'] . "</td>";
        $tasksHTML .= "<td>" . $row['lesson_date'] . "</td>";
        $tasksHTML .= "<td>" . $row['lesson_status'] . "</td>";
        $tasksHTML .= "<td><select class='lesson_status' data-assignment-id='" . $row['assignment_id'] . "'><option value=''>اختر الحالة</option><option value='تاكيد الحضور'>تاكيد الحضور</option><option value='تقديم اعتذار'>تقديم اعتذار</option></select></td>";

        $tasksHTML .= "</tr>";
    }

    $tasksHTML .= "</table>";

    // إرجاع HTML لعرض المهام
    echo $tasksHTML;
} else {
    // في حالة فشل الاستعلام، إرجاع رسالة خطأ
    echo "<p>حدث خطأ أثناء جلب المهام.</p>";
}

// إغلاق الاتصال بقاعدة البيانات
mysqli_close($conn);
?>
