<?php

namespace App\Http\Controllers;

use App\Models\Catagory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Catagory::all();
        return view('admin.contents.catagorys.list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.contents.catagorys.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'status' => 'required|in:0,1',
        ]);
        $imagePath = $request->file('image')->store('public/images');

        // Tạo mới sản phẩm
        Catagory::create([
            'image' => $imagePath ?? null,
            'name' => $request->name,
            'status' => $request->status,
        ]);
        return redirect()->route('categorys.index')->with('success', 'Danh mục đã được thêm thành công.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Catagory::findOrFail($id);
        return view('admin.contents.catagorys.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Catagory $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'status' => 'required|in:0,1',
        ]);
        $category->name = $request->name;
        $category->status = $request->status;
        if ($request->hasFile('image')) {
            if ($category->image && Storage::exists($category->image)) {
                Storage::delete($category->image);
            }
            $imagePath = $request->file('image')->store('public/images');
            $category->image = $imagePath;
        }
        $category->save();
        return redirect()->route('categorys.index')->with('success', 'Danh mục đã được cập nhật thành công.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Catagory $category)
    {
        if ($category) {
            $category->delete();
            return redirect()->route('categorys.index')->with('success', 'Danh mục đã được xóa thành công.');
        }

        return redirect()->route('categorys.index')->with('error', 'Danh mục không tồn tại.');

    }
}
