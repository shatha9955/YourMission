<?php
// Include the database connection file
include "connect.php";

// Check if the teacher ID is set in the URL
if (isset($_GET['id'])) {
    // Retrieve the teacher ID from the URL
    $teacher_id = $_GET['id'];

    // SQL query to retrieve the teacher's information from the teachers table
    $query = "SELECT * FROM teachers WHERE teacher_id = $teacher_id";

    // Execute the query
    $result = mysqli_query($conn, $query);

    // Check if the query is successful and if there is a matching record
    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch the teacher's information from the result
        $row = mysqli_fetch_assoc($result);
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $email = $row['email'];
        $password = $row['password']; // Note: In a production environment, you should not display passwords in forms.
    } else {
        // If no matching record is found, redirect to the teachers page
        header("Location: teachers.php");
        exit();
 
    }
    ?>
<!DOCTYPE html>
<html lang="ar">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>تعديل المدرس</title>
<link href='https://fonts.googleapis.com/css?family=Cairo' rel='stylesheet'>

<style>
    body {
        font-family: 'Cairo', Arial, sans-serif;
        background-color: #f5f5f5;
        margin: 0;
        padding: 0;
        text-align: right;
    }

    h2 {
        text-align: center;
        color: #333;
    }

    form {
        width: 50%;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.19);
        font-family: 'Cairo', Arial, sans-serif;
    }

    form label {
        display: block;
        margin-bottom: 10px;
        color: #555;
        text-align: right;
    }

    form input[type="text"],
    form input[type="time"] {
        width: calc(100% - 20px);
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        text-align: right;
    }

    form button[type="submit"] {
        font-family: 'Cairo', Arial, sans-serif;
        width: 100%;
        padding: 10px;
        background-color: rgba(96, 125, 139, 1);
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    form button[type="submit"]:hover {
        background-color: #0056b3;
    }
</style>
</head>
<body>

<h2>تعديل المدرس</h2>

<form action="update_teacher.php" method="post">
    <input type="hidden" name="teacher_id" value="<?php echo $teacher_id; ?>">
    <label for="first_name">الاسم الأول:</label>
    <input type="text" name="first_name" value="<?php echo $first_name; ?>">
    <label for="last_name">الاسم الأخير:</label>
    <input type="text" name="last_name" value="<?php echo $last_name; ?>">
    <label for="email">البريد الإلكتروني:</label>
    <input type="email" name="email" value="<?php echo $email; ?>">
    <label for="password">كلمة المرور:</label>
    <input type="password" name="password" value="<?php echo $password; ?>">
    <button type="submit">حفظ التغييرات</button>
</form>

</body>
</html>
<?php } ?>