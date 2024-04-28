<?php
// Include database connection file
include "connect.php";

// Check if lesson_id is provided via GET method
if(isset($_GET['id'])) {
    // Retrieve lesson_id from GET parameters
    $lesson_id = $_GET['id'];
    
    // Query to retrieve lesson details based on lesson_id
    $query = "SELECT * FROM lessons WHERE lesson_id = $lesson_id";
    $result = mysqli_query($conn, $query);
    
    // Check if lesson exists
    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $lesson_name = $row['lesson_name'];
        $lesson_day_of_week = $row['lesson_day_of_week'];
        $lesson_time = $row['lesson_time'];
    } else {
        // Redirect to lessons page if lesson_id doesn't exist
        echo '<meta http-equiv="refresh" content="2; url=task.php" /> ' ;
        exit();
    }
} else {
    // Redirect to lessons page if lesson_id is not provided
    echo '<meta http-equiv="refresh" content="2; url=task.php" /> ' ;
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>تعديل المهمة</title>
<link href='https://fonts.googleapis.com/css?family=Cairo' rel='stylesheet'>

<style>


    body {
        font-family: 'Cairo', Arial, sans-serif;
    background-color: #f5f5f5;
    margin: 0;
    padding: 0;
    text-align: rtl;
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
<h2> تعديل المهمة</h2>

<form action="update_lesson.php" method="post">
    <input type="hidden" name="lesson_id" value="<?php echo $lesson_id; ?>">
    <label for="lesson_name">اسم المهمة:</label>
    <input type="text" name="lesson_name" value="<?php echo $lesson_name; ?>"><br><br>
    <label for="lesson_day_of_week">اليوم :</label>
    <input type="text" name="lesson_day_of_week" value="<?php echo $lesson_day_of_week; ?>"><br><br>
    <label for="lesson_time">الوقت:</label>
    <input type="time" name="lesson_time" value="<?php echo $lesson_time; ?>"><br><br>
    <button type="submit">حفظ التغييرات</button>
</form>

</body>
</html>

<?php
// Close database connection
mysqli_close($conn);
?>
