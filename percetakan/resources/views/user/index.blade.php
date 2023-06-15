@extends('admin.index')
@section('content')
<br><br>
<div class="container-fluid px-4">
    <div class="row">
        <div class="card w-100">
            <div class="card-body p-4">
                <h1 class="mt-4">Data User</h1>
                <!-- Place this code within your view file -->
                @if(Session::has('success'))
                <script>
                    $(document).ready(function() {
                        alert("{{ Session::get('success') }}");
                    });
                </script>
                @endif

                @if(Session::has('error'))
                <script>
                    $(document).ready(function() {
                        alert("{{ Session::get('error') }}");
                    });
                </script>
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
                                    <form method="POST" action="{{ route('user.destroy', $data->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        @if(Auth::user()->level == 'admin')
                                        <a class="btn btn-warning btn-sm" href="{{ route('updatelevel.edit', $data->id) }}" title="Ubah">
                                            Ubah Level
                                        </a>
                                        @endif
                                        <button class="btn btn-danger btn-sm delete-confirm" type="submit" title="Hapus" name="proses" value="hapus" onclick="return confirm('Anda Yakin Data Dihapus?')">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                        @if(session('success'))
                                        <script>
                                            window.onload = function() {
                                                alert("{{ session('success') }}");
                                            };
                                        </script>
                                        @endif

                                        @if(session('error'))
                                        <script>
                                            window.onload = function() {
                                                alert("{{ session('error') }}");
                                            };
                                        </script>
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
            <div class="row">
                <div class="col-md-4 .offsife-md-2">
                    <a href="{{url('/register')}}"> <button type="button" class="btn btn-success">Daftarkan akun</button></a>
                </div>
            </div>
            <br>
        </div>
    </div>
</div>
@endsection