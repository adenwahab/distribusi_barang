@extends('admin.index')
@section('content')
    <h3>Form Kategori</h3>
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
        <form method="POST" action="{{ route('kategori.store') }}" id="contactForm" data-sb-form-api-token="API_TOKEN">
            @csrf
            <div class="form-floating mb-3">
                <input class="form-control" name="nama" value="" id="kategori" type="text" placeholder="kategori"
                    data-sb-validations="required" />
                <label for="kategori">kategori</label>
                <div class="invalid-feedback" data-sb-feedback="kategori:required">kategori is required.</div>
            </div>

            <button class="btn btn-primary" name="proses" value="simpan" id="simpan" type="submit">Simpan</button>
            <a href="{{ url('/kategori') }}" class="btn btn-info">Batal</a>

        </form>
    </div>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
@endsection
