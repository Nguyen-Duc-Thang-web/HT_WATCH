@extends('client.layouts.master')

@section('noidung')
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="{{ route('trangchu') }}">Trang Chủ</a> <span class="mx-2 mb-0">/</span> <a
                        href="{{ route('giohang') }}">Giỏ Hàng</a> <span class="mx-2 mb-0">/</span> <strong
                        class="text-black">Thanh Toán</strong></div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <form action="{{ route('thanhtoan') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-5 mb-md-0">
                        <h2 class="h3 mb-3 text-black">Thông Tin Thanh Toán</h2>
                        <div class="p-3 p-lg-5 border">
                            <div class="form-group">
                                <label class="text-black">Họ Tên <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="c_fname" value="{{ $users->name }}"
                                    name="fullname">
                            </div>
                            <div class="form-group">
                                <label class="text-black">Số Điện Thoại <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="c_fname" name="phone"
                                    value="{{ $users->phone }}">
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="address" class="text-black">Địa Chỉ <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="diachi" name="address"
                                        placeholder="Nhập Địa Chỉ" value="{{ $users->address }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="c_order_notes" class="text-black">Order Notes</label>
                                <textarea name="notes" id="c_order_notes" cols="30" rows="5" class="form-control"
                                    placeholder="Write your notes here..."></textarea>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row mb-5">
                            <div class="col-md-12">
                                <h2 class="h3 mb-3 text-black">Đơn Hàng</h2>
                                <div class="p-3 p-lg-5 border">
                                    <table class="table site-block-order-table mb-5">
                                        <thead>
                                            <th>Sản Phẩm</th>
                                            <th>Số Lượng</th>
                                            <th>Giá Tiền</th>
                                        </thead>
                                        <tbody>

                                            @foreach ($carts as $item)
                                                <tr>
                                                    <td>{{ $item->a }}</td>
                                                    <td>{{ $item->b }}</td>
                                                    <td>{{ number_format($item->c, 0, ',', '.') }} vnd</td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td></td>
                                                <td class="text-black font-weight-bold"><strong>Tổng Giá Tiền : </strong>
                                                </td>
                                                <td class="text-black font-weight-bold">
                                                    <strong>{{ number_format($total, 2) }}</strong>
                                                </td>
                                                <input type="hidden" name='total' value="{{ $total }}">

                                            </tr>
                                        </tbody>
                                    </table>

                                    <div class="border p-3 mb-3">
                                        <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsebank"
                                                role="button" aria-expanded="false" aria-controls="collapsebank">COD</a>
                                        </h3>
                                        <div class="collapse" id="collapsebank">
                                            <div class="py-2">
                                                <p class="mb-0">NHẬN HÀNG VÀ THANH TOÁN</p>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary btn-lg py-3 btn-block"
                                            onclick="window.location='{{ route('camon') }}'">Place Order</button>
                                    </div>


                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
