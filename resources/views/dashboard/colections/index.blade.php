@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Koleksi Barang</h1>
</div>

<div class="table-responsive col-lg-12">
 
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No. </th>
          <th scope="col">Nama Barang</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($posts as $post) 
        <tr>
          <td>{{ $loop->iteration }}. </td>
          <td>{{ $post->title }}</td>
          <td>
            <a href="/dashboard/posts/{{ $post->slug }}" class="badge bg-info"><span data-feather="eye"></span></a>
           
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

@endsection