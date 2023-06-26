@extends('admin.index')
@section('content')
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
                                        alt="..." style="height: 100%;">
                                @else
                                    <img src="{{ url('admin/assets/img') }}/{{ $rs->foto }}" class="img-fluid rounded-start"
                                        alt="..." style="height: 100%;">
                                @endempty
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h2 class="card-title">{{ $rs->nama_barang }}</h2>
                                    <table class="table table-hover">
                                        <tr>
                                            <td class="h6">Kode Barang</td>
                                            <td class="h6">:</td>
                                            <td class="h6">{{ $rs->kode }}</td>
                                        </tr>
                                        <tr>
                                            <td class="h6">Harga Barang</td>
                                            <td class="h6">:</td>
                                            <td class="h6">Rp. {{ number_format($rs->harga, 0, ',', '.') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="h6">Harga Member</td>
                                            <td class="h6">:</td>
                                            <td class="h6">Rp. {{ number_format($rs->harga_member, 0, ',', '.') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="h6">Stok Barang</td>
                                            <td class="h6">:</td>
                                            <td class="h6">{{ $rs->stok }}</td>
                                        </tr>
                                        <tr>
                                            <td class="h6">Kategori Barang</td>
                                            <td class="h6">:</td>
                                            <td class="h6">{{ $rs->kategori->nama }}</td>
                                        </tr>
                                    </table>

                                    <div class="d-flex justify-content-end">

                                        <a href="{{ url('/barang') }}" class="btn btn-primary">
                                            <i class="fas fa-arrow-left"></i> Kembali
                                        </a>
                                        &nbsp; &nbsp;
                                        <a href="{{ route('barang.edit', $rs->id) }}" title="Ubah"
                                            class="btn btn-warning">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
