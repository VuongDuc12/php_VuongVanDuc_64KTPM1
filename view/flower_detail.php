<?php
// như này thì sẽ hơi chậm bởi vì phải truy xuất data thêm lần nữa, chúng ta có thể chuyền data từ trong home page sang để nhanh hơn

// Include dữ liệu từ modal.php
include '../model/data.php';

// Lấy ID từ URL
$id = isset($_GET['id']) ? (int)$_GET['id'] : -1;

// Kiểm tra ID hợp lệ
if ($id < 0 || $id >= count($_SESSION['records'])) {
    echo "Invalid flower ID.";
    exit;
}

// Lấy thông tin chi tiết của hoa
$flower = $_SESSION['records'][$id];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $flower['name']; ?> - Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Flower Gallery</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <img src="<?php echo $flower['image']; ?>" class="img-fluid" alt="<?php echo $flower['name']; ?>">
            </div>
            <div class="col-md-6">
                <h1><?php echo $flower['name']; ?></h1>
                <p><?php echo $flower['description']; ?></p>
                <a href="./homepage.php" class="btn btn-secondary">Back to Gallery</a>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-white text-center py-3 mt-5">
        <p class="mb-0">&copy; 2024 Flower Gallery. All rights reserved.</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
