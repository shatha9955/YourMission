<header>
        
        <nav>
            <ul>
                <li><a href="index.php"><span>مهمتك</span></a></li>
                <li><a href="index.php">الرئيسية</a></li>
                <li><a href="#about">عن الموقع</a></li>
                <li><a href="#contact">اتصل بنا</a></li>
                <?php
                
         
         
         // التحقق من وجود متغيرات الجلسة المطلوبة
         if(isset($_SESSION['email']) && isset($_SESSION['email'])) {
             // عرض رابط الخروج إذا كانت متغيرات الجلسة غير خالية
             echo '<li><a href="teacher_profile.php">الملف الشخصي</a></li>';
             echo '<li><a href="teacher_test.php"> مهامي </a></li>';
             echo '<li><a href="logout.php">تسجيل الخروج</a></li>';
         } else {
             // عرض رابط تسجيل الدخول إذا كانت متغيرات الجلسة خالية
             echo '<li><a href="login.php">تسجيل الدخول</a></li>';
         }
         ?>

            </ul>
        </nav>
    </header>