@extends('layouts/app')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">Danh Sách Thư Viện</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tên Thư Viện</th>
                    <th>Địa Chỉ</th>
                    <th>Số Điện Thoại</th>
                    <th>Thao Tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($libraries as $library)
                    <tr>
                        <td>{{ $library->id }}</td>
                        <td>{{ $library->name }}</td>
                        <td>{{ $library->address }}</td>
                        <td>{{ $library->contact_number }}</td>
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
            <a href="" class="btn btn-primary">Thêm Thư Viện Mới</a>
        </div>
    </div>
@endsection
