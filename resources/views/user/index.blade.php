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
</div>

<div class="row justify-content-center">
  <div class="col-md-8 bg-white p-5 shadow p-3 mb-5 bg-white rounded">

    <h2>Users Management</h2>
    <a class="btn btn-success mb-3" href="{{ route('users.create') }}"><i class="bi bi-plus-lg"></i> Create New User</a>

    <table class="table table-bordered" >
      <tr>
        <th>No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Roles</th>
        <th width="280px">Action</th>
      </tr>
      @foreach ($data as $key => $user)
       <tr>
         <td>{{ $loop->iteration }}</td>
         <td>{{ $user->name }}</td>
         <td>{{ $user->email }}</td>
         <td>
           @if(!empty($user->getRoleNames()))
           @foreach($user->getRoleNames() as $v)
           <label class="badge badge-success">{{ $v }}</label>
           @endforeach
           @endif           
         </td>
         <td>
            <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
            <form action="{{ route('users.destroy', $user->id) }}" class="d-inline" method="POST">
              @csrf
              @method('delete')
              <button type="submit" class="btn btn-danger border-0" onclick="return confirm('Are you sure to delete this user?')">Delete</button>
            </form>
         </td>
       </tr>
      @endforeach
     </table>
  </div>
</div>

@endsection

