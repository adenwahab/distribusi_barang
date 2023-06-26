@extends('admin.index')
@section('content')
<h3>Form Suplier</h3>
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
    <form method="POST" action="{{ route('suplier.store') }}" id="contactForm" data-sb-form-api-token="API_TOKEN">
        @csrf
        <div class="form-floating mb-3">
            <input class="form-control" name="nama" value="" id="suplier" type="text" placeholder="suplier" data-sb-validations="required" />
            <label for="suplier">suplier</label>
            <div class="invalid-feedback" data-sb-feedback="suplier:required">suplier is required.</div>
        </div>

        <div class="form-floating mb-3">
            <input class="form-control" name="alamat" value="" id="alamat" type="text" placeholder="alamat" data-sb-validations="required" />
            <label for="alamat">alamat</label>
            <div class="invalid-feedback" data-sb-feedback="alamat:required">alamat is required.</div>
        </div>

        <div class="form-floating mb-3">
            <input class="form-control" name="no_hp" value="" id="no_hp" type="text" placeholder="no_hp" data-sb-validations="required" />
            <label for="no_hp">no_hp</label>
            <div class="invalid-feedback" data-sb-feedback="no_hp:required">no_hp is required.</div>
        </div>

        <div class="form-floating mb-3">
            <input class="form-control" name="email" value="" id="email" type="text" placeholder="email" data-sb-validations="required" />
            <label for="email">email</label>
            <div class="invalid-feedback" data-sb-feedback="email:required">email is required.</div>
        </div>

        <button class="btn btn-primary" name="proses" value="simpan" id="simpan" type="submit">Simpan</button>
        <a href="{{ url('/suplier') }}" class="btn btn-info">Batal</a>

    </form>
</div>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
@endsection