<?php
// Bước 1: Khởi tạo session


// Bước 2: Kết nối tới cơ sở dữ liệu
$host = "localhost";  // Địa chỉ máy chủ
$user = "root";       // Tên người dùng
$password = "";       // Mật khẩu
$dbname = "flower_shop";  // Tên cơ sở dữ liệu

// Tạo kết nối
$conn = new mysqli($host, $user, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Bước 3: Truy vấn dữ liệu từ cơ sở dữ liệu
$sql = "SELECT * FROM products";  // Truy vấn lấy tất cả sản phẩm
$result = $conn->query($sql);

// Bước 4: Kiểm tra và thêm dữ liệu vào session
if ($result->num_rows > 0) {
    // Lấy tất cả dữ liệu và lưu vào session
    $products = [];
    while($row = $result->fetch_assoc()) {
        $products[] = $row;  // Thêm từng sản phẩm vào mảng
    }
    $_SESSION['records'] = $products;  // Lưu mảng sản phẩm vào session
} else {
    echo "Không có dữ liệu!";
}

// Bước 5: Đóng kết nối
$conn->close();
?>
