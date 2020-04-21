@extends('layouts.master')
@section('sub-judul','Pelanggan')
@section('jejak','Pelanggan')
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
      <div class="row">
          <div class="col-12">
        <!-- SELECT2 EXAMPLE -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Data Pelanggan</h3>
            <div class="text-right">
                <a href="{{ route('pelanggan.create') }}" class="btn btn-success btn-sm float-leftt">
                    <i class="fas fa-plus"></i>
                </a>
            </div>
          </div>
            <!-- /.card-header -->
            <div class="card-body">
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
                    <th>No</th>
                    <th>Nama Pelanggan</th>
                    <th>Opsi</th>
                </tr>
            </thead>
                <tbody>
                @php $no = 1; 
                @endphp
                @foreach ($pelanggan as $result => $hasil)
                <tr>
                    <td>{{ $result+1 }}</td>
                    <td>{{ $hasil->nama_pelanggan}}</td>
                    <td>
                      <form action="{{ route('pelanggan.destroy', $hasil->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <a href="{{ route('pelanggan.edit', $hasil->id ) }}" class="btn btn-info btn-sm">
                          <i class="fas fa-pencil-alt"></i>
                        </a>
                        <button type="submit" class="btn btn-danger btn-sm" onClick="return confirm('Yakin Mau Dihapus')">
                          <i class="fas fa-trash"></i>
                        </button>
                      </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
            </div>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection