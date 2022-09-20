
@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
  <div class="col-md-8">
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
  </div> 

  <div class="col-md-8 p-5 shadow p-3 mb-5 bg-white rounded">
    <h2>Role Management</h2>
    <a class="btn btn-success" href="{{ route('roles.create') }}"><i class="bi bi-plus-lg"></i> Create New Role</a>
    <table class="table table-bordered bg-white mt-3">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($roles as $key => $role)    
        <tr>
          <th scope="row">{{ $loop->iteration }}</th>
          <td>{{ $role->name }}</td>
          <td>
            <a href="{{ route('roles.show',$role->id) }}" class="btn btn-info">Show</a>

            @can('role-edit')
            <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
            @endcan

            @can('role-delete')
            <form action="{{ route('roles.destroy', $role->id) }}" class="d-inline" method="POST">
              @csrf
              @method('delete')
              <button type="submit" class="btn btn-danger border-0" onclick="return confirm('Are you sure to delete this role?')">Delete</button>
            </form>
            @endcan
          </td>
        </tr>
      </tr>
      @endforeach
      </tbody>
    </table>
  </div>

</div>

{!! $roles->render() !!}

@endsection 

