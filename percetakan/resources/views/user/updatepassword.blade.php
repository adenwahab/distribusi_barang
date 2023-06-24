@extends('admin.index')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-5">
                <div class="card-header">{{ __('Password Setting') }}</div>
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
                @endif
                <div class="card-body">
                    <form method="POST" action="{{ route('user.settingpassword.update') }}">
                        @csrf
                        @method('PUT')

                        <!-- Add your account settings form fields here -->

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
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>

                            <div class="col-md-7">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm New Password') }}</label>

                            <div class="col-md-7">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
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