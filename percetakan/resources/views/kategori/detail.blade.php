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
    <h1 class="mt-4">Daftar Kategori</h1>
    @foreach ($rs as $data)
    <div class="col-md-3 mb-4">
        <a href="{{ route('barang.show', $data->id) }}" style="color: black; text-decoration:none;">
            <div class="card" style="width: 18rem;">
                @empty($data->foto)
                <img src="{{ url('admin/assets/img/noimage.jpg') }}" class="card-img-top" alt="...">
                @else
                <img src="{{ url('admin/assets/img') }}/{{ $data->foto }}" class="card-img-top" alt="...">
                @endempty
                <div class="card-body">
                    <h5 class="card-title">{{ $data->nama_barang }}</h5>
                    <table class="table">
                        <section class="section">
                            <tr>
                                <td>Kode Barang</td>
                                <td>:</td>
                                <td>{{ $data->kode }}</td>
                            </tr>
                            <tr>
                                <td>Harga Barang</td>
                                <td>:</td>
                                <td>Rp. {{ number_format($data->harga, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td>Stok Barang</td>
                                <td>:</td>
                                <td>{{ $data->stok }}</td>
                            </tr>
                        </section>
                    </table>
                </div>

            </div>
        </a>
    </div>
    @endforeach

</div>
<a href="{{ url('/barang') }}" class="btn btn-primary">
    <i class="fas fa-arrow-left"></i> Go Back
</a>
@endsection