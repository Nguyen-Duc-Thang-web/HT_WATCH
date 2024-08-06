@extends('client.layouts.master')

@section('noidung')
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="{{ route('trangchu') }}">Trang Chủ</a> <span class="mx-2 mb-0">/</span>
                    <strong class="text-black">Giỏ Hàng</strong>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <form class="col-md-12" action="{{ route('hoadon') }}" method="post">
            @csrf
            <div class="container">
                <div class="row mb-5">
                    <div class="site-blocks-table">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">Ảnh</th>
                                    <th class="product-name">Sản Phẩm</th>
                                    <th class="product-price">Giá</th>
                                    <th class="product-quantity">Số Lượng</th>
                                    <th class="product-total">Tổng</th>
                                    <th class="product-remove">Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $cart_total = 0;
                                    $item_ids = [];
                                @endphp
                                @foreach ($watch_cart as $item)
                                    @php
                                        $item_total = $item->price * $item->quantity;
                                        $cart_total += $item_total;
                                        $item_ids[] = ['item_id' => $item->id];
                                    @endphp
                                    <tr>
                                        <td class="product-thumbnail">
                                            <img src="{{ Storage::url($item->image) }}" alt="Image" class="img-fluid">
                                        </td>
                                        <td class="product-name">
                                            <h2 class="h5 text-black">{{ Str::limit($item->name, 30) }}</h2>
                                        </td>
                                        <td class="text-danger">{{ number_format($item->price, 0, ',', '.') }} vnd</td>
                                        <td>
                                            <div class="input-group mb-3" style="max-width: 120px;">
                                                <input type="text" value="{{ $item->quantity }}"
                                                    class="form-control text-center" placeholder=""
                                                    aria-label="Example text with button addon" disabled>
                                            </div>
                                        </td>
                                        <td class="text-danger">{{ number_format($item_total, 0, ',', '.') }} vnd</td>
                                        <td><a href="{{ route('xoagiohang', $item->cart_id) }}"
                                                class="btn btn-danger btn-sm" onclick="return confirm('xóa')">X</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="row mb-5">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <a href="{{ route('cuahang') }}" class="btn btn-primary btn-sm btn-block">
                                    Tiếp Tục Mua Sắm</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label class="text-black h4" for="coupon">Phiếu Giảm Giá</label>
                                <p>Nhập mã phiếu giảm giá của bạn nếu có.</p>
                            </div>
                            <div class="col-md-8 mb-3 mb-md-0">
                                <select class="form-control" id="discount-code" name="discount_code">
                                    <option value="">Chọn phiếu giảm giá</option>
                                    @foreach ($data as $a)
                                        <option value="{{ $a->discount }}" data-code="{{ $a->code }}">
                                            {{ $a->code }}->{{ $a->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-info btn-sm" type="button" onclick="applyDiscount()">Áp
                                    Dụng</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 pl-5">
                        <div class="row justify-content-end">
                            <div class="col-md-7">
                                <div class="row">
                                    <div class="col-md-12 text-right border-bottom mb-5">
                                        <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <span class="text-black">Tổng Tiền</span>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <strong class="text-black" id="subtotal">{{ number_format($cart_total) }}
                                            vnd</strong>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <span class="text-black">Giảm</span>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <strong class="text-black" id="discount">0 vnd</strong>
                                    </div>
                                </div>
                                <div class="row mb-5">
                                    <div class="col-md-6">
                                        <span class="text-black">Phải Trả</span>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <strong class="text-black" id="total">{{ number_format($cart_total) }}
                                            vnd</strong>
                                        <input type="hidden" name='total' value="{{ $cart_total }}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 d-flex justify-content-center">
                                        <button class="btn btn-primary btn-lg w-100 mx-1" type="submit">Thanh
                                            Toán</button>
        </form>
        <form action="{{ url('pay') }}" method="post">
            @csrf
            <button name="redirect" class="btn btn-warning btn-lg w-80 mr-6" style="height: 50px;" type="submit">Thanh
                Toán VnPay</button>

            <input type="hidden" name="amount" value="{{ $cart_total }}">
            <input type="hidden" name="item_id" value="{{ json_encode($item_ids) }}">
        </form>
    </div>
    </div>

    </div>
    </div>
    </div>
    </div>
    </div>


    </div>
@endsection
