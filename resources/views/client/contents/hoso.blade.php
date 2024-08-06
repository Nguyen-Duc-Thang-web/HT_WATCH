@extends('client.layouts.master')

@section('noidung')
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="{{ route('trangchu') }}">Trang Chủ</a> <span class="mx-2 mb-0">/</span>
                    <strong class="text-black">Hồ Sơ</strong>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="h3 mb-3 text-black text-center">Hồ Sơ Người Dùng</h2>
                </div>
                <div class="col-md-7">

                    <form action="#" method="post">

                        <div class="p-3 p-lg-5 border">
                            <img src="{{ asset('theme/images/b.png') }}" alt=""
                                class="rounded-circle mx-auto d-block mb-3" style="width: 150px; height: 150px;">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="c_name" class="text-black">Tên Khách Hàng <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="c_name" value="{{ $users->name }}"
                                        name="c_name" placeholder="" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="c_email" class="text-black">Email <span
                                            class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="c_email" value="{{ $users->email }}"
                                        name="c_email" placeholder="" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="c_subject" class="text-black">Số Điện Thoại </label>
                                    <input type="text" class="form-control" value="{{ $users->phone }}" id="c_subject"
                                        name="c_subject" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="c_address" class="text-black">Địa Chỉ </label>
                                    <input name="c_address" id="c_address" value="{{ $users->address }}"
                                        class="form-control" disabled>
                                </div>
                            </div>
                            {{-- <div class="form-group row">
                                <div class="col-lg-12">
                                    <input type="submit" class="btn btn-primary btn-lg btn-block" value="Gửi tin nhắn">
                                </div>
                            </div> --}}
                        </div>
                    </form>
                </div>
                <div class="col-md-5 ml-auto">
                    <div class="p-4 border mb-3">
                        <a href="{{ route('donhang_all') }}"><span class="d-block text-primary h6 text-uppercase">Kiểm Tra
                                Đơn Hàng</span>
                        </a>
                    </div>
                    <div class="p-4 border mb-3">
                        <a href=""> <span class="d-block text-primary h6 text-uppercase">Thay Đổi Thông
                                Tin</span></a>
                    </div>
                    <div class="p-4 border mb-3">
                        <a href=""> <span class="d-block text-primary h6 text-uppercase"></span>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
