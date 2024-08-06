<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class bannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Banner::all();
        return view('admin.contents.banners.list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.contents.banners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'alt' => 'nullable|string|max:50000',
        ]);
        $imagePath = $request->file('image')->store('public/images');

        // Tạo mới sản phẩm
        Banner::create([
            'image' => $imagePath ?? null,
            'alt' => $request->alt,
        ]);

        return redirect()->route('banners.index')->with('success', 'Sản phẩm đã được thêm thành công.');
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
    public function edit($id)
    {
        $data = Banner::findOrFail($id);
        return view('admin.contents.banners.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Banner $banner)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'alt' => 'nullable|string|max:500',
        ]);
        $banner->alt = $request->alt;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
            $banner->image = $imagePath;
        }
        $banner->save();

        return redirect()->route('banners.index')->with('success', 'Sản phẩm đã được cập nhật thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {

        if ($banner->image) {
            Storage::disk('public')->delete($banner->image);
        }
        $banner->delete();
        return redirect()->route('banners.index')->with('success', 'watch deleted successfully.');
    }
}
