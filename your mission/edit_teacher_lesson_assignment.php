<?php
// Include the database connection file
include "connect.php";

// Check if the assignment ID is set in the URL
if (isset($_GET['id'])) {
    // Retrieve the assignment ID from the URL
    $assignment_id = $_GET['id'];

    // SQL query to retrieve the teacher lesson assignment details
    $query = "SELECT * FROM teacher_lesson_assignment WHERE assignment_id = $assignment_id";

    // Execute the query
    $result = mysqli_query($conn, $query);

    // Check if the query is successful and if there is a matching record
    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch the assignment details from the result
        $row = mysqli_fetch_assoc($result);
        $teacher_id = $row['teacher_id'];
        $lesson_id = $row['lesson_id'];
        $day_of_week = $row['day_of_week'];
        $lesson_time = $row['lesson_time'];
    } else {
        // If no matching record is found, redirect to the teacher lesson assignments page
        header("Location: teacher_lesson_assignments.php");
        exit();
    }
} else {
    // If the assignment ID is not set, redirect to the teacher lesson assignments page
    header("Location: teacher_lesson_assignments.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>تعديل تعيين المعلم للدرس</title>
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
<h2> تعديل تعيين المعلم للدرس</h2>

<form action="update_teacher_lesson_assignment.php" method="post">
    <input type="hidden" name="assignment_id" value="<?php echo $assignment_id; ?>">
    <label for="teacher_id">رقم المعلم:</label>
    <input type="text" id="teacher_id" name="teacher_id" value="<?php echo $teacher_id; ?>"><br><br>
    <label for="lesson_id">رقم الدرس:</label>
    <input type="text" id="lesson_id" name="lesson_id" value="<?php echo $lesson_id; ?>"><br><br>
    <label for="day_of_week">يوم الدرس:</label>
    <input type="text" id="day_of_week" name="day_of_week"value="<?php echo $day_of_week; ?>"><br><br>
    <label for="lesson_time">وقت الدرس:</label>
    <input type="time" id="lesson_time" name="lesson_time" value="<?php echo $lesson_time; ?>"><br><br>
    <button type="submit">حفظ التغييرات</button>
</form>

</body>
</html>
