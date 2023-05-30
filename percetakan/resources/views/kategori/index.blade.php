@extends('admin.index')
@section('content')
    <h3>Daftar Barang</h3>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <br />
    <a href="{{ route('kategori.create') }}" class="btn btn-primary">Tambah</a>
    <table class="table table-hover datatable">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($ar_kategori as $data)
                <tr>
                    <th>{{ $no }}</th>
                    <td>{{ $data->nama }}</td>
                    <td>
                        <form method="POST" action="{{ route('kategori.destroy', $data->id) }}">
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-info" href="{{ route('kategori.show', $data->id) }}" title="detail">
                                <i class="bi bi-eye-fill"></i>
                            </a>
                            <a class="btn btn-warning" href="{{ route('kategori.edit', $data->id) }}" title="ubah">
                                <i class="bi bi-pencil-fill"></i>
                            </a>
                            <!-- hapus data -->
                            <button class="btn btn-danger" type="submit" title="Hapus" name="proses" value="hapus"
                                onclick="return confirm('Anda Yakin Data Dihapus?')">
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
