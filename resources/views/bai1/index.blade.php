@@ -0,0 +1,40 @@
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách Thư viện và Sách</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Danh sách Thư viện và Sách</h1>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên Thư Viện</th>
                    <th>Tên Sách</th>
                    <th>Thể Loại</th>
                    <th>Địa Chỉ</th>
                    <th>Số Điện Thoại</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->library_name }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->genre }}</td>
                        <td>{{ $item->address }}</td>
                        <td>{{ $item->contact_number }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
