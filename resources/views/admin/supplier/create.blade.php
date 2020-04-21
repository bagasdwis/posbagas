@extends('layouts.master')
@section('sub-judul','Tambah Supplier')
@section('jejak','Tambah Supplier')
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
                		<form action="{{ route('supplier.store') }}" method="POST">
                		@csrf
                		<thead>
                		<div class="form-group">
                      @if($errors->has('nama_supplier'))
                        <div class="alert alert-danger alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="icon fas fa-ban"></i>
                          <strong>{{ $errors->first('nama_supplier') }}</strong>
                        </div>
                      @endif
                    		<label >Nama Supplier</label>
                    		<input name="nama_supplier" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Supplier" value="">
               			 </div>
                     <div class="form-group">
                      @if($errors->has('no_telepon'))
                        <div class="alert alert-danger alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="icon fas fa-ban"></i>
                          <strong>{{ $errors->first('no_telepon') }}</strong>
                        </div>
                      @endif
                        <label >Nomor Telepon</label>
                        <input name="no_telepon" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nomor Telepon" value="">
                     </div>
                     <div class="form-group">
                      @if($errors->has('alamat'))
                        <div class="alert alert-danger alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="icon fas fa-ban"></i>
                          <strong>{{ $errors->first('alamat') }}</strong>
                        </div>
                      @endif
                        <label >Alamat</label>
                        <textarea name="alamat" type="text" class="form-control" id="exampleInputEmail1" rows="3" aria-describedby="emailHelp" placeholder="Alamat" value=""></textarea>
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