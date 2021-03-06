@extends('layouts.master')
@section('sub-judul','Edit Kategori')
@section('jejak','Edit Kategori')
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
                    <form action="{{ route('kategori.update', $kategori->id ) }}" method="POST">
                    @csrf
                    @method('patch')
                    <thead>
                    <div class="form-group">
                      @if($errors->has('nama_kategori'))
                        <div class="alert alert-danger alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="icon fas fa-ban"></i>
                          <strong>{{ $errors->first('nama_kategori') }}</strong>
                        </div>
                      @endif
                        <label >Nama Kategori</label>
                        <input name="nama_kategori" type="text" value="{{ $kategori->nama_kategori }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Kategori" value="">
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