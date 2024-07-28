@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Nota</h1>
</div>

<div class="col-lg-8">
    <form method="POST" action="{{ route('notas.store') }}" class="mb-5" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="order_id" class="form-label">ID Order</label>
            <select name="order_id" id="order_id" class="form-control @error('order_id') is-invalid @enderror">
                @foreach($orders as $order)
                    <option value="{{ $order->id }}">{{ $order->id }}</option>
                @endforeach
            </select>
            @error('order_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="nota_image" class="form-label">Gambar Nota</label>
            <img class="img-preview img-fluid mb-3 col-sm-5">
            <input class="form-control @error('nota_image') is-invalid @enderror" type="file" id="nota_image" name="nota_image" onchange="previewImage()">
            @error('nota_image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Tambah Nota</button>
    </form>
</div>

<script>
    function previewImage(){
      const image = document.querySelector('#nota_image');
      const imgPreview = document.querySelector('.img-preview');

      imgPreview.style.display = 'block';

      const oFReader = new FileReader();
      oFReader.readAsDataURL(image.files[0]);

      oFReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;
      }
    }
</script>
@endsection
