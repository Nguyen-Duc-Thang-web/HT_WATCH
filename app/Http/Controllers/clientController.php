<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Bill;
use App\Models\Cart;
use App\Models\User;
use App\Models\Watch;
use App\Models\Banner;
use App\Models\Catagory;
use App\Models\BillDetail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\OrderDetailsMail;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class clientController extends Controller
{

    // List dữ liệu trên trang chủ
    public function index()
    {
        $banner = Banner::all();
        $data = Watch::orderBy('quantity', 'desc')->paginate(6);
        $data1 = Catagory::where('status', 1)->get();
        $newProducts = Watch::orderBy('id', 'desc')->paginate(6);
        return view('index', compact('data', 'data1', 'newProducts', 'banner'));
    }
    public function cuahang(Request $request)
    {
        $query = Watch::query();
        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%');
        }
        if ($request->has('category_id') && $request->category_id != '') {
            $query->where('catagory_id', $request->category_id);
        }
        $query->whereHas('catagory', function ($q) {
            $q->where('status', 1);
        });

        $data = $query->paginate(6);
        $data1 = Catagory::where('status', 1)->get();

        return view('client.contents.cuahang', compact('data', 'data1'));
    }




    // Chi tiết sản phẩm
    public function chitiet($id)
    {
        $data = Watch::where('id', $id)->first();
        return view('client.contents.chitiet', compact('data'));
    }
    // Lấy sản phẩm vào giỏ hàng
    public function giohang()
    {
        $data = db::table('coupons')->get();
        $userId = Auth::id();
        $watch_cart = Cart::join('watches', 'watches.id', 'carts.watch_id')
            ->select('watches.*', 'carts.id as cart_id', 'carts.quantity', 'carts.watch_id')
            ->where('carts.user_id', $userId)
            ->get();
        return view('client.contents.giohang', compact('watch_cart', 'data'));
    }
    // Đẩy sản phẩm trong giỏ hàng lên database
    public function themgiohang(Request $request)
    {
        $userId = Auth::id();
        Cart::query()->insert([
            [
                'watch_id' => $request->watch_id,
                'user_id' => $userId,
                'quantity' => $request->quantity
            ]
        ]);
        return redirect()->route('giohang');
    }

    public function xoagiohang($id)
    {
        Cart::where('id', $id)->delete();
        return back();
    }
    // Lưu hóa đơn
    public function hoadon(Request $request)
    {
        $userId = Auth::id();
        $carts = Cart::join('watches', 'carts.watch_id', '=', 'watches.id')
            ->where('carts.user_id', $userId)
            ->get();

        Session::put('total', $request->total);

        return redirect()->route('layhoadon', compact('carts'));
    }
    //lấy các giá trị trong hóa đơn
    public function layhoadon()
    {
        $userId = Auth::id();
        $carts = Cart::join('watches', 'carts.watch_id', '=', 'watches.id')
            ->where('carts.user_id', $userId)
            ->select('watches.name as a', 'carts.quantity as b', 'watches.price as c')
            ->get();
        $total = Session::get('total');
        $users = Auth::user();
        ;
        return view('client.contents.hoadon', compact('total', 'users', 'carts'));
    }
    public function thanhtoan(Request $request)
    {
        $userId = Auth::id();

        DB::transaction(function () use ($request, $userId) {

            $billData = $request->all();
            $billData['user_id'] = $userId;

            $bill = Bill::query()->create($billData);
            $cartItems = Cart::where('user_id', $userId)->get();

            foreach ($cartItems as $item) {
                $watch = Watch::find($item->watch_id);
                if ($watch) {
                    DB::table('bill_details')->insert([
                        'user_id' => $userId,
                        'bill_id' => $bill->id,
                        'watch_id' => $item->watch_id,
                        'quantity' => $item->quantity,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                    $watch->quantity -= $item->quantity;
                    $watch->save();
                } else {
                    throw new \Exception("Sản phẩm với ID {$item->watch_id} không tồn tại.");
                }
            }
            Cart::where('user_id', $userId)->delete();
            Session::forget('total');

            $latestBill = Bill::where('user_id', $userId)
                ->orderBy('id', 'desc')
                ->first();

            $bill_details = BillDetail::where('bill_id', $latestBill->id)
                ->join('watches', 'bill_details.watch_id', '=', 'watches.id')
                ->select('bill_details.*', 'watches.name as product_name', 'watches.price as price')
                ->get();

            $bill_details_array = $bill_details->toArray();

            Mail::send('mail', ['bill_details' => $bill_details_array], function ($message) {
                $message->to('ducthang2082004@gmail.com', 'Nguyễn Đức Tháng')
                    ->subject('Chi tiết đơn hàng của bạn');
            });

            return redirect()->back()->with('success', 'Đã gửi email thành công!');
        });

        return redirect()->route('camon');
    }

    public function pay(Request $request)
    {
        $userId = Auth::id();
        $user = Auth::user();
        $cart_item = Cart::where('user_id', $userId)->get();

        $billData = [
            'fullname' => $user->name,
            'user_id' => $userId,
            'phone' => $user->phone,
            'address' => $user->address,
            'notes' => $request->notes ?? '',
            'status' => 0,
            'total' => $request->amount
        ];
        $bill = Bill::create($billData);
        $databill = [];
        foreach ($cart_item as $key => $value) {
            $databill[] = [
                'user_id' => $userId,
                'watch_id' => $value->watch_id,
                'bill_id' => $bill->id,
                'quantity' => $value->quantity,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        BillDetail::query()->insert($databill);
        $total = $request->amount;
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = route('camon'); // Đảm bảo rằng route này tồn tại
        $vnp_TmnCode = "Z9VHOTK0"; // Mã website tại VNPAY
        $vnp_HashSecret = "OAKD8E5M5V1L5UWSZZ6VK7JZSC3BLCKZ"; // Chuỗi bí mật

        $vnp_TxnRef = Str::random(9); // Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này
        $vnp_OrderInfo = 'Thanh toán hóa đơn #' . $bill->id;
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $total * 100; // Số tiền tính bằng VND * 100
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = request()->ip();

        $inputData = [
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef
        ];

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        ksort($inputData);
        $query = "";
        $hashdata = "";
        $i = 0;
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = [
            'code' => '00',
            'message' => 'success',
            'data' => $vnp_Url
        ];
        if (isset($_POST['redirect'])) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }
    }
    //giới thiệu
    public function gioithieu()
    {
        return view('client.contents.gioithieu');
    }
    //trang liên hệ
    public function lienhe()
    {
        return view('client.contents.lienhe');
    }
    //trang cảm ơn
    public function camon()
    {
        // $userId = Auth::id();
        // Cart::where('user_id', $userId)->delete();
        // Session::forget('total');
        return view('client.contents.camon');
    }

    public function hoso()
    {
        $users = Auth::user();
        return view('client.contents.hoso', compact('users'));
    }
    public function donhang_all()
    {
        $userId = Auth::id();

        // Lấy tất cả các bill của user
        $bills = Bill::where('user_id', $userId)->get();

        // Join bảng bill_details và watches để lấy thông tin chi tiết đơn hàng
        $bill_details = BillDetail::whereIn('bill_id', $bills->pluck('id'))
            ->join('watches', 'bill_details.watch_id', '=', 'watches.id')
            ->select('bill_details.*', 'watches.name as product_name', 'watches.price as price')
            ->get();


        return view('client.contents.donhang_all', compact('bills', 'bill_details'));

    }
    public function cancel($id)
    {
        $bill = Bill::find($id);
        if ($bill && $bill->status == 0) {
            $bill->status = 2;
            $bill->save();
        }
        return redirect()->back()->with('message', 'Đơn hàng đã được hủy thành công!');
    }


}
