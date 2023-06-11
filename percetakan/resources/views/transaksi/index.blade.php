@extends('admin.index')
@section('content')
    <div class="container-fluid px-4">
        <div class="row">
            <div class="card w-100">
                <div class="card-body p-4">
                    <h1 class="mt-4">Daftar Transaksi</h1>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <br />
                    <a href="{{ route('transaksi.create') }}" class="btn btn-primary">Tambah</a>
                    <div class="table-responsive">
                        <table class="table table-hover datatable">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Barang</th>
                                <th>ID Barang</th>
                                <th>ID Pelanggan</th>
                                <th>Tanggal</th>
                                <th>Jumlah</th>
                                <th>Keterangan</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                 @php
                                 $no = 1;
                                 @endphp
                                 @foreach ($ar_transaksi as $trs )
                                 <tr>
                                 <th>{{ $no }}</th>
                                    <td>{{ $trs->kode }}</td>
                                    <td>{{ $trs->barang_id }}</td>
                                    <td>{{ $trs->pelanggan_id }}</td>
                                    <td>{{ $trs->tgl }}</td>
                                    <td>{{ $trs->jumlah }}</td>
                                    <td>{{ $trs->keterangan }}</td>
                                    <td>
                                        <form method="POST" action="{{ route('transaksi.destroy', $trs->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <a class="btn btn-warning" href="{{ route('transaksi.edit', $trs->id) }}"
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
                    <a href="{{ url('/transaksi-pdf') }}" class="btn btn-primary">Cetak PDF</a>
                    <a href="{{ url('/transaksi-excel') }}" class="btn btn-primary">Cetak Excel</a>
                </div>
            </div>
        </div>
    </div>
@endsection
