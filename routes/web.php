<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('auth.login');
});

Auth::routes(['verify' => true]);
Route::group(['middleware'=>['auth']], function(){

    // Home
    Route::get('/home', 'HomeController@index')->name('home');

    // User
    Route::get('/detail_user','Admin\Dashboard\AdminController@detail_user');
    Route::get('/users','Admin\User\UserController@user');

    // Menu
    Route::resource('/menu', 'Admin\Menu\MenuController');

    // Cetak
    Route::get('/cetak_menu','Admin\Menu\MenuController@cetak_menu')->name('cetak_menu');

    // Kategori
    Route::resource('/kategori', 'Admin\Kategori\KategoriController');

    // Satuan
    Route::resource('/satuan', 'Admin\Satuan\SatuanController');

    // Bahan Makanan
    Route::resource('/bahan', 'Admin\Bahan\BahanController');

    // Cetak
    Route::get('/cetak_bahan','Admin\Bahan\BahanController@cetak_bahan')->name('cetak_bahan');

    // Kasir
    Route::resource('/kasir', 'Admin\Kasir\KasirController');

    // Supplier
    Route::resource('/supplier', 'Admin\Supplier\SupplierController');

    // Pelanggan
    Route::resource('/pelanggan', 'Admin\Pelanggan\PelangganController');

    // Penjualan
    Route::resource('/penjualan', 'Admin\Pos\PosPenjualanController');
    Route::get('menu/ajax/{kode_menu}', 'Admin\Pos\PosPenjualanController@get_menu');

    // Pembelian
    Route::resource('/pembelian', 'Admin\Pembelian\PembelianController');

});