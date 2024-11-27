<?php
// Thư mục đích để lưu tệp tải lên
$target_dir = "uploads/";

// Xử lý tệp tải lên
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES["fileToUpload"])) {
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "Tệp " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " đã được tải lên thành công.";
    } else {
        echo "Xin lỗi, đã có lỗi xảy ra trong quá trình tải tệp tin của bạn.";
    }
}

// Hàm hiển thị hình ảnh trong thư mục "uploads"
function displayUploadedImages($directory) {
    if (!is_dir($directory)) {
        echo "Thư mục không tồn tại!";
        return;
    }

    $files = scandir($directory);
    $images = array_filter($files, function ($file) use ($directory) {
        $filePath = $directory . '/' . $file;
        return is_file($filePath) && preg_match('/\.(jpg|jpeg|png|gif)$/i', $file);
    });

    if (empty($images)) {
        echo "<p>Không có hình ảnh nào được tải lên.</p>";
        return;
    }

    echo "<div style='display: flex; flex-wrap: wrap; gap: 10px;'>";
    foreach ($images as $image) {
        $imagePath = $directory . '/' . $image;
        echo "<div style='text-align: center;'>
                <img src='$imagePath' alt='$image' style='width: 150px; height: auto; border: 1px solid #ccc; padding: 5px;'>
                <p>$image</p>
              </div>";
    }
    echo "</div>";
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tải lên và Xem hình ảnh</title>
</head>
<body>
    <h1>Tải lên hình ảnh</h1>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        Chọn ảnh để tải lên:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Tải lên Ảnh" name="submit">
    </form>
    
    <h2>Hình ảnh đã tải lên</h2>
    <?php
    // Gọi hàm để hiển thị hình ảnh
    displayUploadedImages($target_dir);
    ?>
</body>
</html>