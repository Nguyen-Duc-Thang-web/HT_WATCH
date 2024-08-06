@extends('admin.layouts.master')

@section('noidung')
    <main class="container mt-3">
        <h2 class="text-center text-danger display-4 custom-font">Người Dùng !<br></h2>
        <div class="container m-3">
            <div class="row align-items-center">
                <div class="col-md-4 mb-3 mb-md-0">
                    <a href="{{ route('watchs.create') }}"><button type="button"
                            class="btn btn-outline-dark shadow-none me-lg-3 me-2">
                            Thêm Danh Mục
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
                    <th>TÊN </th>
                    <th>IMAGE</th>
                    <th>EMAIL</th>
                    <th>PHONE</th>
                    <th>ADDRESS</th>
                    <th>TYPE</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td><img src="{{ Storage::url($item->image) }}" alt="Product Image" width="200px" height="auto">
                        </td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->address }}</td>
                        <td>{{ $item->type }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
@endsection
