@extends('admin.index')
@section('content')
<br><br>
<!-- <div class="container-fluid px-4"> -->
<div class="row">
    <div class="card w-100">
        <div class="card-body">
            <h1 class="mt-4">Data User</h1>
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
            <div class="table-responsive">
                <table class="table text-nowrap mb-0 align-middle" id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>No Hp</th>
                            <th>Level</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 1;
                        @endphp
                        @foreach($data as $data)
                        <tr>
                            <th>{{ $no }}</th>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->no_hp }}</td>
                            <td>{{ $data->level }}</td>
                            <td>{{ $data->email }}</td>
                            <td>{{ $data->alamat }}</td>
                            <td>
                                <form id='deleteForm' method="POST" action="{{ route('user.destroy', $data->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    @if(Auth::user()->level == 'admin')
                                    <a class="btn btn-warning btn-sm" href="{{ route('updatelevel.edit', $data->id) }}" title="Ubah">
                                        Ubah Level
                                    </a>
                                    @endif
                                    <button class="btn btn-danger btn-sm" onclick="showConfirmationDialog(event)">
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
        </div>
        <div class="row">
            <div class="col-md-4 .offsife-md-2">
                <a href="{{url('/register')}}"> <button type="button" class="btn btn-success">Daftarkan akun</button></a>
            </div>
        </div>
        <br>
    </div>
</div>
<!-- </div> -->
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
                Swal.fire('Cancelled', 'The Account delete is cancelled', 'error');
            }
        });
    }
</script>
@endsection