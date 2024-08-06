@extends('admin.layouts.master')

@section('noidung')
    <main class="container mt-3">
        <h2 class="text-center text-danger display-4 custom-font">THÊM DANH MỤC</h2>
        <form action="{{ route('categorys.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Danh Mục</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Ảnh </label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Trạng Thái</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="0">Không hoạt động</option>
                    <option value="1">Hoạt động</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary m-3">Cập Nhật </button>
        </form>
    </main>
@endsection
