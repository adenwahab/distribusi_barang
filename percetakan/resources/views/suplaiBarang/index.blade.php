@extends('admin.index')
@section('content')
<!-- <div class="container-fluid px-4"> -->
<div class="row">
    <div class="card w-100">
        <div class="card-body p-4">
            <h1 class="mt-4">Daftar Barang Masuk</h1>
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
            <br />
            <a href="{{ route('suplaibarang.create') }}" class="btn btn-primary">Tambah</a>
            <div class="table-responsive">
                <br>
                <table class="table table-hover" id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Barang Masuk</th>
                            <th>Kategori</th>
                            <th>Supplier</th>
                            <th>Jumlah Masuk</th>
                            <th>Tanggal Masuk</th>
                            <th>keterangan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 1;
                        @endphp
                        @foreach ($ar_suplai_barang as $data)
                        <tr>
                            <th>{{ $no }}</th>
                            <td>{{ $data->kode }}</td>
                            <td>{{ $data->barang}}</td>
                            <td>{{ $data->kategori }}</td>
                            <td>{{ $data->suplier }}</td>
                            <td>{{ $data->jumlah }}</td>
                            <td>{{ $data->tgl }}</td>
                            <td>{{$data->keterangan}}</td>
                            <td align="justify">
                                <a class="btn btn-warning" href="{{ route('suplaibarang.edit', $data->id) }}" title="ubah">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <form method="POST" action="{{ route('suplaibarang.destroy', $data->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit" onclick="return confirm('Anda Yakin Data Dihapus?')">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @php $no++ @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
            <a href="{{ url('/suplaibarang-pdf') }}" class="btn btn-primary">Cetak PDF</a>
        </div>
        @endif
        <br />
        <a href="{{ route('suplaibarang.create') }}" class="btn btn-primary col-md-1">Tambah</a>
        <div class="table-responsive">
            <br>
            <table class="table table-hover" id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Barang</th>
                        <th>Barang Masuk</th>
                        <th>Kategori</th>
                        <th>Supplier</th>
                        <th>Jumlah Masuk</th>
                        <th>Tanggal Masuk</th>
                        <th>keterangan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no = 1;
                    @endphp
                    @foreach ($ar_suplai_barang as $data)
                    <tr>
                        <th>{{ $no }}</th>
                        <td>{{ $data->kode }}</td>
                        <td>{{ $data->barang}}</td>
                        <td>{{ $data->kategori }}</td>
                        <td>{{ $data->suplier }}</td>
                        <td>{{ $data->jumlah }}</td>
                        <td>{{ $data->tgl }}</td>
                        <td>{{$data->keterangan}}</td>
                        <td align="justify">
                            <form id='deleteForm' method="POST" action="{{ route('suplaibarang.destroy', $data->id)}}">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-warning" href="{{ route('suplaibarang.edit', $data->id) }}" title="ubah">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <button id='delete' class="btn btn-danger" type="submit" onclick='showConfirmationDialog(event)'>
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>

                    @php $no++ @endphp
                    @endforeach
                </tbody>
            </table>
            <br>
        </div>
        <!-- </div> -->
    </div>
    <!-- </div> -->
</div>

<script>
    function test(e) {
        e = e || window.event;
        console.log(e)
    }

    function showConfirmationDialog(e) {
        e = e || window.event;
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                console.log('afkar ganteng')
                // Trigger the form submission to delete the record
                document.getElementById('deleteForm').submit();
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                // User canceled the action, show a message or redirect as needed
                Swal.fire('Cancelled', 'Your imaginary file is safe :)', 'error');
            }
        });
    }
</script>
@endsection