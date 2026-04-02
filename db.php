<?php
$host = 'localhost';
$user = 'root'; // User mặc định của XAMPP
$pass = '';     // Pass mặc định của XAMPP là rỗng
$dbname = 'login_system';

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
?>