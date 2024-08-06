@extends('admin.layouts.master')

@section('noidung')
    <main class="container mt-3">
        <h2 class="text-center text-danger display-4 custom-font">CHỈNH SỬA SẢN PHẨM</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('watchs.update', $watch->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="catagory_id" class="form-label">Danh Mục</label>
                <select class="form-control" name="catagory_id" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $watch->catagory_id ? 'selected' : '' }}>
                            {{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Tên Sản Phẩm</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $watch->name }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Ảnh Sản Phẩm</label>
                <input type="file" class="form-control" id="image" name="image">
                @if ($watch->image)
                    <img src="{{ Storage::url($watch->image) }}" alt="{{ $watch->name }}" class="img-thumbnail mt-2"
                        width="150">
                @endif
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Giá Sản Phẩm</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ $watch->price }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="quantity" class="form-label">Số Lượng Sản Phẩm</label>
                <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $watch->quantity }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="short_description" class="form-label">Mô Tả Ngắn</label>
                <textarea class="form-control" id="short_description" name="short_description" rows="3">{{ $watch->short_description }}</textarea>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Mô Tả Chi Tiết</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ $watch->description }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary m-3">Cập Nhật Sản Phẩm</button>
        </form>
    </main>
@endsection
