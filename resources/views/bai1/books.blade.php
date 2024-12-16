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
                    <th>Thư Viện</th>
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
                        <td>{{ $book->library->name}}</td> <!-- Hiển thị tên thư viện liên kết -->
                        <td>
                            <a href="" class="btn btn-info">Xem</a>
                            <a href="{{route('bai1Books.edit' , $book->id)}}" class="btn btn-warning">Chỉnh Sửa</a>
                           
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $book->id }}">
                                    Xóa
                                </button>
                            <div class="modal fade" id="deleteModal{{ $book->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $book->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel{{ $book->id }}">Xác nhận xóa</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Bạn có chắc chắn muốn xóa đồ án này không?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                                <form action="{{ route('bai1Books.destroy', $book->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Xóa</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
				{{ $books->links('pagination::bootstrap-4') }}
			</div>
        <div class="d-flex justify-content-end">
            <a href="{{ route('bai1Books.create') }}" class="btn btn-primary">Thêm Sách Mới</a>
        </div>
    </div>
@endsection
