<?php
// Start session to store the product list
session_start();
$flowers = include './modal.php';


// Initialize the session variable 'list' if it is not already set
if (!isset($_SESSION['records'])) {
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
    ];;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $image = trim($_POST['image'] ?? '');

    // Thêm thông tin vào danh sách nếu tất cả các trường không rỗng
    if ($name && $description && $image) {
        $_SESSION['records'][] = [
            'name' => $name,
            'description' => $description,
            'image' => $image,
        ];
    }

    // Tránh gửi lại form khi tải lại trang
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}


// Retrieve the list of products
$list_table = $_SESSION['records'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="./assets/fonts/fontawesome-free-6.5.2-web/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="./assets/css/bai_5_2.css">
    <title>Form_Jquery_Validate</title>
</head>

<body>
    <div class="container">
        <?php require 'header.php'; ?>
        <?php require 'section-one.php'; ?>

        <button data-toggle="modal" type="button" class="btn btn-success mt-5 mb-2" data-target="#addProduct">Thêm mới</button>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Mô tả</th>
                    <th>Hình ảnh</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($_SESSION['records'] as $index => $product): ?>
                <tr>
                    <td><?= htmlspecialchars($product['name']) ?></td>
                    <td><?= htmlspecialchars($product['description']) ?></td>
                    <td><img src="<?= htmlspecialchars($product['image']) ?>" alt="Hình ảnh" style="width: 100px; height: auto;"></td>
                    <td>
                        <button class="btn btn-warning" 
                                data-toggle="modal" 
                                data-target="#editProduct" 
                                data-id="<?= $index ?>" 
                                data-name="<?= htmlspecialchars($product['name']) ?>" 
                                data-description="<?= htmlspecialchars($product['description']) ?>" 
                                data-image="<?= htmlspecialchars($product['image']) ?>">
                            Sửa
                        </button>
                    </td>
                    <td>
                        <button class="btn btn-danger" 
                                data-toggle="modal" 
                                data-target="#deleteProduct" 
                                data-id="<?= $index ?>">
                            Xóa
                        </button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div id="addProduct" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="processAdmin.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="action" value="add">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm sản phẩm</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Tên sản phẩm</label>
                        <input name="name" type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea name="description" class="form-control" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Upload hình ảnh</label>
                        <input name="image" type="file" class="form-control-file" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-success">Xác nhận</button>
                </div>
            </form>
        </div>
    </div>
</div>

    <div id="editProduct" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="processAdmin.php" method="post">
                    <input type="hidden" name="action" value="edit">
                    <input type="hidden" name="id" id="edit-id">
                    <div class="modal-header">
                        <h4 class="modal-title">Sửa sản phẩm</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Tên sản phẩm</label>
                            <input name="name" id="edit-name" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Mô tả</label>
                            <textarea name="description" id="edit-description" class="form-control" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Đường dẫn hình ảnh</label>
                            <input name="image" id="edit-image" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Hủy">
                        <input type="submit" class="btn btn-info" value="Lưu">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="deleteProduct" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="processAdmin.php" method="post">
                    <input type="hidden" name="action" value="delete">
                    <input type="hidden" name="id" id="delete-id">
                    <div class="modal-header">
                        <h4 class="modal-title">Xóa sản phẩm</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Bạn có chắc chắn muốn xóa sản phẩm này không?</p>
                        <p class="text-warning"><small>Sản phẩm sẽ bị xóa vĩnh viễn.</small></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-danger">Xóa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    


    <?php include 'footer.php'; ?>

 
    <script>
                    $(document).ready(function () {
                            // Xử lý khi nhấn nút xóa
                            $('#deleteProduct').on('show.bs.modal', function (event) {
                                var button = $(event.relatedTarget); // Lấy nút gọi modal
                                var id = button.data('id'); // Lấy ID từ nút bấm
                                $(this).find('#delete-id').val(id); // Điền ID vào input trong modal
                            });

                            // Xử lý khi nhấn nút sửa
                            $('#editProduct').on('show.bs.modal', function (event) {
                                var button = $(event.relatedTarget); // Lấy nút gọi modal
                                var id = button.data('id'); // Lấy ID từ nút bấm
                                var name = button.data('name'); // Lấy tên sản phẩm từ nút bấm
                                var price = button.data('price'); // Lấy giá sản phẩm từ nút bấm

                                var modal = $(this);
                                modal.find('#edit-id').val(id); // Điền ID vào input
                                modal.find('#edit-name').val(name); // Điền tên vào input
                                modal.find('#edit-price').val(price); // Điền giá vào input
                            });
                        });

            </script>
    <script src="./assets/js/bai_5_2.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.19.3/jquery.validate.min.js"></script>
</body>
                    
</html>

