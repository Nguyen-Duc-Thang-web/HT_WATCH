@extends('admin.layouts.master')

@section('noidung')
    <main class="container mt-3">
        <h2 class="text-center text-danger display-4 custom-font">THÊM MỚI BANNER</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('banners.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Alt</label>
                <input type="text" class="form-control" id="alt" name="alt" required>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Ảnh Sản Phẩm</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>

            <button type="submit" class="btn btn-primary m-3">Cập Nhật Sản Phẩm</button>
        </form>
    </main>
@endsection
