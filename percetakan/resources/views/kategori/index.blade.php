@extends('admin.index')
@section('content')
    <div class="container-fluid px-4">
        <div class="row">
            <div class="card w-100">
                <div class="card-body p-4">
                    <h1 class="mt-4">Daftar Kategori</h1>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <br />
                    <a href="{{ route('kategori.create') }}" class="btn btn-primary">Tambah</a>
                    <div class="table-responsive">
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
                                                <a class="btn btn-info" href="{{ route('kategori.show', $data->id) }}"
                                                    title="detail">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a class="btn btn-warning" href="{{ route('kategori.edit', $data->id) }}"
                                                    title="ubah">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <!-- hapus data -->
                                                <button class="btn btn-danger" type="submit" title="Hapus" name="proses"
                                                    value="hapus" onclick="return confirm('Anda Yakin Data Dihapus?')">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                                <input type="hidden" name="idx" value="" />
                                            </form>
                                        </td>
                                    </tr>
                                    @php $no++ @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection