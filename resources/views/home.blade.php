@extends('template')

@section('content')
<div id="carouselExampleSlidesOnly" class="carousel slide mt-0" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active position-relative">
            <h1 class="position-absolute text-white top-50 start-50 translate-middle fw-bold" style="z-index: 2; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">E-Commerce</h1>
            <img src="photo/banner.jpg" class="d-block w-100" alt="..." height="500">
        </div>
    </div>
</div>
<hr class="mx-5 my-5">
<h5 class="container-fluid px-4">Products</h5>
<div class="container-fluid d-flex flex-wrap gap-2 justify-content-left">
    
    @foreach ($barangs as $barang)
    <div class="card border border-0 mx-3" style="width: 16rem;">
        <a href="{{ url('pesan') }}/{{ $barang->id }}">
            <img src="{{ asset($barang->gambar) }}" class="card-img-top border border-0 rounded-0" alt="..." height="300px">
        </a>
        <div class="card-body">
            <h5 class="card-title">{{ $barang->nama_barang }}</h5>
            <p class="card-text">
                <strong>Rp. {{ number_format($barang->harga) }}</strong> <br>
                {{ $barang->keterangan }}
            </p>
            <a href="{{ url('pesan') }}/{{ $barang->id }}" class="btn btn-primary">Pesan</a>
        </div>
    </div>
    @endforeach
</div>
@endsection
