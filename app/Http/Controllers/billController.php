<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\BillDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class billController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();

        // Lấy tất cả các bill của user
        $bills = Bill::where('user_id', 2)->get();

        // Join bảng bill_details và watches để lấy thông tin chi tiết đơn hàng
        $bill_details = BillDetail::whereIn('bill_id', $bills->pluck('id'))
            ->join('watches', 'bill_details.watch_id', '=', 'watches.id')
            ->select('bill_details.*', 'watches.name as product_name', 'watches.price as price')
            ->get();


        return view('admin.contents.bill.list', compact('bills', 'bill_details'));
    }
    public function updateStatus(Request $request, $id)
    {
        $bill = Bill::findOrFail($id);
        $bill->status = $request->input('status');
        $bill->save();

        return redirect()->back()->with('success', 'Cập nhật trạng thái đơn hàng thành công!');
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
