@extends('layouts.master')

@section('header')
<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
@stop

@section('sub-judul','Transaksi Pembelian')
@section('jejak','Transaksi Pembelian')
@section('content')

<!-- Main content -->
    <section class="content">
      @if(session('sukses'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fas fa-check"></i>
        {{session('sukses')}}
        </div>
        @endif
        @if(count($errors)>0)
      @foreach($errors->all() as $error)
      <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fas fa-ban"></i>
        {{ $error }}
      </div>
      @endforeach
      @endif
      
      	<div class="row">
          <div class="col-12">
        <!-- SELECT2 EXAMPLE -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Form Transaksi</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <form action="{{ route('pembelian.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-row">
                <div class="form-group col">
                  <input name="kode_pembelian" type="text" class="form-control" value ="PM000" id="inputEmail4" placeholder="Kode Pembelian">
                </div>
                <div class="form-group col">
                  <div class="input-group ">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                          </span>
                        <input name="tanggal_pembelian" type="date" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="form-group col">
                    <select name="kasir_id" id="inputState" class="form-control">
                      <option selected>Nama Kasir</option>
                      @foreach($kasir as $result)
                      <option value="{{ $result['id']}}">{{ $result->nama_kasir }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group col-3">
                    <select name="supplier_id" id="inputState" class="form-control">
                      <option selected>Nama Supplier</option>
                      @foreach($supplier as $result)
                      <option value="{{ $result['id']}}">{{ $result->nama_supplier }}</option>
                      @endforeach
                    </select>
                  </div>
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <!-- Main content -->
    <section class="content">
    	<div class="row">
          <div class="col-12">
        <!-- SELECT2 EXAMPLE -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Form Bahan</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
                <div class="form-row">
                  <div class="form-group col-4">
                    <select name="kategori_id" id="inputState" class="form-control">
                      <option selected>Nama Kategori</option>
                      @foreach($kategori as $result)
                      <option value="{{ $result['id']}}">{{ $result->nama_kategori }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group col-4">
                    <select name="bahan_id" id="inputState" class="form-control">
                      <option selected>Nama Bahan</option>
                      @foreach($bahan as $result)
                      <option value="{{ $result['id']}}">{{ $result->nama_bahan }}</option>
                      @endforeach
                    </select>
                  </div>
                    <div class="form-group col">
                      <input name="jumlah" type="number" class="form-control" placeholder="Jumlah" id="input">
                  </div>
                  <div class="form-group col">
                    <button type="submit" class="btn btn-success">Tambah</button>
                  </div>
              </div>
              </form>
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Detail Transaksi</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                  <thead>
                    <tr>
                  <th>No</th>
                  <th>Nama Bahan</th>
                  <th>Harga Satuan</th>
                  <th>Jumlah</th>
                  <th>Subtotal</th>
                  <th>Opsi</th>
                </tr>
                </thead>
                <tbody>
                @php 
                  $no = 1;
                  $totalHarga = 0;
                  $totalJumlah = 0;
                  $total = 0;
                  $kembali = 0;
                @endphp
                @forelse ($pembelian as $result => $hasil)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $hasil->bahan->nama_bahan}}</td>
                  <td>Rp. {{ number_format($hasil->bahan->harga)}}</td>
                  <td><a href="#" id="username" data-type="text" data-pk="{{$hasil->id}}" data-url="/post" data-title="Masukkan Jumlah">{{ $hasil->jumlah}}</a></td>
                  <td>Rp. {{ number_format($hasil->bahan->harga * $hasil->jumlah) }}</td>
                  <td>       
                      <form action="{{ route('pembelian.destroy', $hasil->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger btn-sm" onClick="return confirm('Yakin Mau Dihapus')">
                          <i class="fas fa-trash"></i>
                        </button>
                      </form>
                      </td> 
                    </tr>
                    @php
                    $totalHarga += $hasil->bahan->harga;
                    $totalJumlah += $hasil->jumlah;
                    $total += ($hasil->bahan->harga * $hasil->jumlah);
                    $kembali += ($hasil->$total - $hasil->bayar)
                    @endphp
                    @empty
                    
                @endforelse
                </tbody>
                <tfoot>
                <tr>
                    <th class="text-right" colspan="4">Total</th>
                    <td>Rp. {{ number_format($total) }}</td>
                    <td></td>
                </tr>
                <tr>
                    <th class="text-right" colspan="4">Bayar</th>
                    <td><input name="bayar" type="number" class="form-control" placeholder="Bayar" id="input"></td>
                    <td></td>
                </tr>
                <tr>
                    <th class="text-right" colspan="4">Kembali</th>
                    <td>Rp. {{ number_format($kembali) }}</td>
                    <td>
                      <form action="#">
                        <button type="submit" class="btn btn-primary btn-sm">
                          <i class="fas fa-save"></i>
                          Selesai
                      </form>
                    </td>
                </tr>
                </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
<script>
  $(document).ready(function() {
        $('.username').editable({
            mode: 'inline',
        });
    });
</script>