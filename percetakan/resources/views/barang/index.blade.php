@extends('admin.index')
@section('content')
<!-- <div class="container-fluid px-4"> -->
<div class="row">
    <div class="card w-100">
        <div class="card-body p-4">
            <h1 class="mt-4">Daftar Barang</h1>
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
            @endif
            <br />
            <a href="{{ route('barang.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> <span style="font-weight: bold;">Tambah</span></a>
            <div class="table-responsive">
                <br>

                <!-- <div class="table-responsive"> -->
                <table class="table-hover text-nowrap mb-0 align-middle" id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Volume</th>
                            <th>Harga</th>
                            <th>Harga Member</th>
                            <th>Kategori</th>
                            <th>Stok</th>
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
                            <td>Rp. {{ number_format($data->harga_member, 0, ',', '.') }}</td>
                            <td>{{ $data->kategori }}</td>
                            <td>{{ $data->stok }}</td>
                            <td>
                                @empty($data->foto)
                                <img src="{{ url('admin/assets/img/noimage.jpg') }}" width="15%" style="width: 50px;border-radius: 10px;">
                                @else
                                <img src="{{ url('admin/assets/img') }}/{{ $data->foto }}" width="15%" style="width: 50px;border-radius: 10px;">
                                @endempty
                            </td>
                            <td>
                                <form method="POST" action="{{ route('barang.destroy', $data->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-info btn-sm" href="{{ route('barang.show', $data->id) }}" title="Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a class="btn btn-warning btn-sm" href="{{ route('barang.edit', $data->id) }}" title="Ubah">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @if (Auth::user()->level == 'admin')
                                    <!-- hapus data -->
                                    <button class="btn btn-danger btn-sm delete-confirm" type="submit" title="Hapus" name="proses" value="hapus" onclick="return confirm('Anda Yakin Data Dihapus?')">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                    @endif
                                    <input type="hidden" name="idx" value="" />
                                </form>
                            </td>
                        </tr>
                        @php $no++ @endphp
                        @endforeach
                    </tbody>
                </table>
                <!-- </div> -->
            </div>
        </div>
    </div>
    <!-- </div> -->
    @endsection