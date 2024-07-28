@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Kelola Nota</h1>
</div>

@if(session()->has('success'))
<div class="alert alert-success col-lg-6" role="alert">
  {{ session('success') }}
</div>
@endif

<div class="table-responsive col-lg-12">
    <a href="/dashboard/notas/create" class="btn btn-primary mb-3">Tambahkan Nota Order</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No.</th>
          <th scope="col">ID Order</th>
          <th scope="col">Gambar Nota</th>
          @can('admin')
          <th scope="col">Action</th>
          @endcan
        </tr>
      </thead>
      <tbody>
        @foreach ($notas as $nota)
        <tr>
          <td>{{ $loop->iteration }}.</td>
          <td>{{ $nota->order_id }}</td>
          <td><img src="{{ asset('storage/' . $nota->nota_image) }}" alt="Nota Image" class="img-fluid" width="100"></td>
          <td>
            <form action="{{ route('notas.destroy', $nota->id) }}" method="POST" class="d-inline">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger" onclick="return confirm('Yakin mau hapus nota ini?')">Hapus</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
</div>
@endsection
