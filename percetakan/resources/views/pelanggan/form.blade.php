@extends('admin.index')
@section('content')
    <h3>Form Pelanggan</h3>
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
        <!-- <div class="container px-5 my-5"> -->
        <form method="POST" action="{{ route('pelanggan.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-floating mb-3">
                <input class="form-control" name="nama" value="" id="nama" type="text"
                    placeholder="nama pelanggan" data-sb-validations="required" />
                <label for="namapelanggan">Nama pelanggan</label>
                <div class="invalid-feedback" data-sb-feedback="namapelanggan:required">Nama pelanggan is required.</div>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" name="alamat" value="" id="alamatpelanggan" type="text"
                    placeholder="alamat pelanggan" data-sb-validations="required" />
                <label for="alamatpelanggan">alamat pelanggan</label>
                <div class="invalid-feedback" data-sb-feedback="alamatpelanggan:required">Alamat pelanggan is required.
                </div>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" name="no_hp" value="" id="no_hp" type="text" placeholder="no_hp"
                    data-sb-validations="required" />
                <label for="no_hp">No_Hp</label>
                <div class="invalid-feedback" data-sb-feedback="no_hp:required">no_hp is required.</div>
            </div>

            <div class="form-floating mb-3">
                <input class="form-control" name="email" value="" id="email" type="text" placeholder="Email"
                    data-sb-validations="required" />
                <label for="email">Email</label>
                <div class="invalid-feedback" data-sb-feedback="email:required">Email is required.</div>
            </div>

            <div class="form-floating mb-3">
                <select class="form-select" name="status_member" id="status_member" data-sb-validations="required">
                    <option value="">Pilih Status Member</option>
                    <option value="1">Member</option>
                    <option value="0">Bukan Member</option>
                </select>
                <label for="status_member">Status Member</label>
                <div class="invalid-feedback" data-sb-feedback="status_member:required">Status Member is required.</div>
            </div>

            <!-- UPLOAD FOTO -->
            <div class="form-floating mb-3">
                <input class="form-control" name="foto" value="" id="foto" type="file" placeholder="Foto"
                    data-sb-validations="required" />
                <label for="foto"></label>
                <div class="invalid-feedback" data-sb-feedback="foto:required">Foto is required.</div>
            </div>
            <button class="btn btn-primary" name="proses" value="simpan" id="simpan" type="submit">Simpan</button>
            <a href="{{ url('/pelanggan') }}" class="btn btn-info">Batal</a>

        </form>
    </div>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
@endsection
