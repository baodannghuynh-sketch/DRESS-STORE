<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    // Danh sách đơn hàng
    public function index()
    {
        $orders = DB::table('orders')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->select(
                'orders.*',
                'users.name as customer_name',
                'users.email'
            )
            ->orderBy('orders.created_at', 'desc')
            ->get();

        return view('admin.orders.index', compact('orders'));
    }

    // Chi tiết đơn hàng
    public function detail($id)
    {
        $order = DB::table('orders')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->select(
                'orders.*',
                'users.name as customer_name',
                'users.email'
            )
            ->where('orders.id', $id)
            ->first();

        $items = DB::table('order_items')
    ->join('products', 'order_items.product_id', '=', 'products.id')
    ->select(
        'products.name',
        'products.image',
        'order_items.qty',
        'order_items.price',
        'order_items.line_total'
    )
    ->where('order_items.order_id', $id)
    ->get();


        return view('admin.orders.detail', compact('order', 'items'));
    }

    // Cập nhật trạng thái
    public function updateStatus(Request $request, $id)
    {
        DB::table('orders')->where('id', $id)->update([
            'status' => $request->status,
            'updated_at' => now(),
        ]);

        return back();
    }
}
<<<<<<< HEAD
//app/Http/Controllers/Admin/OrderController.php
=======
>>>>>>> 7ef827f9323d0c027daa86036c9cb8f1342a4fd6
