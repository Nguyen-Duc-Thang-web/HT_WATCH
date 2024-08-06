@extends('admin.layouts.master')

@section('noidung')
    <main class="container mt-3">
        <h2 class="text-center text-danger display-4 custom-font">SỬA DANH MỤC</h2>
        <form action="{{ route('categorys.update', $data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Danh Mục</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $data->name }}" required>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Ảnh </label>
                <input type="file" class="form-control" id="image" name="image">
                @if ($data->image)
                    <img src="{{ Storage::url($data->image) }}" alt="{{ $data->name }}" class="img-thumbnail mt-2"
                        width="150">
                @endif
            </div>


            <div class="mb-3">
                <label for="status" class="form-label">Trạng Thái</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="1" {{ $data->status == 1 ? 'selected' : '' }}>Hoạt động</option>
                    <option value="0" {{ $data->status == 0 ? 'selected' : '' }}>Không hoạt động</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary m-3">Cập Nhật </button>
        </form>
    </main>
@endsection
