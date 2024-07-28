@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Orderan Barang</h1>
</div>

@if(session()->has ('success'))  
<div class="alert alert-success col-lg-6" role="alert">
  {{ session('success') }}
</div>
@endif

<div class="table-responsive col-lg-12">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No. </th>
          <th scope="col">Nama Barang</th>
          <th scope="col">Harga Barang</th>
          <th scope="col">Metode Pembayaran</th>
          <th scope="col">Status</th>
          <th scope="col">Pembayaran & Pengambilan</th>
          <th scope="col">Action</th> 
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
          <td>
            <form action="{{ route('orders.updateStatus', $order->id) }}" method="POST" class="d-inline">
              @csrf
              @method('PATCH')
              <select name="payment_status" class="form-select form-select-sm d-inline w-auto">
                <option value="pending" {{ $order->payment_status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="paid" {{ $order->payment_status == 'paid' ? 'selected' : '' }}>Paid</option>
              </select>
              <input type="datetime-local" name="pickup_time" class="form-control form-control-sm d-inline w-auto" value="{{ $order->pickup_time ? \Carbon\Carbon::parse($order->pickup_time)->format('Y-m-d\TH:i') : '' }}">
              <button type="submit" class="btn btn-sm btn-primary">Update</button>
            </form>
          </td>
          <td>
            <form action="/dashboard/orders/{{ $order->id }}" method="POST" class="d-inline">
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