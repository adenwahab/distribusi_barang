@extends('admin.index')
@section('content')
    <!-- <div class="container-fluid px-4"> -->
    <div class="row">
        <div class="card w-100">
            <div class="card-body p-4">
                <h1 class="mt-4">Daftar Barang Masuk</h1>
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
                                @if (Auth::user()->level !== 'kasir')
                                    <th>Action</th>
                                @endif
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
                                    <td>{{ $data->barang }}</td>
                                    <td>{{ $data->kategori }}</td>
                                    <td>{{ $data->suplier }}</td>
                                    <td>{{ $data->jumlah }}</td>
                                    <td>{{ $data->tgl }}</td>
                                    <td>{{ $data->keterangan }}</td>
                                    <td align="justify">
                                        <form id='deleteForm' method="POST"
                                            action="{{ route('suplaibarang.destroy', $data->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            @if (Auth::user()->level != 'kasir')
                                                <a class="btn btn-warning btn-sm"
                                                    href="{{ route('suplaibarang.edit', $data->id) }}" title="ubah">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                            @endif
                                            @if (Auth::user()->level == 'admin')
                                                <button id='delete' class="btn btn-danger btn-sm"
                                                    onclick='showConfirmationDialog(event)'>
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            @endif
                                        </form>
                                    </td>
                                </tr>

                                @php $no++ @endphp
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{ url('/suplaibarang-pdf') }}" class="btn btn-primary">Cetak PDF</a>
                </div>
                <br>
                <!-- </div> -->
            </div>
        </div>
    </div>
    <script>
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
