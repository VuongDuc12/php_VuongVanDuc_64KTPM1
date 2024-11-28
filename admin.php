<?php
// Start session to store the product list
session_start();

include './data.php';

// Initialize the session variable 'list' if it is not already set
if (!isset($_SESSION['records'])) {
    $_SESSION['records'] = $data;

}





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
            <form action="processAdmin.php" method="post" enctype="multipart/form-data">
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
                        <label>Upload hình ảnh</label>
                        <input name="image" id="edit-image" type="file" class="form-control-file">
                        <small class="text-muted">Giữ nguyên nếu không muốn thay đổi ảnh.</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-info">Lưu</button>
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

                            $(document).ready(function () {
                        // Xử lý khi nhấn nút sửa
                        $('#editProduct').on('show.bs.modal', function (event) {
                            var button = $(event.relatedTarget); // Lấy nút gọi modal
                            var id = button.data('id'); // Lấy ID
                            var name = button.data('name'); // Lấy tên sản phẩm
                            var description = button.data('description'); // Lấy mô tả
                            var image = button.data('image'); // Lấy đường dẫn ảnh

                            var modal = $(this);
                            modal.find('#edit-id').val(id); // Điền ID
                            modal.find('#edit-name').val(name); // Điền tên
                            modal.find('#edit-description').val(description); // Điền mô tả
                            // Không cần set lại giá trị cho file upload
                        });
                    });

                        });

            </script>
    <script src="./assets/js/bai_5_2.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.19.3/jquery.validate.min.js"></script>
</body>
                    
</html>

