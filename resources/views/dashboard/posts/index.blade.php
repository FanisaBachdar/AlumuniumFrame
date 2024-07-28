@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Koleksi Barang</h1>
</div>

@if(session()->has ('success'))  
<div class="alert alert-success col-lg-12" role="alert">
  {{ session('success') }}
</div>
@endif

<div class="table-responsive col-lg-12">

    <a href="/dashboard/posts/create" class="btn btn-primary mb-3">Tambahkan Koleksi Barang</a>
 
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No. </th>
          <th scope="col">Nama Barang</th>
          <th scope="col">Harga Barang</th>
          <th class="text-center" scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($posts as $post) 
        <tr>
          <td>{{ $loop->iteration }}. </td>
          <td>{{ $post->title }}</td>
          <td>{{ number_format($post->harga, 2, ',', '.') }}</td>

          <td class="text-center">
            <a href="/dashboard/posts/{{ $post->slug }}" class="badge bg-info"><span data-feather="eye"></span></a>
          
            <a href="/dashboard/posts/{{ $post->slug }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>

            <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="d-inline">
              @method('delete')
              @csrf
              <button class="badge bg-danger border-0" onclick="return confirm('Yakin mau hapus data?')"><span data-feather="x-circle"></span></button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

@endsection