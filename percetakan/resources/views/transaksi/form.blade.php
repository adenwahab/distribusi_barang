@extends('admin.index')
@section('content')
<h3>Form Transaksi</h3>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="container px-5 my-5">
    <form method="POST" action="{{ route('transaksi.store') }}" id="contactForm" data-sb-form-api-token="API_TOKEN">
        @csrf
        <div class="form-group from-floating mb-3">
            <label for="barang">Nama barang</label>
            <select id="barang" name="barang" class="form-control">
                <option value="">--Pilih Barang--</option>
                @foreach($ar_barang as $barang)
                <option value=" {{$barang->id}} | {{$barang->harga}} | {{$barang->harga_member}}">{{$barang -> kode}} - {{$barang->nama_barang}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group from-floating mb-3">
            <label for="nama">Nama Pelanggan</label>
            <select id="nama" name="nama" class="form-control">
                <option value="">--Pelanggan--</option>
                @foreach($ar_pelanggan as $pelanggan)
                <option value="{{$pelanggan->id}} | {{$pelanggan->status_member}}">{{$pelanggan->nama}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group form-floating mb-3">
            <input class="form-control" name="jumlah" value="" id="jumlah" type="text" placeholder="jumlah" data-sb-validations="required" />
            <label for="jumlah">Jumlah dibeli</label>
            <div class="invalid-feedback" data-sb-feedback="jumlah:required">jumlah is required.</div>
        </div>

        <div class="form-group form-floating mb-3">
            <input class="form-control" name="tgl" value="" id="date" type="text" placeholder="date" data-sb-validations="required" />
            <label for="date">date</label>
            <div class="invalid-feedback" data-sb-feedback="date:required">date is required.</div>
        </div>

        <div class="form-group form-floating mb-3">
            <input class="form-control" name="keterangan" value="" id="keterangan" type="text" placeholder="keterangan" data-sb-validations="required" />
            <label for="keterangan">keterangan</label>
            <div class="invalid-feedback" data-sb-feedback="keterangan:required">keterangan is required.</div>
        </div>

        <script>
            // Get the current date
            var currentDate = new Date();

            // Format the date as YYYY-MM-DD
            var formattedDate = currentDate.toISOString().slice(0, 10);

            // Set the value of the date input field
            document.getElementById("date").value = formattedDate;
        </script>

        <button class="btn btn-primary" name="proses" value="simpan" id="simpan" type="submit">Simpan</button>
        <a href="{{ url('/transaksi') }}" class="btn btn-info">Batal</a>

    </form>
</div>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
@endsection