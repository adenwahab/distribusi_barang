@extends('admin.index')

@section('content')
<div class="container">
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
        </div>
    </div>
</div>

@endsection