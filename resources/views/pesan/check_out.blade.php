@extends('template')

@section('content')
<div class="container-fluid">
    <div class="col-md-12 mt-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Keranjang</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <h5>Keranjang</h5>
        @if (!empty($pesanan))
        <div class="col-md-8">
            <div class=" bg-dark bg-opacity-10 border border-opacity-10 border-dark border-start-0 border-end-0 border-top-0 py-2">
                <h5 class="ms-2">Produk</h5>
            </div>
            
            <div class="row mt-3">
                @foreach ($pesanan_details as $pesanan_detail)
                <div class="col-3">
                    <img src="{{ asset($pesanan_detail->barang->gambar) }}" class="rounded float-start" alt="..." width="200" height="200">
                </div>
                <div class="col-4">
                    <h5>{{ $pesanan_detail->barang->nama_barang }}</h5>
                    <p class="fw-semibold">Rp. {{ number_format($pesanan_detail->barang->harga) }}</p>
                    <p>qty : {{ $pesanan_detail->jumlah }}</p>
                    <p>total harga : Rp. {{ number_format($pesanan_detail->jumlah_harga) }}</p>

                    <form action="{{ url('check-out'.'/'. $pesanan_detail->id) }}" method="post">
                        @csrf
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger border rounded-0"
                            onclick="return confirm('Anda yakin akan menghapus data?')">Hapus</button>
                    </form>
                </div>
                @endforeach
                
            </div>
            
        </div>
        <div class="col-md-4">
            <div class=" bg-dark bg-opacity-10 border border-opacity-10 border-dark border-start-0 border-end-0 border-top-0 py-2">
                <h5 class="ms-2">Rangkuman Pesan</h5>
            </div>
            <h5 class="mt-4">
                Rangkuman Pesanan
            </h5>
            <p>Total Harga: Rp. {{ number_format($pesanan->jumlah_harga) }}</p>
            
            <p>Tanggal Pesan: {{ $pesanan->tanggal }}</p>

            <a href="{{ url('konfirmasi-check-out') }}" class="btn btn-dark border rounded-0 w-100" onclick="return confirm('Anda yakin akan mengcheckout?')">Check Out</a>
        </div>
        @endif
        
    </div>
    {{-- <div class="row">
        <div class="col-md-12 mt-3 mb-3">
            <a href="{{ url('/') }}" class="btn btn-success">Kembali</a>
        </div>
        
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Keranjang</h2>
                </div>
                <div class="card-body">
                    @if (!empty($pesanan))
                    <p>Tanggal Pesan: {{ $pesanan->tanggal }}</p>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Jumlah</th>
                                <th>harga</th>
                                <th>Total Harga</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pesanan_details as $pesanan_detail)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pesanan_detail->barang->nama_barang }}</td>
                                <td>{{ $pesanan_detail->jumlah }}</td>
                                <td>Rp. {{ number_format($pesanan_detail->barang->harga) }}</td>
                                <td>Rp. {{ number_format($pesanan_detail->jumlah_harga) }}</td>

                                <td>
                                    
                                </td>
                            </tr>

                            @endforeach
                            <tr>
                                <td colspan="4"></td>
                                <td>Rp. {{ number_format($pesanan->jumlah_harga) }}</td>
                                <td>
                                    <a href="{{ url('konfirmasi-check-out') }}" class="btn btn-primary" onclick="return confirm('Anda yakin akan mengcheckout?')">Check Out</a>
                                </td>
                            </tr>
                        </tbody>
                    </table 
                    @endif 
                </div> 
                
            </div> 
            
        </div> 
        
    </div>  --}}
    
</div> 
@endsection
