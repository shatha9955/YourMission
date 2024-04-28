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
    margin: 20px auto;
   

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
    width: 30px;
}

.content {
   
    margin-right: 0px;
 
    background-color: #fff;
    border-radius: 10px;
    padding: 20px;
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
    margin-right: 20px;
}


form {
        width: 600px;
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
      form input[type="password"] {
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
      
      form button[type="submit"] {
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
      button:hover {
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
   </style>
</head>
<body>
    <div class="container">
   
       <?php include 'nav.php';?>
        <main>
           
    
            <section class="content">
            <?php 
include "connect.php";

// بداية الجلسة
 

// إذا كانت الجلسة مفعلة ومتغير الجلسة 'user_type' معرف
if(isset($_SESSION['user_type'])) {
    // قم بحفظ قيمة متغير الجلسة في متغير آخر
    $userType = $_SESSION['user_type'];
    
    // استعراض بيانات المستخدم باستخدام قيمة متغير الجلسة
    if($userType === 'admin') {
        // اذا كان المستخدم من نوع ادمن
        $query = "SELECT * FROM admins WHERE email = '$_SESSION[email]'";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            ?>
            <form method="post" action="update_profile.php">
                <h1>الملف الشخصي </h1>
                <label>الاسم الأول</label>
                <input type="text" name="first_name" value="<?php echo $row['first_name']; ?>">
                <br>
                <label>الاسم الأخير</label>
                <input type="text" name="last_name" value="<?php echo $row['last_name']; ?>">
                <br>
                <label>البريد الإلكتروني</label>
                <input type="email" name="email" value="<?php echo $row['email']; ?>">
                <br>
                <label>كلمة المرور</label>
                <input type="password" name="password" required>
                <br>
                <button type="submit">حفظ التغييرات</button>
            </form>
            <?php
        }
    }
} else {
    // في حالة عدم وجود جلسة نشطة، قم بتوجيه المستخدم إلى صفحة تسجيل الدخول
    header("location: index.php");
    exit(); // توقف تنفيذ البرنامج بعد إعادة التوجيه
}
?>

               
            </section>
        </main>
        <footer>
            <p>جميع الحقوق محفوظة © 2024 مهمتك&copy; </p>
        </footer>
    </div>
</body>
</html>
