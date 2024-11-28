<?php
$host = "localhost";  // Thay đổi theo địa chỉ host của bạn
$username = "root";   // Thay đổi theo tên người dùng của bạn
$password = "";       // Thay đổi theo mật khẩu của bạn
$dbname = "quiz_db1";  // Tên cơ sở dữ liệu

// Kết nối đến cơ sở dữ liệu MySQL
$conn = new mysqli($host, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
