<?php
$servername = "localhost";
$username = "id22030584_root";
$password = "a20092005bbbb@_A";
$dbname = "id22030584_taskteach";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
