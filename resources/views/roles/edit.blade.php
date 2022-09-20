
@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        
       
    </div>
</div>


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
<div class="row justify-content-center">
    <div class="col-md-8 bg-white p-5 shadow p-3 mb-5 bg-white rounded">
        <div class="mb-5">
            <h2>Role Edit</h2>
            <a class="btn btn-warning" href="{{ route('roles.index') }}"> Back</a>
        </div>
        <form action="{{ route('roles.update', $role->id) }}" method="POST">
            @method('PATCH')
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Role Name</label>
                <input name="name" type="text" class="form-control" id="name" value="{{ $role->name }}">
              </div>
            <div class="mb-3">
                <label for="permissiom">Permission List </label>
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

