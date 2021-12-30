@extends('layouts.index')

@section('content')
<style>
    .card:hover{
        cursor: pointer;
        transform:scale(1.08);
        transition: 0.5s;
    }

    .card:active{
        transform:scale(1.05);
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

        <div class="card text-white bg-danger mb-3" style="max-width: 100%">
            <div class="card-body">
              <p class="card-header"><i class="bi bi-info-circle-fill" style="color:white;font-size:15px;margin-right:10px"></i>Sebelum Menggunakan Aplikasi kasir ini, jalankan plugin_impresora_termica_64_bits yang berada di folder aplikasi </p>


              <p class="card-text">
                Agar dapat menjalankan printer, perlu untuk menjalankan plugin tersebut terlebih dahulu dengan cara klik 2x plugin_impresora_termica_64_bits yang berada di folder aplikasi. <br> <br> 
                Jika muncul pesan dari windows smartscreen atau sejenisnya yang membuat tidak bisa menjalankan plugin, maka matikan terlebih dahulu windows smartscreen  di windows defender  dan anti virus ( jika memasang antivirus )
                <br>
                <a href="{{route('tutorial.mematikan_smartscreen')}}" class="link-warning">Cara Mematikan windows smartscreen</a>
            </p>
            </div>
          </div>
    </div>
    
@endsection