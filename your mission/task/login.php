<?php
// Start or resume the session
session_start();

// Include your database connection file
include "connect.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get email and password from the form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query to check if the user is an admin
    $adminQuery = "SELECT * FROM admins WHERE email='$email' AND password='$password'";
    $adminResult = mysqli_query($conn, $adminQuery);

    // Query to check if the user is a teacher
    $teacherQuery = "SELECT * FROM teachers WHERE email='$email' AND password='$password'";
    $teacherResult = mysqli_query($conn, $teacherQuery);

    // Check if the user is an admin
    if (mysqli_num_rows($adminResult) == 1) {
        // Admin login successful, redirect to dashboard
        $_SESSION['user_type'] = 'admin';
        $_SESSION['email'] =  $email;
        header("location: dashboard.php");
    } elseif (mysqli_num_rows($teacherResult) == 1) {
        // Teacher login successful, redirect to profile page
        $_SESSION['user_type'] = 'teacher';
        $_SESSION['email'] =  $email;
        header("location: index.php");
    } else {
        // Invalid credentials, show error message
        $error = "البيانات غير صحيحة";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
            direction: rtl;
        }
        .container {
    width: 300px;
    margin: 0 auto;
    text-align: center;
}

h2 {
    font-size: 24px;
    color: #333;
    font-family: 'Cairo', Tahoma, Geneva, Verdana, sans-serif;
}

.error {
    color: red;
    margin-bottom: 10px;
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


.glow-on-hover {
    width: 220px;
    height: 50px;
    border: none;
    outline: none;
    color: #fff;
    background: #00ffd5;
    cursor: pointer;
    position: relative;
    z-index: 0;
    border-radius: 20px;
    font-family: 'Cairo', Tahoma, Geneva, Verdana, sans-serif;
}

.glow-on-hover:before {
    content: '';
    background: linear-gradient(45deg, #ff0000, #ff7300, #fffb00, #48ff00, #00ffd5, #002bff, #7a00ff, #ff00c8, #ff0000);
    position: absolute;
    top: -2px;
    left:-2px;
    background-size: 400%;
    z-index: -1;
    filter: blur(5px);
    width: calc(100% + 4px);
    height: calc(100% + 4px);
    animation: glowing 20s linear infinite;
    opacity: 0;
    transition: opacity .3s ease-in-out;
    border-radius: 10px;
}

.glow-on-hover:active {
    color: #002bff
}

.glow-on-hover:active:after {
    background: #00ffd5;
}

.glow-on-hover:hover:before {
    opacity: 1;
}

.glow-on-hover:after {
    z-index: -1;
    content: '';
    position: absolute;
    width: 100%;
    height: 100%;
    background: #111;
    left: 0;
    top: 0;
    border-radius: 10px;
}

@keyframes glowing {
    0% { background-position: 0 0; }
    50% { background-position: 400% 0; }
    100% { background-position: 0 0; }
}

        </style>
    <!-- Add your CSS stylesheets here -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
   
    <?php if(isset($error)) { ?>
 
    <?php } ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <h2>تسجيل الدخول</h2>
        <div class="form-group">
            <label>البريد الإلكتروني</label>
            <input type="email" name="email" placeholder="ادخل البريد الإلكتروني" required>
        </div>
    
        <div class="form-group">
            <label>كلمة المرور</label>
            <input type="password" name="password" placeholder="ادخل كلمة المرور" required>
        </div>
        <div class="error"><?php echo (@$error); ?></div>
        <button type="submit" class="glow-on-hover">تسجيل الدخول</button>
    </form>
</div>

</body>
</html>
