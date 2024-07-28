<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardNotaController extends Controller
{
    public function index()
    {
        $notas = Nota::with('order')->get();
        return view('dashboard.notas.index', compact('notas'));
    }

    public function create()
    {
        $orders = Order::all();
        return view('dashboard.notas.create', compact('orders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'nota_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $path = $request->file('nota_image')->store('nota_images');

        Nota::create([
            'order_id' => $request->order_id,
            'nota_image' => $path
        ]);

        return redirect('/dashboard/notas')->with('success', 'Nota berhasil ditambahkan');
    }

    public function destroy(Nota $nota)
    {
        if ($nota->nota_image) {
            Storage::delete($nota->nota_image);
        }
        $nota->delete();
        return redirect('/dashboard/notas')->with('success', 'Nota berhasil dihapus');
    }

    public function laporanNota()
    {
        return view('dashboard.laporanNota.index', [
            'notas' => Nota::all()
        ]);
    }
}
