@extends('admin.index')
@section('content')
<!-- <div class="container-fluid px-4"> -->
<div class="row">
    <div class="card w-100">
        <div class="card-body p-4">
            <h1 class="mt-4">Data Suplier</h1>
            @if ($message = Session::get('success'))
            <div class="alert alert-success" hidden>
                <p id='message'>{{ $message }}</p>
                <script>
                    Swal.fire({
                        title: 'Success',
                        text: $('#message').text(),
                        icon: 'Success',
                        confirmButtonText: 'Oke!'
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
            <a href="{{ route('suplier.create') }}" class="btn btn-primary">Tambah</a>
            <div class="table-responsive">
                <br>
                <table class="table table-hover" id="datatablesSimple">
                    <thead align="center">
                        <tr>
                            <th>No</th>
                            <th>Nama Suplier</th>
                            <th>Alamat</th>
                            <th>No Handphone</th>
                            <th>Email</th>
                            <th>Action</th>
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
                                <form id='deleteForm' method="POST" action="{{ route('suplier.destroy', $data->id) }}">
                                    @csrf
                                    @method('DELETE')

                                    @if(Auth::user()->level != 'kasir')
                                    <a class="btn btn-warning" href="{{ route('suplier.edit', $data->id) }}" title="ubah">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    @endif
                                    <!-- hapus data -->
                                    @if(Auth::user()->level == 'admin')
                                    <button class="btn btn-danger" onclick="showConfirmationDialog(event)">
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
            </div>
        </div>
    </div>
    <!-- </div> -->
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