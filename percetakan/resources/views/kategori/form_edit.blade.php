@extends('admin.index')
@section('content')
    <h3>Form Update Kategori</h3>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container px-5 my-5">
        <form method="POST" action="{{ route('kategori.update', $row->id) }}" id="contactForm"
            data-sb-form-api-token="API_TOKEN">
            @csrf
            @method('PUT')
            <div class="form-floating mb-3">
                <input class="form-control" name="nama" value="{{ $row->nama }}" id="kategori" type="text"
                    placeholder="kategori" data-sb-validations="required" />
                <label for="kategori">nama kategori</label>
                <div class="invalid-feedback" data-sb-feedback="kategori:required">kategori is required.</div>
            </div>

            <button class="btn btn-primary" name="proses" value="ubah" id="ubah" type="submit">
                <i class="fas fa-edit"></i> Ubah
            </button>
            <a href="{{ url('/kategori') }}" class="btn btn-info">
                <i class="fas fa-times"></i> Batal
            </a>

        </form>
    </div>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
@endsection
