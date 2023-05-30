@extends('admin.index')
@section('content')
<h3>Daftar Barang</h3>
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<br />
<a href="{{ route('barang.create') }}" class="btn btn-primary">Tambah</a>
<table class="table table-hover datatable">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Satuan</th>
            <th>Harga</th>
            <th>Kategori</th>
            <th>Foto</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @php
        $no = 1;
        @endphp
        @foreach ($ar_barang as $data)
        <tr>
            <th>{{ $no }}</th>
            <td>{{ $data->nama_barang }}</td>
            <td>{{ $data->satuan }}</td>
            <td>Rp. {{ number_format($data->harga, 0, ',', '.') }}</td>
            <td>{{ $data->kategori }}</td>
            <td>
                @empty($data->foto)
                <img src="{{ url('assets/img/noimage.jpg') }}" width="15%" style="width: 50px;border-radius: 10px;">
                @else
                <img src="{{ url('assets/img') }}/{{ $data->foto }}" width="15%" style="width: 50px;border-radius: 10px;">
                @endempty
            </td>
            <td>
                <form method="POST" action="{{ route('barang.destroy', $data->id) }}">
                    @csrf
                    @method('DELETE')
                    <a class="btn btn-info" href="{{ route('barang.show', $data->id) }}" title="detail">
                        <i class="bi bi-eye-fill"></i>
                    </a>
                    <a class="btn btn-warning" href="{{ route('barang.edit', $data->id) }}" title="ubah">
                        <i class="bi bi-pencil-fill"></i>
                    </a>
                    <!-- hapus data -->
                    <button class="btn btn-danger" type="submit" title="Hapus" name="proses" value="hapus" onclick="return confirm('Anda Yakin Data Dihapus?')">
                        <i class="bi bi-trash-fill"></i>
                    </button>
                    <input type="hidden" name="idx" value="" />
                </form>
            </td>
        </tr>
        @php $no++ @endphp
        @endforeach
    </tbody>
</table>
@endsection