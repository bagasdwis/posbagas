@extends('layouts.master')
@section('sub-judul','Edit Kasir')
@section('jejak','Edit Kasir')
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
                    <form action="{{ route('kasir.update', $kasir->id ) }}" method="POST">
                    @csrf
                    @method('patch')
                    <thead>
                    <div class="form-group">
                      @if($errors->has('nama_kasir'))
                        <div class="alert alert-danger alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="icon fas fa-ban"></i>
                          <strong>{{ $errors->first('nama_kasir') }}</strong>
                        </div>
                      @endif
                        <label >Nama Kasir</label>
                        <input name="nama_kasir" type="text" value="{{ $kasir->nama_kasir }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Kasir" value="">
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
                        <input name="no_telepon" type="number" value="{{ $kasir->no_telepon }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nomor Telepon" value="">
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
                        <textarea name="alamat" type="text" value="" class="form-control" id="exampleInputEmail1" rows="3" aria-describedby="emailHelp" placeholder="Alamat">{{ $kasir->alamat }}</textarea>
                     </div>
                        <button type="submit" class="btn btn-success">Update</button>
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