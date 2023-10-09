@extends('layouts.app')

@section('slot')
    <div class="container mt-5">
        <div class="row">
            @foreach ($products as $item)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="https://via.placeholder.com/150" style="height: 200px" class="card-img-top" alt="Produk">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->getTranslation('nama', app()->getLocale()) }}</h5>
                        <p class="card-text">Harga: {{ $item->getTranslation('harga', app()->getLocale()) }}</p>
                        <p class="card-text">Satuan: {{ $item->qty }} {{ $item->getTranslation('satuan', app()->getLocale()) }}</p>
                        <p class="card-text">{{ $item->getTranslation('deskripsi', app()->getLocale()) }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
