@extends('layouts.main')

@section('container')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="mb-3">Daftar Orders</h1>

            @foreach($orders as $order)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $order->post->title }}</h5>
                        <p class="card-text">Harga Barang: {{ number_format($order->post->harga, 2, ',', '.') }}</p>
                        <p class="card-text">Metode Pembayaran: {{ $order->payment_method }}</p>
                        <p><small class="text-body-secondary">Status : {{ $order->payment_status }}</small></p>
                        <p class="card-text"><small class="text-muted">Dipesan pada {{ $order->created_at }}</small></p>
                        @if($order->pickup_time)
                            <p class="card-text"><small class="text-muted">Waktu Pengambilan: {{ \Carbon\Carbon::parse($order->pickup_time)->format('d M Y, H:i') }}</small></p>
                        @endif
                    </div>
                </div>
            @endforeach

            <a href="/posts" class="d-block mt">Kembali</a>
        </div>
    </div>
</div>
@endsection
