<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    protected $table = 'pembelian';
    protected $fillable = ['kode_pembelian','tanggal_pembelian','kasir_id','supplier_id','kategori_id','bahan_id','jumlah','bayar'];

    public function menu()
    {
        return $this->belongsTo('App\Models\Bahan','bahan_id');
    }
    public function kasir()
    {
        return $this->belongsTo('App\Models\Kasir','kasir_id');
    }
    public function supplier()
    {
        return $this->belongsTo('App\Models\Supplier','supplier_id');
    }
    public function bahan()
    {
        return $this->belongsTo('App\Models\Bahan','bahan_id');
    }
}
