@extends('admin.index')
@section('content')
    <!-- <div class="container-fluid px-4"> -->
    <div class="row">
        <div class="card w-100">
            <div class="card-body p-4">
                <h1 class="mt-4">Daftar Pelanggan</h1>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <br />
                <a href="{{ route('pelanggan.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> <span
                        style="font-weight: bold;">Tambah</span></a>

                <!-- <div class="table-responsive"> -->
                <table class="table-hover text-nowrap mb-0 align-middle" id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pelanggan</th>
                            <th>Alamat</th>
                            <th>No Handphone</th>
                            <th>Email</th>
                            <th>Status Member</th>
                            <th>Foto</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($ar_pelanggan as $data)
                            @if ($data->status_member)
                                <tr>
                                    <th>{{ $no }}</th>
                                    <td>{{ $data->nama }}</td>
                                    <td>{{ $data->alamat }}</td>
                                    <td>{{ $data->no_hp }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>Member</td>
                                    <td>
                                    @empty($data->foto)
                                        <img src="{{ url('admin/assets/img/noimage.jpg') }}" width="15%"
                                            style="width: 50px;border-radius: 10px;">
                                    @else
                                        <img src="{{ url('admin/assets/img') }}/{{ $data->foto }}" width="15%"
                                            style="width: 50px;border-radius: 10px;">
                                    @endempty
                                </td>
                                <td>
                                    <form method="POST" action="{{ route('pelanggan.destroy', $data->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <a class="btn btn-info btn-sm" href="{{ route('pelanggan.show', $data->id) }}"
                                            title="Detail">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a class="btn btn-warning btn-sm"
                                            href="{{ route('pelanggan.edit', $data->id) }}" title="Ubah">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        @if (Auth::user()->level == 'admin')
                                            <!-- hapus data -->
                                            <button class="btn btn-danger btn-sm delete-confirm" type="submit"
                                                title="Hapus" name="proses" value="hapus"
                                                onclick="return confirm('Anda Yakin Data Dihapus?')">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        @endif
                                        <input type="hidden" name="idx" value="" />
                                    </form>
                                </td>
                            </tr>
                            @php $no++ @endphp
                        @endif
                    @endforeach

                </tbody>
            </table>
            <!-- </div> -->
        </div>
    </div>
</div>
<!-- </div> -->
@endsection
