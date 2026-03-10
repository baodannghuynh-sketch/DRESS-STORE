<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    // Hiển thị trang checkout
    public function index()
    {
        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect('/cart');
        }

        return view('checkout.index', compact('cart'));
    }



    public function history()
{
    $user = session('user');

    $orders = DB::table('orders')
        ->where('user_id', $user->id)
        ->orderBy('created_at', 'desc')
        ->get();

    return view('orders.index', compact('orders'));
}




    // Xử lý đặt hàng (tạm thời)
    public function placeOrder(Request $request)
{
    $request->validate([
        'receiver_name'    => 'required',
        'receiver_phone'   => 'required',
        'receiver_address' => 'required',
    ]);

    $cart = session('cart', []);
    if (empty($cart)) {
        return redirect('/cart');
    }

    $subtotal = 0;
    foreach ($cart as $item) {
        $subtotal += $item['price'] * $item['qty'];
    }

    $shipping_fee = 0; // hiện tại chưa tính ship
    $total = $subtotal + $shipping_fee;

    // INSERT ĐÚNG THEO BẢNG ORDERS
    $orderId = DB::table('orders')->insertGetId([
        'user_id'          => session('user')->id,
        'receiver_name'    => $request->receiver_name,
        'receiver_phone'   => $request->receiver_phone,
        'receiver_address' => $request->receiver_address,
        'note'             => $request->note,
        'subtotal'         => $subtotal,
        'shipping_fee'     => $shipping_fee,
        'total'            => $total,
        'status'           => 'pending',
        'created_at'       => now(),
        'updated_at'       => now(),
    ]);

    // LƯU CHI TIẾT ĐƠN
foreach ($cart as $productId => $item) {

    $lineTotal = $item['price'] * $item['qty'];

    DB::table('order_items')->insert([
        'order_id'   => $orderId,
        'product_id' => $productId,
        'price'      => $item['price'],
        'qty'        => $item['qty'],
        'line_total' => $lineTotal,
        'created_at' => now(),
        'updated_at' => now(),
    ]);
}

    // XÓA GIỎ HÀNG

    session()->forget('cart');

    return redirect('/')->with('success', 'Đặt hàng thành công!');
}
}
//app/Http/Controllers/CheckoutController.php
