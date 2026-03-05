<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    // Xem giỏ hàng
    public function index()
    {
        $cart = session('cart', []);
        return view('cart.index', compact('cart'));
    }

    // Thêm vào giỏ
    public function add($id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        if (!$product) abort(404);

        $cart = session('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['qty']++;
        } else {
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->image,
                'qty' => 1,
            ];
        }

        session(['cart' => $cart]);
        return back();
    }

    // Cập nhật số lượng
    public function update(Request $request, $id)
    {
        $cart = session('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['qty'] = max(1, (int)$request->qty);
            session(['cart' => $cart]);
        }

        return back();
    }

    // Xóa sản phẩm
    public function remove($id)
    {
        $cart = session('cart', []);
        unset($cart[$id]);
        session(['cart' => $cart]);

        return back();
    }
}
