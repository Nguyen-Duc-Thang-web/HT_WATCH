@extends('client.layouts.master')

@section('noidung')
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="{{ route('trangchu') }}">Trang Chủ</a> <span class="mx-2 mb-0">/</span>
                    <strong class="text-black">Đặt Hàng Thành công</strong>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <span class="icon-check_circle display-3 text-success"></span>
                    <h2 class="display-3 text-black">Cảm Ơn!</h2>
                    <p class="lead mb-5">Đơn Hàng Của Bạn Đã Đặt Thành Công.</p>
                    <p><a href="{{ route('cuahang') }}" class="btn btn-sm btn-primary">Quay lại trang chủ</a>
                        <a href="{{ route('donhang_all') }}" class="btn btn-sm btn-success">Kiểm tra đơn hàng</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
