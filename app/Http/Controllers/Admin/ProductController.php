<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = DB::table('products')
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * STORE
     * ✔ Tự động tạo slug KHÔNG TRÙNG
     */
    public function store(Request $request)
    {
        $filename = null;

        // 📸 Upload ảnh
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('products'), $filename);
        }

        // 🔥 TẠO SLUG KHÔNG TRÙNG
        $baseSlug = Str::slug($request->name);
        $slug = $baseSlug;
        $count = 1;

        while (DB::table('products')->where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $count;
            $count++;
        }

        DB::table('products')->insert([
            'name'        => $request->name,
            'slug'        => $slug,
            'price'       => $request->price,
            'image'       => $filename,
            'is_active'   => 1,
            'is_featured' => $request->has('is_featured') ? 1 : 0,
            'created_at'  => now(),
            'updated_at'  => now(),
        ]);

        return redirect()->route('admin.products.index');
    }

    public function edit($id)
    {
        $product = DB::table('products')->where('id', $id)->first();

        return view('admin.products.edit', compact('product'));
    }

    /**
     * UPDATE
     * ✔ Tự động tạo slug KHÔNG TRÙNG (trừ chính nó)
     */
    public function update(Request $request, $id)
    {
        $product = DB::table('products')->where('id', $id)->first();

        // 🔥 TẠO SLUG KHÔNG TRÙNG (BỎ QUA ID HIỆN TẠI)
        $baseSlug = Str::slug($request->name);
        $slug = $baseSlug;
        $count = 1;

        while (
            DB::table('products')
                ->where('slug', $slug)
                ->where('id', '!=', $id)
                ->exists()
        ) {
            $slug = $baseSlug . '-' . $count;
            $count++;
        }

        $data = [
            'name'        => $request->name,
            'slug'        => $slug,
            'price'       => $request->price,
            'is_featured' => $request->has('is_featured') ? 1 : 0,
            'updated_at'  => now(),
        ];

        // 📸 Nếu upload ảnh mới
        if ($request->hasFile('image')) {

            // ❌ xoá ảnh cũ
            if ($product->image && file_exists(public_path('products/' . $product->image))) {
                unlink(public_path('products/' . $product->image));
            }

            // ✅ upload ảnh mới
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('products'), $filename);

            $data['image'] = $filename;
        }

        DB::table('products')
            ->where('id', $id)
            ->update($data);

        return redirect()->route('admin.products.index');
    }

    public function delete($id)
    {
        $product = DB::table('products')->where('id', $id)->first();

        if ($product && $product->image) {
            $path = public_path('products/' . $product->image);
            if (file_exists($path)) {
                unlink($path);
            }
        }

        DB::table('products')
            ->where('id', $id)
            ->update(['is_active' => 0]);


        return redirect()->route('admin.products.index');
    }
}
