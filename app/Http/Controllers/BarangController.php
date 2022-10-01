<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangs = Barang::all();

        return view('crud.index', compact('barangs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crud.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validData = $request->validate([
            'nama_barang' => 'required',
            'gambar' => 'image',
            'harga' => 'required',
            'stok' => 'required',
            'keterangan' => 'required'
        ]);

        if($request->file('gambar')) {
            $validData['gambar'] = $request->file('gambar')->move('photo', $request->file('gambar')->getClientOriginalName());
        }

        Barang::create($validData);
        return redirect('/')->with('success','Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barangs = Barang::findorfail($id);
        return view('crud.edit', compact('barangs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama_barang' => 'required',
            'gambar' => 'image',
            'harga' => 'required',
            'stok' => 'required',
            'keterangan' => 'required'
        ]);

        $barangs = Barang::findorfail($id);
        $barangs->update($request->all());

        if($request->file('gambar')) {
            $barangs['gambar'] = $request->file('gambar')->move('photo', $request->file('gambar')->getClientOriginalName());
            $barangs->save();
        }

        return redirect('barang')->with('success', 'Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Barang::destroy($id);
        return redirect('barang')->with('flash_massage', 'Agenda deleted!');
    }
}
