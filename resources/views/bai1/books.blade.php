@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">Danh Sách Sách</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tên Sách</th>
                    <th>Tác Giả</th>
                    <th>Năm Xuất Bản</th>
                    <th>Thể Loại</th>
                    <th>ID Thư Viện</th>
                    <th>Thao Tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <td>{{ $book->id }}</td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->publication_year }}</td>
                        <td>{{ $book->genre }}</td>
                        <td>{{ $book->library_id}}</td> <!-- Hiển thị tên thư viện liên kết -->
                        <td>
                            <a href="" class="btn btn-info">Xem</a>
                            <a href="" class="btn btn-warning">Chỉnh Sửa</a>
                            <form action="" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-end">
            <a href="" class="btn btn-primary">Thêm Sách Mới</a>
        </div>
    </div>
@endsection
