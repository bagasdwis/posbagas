@extends('layouts.master')

@section('content')

    @if(session('sukses'))
        <div class="alert alert-success" role="alert">
        {{session('sukses')}}
        </div>
    @endif
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Userser</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Userser</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section> 
<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">

        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Userser</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div><button type="button" class="btn btn-success btn-sm float-leftt" data-toggle="modal" data-target="#exampleModal">
                    Tambah Data Bahan
                </button></div><br>
              <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                  <div class="row"><div class="col-sm-12 col-md-6">
                        <div class="dataTables_length" id="example1_length">
                            
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                <tr>
                    <th>ID User</th>
                    <th>Nama User</th>
                    <th>Password</th>
                    <th>Opsi</th>
                </tr>
            </thead>
                <tbody>
                
                @foreach($data_bahan as $users)
                <tr>
                    <td>{{$users['id']}}</td>
                    <td>{{$users['name']}}</td>
                    <td>{{$users['email']}}</td>
                    <td>{{$users['password']}}</td>
                    <td>
                        <a href="/users/{{$users->id}}/edit" class="btn btn-info btn-sm">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                        <a href="/users/{{$users->id}}/delete" class="btn btn-danger btn-sm" onClick="return confirm('Yakin Mau Dihapus')">
                              <i class="fas fa-trash">
                              </i>
                              Hapus
                          </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
              </table>
            </div>
        </div>
        <div class="row">
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Bahan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form action="/bahan/create" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label >ID Bahan</label>
                            <input name="id" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ID Bahan">
                        </div>
                        <div class="form-group">
                            <label >Nama Bahan</label>
                            <input name="nama_bahan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Bahan">
                        </div>
                        <div class="form-group">
                            <label >Satuan</label>
                            <input name="satuan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Satuan">
                        </div>
                        <div class="form-group">
                            <label >Stok</label>
                            <input name="stok" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Stok">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                        </form>
                    </div>
                </div>
            </div>
    </div>
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