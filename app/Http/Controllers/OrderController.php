
public function myOrders()
{
    $orders = DB::table('orders')
        ->where('user_id', auth()->id())
        ->orderBy('created_at', 'desc')
        ->get();

    return view('orders.history', compact('orders'));
}
<<<<<<< HEAD
//app/Http/Controllers/OrderController.php
=======
>>>>>>> 7ef827f9323d0c027daa86036c9cb8f1342a4fd6
