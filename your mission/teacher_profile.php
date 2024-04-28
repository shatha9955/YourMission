
<?php  session_start();     ?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مهمتك</title>
    <link href='https://fonts.googleapis.com/css?family=Cairo' rel='stylesheet'>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Cairo', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            line-height: 1.6;
        }

        header {
    background-color: rgba(96, 125, 139, 1);
    color: #C8B560;
    padding: 10px 20px;
    display: flex;
    justify-content: flex-end; /* تحديد بداية العناصر من اليمين */
    align-items: center;
    box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
}


        header h1 {
            font-size: 36px;
            margin: 0;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
                direction: rtl;
            
        }

        nav ul li {
            display: inline;
           
            text-align: right;
        }

        nav ul li:first-child {
            
            text-align: right;
        }

        nav ul li a {
            text-decoration: none;
            color: #fff;
            font-size: 18px;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        nav ul li a span {
    color: #C8B560; /* لون خط النص */
    font-size: 34px; /* حجم الخط */
    border-radius: 5px;
}


        nav ul li a:hover {
            background-color: rgb(114, 193, 178);
            color: #f8fcfd;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .hero {
    background-image: url('img/hero.jpg');
    background-size: 100% 80%; /* تغطية العرض والارتفاع بالكامل */
    color: #fff;
    text-align: center;
    padding: 100px 0;
    font-family: 'Cairo', Tahoma, Geneva, Verdana, sans-serif;
}


        .hero h2 {
            font-size: 48px;
            margin-bottom: 20px;
        }
        .hero button {
    background-color: #fff;
    font-family: 'Cairo', Tahoma, Geneva, Verdana, sans-serif;
    color: #320fbc;
    border: none;
    padding: 0px 20px;
    font-size: 18px;
    border-radius: 15px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    margin-top: 100px;
}

.hero button:hover {
    background-color: #0056b3;
}


        main {
            padding: 40px 20px;
        }

        footer {
            background-color: rgba(96, 125, 139, 1);
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }
        /* Responsive Styles */
@media screen and (max-width: 768px) {
    header {
        padding: 10px;
    }

    header h1 {
        font-size: 24px;
    }

    nav ul li {
        display: block;
        margin: 10px 0;
    }

    nav ul li:first-child {
        margin-top: 0;
    }

    nav ul li a {
        padding: 10px;
    }

    .hero h2 {
        font-size: 36px;
    }
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
        text-align: right; 
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
    h2 ,h1{
  color: #1240ab; /* Set the text color */
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; /* Specify the font family */
  font-size: 44px; /* Set the font size */
  font-weight: bold; /* Set the font weight to bold */
  text-align: right; /* Center-align the text */
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2); /* Apply a subtle shadow effect */
  margin-bottom: 20px; /* Add some bottom margin for spacing */
  font-family: 'Cairo', Tahoma, Geneva, Verdana, sans-serif;
}

    </style>
</head>
<body>
    <?php include('header.php');?>

    
    <main>
    <?php 
   
include "connect.php";


// تحقق مما إذا كانت الجلسة مفعلة ومتغير الجلسة 'user_type' معرف
if(isset($_SESSION['user_type'])) {
    // حفظ قيمة متغير الجلسة في متغير آخر
    $userType = $_SESSION['user_type'];
    
    // استعراض بيانات المستخدم باستخدام قيمة متغير الجلسة
    if($userType === 'teacher') {
        // اذا كان المستخدم من نوع ادمن
        $query = "SELECT * FROM teachers WHERE email = '$_SESSION[email]'";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            ?>
            <form method="post" action="update_profile_teacher.php">
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
  //  header("location: index.php");
    exit(); // توقف تنفيذ البرنامج بعد إعادة التوجيه
}
?>

    </main>

    <footer>
        <p>جميع الحقوق محفوظة &copy; 2024 مهمتك</p>
    </footer>
</body>
</html>
