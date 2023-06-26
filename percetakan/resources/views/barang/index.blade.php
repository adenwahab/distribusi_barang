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
            @elseif ($message = Session::get('error'))
            <div class="alert alert-danger" hidden>
                <p id="message">{{ $message }}</p>
                <script>
                    Swal.fire({
                        title: 'Failed',
                        text: $('#message').text(),
                        icon: 'error',
                        confirmButtonText: 'Oke!'
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
                            <th>Kode</th>
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
                            <td>{{ $data->kode }}</td>
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
                                <form id='deleteForm' method="POST" action="{{ route('barang.destroy', $data->id) }}">
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
                                    <button id='delete' class="btn btn-danger" onclick='showConfirmationDialog(event)'>
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
                <!-- </div> -->
            </div>
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