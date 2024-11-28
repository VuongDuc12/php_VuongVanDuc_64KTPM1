<?php
// Include dữ liệu từ modal.php
$flowers = include './modal.php';

// Kiểm tra dữ liệu
if (!is_array($flowers)) {
    echo "Error: Flowers data is not an array.";
    $flowers = []; // Gán giá trị mặc định để tránh lỗi
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .flower img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Flower Gallery</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Flower List -->
    <div class="container mt-5">
    <div class="container mt-5">
            <div class="row">
                <?php foreach ($flowers as $index => $flower): ?>
                    <div class="col-md-4 d-flex align-items-stretch">
                        <div class="card shadow-sm flower">
                            <img src="<?php echo $flower['image']; ?>" class="card-img-top" alt="<?php echo $flower['name']; ?>">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title"><?php echo $flower['name']; ?></h5>
                                <p class="card-text flex-grow-1"><?php echo $flower['description']; ?></p>
                                <a href="flower_detail.php?id=<?php echo $index; ?>" class="btn btn-primary mt-3">View Details</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3 mt-5">
        <p class="mb-0">&copy; 2024 Flower Gallery. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
