@extends('admin.layouts.master')

@section('noidung')
    <main class="container mt-3">
        <h2 class="text-center text-danger display-4 custom-font">Thêm Mã Khuyến Mại</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('khuyenmais.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="code" class="form-label">Tên Mã Code</label>
                <input type="text" class="form-control" id="code" name="code" required>
            </div>
            <div class="mb-3">
                <label for="discount" class="form-label">Chiết Khấu</label>
                <input type="number" class="form-control" id="discount" name="discount" required>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Nội Dung</label>
                <textarea class="form-control" id="name" name="name" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary m-3">Thêm Mã</button>
        </form>
    </main>
@endsection
