<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bảng Dữ Liệu Người Dùng</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Bảng Dữ Liệu Người Dùng</h2>
        <table class="table table-bordered table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Họ Tên</th>
                    <th>Tiêu Đề</th>
                    <th>Nội Dung</th>
                    <th>Ngày Đăng Ký</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <td>VUong Van duc</td> <!-- Hiển thị họ tên -->
                    <td>{{ $post->title }}</td> <!-- Hiển thị tiêu đề bài viết -->
                    <td>{{ $post->content }}</td> <!-- Hiển thị nội dung bài viết -->
                    <td>11/07/2024</td> <!-- Hiển thị ngày đăng ký -->
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
