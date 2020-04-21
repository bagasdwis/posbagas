<?php

namespace App\Http\Controllers\Admin\Pos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Detail_Penjualan;
use App\Models\Menu;
use App\Models\Penjualan;

class PosPenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pos_penjualan.index');
    }

    public function get_menu($kode_menu)
    {
        $dt = Menu::where('kode_menu',$kode_menu)->first();

        return response()->json([
            'data'=>$dt
        ]);
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
        try {
            $menu = $request->menu;
            $jumlah = $request->jumlah;
            $harga = $request->harga;
 
                $header = Penjualan::insertGetId([
                    'no_penjualan'=>rand(),
                    'created_at'=>date('Y-m-d H:i:s'),
                    'updated_at'=>date('Y-m-d H:i:s')
                ]);
 
                foreach ($menu as $e => $mn) {
                    Detail_Penjualan::insert([
                        'penjualan'=>$header,
                        'menu'=>$mn,
                        'jumlah'=>$jumlah[$e],
                        'harga'=>$harga[$e],
                        'grand_total'=>(Int)$jumlah[$e] * (Int)$harga[$e]
                    ]);
                }
 
        
           \Session::flash('sukses','berhasil');       
        
        } catch (\Exception $e){
           \Session::flash('gagal',$e->getMessage());
        }
        return redirect()->back();
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
        
    }
}
