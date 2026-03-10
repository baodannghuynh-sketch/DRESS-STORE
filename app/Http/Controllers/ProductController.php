<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = DB::table('products')
            ->where('is_active', 1)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('products.index', compact('products'));
    }

    public function detail($slug)
    {
        $product = DB::table('products')
            ->where('slug', $slug)
            ->first();

        abort_if(!$product, 404);

        return view('products.detail', compact('product'));
    }
    public function homepage()
    {
        $products = DB::table('products')
        ->where('is_active', 1)
        ->orderBy('created_at', 'desc')
        ->get();


        $featuredProducts = DB::table('products')
            ->where('is_active', 1)
            ->where('is_featured', 1)
            ->orderBy('created_at', 'desc')
            ->limit(8)
            ->get();


        return view('home.index', compact('featuredProducts'));
    }
    public function disable($id)
    {
        DB::table('products')
            ->where('id', $id)
            ->update(['is_active' => 0]);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Sản phẩm đã được ngừng bán');
    }
    public function search(Request $request)
    {
        $q = $request->q;

        $products = DB::table('products')
            ->where('is_active', 1)
            ->where(function ($query) use ($q) {
                $query->where('name', 'LIKE', "%{$q}%")
                    ->orWhere('description', 'LIKE', "%{$q}%");
            })
            ->get();

        return view('products.search', compact('products', 'q'));
    }


}
//app/Http/Controllers/ProductController.php
