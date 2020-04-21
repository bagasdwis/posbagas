@extends('layouts.master')

@section('sub-judul','Transaksi Penjualan')
@section('jejak','Transaksi Penjualan')
@section('content')

<!-- Main content -->
    <section class="content">

      <div class="row">
          <div class="col-12">
        <!-- SELECT2 EXAMPLE -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Form Transaksi</h3>
            <div class="text-right">
                <button class="btn btn-warning btn-sm float-leftt btn-refresh">
                    <i class="fas fa-sync"></i>   
                </button>
            </div>
          </div>
            <!-- /.card-header -->
            <div class="card-body">

              <input type="hidden" name="grand_total" value="0">

                <div class="row">
                    <div class="col-md-4">
                <thead>
                    <form action="{{ route('penjualan.store') }}" method="POST">
                @csrf
                <thead>
                <div class="form-group">
                  <label for="exampleInputEmail">Masukkan Kode Menu</label>
                  <input name="kode_menu" type="text" class="form-control" autocomplete="off" id="exampleInputEmail">
                </div>
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
          <div class="row">
            <form method="POST" action="{{ route('penjualan.store') }}">
              @csrf
            <div class="col-md-12">
              <table class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                  <tr>
                    <th>Kode Menu</th>
                    <th>Nama Menu</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Hapus</th>
                  </tr>
                </thead>
                  <tbody class="menu-ajax">
                    
                  </tbody>
              </table>

              <div class="row">
                <div class="col-md-6">
                  <table class="table">
                    <tbody>
                      <tr>
                        <th>Jumlah Bayar</th>
                        <td>:</td>
                        <td>
                          <input type="number" class="form-control" name="jumlah_bayar">
                        </td>
                      </tr>
                      <tr>
                        <th>Kembalian</th>
                        <td>:</td>
                        <td class="kembalian">
                          
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>

              <button type="submit" class="btn btn-success btn-lg btn-block">Simpan</button>
            </div>
            </form>
          </div>
        </div>
        <!-- /.card -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@section('scripts')
<script type="text/javascript">
  $(document).ready(function(){

    $("input[name='kode_menu']").focus();
    $("input[name='grand_total']").val(0);
    $("input[name='jumlah_bayar']").val('');

    $("input[name='kode_menu']").keypress(function(e){
      if(e.which == 13){
        e.preventDefault();
        var kode_menu = $(this).val();
        var url = "{{ url('menu/ajax') }}"+'/'+kode_menu;
        var _this = $(this);

        $.ajax({
          type:'get',
          dataType:'json',
          url:url,
          success:function(data){
            console.log(data);
            _this.val('');

            var nilai = '';
            nilai += '<tr>';

            nilai += '<td>';
            nilai += data.data.kode_menu;
            nilai += '<input type="hidden" class="form-control" name="menu[]" value="'+data.data.id+'">';
            nilai += '</td>';

            nilai += '<td>';
            nilai += data.data.nama_menu;
            nilai += '</td>';

            nilai += '<td class="harga">';
            nilai += data.data.harga;
            nilai += '<input type="hidden" class="form-control" name="harga[]" value="'+data.data.harga+'">';
            nilai += '</td>';

            nilai += '<td>';
            nilai += '<input type="number" class="form-control" name="jumlah[]" value="1">';
            nilai += '</td>';

            nilai += '<td>';
            nilai += '<button class="btn btn-sm btn-danger hapus"><i class="fas fa-trash"></i></button>';
            nilai += '</td>';

            nilai += '</tr>';

            var total = parseInt($("input[name='grand_total']").val());
            total += data.data.harga;

            $("input[name='grand_total']").val(total);

            $('.menu-ajax').append(nilai);
            $("input[name='jumlah_bayar']").val(0);
          }
        })
      }
    })

    $('body').on('click','.hapus',function(e){
      e.preventDefault();
      $(this).closest('tr').remove();
    })

    $("button[type='submit']").click(function(e){
      var grand_total = parseInt($("input[name='grand_total']").val());
      var jumlah_bayar = parseInt($("input[name='jumlah_bayar']").val());

      if(jumlah_bayar < grand_total){
        e.preventDefault();
        alert('Uang Kurang');
      }
      // alert(grand_total);
    })

    $("input[name='jumlah_bayar']").keyup(function(e){
      var grand_total = parseInt($("input[name='grand_total']").val());
      var jumlah_bayar = parseInt($(this).val());
      var kembalian = jumlah_bayar - grand_total;
      $(".kembalian").text(kembalian);
    })

    $('.btn-refresh').click(function(e){
      e.preventDefault();
      $('.preloader').fadeIn();
      location.reload();
    })
  })
</script>
@endsection