@extends('admin.index')
@section('content')
    <h1 class="mt-4">Pelanggan Detail</h1>
    <div class="card-body p-4">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <section class="section">
            <div class="row">
                <div class="col-lg-9">
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-4">
                                @empty($rs->foto)
                                    <img src="{{ url('admin/assets/img/noimage.jpg') }}" class="img-fluid rounded-start"
                                        alt="...">
                                @else
                                    <img src="{{ url('admin/assets/img') }}/{{ $rs->foto }}" class="img-fluid rounded-start"
                                        alt="...">
                                @endempty
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h2 class="card-title">{{ $rs->nama }}</h2>
                                    <table class="table table-hover">
                                        <tr>
                                            <td class="h6">Alamat</td>
                                            <td class="h6">:</td>
                                            <td class="h6">{{ $rs->alamat }}</td>
                                        </tr>
                                        <tr>
                                            <td class="h6">No Hp</td>
                                            <td class="h6">:</td>
                                            <td class="h6">{{ $rs->no_hp }}</td>
                                        </tr>

                                        <tr>
                                            <td class="h6">Email</td>
                                            <td class="h6">:</td>
                                            <td class="h6">{{ $rs->email }}</td>
                                        </tr>

                                        <tr>
                                            <td class="h6">Status Member</td>
                                            <td class="h6">:</td>
                                            <td class="h6">
                                                @if ($rs->status_member)
                                                    Member
                                                @else
                                                    Bukan Member
                                                @endif
                                            </td>
                                        </tr>


                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <a href="{{ url('/pelanggan') }}" class="btn btn-primary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>

            </div>
        </section>
    </div>
@endsection
