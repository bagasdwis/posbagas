@extends('layouts.master')
@section('sub-judul','Tambah Menu')
@section('jejak','Tambah Menu')
@section('content')

<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
            		<thead>
                		<form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data">
                		@csrf
                		<thead>
                    <div class="form-group">
                      @if($errors->has('kode_menu'))
                        <div class="alert alert-danger alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="icon fas fa-ban"></i>
                          <strong>{{ $errors->first('kode_menu') }}</strong>
                        </div>
                      @endif
                        <label >Kode Menu</label>
                        <input name="kode_menu" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Kode Menu" value="">
                     </div>
                		<div class="form-group">
                      @if($errors->has('nama_menu'))
                        <div class="alert alert-danger alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="icon fas fa-ban"></i>
                          <strong>{{ $errors->first('nama_menu') }}</strong>
                        </div>
                      @endif
                    		<label >Nama Menu</label>
                    		<input name="nama_menu" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Menu" value="">
               			 </div>
               			 <div class="form-group">
                      @if($errors->has('satuan_id'))
                        <div class="alert alert-danger alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="icon fas fa-ban"></i>
                          <strong>{{ $errors->first('satuan_id') }}</strong>
                        </div>
                      @endif
                    		<label>Satuan</label>
                    		<select class="form-control" name="satuan_id">
                    			<option value="" holder>Pilih Satuan</option>
                    			@foreach($satuan as $result)
                    			<option value="{{ $result['id']}}">{{ $result->nama_satuan }}</option>
                    			@endforeach
                    		</select>
               			 </div>
               			 <div class="form-group">
                      @if($errors->has('kategori_id'))
                        <div class="alert alert-danger alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="icon fas fa-ban"></i>
                          <strong>{{ $errors->first('kategori_id') }}</strong>
                        </div>
                      @endif
                    		<label >Kategori</label>
                    		<select class="form-control" name="kategori_id">
                    			<option value="" holder>Pilih Kategori</option>
                    			@foreach($kategori as $result)
                    			<option value="{{ $result['id']}}">{{ $result->nama_kategori}}</option>
                    			@endforeach
                    		</select>
               			 </div>
                     <div class="form-group">
                      @if($errors->has('stok'))
                        <div class="alert alert-danger alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="icon fas fa-ban"></i>
                          <strong>{{ $errors->first('stok') }}</strong>
                        </div>
                      @endif
                        <label >Stok</label>
                        <input name="stok" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Stok" value="">
                     </div>
                     <div class="form-group">
                      @if($errors->has('harga'))
                        <div class="alert alert-danger alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="icon fas fa-ban"></i>
                          <strong>{{ $errors->first('harga') }}</strong>
                        </div>
                      @endif
                        <label >Harga</label>
                        <input name="harga" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Harga" value="">
                     </div>
                    		<button type="submit" class="btn btn-success">Tambah</button>
            			</form>
            		</thead>
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