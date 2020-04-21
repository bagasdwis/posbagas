<?php

namespace App\Http\Controllers\Admin\Bahan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bahan;
use App\Models\Satuan;
use App\Models\Kategori;
use PDF;

class BahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bahan = Bahan::all();
        return view('admin.bahan.index', compact('bahan'));
    }

    public function cetak_bahan()
    {
        $bahan = Bahan::all();
        $pdf = PDF::loadView('admin.cetak.bahanpdf',['bahan' => $bahan])->setPaper('A4','potrait');
        return $pdf->download('data_bahan.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $satuan = Satuan::all();
        $kategori = Kategori::all();
        return view('admin.bahan.create', compact('satuan','kategori'));
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
            'nama_bahan' => 'required|min:3',
            'satuan_id' => 'required',
            'kategori_id' => 'required',
            'stok' => 'required',
            'harga' => 'required'
        ]);

        $bahan = Bahan::create([
            'nama_bahan' => $request->nama_bahan,
            'satuan_id' => $request->satuan_id,
            'kategori_id' => $request->kategori_id,
            'stok' => $request->stok,
            'harga' => $request->harga,

        ]);

        return redirect('/bahan')->with('sukses','Data Berhasil Ditambahkan');
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
        $satuan = Satuan::all();
        $kategori = Kategori::all();
        $bahan = Bahan::findorfail($id);
        return view('admin.bahan.edit', compact('bahan','satuan','kategori'));
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
        $this->validate($request, [
            'nama_bahan' => 'required|min:3',
            'satuan_id' => 'required',
            'kategori_id' => 'required',
            'stok' => 'required',
            'harga' => 'required'
        ]);

        $bahan_data = [
            'nama_bahan' => $request->nama_bahan,
            'satuan_id' => $request->satuan_id,
            'kategori_id' => $request->kategori_id,
            'stok' => $request->stok,
            'harga' => $request->harga
        ];

        Bahan::whereId($id)->update($bahan_data);
        return redirect('/bahan')->with('sukses','Data Berhasil Diupdate');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bahan = Bahan::findorfail($id);
        $bahan->delete();

        return redirect('/bahan')->with('sukses','Data Berhasil Dihapus');
    }
}
