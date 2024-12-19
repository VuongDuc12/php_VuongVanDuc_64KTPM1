@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">Chỉnh Sửa Vấn đề</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('btth04.update' , $issue->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label for="computer_id">Máy Tính</label>
                <select name="computer_id" id="computer_id" class="form-control" value='{{$issue->computer_name}}' required>
                   
                    @foreach ($computers as $computer)
                        <option value="{{ $computer->id }}" {{ $computer->id == $issue->computer_id  ? 'selected' : '' }}>{{ $computer->computer_name }}</option>
                    @endforeach
                </select>

               
            </div>

            <div class="form-group mb-3">
                <label for="reported_by">Người Báo Cáo</label>
                <input type="text" name="reported_by" id="reported_by" class="form-control" placeholder="Nhập tên người báo cáo (nếu có)" value="{{ $issue->reported_by }}">
            </div>

            <div class="form-group mb-3">
                <label for="reported_date">Ngày Báo Cáo</label>
                <input type="datetime-local" name="reported_date" id="reported_date" class="form-control" value="{{ str_replace(' ', 'T', $issue->reported_date) }}" required>
            </div>

            <div class="form-group mb-3">
                <label for="description">Mô Tả Vấn Đề</label>
                <textarea name="description" id="description" class="form-control" placeholder="Nhập mô tả vấn đề" rows="5"  required>{{ $issue->description }}</textarea>
            </div>

            <div class="form-group mb-3">
                <label for="urgency">Mức Độ Khẩn Cấp</label>
                <select name="urgency" id="urgency" class="form-control"  required>
                    
                    <option value="Low" {{ $issue->urgency == 'Low' ? 'selected' : '' }}>Low</option>
                    <option value="Medium" {{ $issue->urgency == 'Medium' ? 'selected' : '' }}> Medium</option>
                    <option value="High" {{ $issue->urgency == 'High' ? 'selected' : '' }}>High</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="status">Trạng Thái</label>
                <select name="status" id="status" class="form-control"  required>
                    <option value="Open" {{ $issue->status == 'Open' ? 'selected' : '' }}>Open</option>
                    <option value="In Progress" {{ $issue->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="Resolved" {{ $issue->status == 'Resolved' ? 'selected' : '' }}>Resolved</option>
                </select>
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-success">Lưu</button>
                <a href="{{ route('btth04.index') }}" class="btn btn-secondary ms-2">Quay lại</a>
            </div>
        </form>
    </div>
@endsection
