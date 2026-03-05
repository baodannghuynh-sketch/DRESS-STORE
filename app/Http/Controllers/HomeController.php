<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        // Lấy 6 sản phẩm mới nhất
        $products = DB::table('products')
            ->where('is_active', 1)
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get();

        return view('home.index', compact('products'));
    }
}
