
@extends('layouts.app')


@section('content')

<div class="row justify-content-center">
    <div class="col-md-8 shadow p-3 mb-5 bg-white rounded">
        <h2> Show User</h2>
        <div class="card">
            <div class="card-body">
              <h5 class="card-title fn-md">User Profile</h5>
              <p class="card-text">Name : {{ $user->name }}</p>
              <p class="card-text">Email : {{ $user->email }}</p>
              <p class="card-text">Role : 
                @if(!empty($user->getRoleNames()))
                @foreach($user->getRoleNames() as $v)
                    <label class="badge badge-success">{{ $v }}</label>
                @endforeach
            @endif
              </p>

              <a href="{{ route('users.index') }}" class="btn btn-primary">Close</a>
            </div>
        </div>
    </div>
</div>

@endsection 