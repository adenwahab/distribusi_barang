@extends('admin.index')
@section('content')
<!-- <div class="container-fluid px-4"> -->
<div class="row">
    <div class="card w-100">
        <div class="card-body p-4">
            <h1 class="mt-4">Data Member</h1>
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
            <br />

            <!-- <div class="table-responsive"> -->
            <table class="table-hover text-nowrap mb-1 align-middle" id="datatablesSimple">
                <thead>
                    <tr color="blue">
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No Handphone</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no = 1;
                    @endphp
                    @foreach ($ar_member as $data)
                    @if ($data->status_member)
                    <tr>
                        <th>{{ $no }}</th>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->alamat }}</td>
                        <td>{{ $data->no_hp }}</td>
                        <td>{{ $data->email }}</td>
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