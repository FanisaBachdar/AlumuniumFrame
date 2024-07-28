@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Laporan Nota</h1>
</div>

<div class="table-responsive col-lg-12">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No.</th>
          <th scope="col">ID Order</th>
          <th scope="col">Gambar Nota</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($notas as $nota)
        <tr>
          <td>{{ $loop->iteration }}.</td>
          <td>{{ $nota->order_id }}</td>
          <td><img src="{{ asset('storage/' . $nota->nota_image) }}" alt="Nota Image" class="img-fluid" width="100"></td>
        </tr>
        @endforeach
      </tbody>
    </table>
</div>
@endsection
