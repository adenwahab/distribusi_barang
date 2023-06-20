<!doctype html>
<html lang="en">
  <head>
  	<title>Transaksi</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
	

	</head>
	<body>
	@extends('admin.index')

	@section('content')

	<!-- table start -->
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Tabel Transaksi</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
				
					<div class="table-wrap">
						<table class="table table-striped table-bordered">
						  <thead>
						    <tr>
						      <th>ID</th>
						      <th>Tanggal</th>
						      <th>Nama</th>
						      <th>Produk</th>
						      <th>Jumlah</th>
						      <th>Status Member</th>
						      <th>Status Bayar</th>
						      <th>Status Pesan</th>
						    </tr>
						  </thead>
						  <tbody>
							@foreach ($data as $trs )
						    <tr>
						      <th scope="row">{{$trs['id']}}</th>
						      <td>{{$trs['tgl']}}</td>
						      <td>{{$trs->pelanggan->nama}}</td>
						      <td>{{$trs['barang_id']}}</td>
						      <td>{{$trs['jumlah']}}</td>
						      <td>	
							  <select class="form-select">
								<option>Ya</option>
								<option>Tidak</option>
								</select>
							</td>
							<td>	
							  <select class="form-select">
								<option>DP</option>
								<option>Lunas</option>
								</select>
							</td>
							  <td><a href="#" class="btn btn-success">Done</a></td>
						    </tr>
							@endforeach						
						  </tbody>
						</table>
					</div>
				</div>

				<!-- end of table -->

				<div class="text-center">
					<button type="button" class="btn btn-primary">Cetak</button>
					

					<button type="button" class="btn btn-primary">Tambah Transaksi</button>

					<button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
						Urutkan Berdasar
					</button>
					  <ul class="dropdown-menu">
						<li><a class="dropdown-item" href="#">Minggu</a></li>
						<li><a class="dropdown-item" href="#">Bulan</a></li>
						<li><a class="dropdown-item" href="#">Tahun</a></li>
					  </ul>
				</div>
			</div>
		</div>
	</section>
	@endsection
	
	<script src="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}"></script>

	</body>
</html>

