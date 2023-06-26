@extends('admin.index')

@section('content')
<div class="container">
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
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit level for') }} {{ $row->name }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('updatelevel.update', $row->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="level">Member Level</label>
                            <select id="level" name="level" class="form-control">
                                <option value="admin" {{ $row->level === 'admin' ? 'selected' : '' }}>admin</option>
                                <option value="manajer" {{ $row->level === 'manajer' ? 'selected' : '' }}>manajer</option>
                                <option value="kasir" {{ $row->level === 'kasir' ? 'selected' : '' }}>kasir</option>
                            </select>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Update Level</button>
                    </form>
                </div>
            </div>
            <script>

            </script>
        </div>
    </div>
</div>

@endsection