@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Penjualan Barang</h1>
</div>


<div class="table-responsive col-lg-12">
 
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No. </th>
          <th scope="col">Nama Barang</th>
          <th scope="col">Harga Barang</th>
          <th scope="col">Metode Pembayaran</th>
          <th scope="col">Status</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($orders as $order) 
        <tr>
          <td>{{ $loop->iteration }}. </td>
          <td>{{ $order->post->title }}</td>
          <td>{{ number_format($order->post->harga, 2, ',', '.') }}</td>
          <td>{{ $order->payment_method }}</td>
          <td>{{ $order->payment_status }}</td>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

@endsection