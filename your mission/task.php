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
    margin-right: 0px;
}

.widget {
    margin-bottom: 20px;
    
}

.content {
   
    margin-right: 0px;
    flex: 1;
    background-color: #fff;
    border-radius: 10px;
    padding: 20px;
    width: 800px;
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


form {
        width: 400px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 7px;
      }
      
      form label {
        display: block;
        margin-bottom: 5px;
        color: #333;
        text-align: right;      }
      
      form input[type="text"],
      form input[type="email"],
      form input[type="time"],
      form input[type="password"],select {
        width: 95%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
      }
      
      form .btn {
        padding: 8px 15px;
        background-color: gray;
        color: #fff;
        border: none;
        border-radius: 3px;
        cursor: pointer;
        font-family: 'Cairo', Tahoma, Geneva, Verdana, sans-serif;
      }
      
       .button[type="submit"] {
        margin-top: 20px;
        width: 100%;
        padding: 10px;
        background-color: blue;
        color: #fff;
        border: none;
        border-radius: 3px;
        cursor: pointer;
        font-family: 'Cairo';
      }

      
      form a {
        color: blue;
        text-decoration: none;
      }
      
      form a:hover {
        text-decoration: underline;
      }
      
      #certificate {
        display: none;
      }
      .button:hover {
        background-color:cornflowerblue;
        color: black;
        -box-shadow: 1px 4px 28px 0px rgba(0,0,0,0.75);
        
   
    }
    h2 {
  color: #1240ab; /* Set the text color */
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; /* Specify the font family */
  font-size: 44px; /* Set the font size */
  font-weight: bold; /* Set the font weight to bold */
  text-align: center; /* Center-align the text */
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2); /* Apply a subtle shadow effect */
  margin-bottom: 20px; /* Add some bottom margin for spacing */
  font-family: 'Cairo', Tahoma, Geneva, Verdana, sans-serif;
}
table {
  border-collapse: collapse;
  width: 100%;
  text-align: center;
  font-family: 'Cairo';
  font-size: 20px;
  border-radius: 3px;
  border: 1px solid #1240ab;
 
}

th {
  background-color: #ddd;
  text-align: center;
  font-weight: bold;
  border: 1px solid #1240ab;
}

td {
  font-size: 14px;
  border: 1px solid #1240ab;
}

h2 {
  font-size: 20px;
  font-weight: bold;
  text-align: center;
}

a {
  color: blue;
}
tr:hover {
  background-color:#C8B560;
}

   </style>
</head>
<body>
    <div class="container">
        
   
       <?php include 'nav.php';?>
        <main>
           
        <section class="widgets">
                <div class="widget">
                <h3>إضافة المهام جديدة</h3>

<form action="insert_lesson.php" method="post">
    <label for="lesson_name">اسم المهمة:</label>
    <input type="text" id="lesson_name" name="lesson_name" required><br><br>

    <label for="lesson_day">يوم المهمة:</label>
    <select id="lesson_day" name="lesson_day" required>
        <option value="الأحد">الأحد</option>
        <option value="الاثنين">الاثنين</option>
        <option value="الثلاثاء">الثلاثاء</option>
        <option value="الأربعاء">الأربعاء</option>
        <option value="الخميس">الخميس</option>
        <option value="الجمعة">الجمعة</option>
        <option value="السبت">السبت</option>
    </select><br><br>

    <label for="lesson_time">وقت المهمة:</label>
    <input type="time" id="lesson_time" name="lesson_time" required>

    <input type="submit" value="إضافة " class="button">
</form>


               
                </div>
          
            </section>
            <section class="widgets">
                <div class="widget">
                <h2>المهام </h2>
                <?php
// تضمين ملف الاتصال بقاعدة البيانات
include "connect.php";

// الاستعلام لاسترداد البيانات من جدول الدروس
$query = "SELECT * FROM lessons";
$result = mysqli_query($conn, $query);
?>



 

<table>
<tr>
<th>رقم المهمة</th>
<th>اسم المهمة</th>
<th>يوم المهمة</th>
<th>وقت المهمة</th>
<th>تعديل</th>
<th>حذف</th>
</tr>

<?php
// عرض البيانات في الجدول
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['lesson_id'] . "</td>";
    echo "<td>" . $row['lesson_name'] . "</td>";
    echo "<td>" . $row['lesson_day_of_week'] . "</td>";
    echo "<td>" . $row['lesson_time'] . "</td>";
    echo "<td><a href='edit_lesson.php?id=" . $row['lesson_id'] . "'>تعديل</a></td>";
    echo "<td><a href='delete_lesson.php?id=" . $row['lesson_id'] . "' onclick='return confirm(\"هل تريد حذف المهمة ?\")'>حذف</a></td>";

    echo "</tr>";
}
?>

</table>


<?php
// إغلاق اتصال قاعدة البيانات
mysqli_close($conn);
?>
            </section>


               
                </div>
          
           

            

        </main>
        <footer>
            <p>جميع الحقوق محفوظة © 2024 مهمتك&copy; </p>
        </footer>
   
</body>
</html>
