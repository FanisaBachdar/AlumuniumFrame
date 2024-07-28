@extends('layouts.main')

@section('container')


<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            <h1 class="mb-3">{{ $post->title }}</h1>

            <p>Ditambahkan oleh. Alumunium Frame </p>

            @if ($post->image)
            <div style="max-height: 450px; overflow:hidden;">
                <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid">
            </div>
            @else
                <p class="text-warning">Tidak ada Gambar</p>
            @endif  

            <article class="my-3 fs-5">
            {!! $post->body !!}
            </article>

            <h5 class="mb-3">Harga : {{ number_format($post->harga, 2, ',', '.') }}</h5>

            
            <form action="{{ route('order.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="payment_method" class="form-label">Pilih Jenis Pembayaran:</label>
                    <select class="form-select" id="payment_method" name="payment_method" required>
                        <option value="cod">COD</option>
                        <option value="store">Bayar di Toko</option>
                    </select>
                </div>
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <button type="submit" class="btn btn-primary">Order</button>
            </form>

            <a href="/posts" class="d-block mt">Kembali</a>
        </div>
    </div>
</div>

@endsection