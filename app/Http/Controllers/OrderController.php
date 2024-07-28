<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'payment_method' => 'required|string'
        ]);

        Order::create([
            'user_id' => Auth::id(),
            'post_id' => $request->post_id,
            'payment_method' => $request->payment_method
        ]);

        return redirect()->route('orders.index')->with('success', 'Order berhasil dibuat');
    }

    public function index()
    {

        // $orders = Order::where('user_id', Auth::id())->with('post')->get();

        // return view('orders.index', compact('orders'));

        $orders = Order::where('user_id', Auth::id())->with('post')->get();

         return view('orders.index', [
            "title" => "Koleksi Barang",
            "active" => 'orders',
            "orders" => $orders
        ]);
        
    }

}
