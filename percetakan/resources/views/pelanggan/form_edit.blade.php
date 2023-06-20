@extends('admin.index')
@section('content')
    <h1 class="mt-4">Form Update Pelanggan</h1>
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
        <form method="POST" action="{{ route('pelanggan.update', $row->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-floating mb-3">
                <input class="form-control" name="nama" value="{{ $row->nama }}" id="namapelanggan" type="text"
                    placeholder="Nama pelanggan" data-sb-validations="required" />
                <label for="namapelanggan">Nama pelanggan</label>
                <div class="invalid-feedback" data-sb-feedback="namapelanggan:required">Nama pelanggan is required.</div>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" name="alamat" value="{{ $row->alamat }}" id="alamat" type="text"
                    placeholder="alamat" data-sb-validations="required" />
                <label for="alamat">Alamat</label>
                <div class="invalid-feedback" data-sb-feedback="alamat:required">alamat is required.</div>
            </div>

            <div class="form-floating mb-3">
                <input class="form-control" name="no_hp" value="{{ $row->no_hp }}" id="no_hp" type="text"
                    placeholder="No Hp" data-sb-validations="required" />
                <label for="no_hp">No Hp</label>
                <div class="invalid-feedback" data-sb-feedback="no_hp:required">No Hp is required.</div>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" name="email" value="{{ $row->email }}" id="email" type="text"
                    placeholder="email" data-sb-validations="required" />
                <label for="email">Email</label>
                <div class="invalid-feedback" data-sb-feedback="harga:required">Email is required.</div>
            </div>
            <div class="form-floating mb-3">
                <select class="form-select" name="status_member" id="status_member" data-sb-validations="required">
                    <option value="1" {{ $row->status_member ? 'selected' : '' }}>Member</option>
                    <option value="0" {{ !$row->status_member ? 'selected' : '' }}>Bukan Member</option>
                </select>
                <label for="status_member">Status Member</label>
                <div class="invalid-feedback" data-sb-feedback="status_member:required">Status Member is required.</div>
            </div>


            <!-- FOTO -->
            <div class="form-floating mb-3">
                <input class="form-control" name="foto" value="{{ $row->foto }}" id="foto" type="file"
                    placeholder="Foto" data-sb-validations="required" />
                <label for="foto"></label>
                <div class="invalid-feedback" data-sb-feedback="foto:required">Foto is required.</div>
            </div>

            <button class="btn btn-primary" name="proses" value="ubah" id="ubah" type="submit">
                <i class="fas fa-edit"></i> Ubah
            </button>
            <input type="hidden" name="id" value="{{ $row->id }}" />
            <a href="{{ url('/pelanggan') }}" class="btn btn-info">
                <i class="fas fa-times"></i> Batal
            </a>

        </form>
    </div>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
@endsection
