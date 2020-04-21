<?php

use App\Models\Satuan;
use App\Models\Kategori;
use App\Models\Makanan;
use App\Models\Supplier;

class Helper
{
    
    public static function getSatuan()
    {
        $data_satuan = \App\Models\Satuan::all();
        return $data_satuan;
    }

    public static function getKategori()
    {
        $data_kategori = \App\Models\Kategori::all();
        return $data_kategori;
    }

    public static function getMakanan()
    {
        $Makanan = Makanan::all();
        return $Makanan;
    }

    public static function getSupplier()
    {
        $suplier = Supplier::all();
        return $suplier;
    }
}