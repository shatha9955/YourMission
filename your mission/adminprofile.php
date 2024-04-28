<?php 
include "connect.php";

// بداية الجلسة
session_start();

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
