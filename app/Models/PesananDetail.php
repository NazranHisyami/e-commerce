<?php

namespace App\Models;

use App\Models\Coupon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PesananDetail extends Model
{
    use HasFactory;

    public function barang() {
        return $this->belongsTo('App\Models\Barang','barang_id','id');
    }

    public function pesanan() {
        return $this->belongsTo('App\Models\Pesanan','pesanan_id','id');
    }

    public function coupon() {
        return $this->belongsTo(Coupon::class);
    }
}
