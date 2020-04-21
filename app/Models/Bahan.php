<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bahan extends Model
{
    protected $table = 'bahan';
    protected $fillable = ['nama_bahan','satuan_id','kategori_id','stok','harga'];

    public function satuan()
    {
        return $this->belongsTo('App\Models\Satuan','satuan_id');
    }
    public function kategori()
    {
        return $this->belongsTo('App\Models\Kategori','kategori_id');
    }
}
