<?php

namespace App\Http\Controllers\Admin\Pembelian;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pembelian;
use App\Models\Bahan;
use App\Models\Kasir;
use App\Models\Supplier;
use App\Models\Kategori;

class pembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bahan = Bahan::all();
        $kategori = Kategori::all();
        $kasir = Kasir::all();
        $supplier = Supplier::all();
        $pembelian = Pembelian::all();
        return view('admin.pembelian.index', compact('pembelian','bahan','kasir','supplier','kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'kode_pembelian' => 'required|min:3',
            'tanggal_pembelian' => 'required',
            'kasir_id'=> 'required',
            'supplier_id' => 'required',
            'kategori_id' => 'required',
            'bahan_id' => 'required',
            'jumlah' => 'required'
        ]);

        $pembelian = Pembelian::create([
            'kode_pembelian' => $request->kode_pembelian,
            'tanggal_pembelian' => $request->tanggal_pembelian,
            'kasir_id' => $request->kasir_id,
            'supplier_id' => $request->supplier_id,
            'kategori_id' => $request->kategori_id,
            'bahan_id' => $request->bahan_id,
            'jumlah' => $request->jumlah,
        ]);

        return redirect('/pembelian')->with('sukses','Data Berhasil Ditambahkan');
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pembelian = Pembelian::findorfail($id);
        $pembelian->delete();

        return redirect('/pembelian')->with('sukses','Data Berhasil Dihapus');
    }
}
