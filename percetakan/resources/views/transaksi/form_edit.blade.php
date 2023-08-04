@extends('admin.index')
@section('content')
<h1 class="mt-4">Form Update Transaksi</h1>
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
    <form method="POST" action="{{route('transaksi.update', $row->id)}}" id="contactForm" data-sb-form-api-token="API_TOKEN">
        @csrf
        @method('PUT')
        <div class="form-group from-floating mb-3">
            <label for="barang">Nama barang</label>
            <select id="barang" name="barang" class="form-control" value="{{old('barang')}}">
                @foreach ($ar_barang as $barang)
                <option value="{{ $barang->id }} | {{$barang->harga}} | {{$barang->harga_member}}" {{ $barang->id == $row->barang_id ? 'selected' : '' }}>
                    {{ $barang->kode }} - {{ $barang->nama_barang }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="form-group from-floating mb-3">
            <label for="nama">Nama Pelanggan</label>
            <select id="nama" name="pelanggan" class="form-control" value="">
                @foreach ($ar_pelanggan as $pelanggan)
                <option value="{{ $pelanggan->id }} | {{$pelanggan->status_member}}" {{ $pelanggan->id == $row->id ? 'selected' : '' }}>
                    {{ $pelanggan->nama }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="form-floating mb-3">
            <input class="form-control" name="jumlah" value="{{$row->jumlah}}" id="jumlah" placeholder="jumlah" data-sb-validations="required" />
            <label for="jumlah">Jumlah dibeli</label>
            <div class="invalid-feedback" data-sb-feedback="jumlah:required">jumlah is required.</div>
        </div>

        <div class="form-floating mb-3">
            <input class="form-control" name="tgl" value="{{$row->tgl}}" id="date" type="text" placeholder="date" data-sb-validations="required" />
            <label for="date">date</label>
            <div class="invalid-feedback" data-sb-feedback="date:required">date is required.</div>
        </div>

        <div class="form-floating mb-3">
            <input class="form-control" name="keterangan" value="{{$row->keterangan}}" id="keterangan" type="text" placeholder="keterangan" data-sb-validations="required" />
            <label for="keterangan">keterangan</label>
            <div class="invalid-feedback" data-sb-feedback="keterangan:required">keterangan is required.</div>
        </div>

        <div class="form-floating mb-3">
            <input class="form-control" name="total_harga" value="{{$row->total_harga}}" id="jumlah" placeholder="jumlah" data-sb-validations="required" />
            <label for="jumlah">Total Harga</label>
            <div class="invalid-feedback" data-sb-feedback="jumlah:required">jumlah is required.</div>
        </div>

        <button class="btn btn-primary" name="proses" value="ubah" id="ubah" type="submit">
            <i class="fas fa-edit"></i> Ubah
        </button>
        <a href="{{ url('/transaksi') }}" class="btn btn-info">
            <i class="fas fa-times"></i> Batal
        </a>

    </form>
</div>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
@endsection