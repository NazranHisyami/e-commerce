@extends('template')

@section('content')
<div class="container">
    <div class="row">
        
        <div class="col-md-12 mt-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $barang->nama_barang }}</li>
                </ol>
            </nav>

        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ asset($barang->gambar) }}" alt="" width="100%">
                        </div>
                        <div class="col-md-6">
                            <h4>{{ $barang->nama_barang }}</h4>
                            <p>Rp. {{ number_format($barang->harga) }}</p>
                            <p>Stok: {{ number_format($barang->stok) }}</p>
                            <p>{{ $barang->keterangan }}</p>

                            <form action="{{ url('pesan') }}/{{ $barang->id }}" method="post">
                                @csrf
                                <span>Qty: <input type="number" name="jumlah_pesan" class="form-control"
                                        required=""></span>

                                <button type="submit" class="btn btn-primary mt-3">Masukkan Keranjang</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
