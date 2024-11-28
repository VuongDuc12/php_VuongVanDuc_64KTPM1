<?php


session_start();

// Kiểm tra nếu session có dữ liệu 'records'
if (!isset($_SESSION['records']) || !is_array($_SESSION['records'])) {
    echo "Error: No flower data found in session.";
    $_SESSION['records'] =  [
        [
            "name" => "Hoa dạ yến thảo ",
            "description" => "Dạ yến thảo là lựa chọn thích hợp cho những ai yêu thích trồng hoa làm đẹp nhà ở. Hoa có thể nở rực quanh năm, kể cả tiết trời se lạnh của mùa xuân hay cả những ngày nắng nóng cao điểm của mùa hè. Dạ yến thảo được trồng ở chậu treo nơi cửa sổ hay ban công, dáng hoa mềm mại, sắc màu đa dạng nên được yêu thích vô cùng.",
            "image" => "./assets/img/dayenthao.webp"
        ],
        [
            "name" => "Hoa đồng tiền",
            "description" => "Hoa đồng tiền thích hợp để trồng trong mùa xuân và đầu mùa hè, khi mà cường độ ánh sáng chưa quá mạnh. Cây có hoa to, nở rộ rực rỡ, lại khá dễ trồng và chăm sóc nên sẽ là lựa chọn thích hợp của bạn trong tiết trời này. Về mặt ý nghĩa, hoa đồng tiền cũng tượng trưng cho sự sung túc, tình yêu và hạnh phúc viên mãn.",
            "image" => "./assets/img/HoaDongTien.webp"
        ],
        [
            "name" => "Hoa giấy",
            "description" => "Hoa giấy có mặt ở hầu khắp mọi nơi trên đất nước ta, thích hợp với nhiều điều kiện sống khác nhau nên rất dễ trồng, không tốn quá nhiều công chăm sóc nhưng thành quả mang lại sẽ khiến bạn vô cùng hài lòng. Hoa giấy mỏng manh nhưng rất lâu tàn, với nhiều màu như trắng, xanh, đỏ, hồng, tím, vàng… cùng nhiều sắc độ khác nhau. Vào mùa khô hanh, hoa vẫn tươi sáng trên cây khiến ngôi nhà luôn luôn bừng sáng.",
            "image" => "./assets/img/HoaGiay.webp"
        ],
        [
            "name" => "Hoa thanh tú",
            "description" => "Mang dáng hình tao nhã, màu sắc thiên thanh dịu dàng của hoa thanh tú có thể khiến bạn cảm thấy vô cùng nhẹ nhàng khi nhìn ngắm. Cây khá dễ trồng, lại nở nhiều hoa cùng một lúc, từ một bụi nhỏ có thể đâm nhánh, tạo nên những cây con phát triển sum suê. Thanh tú trồng ở nơi có nắng sẽ ra hoa nhiều, vì thế thích hợp trong cả mùa xuân lẫn mùa hè, đem lại khoảng không gian xanh mát cho ngôi nhà ngày oi nóng.",
            "image" => "./assets/img/HoaThanhTU.webp"
        ],
        [
            "name" => "Hoa đèn lồng",
            "description" => "Giống như tên gọi, hoa đèn lồng có vẻ đẹp giống như chiếc đèn lồng đỏ trên cao. Nếu giàu trí tưởng tượng hơn, chúng ta sẽ hình dung hoa khi nụ đổ xuống thành từng chùm, kết năm kết ba như những thiếu nữ xúng xính trong chiếc đầm dạ hội. Hoa đèn lồng còn có tên là hồng đăng hoa, trồng trong chậu treo, bồn, phên dậu,… gieo hạt vào mùa xuân và cho hoa quanh năm.",
            "image" => "./assets/img/HoaLongDen.webp"
        ],
        [
            "name" => "Hoa cẩm chướng",
            "description" => "Cẩm chướng là loại hoa thích hợp trồng vào dịp xuân - hè, nếu tiết trời không quá lạnh có thể kéo dài đến tận mùa đông. Hoa có phần thân mảnh, các đốt ngắn mang lá kép cùng nhiều màu sắc như hồng, vàng, đỏ, tím,… thậm chí có thể pha lẫn màu để tạo nên đường viền xinh xắn. Đặt một chậu hoa cẩm chướng trên bàn sẽ khiến căn phòng của bạn đẹp mắt hơn rất nhiều.",
            "image" => "./assets/img/HoaCamTruong.webp"
        ],
        [
            "name" => "Hoa huỳnh anh",
            "description" => "Nếu bạn đang đi tìm một loài hoa tô điểm cho khu vực ban công hoặc hàng rào ngôi nhà thì huỳnh anh là một lựa chọn thích hợp trong mùa này hơn cả. Hoa có màu vàng rực, hình dạng như chiếc kèn be bé inh xinh, lại dễ trồng, mọc nhanh, vươn cao… Huỳnh Anh rất thích nắng, ánh nắng giúp hoa tỏa sáng rực rỡ, nếu ở nơi bóng râm thì chúng sẽ nhạt màu, kém sắc.",
            "image" => "./assets/img/HoaHuynhAnh.webp"
        ],
        [
            "name" => "Hoa Păng-xê",
            "description" => "Vào mỗi độ tháng 4 về là dịp mà loài hoa Phăng-xê nở rộ vô cùng đẹp mắt. Hoa còn được gọi tên là hay hoa bướm, hoa tử la lan, hoa tương tư,… Păng-xê thường được trồng trong chậu nhỏ, với phần cánh mỏng mượt như nhung, hình dạng cánh bướm mềm mại như đang tung tăng nhảy múa mỗi khi có làn gió thổi qua. Đây cũng là loài hoa tinh tế và sức sống bền bỉ. ",
            "image" => "./assets/img/hoapangxe.webp"
        ]
    ]; // Gán giá trị mặc định nếu không có dữ liệu
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
      rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
      rel="stylesheet"
    />
    <style>
        .flower img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }
        .carousel-image {
            height: 400px; /* Điều chỉnh chiều cao mong muốn */
            object-fit: cover; /* Giữ tỷ lệ và cắt ảnh nếu cần */
            border: 3px solid green; /* Đường viền màu xanh lá cây */
            border-radius: 10px; /* Bo góc nhẹ */
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
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
                <!-- Nút đăng ký và đăng nhập -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="btn btn-outline-light me-2" href="register.php">Sign Up</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-light" href="login.php">Log In</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Flower Carousel -->
    <div class="container mt-5">
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./assets/img/dayenthao.webp" class="d-block w-100 carousel-image" alt="Dạ yến thảo">
                </div>
                <div class="carousel-item">
                    <img src="./assets/img/HoaGiay.webp" class="d-block w-100 carousel-image" alt="Hoa giấy">
                </div>
                <div class="carousel-item">
                    <img src="./assets/img/HoaHuynhAnh.webp" class="d-block w-100 carousel-image" alt="Hoa huỳnh anh">
                </div>
            </div>

            <!-- Thêm nút điều khiển nếu cần -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <!-- Flower List -->
    <div class="container mt-5">
        <h3 class="mb-4 text-success fs-4 border-bottom">Những loại hoa tuyệt đẹp 2024</h3>
        <div class="row">
        <?php foreach ($_SESSION['records'] as $index => $flower): ?>
                <div class="col-md-4 d-flex align-items-stretch my-3">
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

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3 mt-5">
        <p class="mb-0">&copy; 2024 Flower Gallery. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
