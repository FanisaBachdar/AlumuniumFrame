@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            <h1 class="mb-3">{{ $post->title }}</h1>

            <a href="/dashboard/posts" class="btn btn-success"><span data-feather="arrow-left"></span> Kembali</a>
            @can('admin')
            <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
            
            <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger" onclick="return confirm('Yakin mau hapus data?')"><span data-feather="x-circle"></span> Hapus</button>
              </form>
            @endcan

            @if ($post->image)
            <div class="img-fluid" style="height: 1000px; overflow:hidden; ">
                <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid mt-3">
                <article class="my-3 fs-5 mt-5">
                    {!! $post->body !!}
                    </article>
        
                    <h6 class="mb-3">Harga : {{ number_format($post->harga, 2, ',', '.') }}</h5>
            </div>
            @else
            <p class="text-warning mt-3">Tidak ada Gambar</p>
            @endif            
        </div>
    </div>
</div>
@endsection