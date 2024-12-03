<?php
session_start();

// Kết nối cơ sở dữ liệu
$host = "localhost";
$user = "root";
$password = "";
$dbname = "flower_shop";  // Đổi tên cơ sở dữ liệu

$conn = new mysqli($host, $user, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Nếu session chưa có records thì khởi tạo
if (!isset($_SESSION['records'])) {
    $_SESSION['records'] = [];
}

// Xử lý form (thêm, sửa, xóa)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $id = $_POST['id'] ?? null;
   
    // Thêm bản ghi mới
    if ($action === 'add') {
        $name = trim($_POST['name'] ?? '');
        $description = trim($_POST['description'] ?? '');
        $imagePath = '';

        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = '../uploads/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }
            $imagePath = $uploadDir . basename($_FILES['image']['name']);
            if (move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {
                $imagePath = '' . ltrim($imagePath, '/');

            } else {
                $imagePath = '';  // Nếu không tải được ảnh
            }
        }

        if ($name && $description && $imagePath) {
            // Thêm dữ liệu vào cơ sở dữ liệu
            $stmt = $conn->prepare("INSERT INTO products (name, description, image) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $name, $description, $imagePath);

            if ($stmt->execute()) {
                // Lấy ID vừa được tự động tạo sau khi insert
                $id = $stmt->insert_id;
                $stmt->close();
                
                // Thêm dữ liệu vào session với ID từ cơ sở dữ liệu
                $_SESSION['records'][$id] = [
                    'id' => $id,
                    'name' => $name,
                    'description' => $description,
                    'image' => $imagePath,
                ];
            } else {
                // Xử lý lỗi nếu không thêm được
                echo "Error: " . $stmt->error;
            }
        }
    }
    // Chỉnh sửa bản ghi
    elseif ($action === 'edit' && $id !== null) {
        if (isset($_SESSION['records'][$id])) {
            $name = trim($_POST['name'] ?? '');
            $description = trim($_POST['description'] ?? '');
            $imagePath = $_SESSION['records'][$id]['image'] ?? '';

            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = 'uploads/';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0755, true);
                }
                $imagePath = $uploadDir . basename($_FILES['image']['name']);
                move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
            }

            if ($name && $description) {
                // Cập nhật dữ liệu trong session
                $_SESSION['records'][$id] = [
                    'id' => $id,
                    'name' => $name,
                    'description' => $description,
                    'image' => $imagePath,
                ];

                // Cập nhật dữ liệu trong cơ sở dữ liệu
                $stmt = $conn->prepare("UPDATE products SET name = ?, description = ?, image = ? WHERE id = ?");
                $stmt->bind_param("sssi", $name, $description, $imagePath, $id);

                // Hiển thị thông báo ID
                echo "<script>console.log('Đã cập nhật thành công bản ghi với ID: " . $id . "');</script>";

                if ($stmt->execute()) {
                    $stmt->close();
                } else {
                    // Xử lý lỗi nếu không cập nhật được
                    echo "Error: " . $stmt->error;
                }
            }
        }
    }
    
    // Xóa bản ghi
    elseif ($action === 'delete' && $id !== null) {
        if (isset($_SESSION['records'][$id])) {
            // Xóa dữ liệu trong session
            unset($_SESSION['records'][$id]);
            $_SESSION['records'] = array_values($_SESSION['records']); // Reset keys

            // Xóa dữ liệu trong cơ sở dữ liệu
            $stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
            $stmt->bind_param("i", $id);

            if ($stmt->execute()) {
                $stmt->close();
            } else {
                // Xử lý lỗi nếu không xóa được
                echo "Error: " . $stmt->error;
            }
        }
    }

    // Đóng kết nối
    $conn->close();

    // Chuyển hướng sau khi xử lý
    header("Location: ../view/admin.php");
    exit();
}
?>
