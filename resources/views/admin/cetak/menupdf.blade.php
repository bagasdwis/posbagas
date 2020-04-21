<!DOCTYPE html>
<html>
<head>
	<title>Data Menu</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Data Menu</h4>
	</center>

	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>Kode Menu</th>
				<th>Nama Menu</th>
				<th>Satuan</th>
				<th>Kategori</th>
				<th>Stok</th>
				<th>Harga</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($menu as $m)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{$m->kode_menu}}</td>
				<td>{{$m->nama_menu}}</td>
				<td>{{$m->satuan->nama_satuan}}</td>
				<td>{{$m->kategori->nama_kategori}}</td>
				<td>{{$m->stok}}</td>
				<td>Rp. {{number_format($m->harga)}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>