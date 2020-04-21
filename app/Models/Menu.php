<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';
    protected $fillable = ['kode_menu','nama_menu','satuan_id','kategori_id','stok','harga'];
    
    public function satuan()
    {
        return $this->belongsTo('App\Models\Satuan','satuan_id');
    }
    
    public function kategori()
    {
        return $this->belongsTo('App\Models\Kategori','kategori_id');
    }
}