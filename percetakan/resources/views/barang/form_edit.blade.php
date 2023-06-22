@extends('admin.index')
@section('content')
<h1 class="mt-4">Form Update Barang</h1>
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
    <form method="POST" action="{{ route('barang.update', $row->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-floating mb-3">
            <input class="form-control" name="kode" value="{{ $row->kode }}" id="kodebarang" type="text" placeholder="Kode barang" data-sb-validations="required" />
            <label for="kodebarang">Kode barang</label>
            <div class="invalid-feedback" data-sb-feedback="kodebarang:required">Kode barang is required.</div>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" name="nama_barang" value="{{ $row->nama_barang }}" id="barang" type="text" placeholder="barang" data-sb-validations="required" />
            <label for="barang">nama barang</label>
            <div class="invalid-feedback" data-sb-feedback="barang:required">barang is required.</div>
        </div>
        <div class="form-floating mb-3">
            <select class="form-select" name="kategori" aria-label="Kategori barang">
                <option value="">-- Pilih Kategori barang --</option>
                @foreach ($ar_kategori as $k)
                @php
                $sel = $k->id == $row->kategori_id ? 'selected' : ''; @endphp
                <option value="{{ $k->id }}" {{ $sel }}>{{ $k->nama }}</option>
                @endforeach
            </select>
            <label for="kategoribarang">kategori barang</label>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" name="harga" value="{{ $row->harga }}" id="harga" type="text" placeholder="Harga" data-sb-validations="required" />
            <label for="harga">Harga</label>
            <div class="invalid-feedback" data-sb-feedback="harga:required">Harga is required.</div>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" name="harga_member" value="{{ $row->harga_member }}" id="harga_member" type="text" placeholder="Harga_member" />
            <label for="harga_member">Harga Member</label>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" name="stok" value="{{ $row->stok }}" id="stok" type="text" placeholder="Stok" data-sb-validations="required" />
            <label for="stok">Stok</label>
            <div class="invalid-feedback" data-sb-feedback="stok:required">Stok is required.</div>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" name="satuan" value="{{ $row->satuan }}" id="satuan" type="text" placeholder="Satuan" data-sb-validations="required" />
            <label for="satuan">Volume</label>
            <div class="invalid-feedback" data-sb-feedback="satuan:required">Volume is required.</div>
        </div>


        <!-- FOTO -->
        <div class="form-floating mb-3">
            <input class="form-control" name="foto" value="{{ $row->foto }}" id="foto" type="file" placeholder="Foto" data-sb-validations="required" />
            <label for="foto">Foto</label>
            <div class="invalid-feedback" data-sb-feedback="foto:required">Foto is required.</div>
        </div>

        <button class="btn btn-primary" name="proses" value="ubah" id="ubah" type="submit">
            <i class="fas fa-edit"></i> Ubah
        </button>
        <input type="hidden" name="id" value="{{ $row->id }}" />
        <a href="{{ url('/barang') }}" class="btn btn-info">
            <i class="fas fa-times"></i> Batal
        </a>

    </form>
</div>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
@endsection