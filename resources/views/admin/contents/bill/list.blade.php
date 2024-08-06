@extends('admin.layouts.master')

@section('noidung')
    <h2 class="text-center text-danger display-4 custom-font">Đơn Hàng!<br></h2>
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Tên Khách Hàng</th>
                <th>Số Điện Thoại</th>
                <th>Địa Chỉ</th>
                <th>Chi Tiết Đơn Hàng</th>
                <th>Tổng Tiền</th>
                <th>Ngày Đặt Hàng</th>
                <th>Trạng Thái</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bills as $bill)
                <tr>
                    <td>{{ $bill->id }}</td>

                    <td>{{ $bill->fullname }}</td>
                    <td>{{ $bill->phone }}</td>
                    <td>{{ $bill->address }}</td>

                    <td>
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Sản Phẩm</th>
                                    <th>Số Lượng</th>
                                    <th>Giá Tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bill_details->where('bill_id', $bill->id) as $detail)
                                    <tr>
                                        <td>{{ $detail->product_name }}</td>
                                        <td>{{ $detail->quantity }}</td>
                                        <td>{{ number_format($detail->price, 0, ',', '.') }} VND</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </td>
                    <td>{{ number_format($bill->total, 0, ',', '.') }} VND</td>
                    <td>{{ $bill->created_at->format('d/m/Y H:i') }}</td>
                    <td>
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
                    </td>
                    <td>
                        <form id="updateStatusForm{{ $bill->id }}" action="{{ route('bills.updateStatus', $bill->id) }}"
                            method="POST" style="display: inline;">
                            @csrf
                            @method('PUT')
                            <div class="input-group">
                                <select name="status" class="form-select"
                                    onchange="document.getElementById('updateStatusForm{{ $bill->id }}').submit();">
                                    <option value="0" {{ $bill->status == 0 ? 'selected' : '' }}>Đang Xử Lý
                                    </option>
                                    <option value="1" {{ $bill->status == 1 ? 'selected' : '' }}>Đã Xác Nhận
                                    </option>
                                    <option value="2" {{ $bill->status == 2 ? 'selected' : '' }}>Đã Hủy</option>
                                    <option value="3" {{ $bill->status == 3 ? 'selected' : '' }}>Giao Hàng Thành
                                        Công</option>
                                    <option value="4" {{ $bill->status == 4 ? 'selected' : '' }}>Thất Bại</option>
                                </select>
                            </div>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
@endsection
