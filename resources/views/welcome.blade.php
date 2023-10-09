@extends('layouts.app')

@section('slot')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="Produk 1">
                    <div class="card-body">
                        <h5 class="card-title">Nama Produk 1</h5>
                        <p class="card-text">Harga: Rp. 100.000</p>
                        <p class="card-text">Satuan: 1 pcs</p>
                        <p class="card-text">Caption Produk 1</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="Produk 2">
                    <div class="card-body">
                        <h5 class="card-title">Nama Produk 2</h5>
                        <p class="card-text">Harga: Rp. 150.000</p>
                        <p class="card-text">Satuan: 1 pcs</p>
                        <p class="card-text">Caption Produk 2</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="Produk 3">
                    <div class="card-body">
                        <h5 class="card-title">Nama Produk 3</h5>
                        <p class="card-text">Harga: Rp. 200.000</p>
                        <p class="card-text">Satuan: 1 pcs</p>
                        <p class="card-text">Caption Produk 3</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
