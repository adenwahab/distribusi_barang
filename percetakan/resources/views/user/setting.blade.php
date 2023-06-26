@extends('admin.index')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Account Settings') }}</div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success" hidden>
                    <p id="message">{{ $message }}</p>
                    <script>
                        Swal.fire({
                            title: 'Success',
                            text: $('#message').text(),
                            icon: 'Success',
                            confirmButtonText: 'Cool'
                        })
                    </script>
                </div>
                @elseif ($message = Session::get('error'))
                <div class="alert alert-danger" hidden>
                    <p id="message">{{ $message }}</p>
                    <script>
                        Swal.fire({
                            title: 'Error',
                            text: $('#message').text(),
                            icon: 'Error',
                            confirmButtonText: 'Cool'
                        })
                    </script>
                </div>
                @endif
                <div class="card-body">
                    <form method="POST" action="{{ route('user.setting.update') }}">
                        @csrf
                        @method('PUT')

                        <!-- Add your account settings form fields here -->
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>

                            <div class="col-md-7">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', Auth::user()->name) }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="no_hp" class="col-md-4 col-form-label text-md-right">{{ __('No hp') }}</label>

                            <div class="col-md-7">
                                <input id="no_hp" type="number" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" value="{{ old('name', Auth::user()->no_hp) }}" required autocomplete="no_hp" autofocus>

                                @error('no_hp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-md-7">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('name', Auth::user()->email) }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="alamat" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>

                            <div class="col-md-7">
                                <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('name', Auth::user()->alamat) }}" required autocomplete="alamat" autofocus>

                                @error('alamat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <br><br><br>
                        <div class="form-group row">
                            <label for="current-password" class="col-md-4 col-form-label text-md-right">{{ __('Masukkan password saat ini') }}</label>

                            <div class="col-md-7">
                                <input id="current-password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" required>

                                @error('current_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <br>
                        <div class="form-group row mb-0">
                            <div class="col-md-4 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update Settings') }}
                                </button>
                                @if(Session::has('success'))
                                <script>
                                    $(document).ready(function() {
                                        alert("{{ Session::get('success') }}");
                                    });
                                </script>
                                @endif

                                @if(Session::has('error'))
                                <script>
                                    $(document).ready(function() {
                                        alert("{{ Session::get('error') }}");
                                    });
                                </script>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection