@extends('admin.index')
@section('content')
<br><br>
<div class="container-fluid px-4">
    <div class="row">
        <div class="card w-100">
            <div class="card-body p-4">
                <h1 class="mt-4">Data User</h1>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
                <br />
                <!-- <a href="{{ route('barang.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> <span style="font-weight: bold;">Tambah</span></a> -->

                <div class="table-responsive">
                    <table class="table text-nowrap mb-0 align-middle">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>No Hp</th>
                                <th>Level</th>
                                <th>Email</th>
                                <th>Alamat</th>
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
                            </tr>
                            @php $no++ @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <a href="{{url('/register')}}"> <button type="button" class="btn btn-success">tambah</button></a>
            </div>
            <br>
        </div>
    </div>
</div>
@endsection