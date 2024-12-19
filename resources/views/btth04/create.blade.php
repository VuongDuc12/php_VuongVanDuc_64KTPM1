@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">Thêm Vấn đề mới</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('btth04.store') }}" method="POST">
            @csrf

            <div class="form-group mb-3">
                <label for="computer_id">Máy Tính</label>
                <select name="computer_id" id="computer_id" class="form-control" required>
                    <option value="">-- Chọn máy tính --</option>
                    @foreach ($computers as $computer)
                        <option value="{{ $computer->id }}">{{ $computer->computer_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="reported_by">Người Báo Cáo</label>
                <input type="text" name="reported_by" id="reported_by" class="form-control" placeholder="Nhập tên người báo cáo (nếu có)" value="{{ old('reported_by') }}">
            </div>

            <div class="form-group mb-3">
                <label for="reported_date">Ngày Báo Cáo</label>
                <input type="datetime-local" name="reported_date" id="reported_date" class="form-control" value="{{ old('reported_date') }}" required>
            </div>

            <div class="form-group mb-3">
                <label for="description">Mô Tả Vấn Đề</label>
                <textarea name="description" id="description" class="form-control" placeholder="Nhập mô tả vấn đề" rows="5" required>{{ old('description') }}</textarea>
            </div>

            <div class="form-group mb-3">
                <label for="urgency">Mức Độ Khẩn Cấp</label>
                <select name="urgency" id="urgency" class="form-control" required>
                    <option value="">-- Chọn mức độ khẩn cấp --</option>
                    <option value="Low" {{ old('urgency') == 'Low' ? 'selected' : '' }}>Thấp</option>
                    <option value="Medium" {{ old('urgency') == 'Medium' ? 'selected' : '' }}>Trung Bình</option>
                    <option value="High" {{ old('urgency') == 'High' ? 'selected' : '' }}>Cao</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="status">Trạng Thái</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="Open" {{ old('status') == 'Open' ? 'selected' : '' }}>Mở</option>
                    <option value="In Progress" {{ old('status') == 'In Progress' ? 'selected' : '' }}>Đang Xử Lý</option>
                    <option value="Resolved" {{ old('status') == 'Resolved' ? 'selected' : '' }}>Đã Giải Quyết</option>
                </select>
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-success">Lưu</button>
                <a href="{{ route('btth04.index') }}" class="btn btn-secondary ms-2">Quay lại</a>
            </div>
        </form>
    </div>
@endsection
