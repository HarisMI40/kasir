@extends('layouts.index')

@section('content')
<style>
    .card:hover{
        cursor: pointer;
    }
</style>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card text-center shadow-sm p-3 mb-5 bg-body rounded" 
                onclick="window.location.href = '{{route('produk')}}'">
                    <div class="card-body">
                      <h1 class="card-title"><i class="bi bi-archive"></i></h1>
                      <p class="card-text">Data Produk</p>
                    </div>
                </div>
            </div>
    
            <div class="col-md-4">
                <div class="card text-center shadow-sm p-3 mb-5 bg-body rounded"
                onclick="window.location.href = '{{route('penjualan')}}'">
                    <div class="card-body">
                      <h1 class="card-title"><i class="bi bi-cart2"></i></h1>
                      <p class="card-text">Transaksi</p>
                    </div>
                </div>
            </div>
    
            <div class="col-md-4">
                <div class="card text-center shadow-sm p-3 mb-5 bg-body rounded"
                onclick="window.location.href = '{{route('laporan')}}'">
                    <div class="card-body">
                      <h1 class="card-title"><i class="bi bi-graph-up-arrow"></i></h1>
                      <p class="card-text">Laporan</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection