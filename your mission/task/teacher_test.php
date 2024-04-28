
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

#calendar {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            direction: rtl;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ccc;
        }
        th {
            background-color: #f2f2f2;
        }
        select {
            padding: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: 100%;
            box-sizing: border-box;
        }
        select:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>
<body>
    <?php include('header.php');?>

    
    <main>
    <h2>مهامي</h2>
    <div id="calendar"></div>


    

    </main>
 <script>
        function displayCalendar() {
            var calendarDiv = document.getElementById("calendar");
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'fetch_tasks.php', true);
            xhr.onload = function() {
                if (xhr.status >= 200 && xhr.status < 300) {
                    calendarDiv.innerHTML = xhr.responseText;
                } else {
                    calendarDiv.innerHTML = "<p>حدث خطأ أثناء جلب المهام.</p>";
                }
            };
            xhr.send();
        }

        function handleStatusChange(assignmentId, newStatus) {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'update_status.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                if (xhr.status >= 200 && xhr.status < 300) {
                    displayCalendar();
                } else {
                    alert('حدث خطأ أثناء تحديث الحالة');
                }
            };
            xhr.send('assignment_id=' + assignmentId + '&new_status=' + encodeURIComponent(newStatus));
        }
        $(document).ready(function() {
    displayCalendar();

    $(document).on('change', '.lesson_status', function() {
        var assignmentId = $(this).data('assignment-id');
        var newStatus = $(this).val(); // Get the selected value
        handleStatusChange(assignmentId, newStatus);
    });


            displayCalendar() ;
        });
    </script>
    <footer>
        <p>جميع الحقوق محفوظة &copy; 2024 مهمتك</p>
    </footer>
</body>
</html>
