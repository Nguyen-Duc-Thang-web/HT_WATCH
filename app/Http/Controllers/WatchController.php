<?php

namespace App\Http\Controllers;

use App\Models\Watch;
use App\Models\Catagory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WatchController extends Controller
{

    public function index(Request $request)
    {
        $categories = Catagory::all();
        $query = Watch::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('name', 'like', "%$search%")
                ->orWhere('id', $search);
        }

        $data = $query->orderBy('id', 'desc')->get();

        return view('admin.contents.watchs.list', compact('data', 'categories'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Catagory::all();
        return view('admin.contents.watchs.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'catagory_id' => 'required',
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'short_description' => 'nullable|string|max:50000',
            'description' => 'nullable|string|max:50000',
        ]);
        $imagePath = $request->file('image')->store('public/images');

        // Tạo mới sản phẩm
        Watch::create([
            'catagory_id' => $request->catagory_id,
            'name' => $request->name,
            'image' => $imagePath ?? null,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'short_description' => $request->short_description,
            'description' => $request->description,
        ]);

        return redirect()->route('watchs.index')->with('success', 'Sản phẩm đã được thêm thành công.');
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
        $watch = Watch::findOrFail($id);
        $categories = Catagory::all();

        return view('admin.contents.watchs.edit', compact('watch', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Watch $watch)
    {
        $request->validate([
            'catagory_id' => 'required',
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Để `image` là `nullable`
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'short_description' => 'nullable|string|max:5000',
            'description' => 'nullable|string|max:5000',
        ]);
        $watch->catagory_id = $request->catagory_id;
        $watch->name = $request->name;
        $watch->price = $request->price;
        $watch->quantity = $request->quantity;
        $watch->short_description = $request->short_description;
        $watch->description = $request->description;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
            $watch->image = $imagePath;
        }

        $watch->save();

        return redirect()->route('watchs.index')->with('success', 'Sản phẩm đã được cập nhật thành công.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Watch $watch)
    {
        if ($watch->image) {
            Storage::disk('public')->delete($watch->image);
        }
        $watch->delete();
        return redirect()->route('watchs.index')->with('success', 'watch deleted successfully.');
    }
}
