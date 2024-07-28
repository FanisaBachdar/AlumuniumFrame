@extends('layouts.main')
@section('container')
<div class="card mt-5 mb-3">
  <img src="img/{{ $image }}" alt="{{ $name }}" class="img-fluid" style="height: 500px;">
</div>
<div class="jumbotron mt-5 mb-5">
        <h1 class="display-4">Selamat Datang di Website Alumunium Frame</h1>
        <p class="lead">Temukan berbagai produk berbahan Alumunium yang berkualitas dan premium</p>
        <hr class="my-4">
        <p>Temukan berbagai koleksi barang di dalam website</p>
        <a class="btn btn-primary btn-lg" href="/posts" role="button">Lihat Produk</a>
      </div>
@endsection
