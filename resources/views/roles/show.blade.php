
@extends('layouts.app')


@section('content')

<div class="row justify-content-center">
    <div class="col-md-8 shadow p-3 mb-5 bg-white rounded">
        <h2>Role Detail</h2>
        <div class="card">
            <div class="card-body">
              <h5 class="card-text">Role Name: <b>{{ $role->name }}</b></h5>
              <h5 class="card-text">Permission : 
                <ul>
                    @if(!empty($rolePermissions))
                    @foreach($rolePermissions as $v)
                        <li><label class="label label-success">{{ $v->name }}</label></li>
                    @endforeach
                    @endif
                </ul>
              </h5>

              <a href="{{ route('roles.index') }}" class="btn btn-primary">Close</a>
            </div>
        </div>
    </div>
</div>

@endsection 