
@extends('layouts.app')


@section('content')

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
            <h2>Edit New User</h2>
            <a class="btn btn-warning" href="{{ route('users.index') }}"> Back</a>
        </div>
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @method('PATCH')
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input name="name" type="text" class="form-control" id="name" value="{{ $user->name }}" required autofocus>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input name="email" type="email" class="form-control" id="email" value="{{ $user->email }}" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input name="password" type="password" class="form-control" id="password" required>
            </div>
            <div class="mb-3">
                <label for="confirm-password" class="form-label">Confirm Password</label>
                <input name="confirm-password" type="password" class="form-control" id="confirm-password" required>
            </div>
            <div class="mb-3">
                <label for="roles">Select Role</label>
                <select name="roles" class="form-select" id="roles" aria-label="Default select example" required>
                    <option />
                    @foreach ($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                  </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
</div>

@endsection 