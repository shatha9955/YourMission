
<?php  session_start();     ?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تقويم ومهام الاستاذ</title>
    <style>
        /* استيلات CSS للتصميم */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
            text-align: center;
        }
        h1 {
            margin-bottom: 20px;
        }
        .calendar {
            display: flex;
            flex-wrap: wrap;
            width: 400px;
            margin: auto;
            padding: 10px;
            background-color: #fff;
            border-radius: 10px;
            border: 2px solid #ccc;
        }
        .day {
            flex-basis: calc(100% / 7);
            text-align: center;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 50%;
            cursor: pointer;
        }
        .selected {
            background-color: #008080;
            color: #fff;
        }
        .task-list {
            list-style: none;
            padding: 0;
            text-align: right;
            margin-top: 20px;
        }
        .task-list li {
            margin-bottom: 10px;
            padding: 10px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .task-list li:hover {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>تقويم ومهام الاستاذ</h1>

    <div class="calendar"></div>

    <ul class="task-list">
        <!-- ستتم إضافة المهام هنا بواسطة JavaScript -->
    </ul>

    <script>
        var calendar = document.querySelector('.calendar');
        var date = new Date();
        var year = date.getFullYear();
        var month = date.getMonth();
        var day = date.getDate();
        var monthsArray = ['يناير', 'فبراير', 'مارس', 'أبريل', 'مايو', 'يونيو', 'يوليو', 'أغسطس', 'سبتمبر', 'أكتوبر', 'نوفمبر', 'ديسمبر'];
        var daysArray = ['الأحد', 'الإثنين', 'الثلاثاء', 'الأربعاء', 'الخميس', 'الجمعة', 'السبت'];

        function createCalendar(month, year) {
            var firstDay = new Date(year, month, 1);
            var startingDay = firstDay.getDay();
            var monthLength = new Date(year, month + 1, 0).getDate();
            var html = '<h2>' + monthsArray[month] + ' ' + year + '</h2>';
            html += '<table>';
            html += '<tr>';
            for (var i = 0; i < daysArray.length; i++) {
                html += '<th>' + daysArray[i] + '</th>';
            }
            html += '</tr><tr>';
            var dayCount = 1;
            if (startingDay != 0) {
                for (var j = 0; j < startingDay; j++) {
                    html += '<td></td>';
                }
            }
            while (dayCount <= monthLength) {
                if (startingDay == 0) {
                    html += '<tr>';
                }
                if (day == dayCount && month == date.getMonth() && year == date.getFullYear()) {
                    html += '<td class="day selected">' + dayCount + '</td>';
                } else {
                    html += '<td class="day">' + dayCount + '</td>';
                }
                dayCount++;
                startingDay++;
                if (startingDay == 7 && dayCount <= monthLength) {
                    startingDay = 0;
                    html += '</tr><tr>';
                }
            }
            html += '</tr></table>';
            calendar.innerHTML = html;
        }

        createCalendar(month, year);

        var days = document.querySelectorAll('.day');
        for (var k = 0; k < days.length; k++) {
            days[k].addEventListener('click', function() {
                var selectedDay = this.innerHTML;
                var selectedMonth = monthsArray.indexOf(document.querySelector('h2').innerHTML.split(' ')[0]);
                var selectedYear = parseInt(document.querySelector('h2').innerHTML.split(' ')[1]);
                this.classList.add('selected');
                fetchTasks(selectedDay, selectedMonth, selectedYear); // جلب المهام عند النقر على يوم معين
            });
        }

        function fetchTasks(day, month, year) {
            // استخدام AJAX لجلب المهام من قاعدة البيانات
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'fetch_tasks.php?day=' + day + '&month=' + month + '&year=' + year, true);
            xhr.onload = function() {
                if (xhr.status >= 200 && xhr.status < 300) {
                    var tasks = JSON.parse(xhr.responseText);
                    displayTasks(tasks);
                } else {
                    console.error('Failed to fetch tasks');
                }
            };
            xhr.send();
        }

        function displayTasks(tasks) {
            var taskList = document.querySelector('.task-list');
            taskList.innerHTML = ''; // إزالة البيانات السابقة

            if (tasks.length === 0) {
                var listItem = document.createElement('li');
                listItem.textContent = 'لا توجد مهام متاحة في هذا اليوم';
                taskList.appendChild(listItem);
            } else {
                tasks.forEach(function(task) {
                    var listItem = document.createElement('li');
                    listItem.textContent = task.name; // افتراضياً يجب تغيير هذا ليتم عرض بيانات المهمة
                    listItem.setAttribute('data-id', task.id); // تعيين معرف المهمة كبيانات للعنصر لاستخدامه في التعديل لاحقًا
                    listItem.addEventListener('click', function() {
                        markTaskPresent(task.id); // تحديث حالة المهمة إلى "حاضر" عند النقر
                    });
                    taskList.appendChild(listItem);
                });
            }
        }

        function markTaskPresent(taskId) {
            // استخدام AJAX لتحديث حالة المهمة إلى "حاضر"
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'update_status.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                if (xhr.status >= 200 && xhr.status < 300) {
                    var response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        alert('تم تحديث حالة المهمة بنجاح');
                        // إعادة جلب المهام بعد التحديث
                        var selectedDay = document.querySelector('.selected').textContent;
                        var selectedMonth = monthsArray.indexOf(document.querySelector('h2').innerHTML.split(' ')[0]);
                        var selectedYear = parseInt(document.querySelector('h2').innerHTML.split(' ')[1]);
                        fetchTasks(selectedDay, selectedMonth, selectedYear);
                    } else {
                        alert('حدث خطأ أثناء تحديث حالة المهمة');
                    }
                } else {
                    console.error('Failed to mark task as present');
                }
            };
            xhr.send('task_id=' + taskId);
        }
    </script>
</body>
</html>

