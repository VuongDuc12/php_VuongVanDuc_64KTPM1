@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">Chỉnh sửa sách</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('bai1Books.update' , $book->id ) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label for="title">Tên Sách</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Nhập tên sách" value="{{$book->title}}" required>
            </div>

            <div class="form-group mb-3">
                <label for="author">Tác Giả</label>
                <input type="text" name="author" id="author" class="form-control" placeholder="Nhập tên tác giả" value="{{$book->author}}" required>
            </div>

            <div class="form-group mb-3">
                <label for="publication_year">Năm Xuất Bản</label>
                <input type="date" name="publication_year" id="publication_year" class="form-control" placeholder="Nhập năm xuất bản" value="{{$book->publication_year}}" required>
            </div>

            <div class="form-group mb-3">
                <label for="genre">Thể Loại</label>
                <input type="text" name="genre" id="genre" class="form-control" placeholder="Nhập thể loại sách" value="{{$book->genre}}" required>
            </div>

            <div class="form-group mb-3">
                <label for="library_id">Thư Viện</label>
                <select name="library_id" id="library_id" class="form-control" required>
                    
                    @foreach ($libraries as $library)
                        <option value="{{ $library->id }}" 
                        {{ $library->id == $book->library_id ? 'selected' : '' }}>{{ $library->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-success">Lưu</button>
                <a href="{{route('bai1Books.index')}}" class="btn btn-secondary ms-2">Quay lại</a>
            </div>
        </form>
    </div>
@endsection