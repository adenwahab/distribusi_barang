@extends('admin.index')

@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


<div class="container-fluid">
    <H3>Edit Transaksi</H3>
    <br><br><br>
    <form>
        <div class="form-group row">
            <label for="kodebarang" class="col-3 col-form-label">Kode Barang</label>
            <div class="col-9">
                <select class="form-select" name="kode" aria-label="Kode barang">
                    <option value="">-- Pilih Kode Barang --</option>
                    @foreach ($ar_barang as $b)
                    <option value="{{ $b->id }} | {{$b->nama_barang}} | {{$b->kode}}">{{ $b->kode }} | {{$b->nama_barang}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="namapelanggan" class="col-3 col-form-label">Nama Pelanggan</label>
            <div class="col-9">
                <select class="form-select" name="kode" aria-label="Kode barang">
                    <option value="">-- Pilih Nama Pelanggan --</option>
                    @foreach ($ar_pelanggan as $p)
                    <option value="{{ $p->id }} | {{$p->nama}}">{{ $p->nama }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="select" class="col-3 col-form-label">Tanggal</label>
            <div class="col-9">
                <input name="date" type="date" id="date" class="form-control" value="<?php $d = date("Y-m-d");
                                                                                        echo $d; ?>" placeholder="Date" autocomplete="off" required />
            </div>
        </div>
        <div class="form-group row">
            <label for="select" class="col-3 col-form-label">Jumlah</label>
            <div class="col-9">
                <input class="form-control" name="jumlah" value="" id="jumlah" type="text" data-sb-validations="required" />
            </div>
        </div>
        <div class="form-group row">
            <label for="select" class="col-3 col-form-label">Keterangan</label>
            <div class="col-9">
                <input class="form-control" name="keterangan" value="" id="keterangan" type="text" data-sb-validations="required" />
            </div>
        </div>
        <div class="form-group row">
            <label for="select" class="col-3 col-form-label">Harga</label>
            <div class="col-9">
                <input class="form-control" name="harga" value="" id="harga" type="text" data-sb-validations="required" />
            </div>
        </div>
        <button class="btn btn-primary" name="proses" value="simpan" id="simpan" type="submit">Simpan</button>
        <a href="{{ url('/transaksi') }}" class="btn btn-info">Batal</a>
    </form>
</div>
@endsection