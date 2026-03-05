
public function myOrders()
{
    $orders = DB::table('orders')
        ->where('user_id', auth()->id())
        ->orderBy('created_at', 'desc')
        ->get();

    return view('orders.history', compact('orders'));
}
