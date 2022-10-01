<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $barangs = Barang::paginate(20);
        return view('home', compact('barangs'));
    }
}
