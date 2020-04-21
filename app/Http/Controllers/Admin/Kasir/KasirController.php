<?php

namespace App\Http\Controllers\Admin\Kasir;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kasir;


class kasirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kasir = Kasir::all();
        return view('admin.kasir.index', compact('kasir'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kasir.create');    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_kasir' => 'required|min:3',
            'alamat' => 'required|min:3',
            'no_telepon' => 'required|min:11'
        ]);

        $kasir = Kasir::create([
            'nama_kasir' => $request->nama_kasir,
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon
        ]);

        return redirect('/kasir')->with('sukses','Data Berhasil Ditambahkan');
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
        $kasir = Kasir::findorfail($id);
        return view('admin.kasir.edit', compact('kasir'));
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
            'nama_kasir' => 'required|min:3',
            'alamat' => 'required|min:3',
            'no_telepon' => 'required|min:11'
        ]);

        $kasir_data = [
            'nama_kasir' => $request->nama_kasir,
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon
        ];

        Kasir::whereId($id)->update($kasir_data);
        return redirect('/kasir')->with('sukses','Data Berhasil Diupdate');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kasir = Kasir::findorfail($id);
        $kasir->delete();

        return redirect('/kasir')->with('sukses','Data Berhasil Dihapus');
    }
}
