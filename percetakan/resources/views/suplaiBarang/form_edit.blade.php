@extends('admin.index')
@section('content')
<h3>Ubah data Barang Masuk</h3>
@if ($message = Session::get('success'))
<div class="alert alert-success" hidden>
    <p id="message">{{ $message }}</p>
    <script>
        Swal.fire({
            title: 'Success',
            text: $('#message').text(),
            icon: 'Success',
            confirmButtonText: 'Cool'
        })
    </script>
</div>
@elseif ($message = Session::get('error'))
<div class="alert alert-danger" hidden>
    <p id="message">{{ $message }}</p>
    <script>
        Swal.fire({
            title: 'Error',
            text: $('#message').text(),
            icon: 'Error',
            confirmButtonText: 'Cool'
        })
    </script>
</div>
@endif
<div class="container px-5 my-5">
    <form method="POST" action="{{route('suplaibarang.update', $row->id)}}" id="contactForm" data-sb-form-api-token="API_TOKEN">
        @csrf
        @method('PUT')
        <div class="form-group from-floating mb-3">
            <label for="barang">Nama barang</label>
            <select id="barang" name="barang" class="form-control" value="{{old('barang')}}">
                @foreach ($ar_barang as $barang)
                <option value="{{ $barang->id }}" {{ $barang->id == $row->barang_id ? 'selected' : '' }}>
                    {{ $barang->kode }} - {{ $barang->nama_barang }}
                </option>
                @endforeach
            </select>
        </div>


        <div class="form-group from-floating mb-3">
            <label for="suplier">Nama suplier</label>
            <select id="suplier" name="suplier" class="form-control" value="">
                @foreach ($ar_suplier as $supplier)
                <option value="{{ $supplier->id }}" {{ $supplier->id == $row->id ? 'selected' : '' }}>
                    {{ $supplier->nama }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="form-floating mb-3">
            <input class="form-control" name="jumlah" value="{{$row->jumlah}}" id="jumlah" type="text" placeholder="jumlah" data-sb-validations="required" />
            <label for="jumlah">Jumlah Masuk</label>
            <div class="invalid-feedback" data-sb-feedback="jumlah:required">jumlah is required.</div>
        </div>

        <div class="form-floating mb-3">
            <input class="form-control" name="date" value="{{$row->tgl}}" id="date" type="text" placeholder="date" data-sb-validations="required" />
            <label for="date">date</label>
            <div class="invalid-feedback" data-sb-feedback="date:required">date is required.</div>
        </div>

        <div class="form-floating mb-3">
            <input class="form-control" name="keterangan" value="{{$row->keterangan}}" id="keterangan" type="text" placeholder="keterangan" data-sb-validations="required" />
            <label for="keterangan">keterangan</label>
            <div class="invalid-feedback" data-sb-feedback="keterangan:required">keterangan is required.</div>
        </div>

        <button class="btn btn-primary" name="proses" value="ubah" id="ubah" type="submit">
            <i class="fas fa-edit"></i> Ubah
        </button>
        <a href="{{ url('/suplaibarang') }}" class="btn btn-info">
            <i class="fas fa-times"></i> Batal
        </a>

    </form>
</div>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
@endsection