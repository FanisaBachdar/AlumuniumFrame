@extends('layouts.main')
@section('container')
<div class="mb-5">
    <h1>Tentang Toko</h1>
    <h3>{{ $name }}</h3>
    <p>{{ $email }}</p>
    <img src="img/{{ $image }}" alt="{{ $name }}" width="100%">
</div>
    @endsection

    