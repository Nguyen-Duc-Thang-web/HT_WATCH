@extends('client.layouts.master')

@section('noidung')
    <a href="{{ route('send.order.details') }}" class="btn btn-success mb-2 float-right">Gửi email Đơn Hàng</a>
    <div class="container my-5">
        @foreach ($bills as $bill)
            <div class="card mb-4 shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="my-0">Đơn hàng #{{ $bill->id }}</h5>
                </div>
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-muted">Ngày đặt hàng: {{ $bill->created_at->format('d/m/Y H:i') }}
                    </h6>
                    <p class="card-text"><strong>Tên Khách Hàng:</strong> {{ $bill->fullname }}</p>
                    <p class="card-text"><strong>Số Điện Thoại:</strong> {{ $bill->phone }}</p>
                    <p class="card-text"><strong>Địa Chỉ:</strong> {{ $bill->address }}</p>
                    <p class="card-text"><strong>Trạng thái:</strong>
                        @if ($bill->status == 0)
                            <span class="badge bg-warning text-dark">Đang Xử Lý</span>
                        @elseif($bill->status == 1)
                            <span class="badge bg-success">Đã Xác Nhận</span>
                        @elseif($bill->status == 2)
                            <span class="badge bg-danger">Đã Hủy</span>
                        @elseif($bill->status == 3)
                            <span class="badge bg-primary">Giao Hàng Thành Công</span>
                        @elseif($bill->status == 4)
                            <span class="badge bg-danger">Thất Bại</span>
                        @endif
                    </p>

                    <h6>Chi tiết đơn hàng:</h6>
                    <ul class="list-group list-group-flush m-2">
                        <table class="table">
                            <tr>
                                <th>Sản Phẩm</th>
                                <th>Số Lượng</th>
                                <th>Giá Tiền</th>
                            </tr>
                            @foreach ($bill_details->where('bill_id', $bill->id) as $detail)
                                <tr>
                                    <td>{{ $detail->product_name }}</td>
                                    <td>{{ $detail->quantity }}</td>
                                    <td>{{ number_format($detail->price, 0, ',', '.') }} VND</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td></td>
                                <td>Tổng Tiền</td>
                                <td>{{ number_format($bill->total, 0, ',', '.') }} VND</td>
                            </tr>
                        </table>
                    </ul>
                    @if ($bill->status == 0)
                        <form action="{{ route('bills.cancel', $bill->id) }}" method="POST" style="display: inline;">
                            @csrf
                            <button onclick="return confirm('Bạn có chắc chắn muốn hủy đơn hàng?')" class="btn btn-danger"
                                type="submit">Hủy</button>
                        </form>
                    @endif
                </div>

            </div>
        @endforeach
    </div>
@endsection
