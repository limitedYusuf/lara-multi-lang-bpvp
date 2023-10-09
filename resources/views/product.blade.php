@extends('layouts.app')

@section('slot')
    <div class="container">
        <h1>Edit Produk</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('product.update', $datas->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name_id" class="form-label">Name (ID)</label>
                <input type="text" class="form-control" id="name_id" name="nama[id]"
                    value="{{ $datas->getTranslation('nama', 'id') }}">
            </div>
            <div class="mb-3">
                <label for="name_en" class="form-label">Name (EN)</label>
                <input type="text" class="form-control" id="name_en" name="nama[en]"
                    value="{{ $datas->getTranslation('nama', 'en') }}">
            </div>
            <div class="mb-3">
                <label for="name_pl" class="form-label">Name (PL)</label>
                <input type="text" class="form-control" id="name_pl" name="nama[pl]"
                    value="{{ $datas->getTranslation('nama', 'pl') }}">
            </div>

            <div class="mb-3">
                <label for="harga_id" class="form-label">Harga (ID)</label>
                <input type="text" class="form-control" id="harga_id" name="harga[id]"
                    value="{{ $datas->getTranslation('harga', 'id') }}">
            </div>
            <div class="mb-3">
                <label for="harga_en" class="form-label">Harga (EN)</label>
                <input type="text" class="form-control" id="harga_en" name="harga[en]"
                    value="{{ $datas->getTranslation('harga', 'en') }}">
            </div>
            <div class="mb-3">
                <label for="harga_pl" class="form-label">Harga (PL)</label>
                <input type="text" class="form-control" id="harga_pl" name="harga[pl]"
                    value="{{ $datas->getTranslation('harga', 'pl') }}">
            </div>

            <div class="mb-3">
                <label for="qty" class="form-label">Quantity</label>
                <input type="number" class="form-control" id="qty" name="qty" value="{{ $datas->qty }}">
            </div>
            <div class="mb-3">
                <label for="satuan_id" class="form-label">Unit (ID)</label>
                <input type="text" class="form-control" id="satuan_id" name="satuan[id]"
                    value="{{ $datas->getTranslation('satuan', 'id') }}">
            </div>
            <div class="mb-3">
                <label for="satuan_en" class="form-label">Unit (EN)</label>
                <input type="text" class="form-control" id="satuan_en" name="satuan[en]"
                    value="{{ $datas->getTranslation('satuan', 'en') }}">
            </div>
            <div class="mb-3">
                <label for="satuan_pl" class="form-label">Unit (PL)</label>
                <input type="text" class="form-control" id="satuan_pl" name="satuan[pl]"
                    value="{{ $datas->getTranslation('satuan', 'pl') }}">
            </div>
            <div class="mb-3">
                <label for="deskripsi_id" class="form-label">Description (ID)</label>
                <textarea class="form-control" id="deskripsi_id" name="deskripsi[id]">{{ $datas->getTranslation('deskripsi', 'id') }}</textarea>
            </div>
            <div class="mb-3">
                <label for="deskripsi_en" class="form-label">Description (EN)</label>
                <textarea class="form-control" id="deskripsi_en" name="deskripsi[en]">{{ $datas->getTranslation('deskripsi', 'en') }}</textarea>
            </div>
            <div class="mb-3">
                <label for="deskripsi_pl" class="form-label">Description (PL)</label>
                <textarea class="form-control" id="deskripsi_pl" name="deskripsi[pl]">{{ $datas->getTranslation('deskripsi', 'pl') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
@endsection
