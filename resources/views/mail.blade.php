<!DOCTYPE html>
<html>

<head>
    <title>Chi tiết đơn hàng</title>
</head>

<body>
    <h2>Chi tiết đơn hàng của bạn</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Mã đơn hàng</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Tổng giá</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bill_details as $detail)
                <tr>
                    <td>{{ $detail['bill_id'] }}</td>
                    <td>{{ $detail['product_name'] }}</td>
                    <td>{{ $detail['price'] }}</td>
                    <td>{{ $detail['quantity'] }}</td>
                    <td>{{ $detail['price'] * $detail['quantity'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
