
@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-8">
        @if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-md-8 bg-white p-5">

        <h2>Create New Role</h2>
        <a class="btn btn-warning mt-3" href="{{ route('roles.index') }}"> Back</a>

        <form action="{{ route('roles.store') }}" method="POST" class="mt-5">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Role Name : </label>
                <input name="name" type="text" class="form-control" id="name" required>
            </div>
            <div class="mb-3">
                <label for="permissiom">Select Permission : </label>
                <select name="permission[]" multiple="" class="label ui selection fluid dropdown" placeholder="Select Permission">
                    <option />
                    @foreach ($permission as $data)
                    <option value="{{ $data->id }}">{{ $data->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
</div>
@endsection 