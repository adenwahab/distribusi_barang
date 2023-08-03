@extends('admin.index')
@section('content')
    <!-- <div class="container-fluid px-4"> -->
    <div class="row">
        <div class="card w-100">
            <div class="card-body p-4">
                <h1 class="mt-4">Data Suplier</h1>
                @if ($message = Session::get('success'))
                    <!-- ... kode yang sama ... -->
                @elseif ($message = Session::get('error'))
                    <!-- ... kode yang sama ... -->
                @endif
                <br />
                @if (Auth::user()->level !== 'kasir')
                    <a href="{{ route('suplier.create') }}" class="btn btn-primary">Tambah</a>
                @endif
                <div class="table-responsive">
                    <br>
                    @if (Auth::user()->level !== 'kasir')
                        <table class="table table-hover" id="datatablesSimple">
                            <thead align="center">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Suplier</th>
                                    <th>Alamat</th>
                                    <th>No Handphone</th>
                                    <th>Email</th>
                                    @if (Auth::user()->level !== 'kasir')
                                        <th>Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($ar_suplier as $data)
                                    <tr>
                                        <th>{{ $no }}</th>
                                        <td>{{ $data->nama }}</td>
                                        <td>{{ $data->alamat }}</td>
                                        <td>{{ $data->no_hp }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td align="justify">
                                            <form id='deleteForm' method="POST"
                                                action="{{ route('suplier.destroy', $data->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                @if (Auth::user()->level != 'kasir')
                                                    <a class="btn btn-warning" href="{{ route('suplier.edit', $data->id) }}"
                                                        title="ubah">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <!-- hapus data -->
                                                    @if (Auth::user()->level == 'admin')
                                                        <button class="btn btn-danger"
                                                            onclick="showConfirmationDialog(event)">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    @endif
                                                @endif
                                            </form>
                                        </td>
                                    </tr>
                                    @php $no++ @endphp
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <table class="table table-hover" id="datatablesSimple">
                            <thead align="center">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Suplier</th>
                                    <th>Alamat</th>
                                    <th>No Handphone</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($ar_suplier as $data)
                                    <tr>
                                        <th>{{ $no }}</th>
                                        <td>{{ $data->nama }}</td>
                                        <td>{{ $data->alamat }}</td>
                                        <td>{{ $data->no_hp }}</td>
                                        <td>{{ $data->email }}</td>
                                    </tr>
                                    @php $no++ @endphp
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
        <!-- </div> -->
    </div>
    <script>
        // ... kode javascript yang sama ...
    </script>
@endsection
