<?php

namespace App\Http\Controllers\Admin\Menu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Satuan;
use App\Models\Kategori;
use PDF;


class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = Menu::all();
        return view('admin.menu.index', compact('menu'));
    }

    public function cetak_menu()
    {
        $menu = Menu::all();
        $pdf = PDF::loadView('admin.cetak.menupdf',['menu' => $menu])->setPaper('A4','potrait');
        return $pdf->download('data_menu.pdf');
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
        return view('admin.menu.create', compact('satuan','kategori'));
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
            'kode_menu' => 'required|min:3',
            'nama_menu' => 'required|min:3',
            'satuan_id' => 'required',
            'kategori_id' => 'required',
            'stok' => 'required',
            'harga' => 'required'
        ]);

        $menu = Menu::create([
            'kode_menu' => $request->kode_menu,
            'nama_menu' => $request->nama_menu,
            'satuan_id' => $request->satuan_id,
            'kategori_id' => $request->kategori_id,
            'stok' => $request->stok,
            'harga' => $request->harga
        ]);

        return redirect('/menu')->with('sukses','Data Berhasil Ditambahkan');
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
        $menu = Menu::findorfail($id);
        return view('admin.menu.edit', compact('menu','satuan', 'kategori'));
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
            'kode_menu' => 'required|min:3',
            'nama_menu' => 'required|min:3',
            'satuan_id' => 'required',
            'kategori_id' => 'required',
            'stok' => 'required',
            'harga' => 'required'
        ]);

        $menu_data = [
            'kode_menu' => $request->kode_menu,
            'nama_menu' => $request->nama_menu,
            'satuan_id' => $request->satuan_id,
            'kategori_id' => $request->kategori_id,
            'stok' => $request->stok,
            'harga' => $request->harga
        ];

        Menu::whereId($id)->update($menu_data);
        return redirect('/menu')->with('sukses','Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = Menu::findorfail($id);
        $menu->delete();

        return redirect('/menu')->with('sukses','Data Berhasil Dihapus');
    }
}
