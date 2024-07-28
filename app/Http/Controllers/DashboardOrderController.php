<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class DashboardOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all(); // Mengambil semua order dari database
        return view('dashboard.orders.index', compact('orders'));

       
    }


    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'payment_status' => 'required|string',
            'pickup_time' => 'nullable|date'
        ]);

        $order->update([
            'payment_status' => $request->payment_status,
            'pickup_time' => $request->pickup_time
        ]);

        return redirect('/dashboard/orders')->with('success', 'Status pembayaran berhasil diperbarui');
    }

  
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    
    public function show(string $id)
    {
        //
    }

    
    public function edit(string $id)
    {
        //
    }

   
    public function update(Request $request, string $id)
    {
        //
    }

    
    public function destroy(Order $order)
    {
        Order::destroy($order->id);
        return redirect('/dashboard/orders')->with('success', 'Order Berhasil Dihapus');
    }

    public function report()
    {
        return view('dashboard.report.index', [
            'orders' => Order::all()
        ]);
    }
}
