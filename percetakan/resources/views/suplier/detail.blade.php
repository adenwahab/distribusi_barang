@extends('admin.index')
@section('content')
    <div class="row">
        @if ($message = Session::get('success'))
            <div class="col-12">
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>

            </div>
        @endif
        @foreach ($rs as $data)
            <div class="col-md-3 mb-4">
                <div class="card" style="width: 18rem;">
                    @empty($data->foto)
                        <img src="{{ url('admin/assets/img/noimage.jpg') }}" class="card-img-top" alt="...">
                    @else
                        <img src="{{ url('admin/assets/img') }}/{{ $data->foto }}" class="card-img-top" alt="...">
                    @endempty
                    <div class="card-body">
                        <h5 class="card-title">{{ $data->nama }}</h5>
                        <table class="table">
                            <section class="section">
                                <tr>
                                    <td>Nama Suplier</td>
                                    <td>:</td>
                                    <td>{{ $data->nama }}</td>
                                </tr>
                                <tr>
                                    <td>Alamatr</td>
                                    <td>:</td>
                                    <td>{{ $data->alamat }}</td>
                                </tr>
                                <tr>
                                    <td>No HP</td>
                                    <td>:</td>
                                    <td>{{ $data->no_hp }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td>{{ $data->email }}</td>
                                </tr>

                            </section>
                        </table>
                    </div>

                </div>
            </div>
        @endforeach

    </div>
    <a href="{{ url('/suplier') }}" class="btn btn-primary">
        <i class="fas fa-arrow-left"></i> Go Back
    </a>
@endsection
