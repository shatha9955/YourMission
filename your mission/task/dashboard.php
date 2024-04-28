<?php 
include "connect.php";

// بداية الجلسة
session_start();

// إذا كانت الجلسة مفعلة ومتغير الجلسة 'user_type' معرف
if(isset($_SESSION['user_type'])) {
    // قم بحفظ قيمة متغير الجلسة في متغير آخر
    $userType = $_SESSION['user_type'];
} else {
    // في حالة عدم وجود جلسة نشطة، قم بتوجيه المستخدم إلى صفحة تسجيل الدخول
    header("location: index.php");
    exit(); // توقف تنفيذ البرنامج بعد إعادة التوجيه
}
?>


<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Cairo' rel='stylesheet'>

    <title>لوحة التحكم</title>
   <style>
    * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

body {
    font-family: 'Cairo', Tahoma, Geneva, Verdana, sans-serif;
    direction: rtl;
    text-align: right;
    background-color: #f4f4f4;
}

.container {
     
    margin: 20px auto;
  
}

header {
    background-color: rgba(96, 125, 139, 1);
    color: #fff;

    -text-align: center;
}

nav ul {
    list-style-type: none;
    padding: 10px;
}

nav ul li {
    display: inline-block;
    margin-right: 0px;
}

nav ul li a {
    text-decoration: none;
    color: #333;
    padding: 5px 3px;
    border: 1px solid #333;
    border-radius: 5px;
}

nav ul li a:hover {
    background-color: #333;
    color: #fff;
}

main {
    display: flex;
    padding: 20px;
}

.widgets {
    flex: 1;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    margin-right: 20px;
    border: 1px solid blue;
}

.widget {
    margin-bottom: 20px;
}

.content {
    flex: 2;
    border: 1px solid blue;
    padding 5px;
 
    background-color: #fff;
    border-radius: 10px;
    width: auto;
}

footer {
    background-color: rgba(96, 125, 139, 1);
    color: #fff;
    padding: 10px 20px;
    text-align: center;
}
span {
    color: #C8B560; /* لون خط النص */
    font-size: 34px; /* حجم الخط */
    border-radius: 5px;
    text-align: right;
    background-color: rgba(96, 125, 139, 1);
    width: 100%;
}
table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ccc;
        }
        th {
            background-color: #f2f2f2;
        }
        select {
            padding: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: 100%;
            box-sizing: border-box;
        }
        select:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }
   </style>
   <script src="https://cdn.jsdelivr.net/npm/hijri-date@1.0.0/dist/hijri-date.min.js"></script>

  
</head>
<body>
    <div class="container">
   
       <?php include 'nav.php';?>
        <main>
          
            <section class="widgets">
                <div class="widget">
                <!DOCTYPE html>
<html lang="ar">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>عرض البيانات وتفاصيل الأشخاص</title>
<style>
/* أسلوب لإخفاء التفاصيل افتراضيًا */
#dataDisplay ul {
    display: none;
}

/* أسلوب لإظهار التفاصيل عندما يكون العنصر مفتوحًا */
#dataDisplay.showDetails ul {
    display: block;
}
</style>
</head>
<body>
<div id="dataDisplay">
<?php
// Include the database connection file
include "connect.php";

// Get current date
$currentDate = date('Y-m-d');

// Query to get absentee, present, and apology count for the day
$queryDayCount = "SELECT 
                    SUM(CASE WHEN lesson_status = 'غائب' THEN 1 ELSE 0 END) AS absent_count,
                    SUM(CASE WHEN lesson_status = 'حاضر' THEN 1 ELSE 0 END) AS present_count,
                    SUM(CASE WHEN lesson_status = 'تقديم اعتذار' THEN 1 ELSE 0 END) AS apology_count
                  FROM 
                    teacher_lesson_assignment
                  WHERE 
                    DATE(lesson_date) = CURDATE()";

$resultDayCount = mysqli_query($conn, $queryDayCount);

if ($rowDayCount = mysqli_fetch_assoc($resultDayCount)) {
    // Display absentee, present, and apology count for the day
    echo "<h3>عدد الغائبين: " . $rowDayCount['absent_count'] . "</h3>";
    echo "<h3>عدد الحاضرين: " . $rowDayCount['present_count'] . "</h3>";
    echo "<h3>عدد المعتذرين: " . $rowDayCount['apology_count'] . "</h3>";
}

// Query to get employee count for the day
$queryEmployeeCount = "SELECT 
                          COUNT(DISTINCT teacher_id) AS employee_count
                        FROM 
                          teacher_lesson_assignment
                        WHERE 
                          DATE(lesson_date) = CURDATE()";

$resultEmployeeCount = mysqli_query($conn, $queryEmployeeCount);

if ($rowEmployeeCount = mysqli_fetch_assoc($resultEmployeeCount)) {
    // Display employee count for the day
    echo "<h3>عدد الموظفين: " . $rowEmployeeCount['employee_count'] . "</h3>";
}

// Query to get task count for the day
$queryTaskCount = "SELECT 
                     COUNT(*) AS task_count
                   FROM 
                     teacher_lesson_assignment
                   WHERE 
                     DATE(lesson_date) = CURDATE()";

$resultTaskCount = mysqli_query($conn, $queryTaskCount);

if ($rowTaskCount = mysqli_fetch_assoc($resultTaskCount)) {
    // Display task count for the day
    echo "<h3>عدد المهام: " . $rowTaskCount['task_count'] . "</h3>";
}

// Query to get absentee details for the day
?>
</div>

<script>
document.getElementById("dataDisplay").addEventListener("click", function() {
    // Toggle class to show or hide details
    this.classList.toggle("showDetails");
});
</script>
</body>
</html>




                  
               
                </div>
                <div class="widget">
                <div id="hijriDate"></div>
<div id="gregorianDate"></div>

                </div>

<script>
   // الحصول على التاريخ الحالي
var currentDate = new Date();

// عرض التاريخ الهجري
var hijriDate = new HijriDate(currentDate);
var hijriDateString = hijriDate.format('dd MM yyyy');

// عرض التاريخ الميلادي
var gregorianDateString = currentDate.toLocaleDateString('en-US', {
  year: 'numeric',
  month: 'long',
  day: 'numeric'
});

// عرض التاريخين
document.getElementById('hijriDate').innerText = "التاريخ الهجري: " + hijriDateString;
document.getElementById('gregorianDate').innerText = "التاريخ الميلادي: " + gregorianDateString;



</script>
            </section>
            <section class="content">
                <h2>طلبات تاكيد الحضور </h2>
                <?php
// Include the database connection file
include "connect.php";

// Get the current day of the week
$currentDate = date('Y-m-d');

// Retrieve data from the database for teachers who did not confirm attendance or did not submit an apology on the current day
$query = "SELECT 
            l.lesson_id, l.lesson_name, 
            CONCAT(t.first_name, ' ', t.last_name) AS teacher_name, 
            tla.teacher_id, 
            tla.day_of_week, 
            tla.lesson_time, 
            tla.assignment_id
          FROM 
            teacher_lesson_assignment tla
          INNER JOIN 
            lessons l ON tla.lesson_id = l.lesson_id
          INNER JOIN 
            teachers t ON tla.teacher_id = t.teacher_id
          WHERE 
            tla.lesson_date = '$currentDate'
            AND (tla.lesson_status = 'تاكيد الحضور' )";

$result = mysqli_query($conn, $query);

// Check if there are any records returned
if (mysqli_num_rows($result) > 0) {
    ?>
    <table>
        <tr>
            <th>رقم التعيين</th>
            <th>اسم المعلم</th>
            <th>رقم المهمة</th>
            <th>يوم المهمة</th>
            <th>وقت المهمة</th>
            <th>تاكيد الحضور</th>
        </tr>
        <?php
        // Display data in the table
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['assignment_id'] . "</td>";
            echo "<td>" . $row['teacher_name'] . "</td>";
            echo "<td>" . $row['lesson_name'] . "</td>";
            echo "<td>" . $row['day_of_week'] . "</td>";
            echo "<td>" . $row['lesson_time'] . "</td>";
        
            echo "<td><a href='confirm.php?id=" . $row['assignment_id'] . "'>تأكيد الحضور</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
    <?php
    // Update the status to "غائب" for teachers who did not confirm attendance or did not submit an apology
   /* $updateQuery = "UPDATE teacher_lesson_assignment 
                    SET lesson_status = 'غائب' 
                    WHERE 
                    lesson_date = '$currentDate' 
                      AND (tla.lesson_status != 'تاكيد الحضور' ";
    mysqli_query($conn, $updateQuery);
    */
} else {
    echo "لا توجد بيانات لعرضها.";
}

// Close the database connection
mysqli_close($conn);
?>


            </section>
            <section class="content">
                <h2>طلبات  الاجازات والاعتذار </h2>
                <?php
// Include the database connection file
include "connect.php";

// Get the current day of the week
$currentDate = date('Y-m-d');

// Retrieve data from the database for teachers who did not confirm attendance or did not submit an apology on the current day
$query = "SELECT 
            l.lesson_id, l.lesson_name, 
            CONCAT(t.first_name, ' ', t.last_name) AS teacher_name, 
            tla.teacher_id, 
            tla.day_of_week, 
            tla.lesson_time, 
            tla.assignment_id
          FROM 
            teacher_lesson_assignment tla
          INNER JOIN 
            lessons l ON tla.lesson_id = l.lesson_id
          INNER JOIN 
            teachers t ON tla.teacher_id = t.teacher_id
          WHERE 
            tla.lesson_date = '$currentDate'
            AND  tla.lesson_status = 'تقديم اعتذار'  and tla.lesson_status != 'تاكيد الحضور'  AND Confirm !='قبول'";

$result = mysqli_query($conn, $query);

// Check if there are any records returned
if (mysqli_num_rows($result) > 0) {
    ?>
    <table>
        <tr>
            <th>رقم التعيين</th>
            <th>اسم المعلم</th>
            <th>رقم المهمة</th>
            <th>يوم المهمة</th>
            <th>وقت المهمة</th>
            <th>قبول الاجازة </th>
        </tr>
        <?php
        // Display data in the table
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['assignment_id'] . "</td>";
            echo "<td>" . $row['teacher_name'] . "</td>";
            echo "<td>" . $row['lesson_name'] . "</td>";
            echo "<td>" . $row['day_of_week'] . "</td>";
            echo "<td>" . $row['lesson_time'] . "</td>";
        
            echo "<td><a href='confirm2.php?id=" . $row['assignment_id'] . "'> قبول الاجازة</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
    <?php
    // Update the status to "غائب" for teachers who did not confirm attendance or did not submit an apology
    /*
    $updateQuery = "UPDATE teacher_lesson_assignment 
                    SET lesson_status = 'غائب' 
                    WHERE 
                    lesson_date = '$currentDate' 
                      AND (tla.lesson_status != 'تاكيد الحضور' OR tla.lesson_status != 'تقديم اعتذار'";
    mysqli_query($conn, $updateQuery);
    */
} else {
    echo "لا توجد بيانات لعرضها.";
}

// Close the database connection
mysqli_close($conn);
?>
            </section>
        </main>
        <footer>
            <p>جميع الحقوق محفوظة © 2024 مهمتك&copy; </p>
        </footer>
    </div>
</body>
</html>
