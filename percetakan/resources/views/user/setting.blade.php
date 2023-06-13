@extends('admin.index')

@section('content')
<div class="container">
    <!-- <div class="row justify-content-center"> -->
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('Account Settings') }}</div>

            <div class="card-body">
                <form method="POST" action="{{ route('user.setting.update') }}">
                    @csrf
                    @method('PUT')

                    <!-- Add your account settings form fields here -->
                    <div class="form-group">
                        <label for="name">{{ __('Name') }}</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', Auth::user()->name) }}" required autocomplete="name" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="no_hp">{{ __('no_hp') }}</label>
                        <input id="no_hp" type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" value="{{ old('no_hp', Auth::user()->no_hp) }}" required autocomplete="no_hp" autofocus>
                        @error('no_hp')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">{{ __('email') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', Auth::user()->email) }}" autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="alamat">{{ __('alamat') }}</label>
                        <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat', Auth::user()->alamat) }}" required autocomplete="alamat" autofocus>
                        @error('alamat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">{{ __('password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- Add more form fields as needed -->

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
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
    <!-- </div> -->
</div>
@endsection