@extends('template')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('history') }}">Riwayat Pemesanan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail Pemesanan</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3>Sukses Check out</h3>
                    <p>Pesanan anda sudah sukses dicheck out selanjutnya untuk pembayaran silahkan transfer di rekening <strong>Bank BRI Nomer Rekening : 23928-23232-232</strong> dengan nominal : <strong>Rp. {{ number_format($pesanan->kode+$pesanan->jumlah_harga) }}</strong></p>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h2>Detail Pemesanan</h2>
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
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pesanan_details as $pesanan_detail)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pesanan_detail->barang->nama_barang }}</td>
                                <td>{{ $pesanan_detail->jumlah }}</td>
                                <td>Rp. {{ number_format($pesanan_detail->barang->harga) }}</td>
                                <td align="right">Rp. {{ number_format($pesanan_detail->jumlah_harga) }}</td>

                            </tr>

                            @endforeach
                            <tr>
                                <td colspan="4" align="right">Total Harga :</td>
                                <td align="right">Rp. {{ number_format($pesanan->jumlah_harga) }}</td>
                            </tr>
                            <tr>
                                <td colspan="4" align="right">Kode Unik :</td>
                                <td align="right">Rp. {{ number_format($pesanan->kode) }}</td>
                            </tr>
                            <tr>
                                <td colspan="4" align="right">Total yang harus dibayar :</td>
                                <td align="right">Rp. {{ number_format($pesanan->kode+$pesanan->jumlah_harga) }}</td>
                            </tr>
                        </tbody>
                    </table 
                    @endif 
                </div> 
                
            </div> 
            
        </div> 
        
    </div> 
    
</div> 
@endsection
