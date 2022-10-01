@extends('template')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="{{ url('barang/'.$barangs->id) }}" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}
                @method("PATCH")
                <div class="form-group">
                    <label>Nama Barang</label>
                    <input type="text" name="nama_barang" value="{{ $barangs->nama_barang }}" class="form-control">
                    @error('nama_barang')
                        <div class="text-warning">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Gambar</label>
                    <input class="form-control" type="file" id="gambar" name="gambar" value="{{ $barangs->gambar }}">

                    @if ($barangs->gambar)
                        <img src="{{ asset($barangs->gambar) }}" class="img-preview img-fluid  col-sm-5 mt-2" style="height: 200px; width: 200px">
                    @else
                        <img class="img-preview img-fluid  col-sm-5 mt-2">
                    @endif

                    @error('gambar')
                    <div class="text-warning">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Harga</label>
                    <input type="number" name="harga" value="{{ $barangs->harga }}" class="form-control">
                    @error('harga')
                        <div class="text-warning">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Stok</label>
                    <input type="number" name="stok" value="{{ $barangs->stok }}" class="form-control">
                    @error('stok')
                        <div class="text-warning">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Keterangan</label>
                    <input type="text" name="keterangan" value="{{ $barangs->keterangan }}" class="form-control">
                    @error('keterangan')
                        <div class="text-warning">{{ $message }}</div>
                    @enderror
                </div>
    
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection