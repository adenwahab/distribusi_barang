@extends('admin.index')
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="card" style="width: 18rem;">
        @empty($rs->foto)
            <img src="{{ url('assets/img/noimage.jpg') }}" class="card-img-top" alt="...">
        @else
            <img src="{{ url('assets/img') }}/{{ $rs->foto }}" class="card-img-top" alt="...">
        @endempty
        <div class="card-body">
            <h5 class="card-title">{{ $rs->nama_barang }}</h5>
            <p class="card-text">
                Kode Barang: {{ $rs->kode }}
                <br />Harga Barang: Rp. {{ number_format($rs->harga, 0, ',', '.') }}
                <br />Stok Barang: {{ $rs->stok }}
            </p>
            <a href="{{ url('/kategori') }}" class="btn btn-primary">Go Back</a>
        </div>
    </div>
@endsection
