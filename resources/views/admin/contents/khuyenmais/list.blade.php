@extends('admin.layouts.master')

@section('noidung')
    <main class="container mt-3">
        <h2 class="text-center text-danger display-4 custom-font">Mã Khuyến Mại !<br></h2>
        <div class="container m-3">
            <div class="row align-items-center">
                <div class="col-md-4 mb-3 mb-md-0">
                    <a href="{{ route('khuyenmais.create') }}"><button type="button"
                            class="btn btn-outline-dark shadow-none me-lg-3 me-2">
                            Thêm Mã Khuyến Mại
                        </button></a>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <input class="form-control" type="search" placeholder="Tìm kiếm sản phẩm" aria-label="Search">
                </div>
                <div class="col-md-4">
                    <button class="btn btn-outline-success btn-block" type="submit">Tìm kiếm</button>
                </div>
            </div>
        </div>
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>CODE </th>
                    <th>MESSAGE</th>
                    <th>DISCOUNT</th>
                    <th>NGÀY TẠO</th>
                    <th>NGÀY CẬP NHẬT</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->code }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->discount }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->updated_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
@endsection
