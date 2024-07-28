@extends('layouts.main')

@section('container')
<h1 class="mb-3 text-center">{{ $title }}</h1>

<div class="row justify-content-center mb-3">
      <div class="col-md-6">
            <form action="/posts">
                  @if (request('author'))
                  <input type="hidden" name="author" value="{{ request('author') }}">
                  @endif
                  <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}">
                        <button class="btn btn-danger" type="submit">Cari Barang</button>
                  </div>
            </form>
      </div>
</div>

<div class="card mb-3">
      
            <img src="img/banner_posts.png" alt="temukan produk alumunium kesayangan anda" class="img-fluid" style="height: 500px;">
           
            
</div>
@if ($posts->count())


<div class="container">
      <div class="row justify-content-center">
            @foreach ($posts as $post)
                  {{-- <div class="col-8 mb-3 mb-3"> --}}
                  <div class="col-md-6 mb-3">
                        <div class="card mb-3">      
                              <div class="row g-0">
                                    <div class="col-md-4">
                                    @if ($post->image)
                                          <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid" style="height: 100%; object-fit: cover;">
                                    @else
                                          <p class="text-warning">Tidak ada Gambar</p>
                                    @endif  
                                    </div>
                                          <div class="col-md-8">
                                                <div class="card-body">
                                                      <h5 class="card-title">{{ $post->title }}</h5>
                                                      <p>
                                                      <small class="text-body-secondary">
                                                      Harga : Rp {{ number_format($post->harga, 2, ',', '.') }}
                                                      </small>
                                                      </p>
                                                <a href="/posts/{{ $post->slug }}" class="btn btn-primary"e>Lihat Selengkapnya..</a>
                                                </div>
                                          </div>
                              </div>
                        </div>
                  </div>
            @endforeach
      </div>
</div>
      @else
            <p class="text-center fs-4">Tidak ada barang. </p>
      @endif

<div class="d-flex justify-content-center">
      {{ $posts->links() }}
</div>

 
@endsection