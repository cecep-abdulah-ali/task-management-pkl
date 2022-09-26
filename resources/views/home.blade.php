@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      @can('home-user')
      <div class="col-md-12 mb-3">
        <div class="card">
          <div class="card-body">
            <h4 class="">Welcome {{ Auth::user()->name }} !! <p class="fst-italic text-danger">Ask admin to change your role!!</p></h4>
          </div>
        </div>
      </div>
      @endcan

      {{-- for staff --}}
      @can('home-staff')
      <div class="col-md-12 mb-3">
        <h4 class="fw-bold">Welcome Back {{ Auth::user()->name }} !!</h4>
      </div>
      <h4>Your Tasks : </h4>
        <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
          @foreach ($tasks as $task)
          <div class="col-md-3">
            <div class="card mb-4 rounded-3 shadow-sm">
              <div class="card-header py-3">
                @if($task->status == "up coming")
                <button class="badge bg-primary my-0 fw-normal border-0">Up coming</button>
                @elseif($task->status == "in progres")
                <button class="badge bg-warning my-0 fw-normal border-0">In progres</button>
                @else
                <button class="badge bg-success my-0 fw-normal border-0">Complete</button>
                @endif
              </div>
              <div class="card-body">
                <h5 class="card-title pricing-card-title">{{ $task->name }}</h5>
                <p>In Project : <strong>{{ $task->project->name }}</strong></p>
                <p>Start Date : <strong>{{ $task->start_date }}</strong></p>
                <p>End Date : <strong>{{ $task->end_date }}</strong> </p>
                <a href="{{ route('projects.show', $task->project->id) }}" class="btn btn-sm btn-outline-primary">Go To Task List</a>
              </div>
            </div>
          </div>
        @endforeach
        </div>
      @endcan
      {{-- end for staff --}}

      {{-- for manager --}}
      @can('home-manager')
      <div class="col-md-12 mb-3">
        <h4 class="fw-bold">Welcome Back {{ Auth::user()->name }} !!</h4>
      </div>
      <h4>Your Project : </h4>
        <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
          @foreach ($projects as $project)
          <div class="col-md-3">
            <div class="card mb-4 rounded-3 shadow-sm">
              <div class="card-header py-3">
                @if($project->status == "up coming")
                <button class="badge bg-primary my-0 fw-normal border-0">Up coming</button>
                @elseif($project->status == "in progres")
                <button class="badge bg-warning my-0 fw-normal border-0">In progres</button>
                @else
                <button class="badge bg-success my-0 fw-normal border-0">Complete</button>
                @endif
              </div>
              <div class="card-body">
                <h5 class="card-title pricing-card-title">{{ $project->name }}</h5>
                <p>Start Date : <strong>{{ $project->start_date }}</strong></p>
                <p>End Date : <strong>{{ $project->end_date }}</strong> </p>
                <a href="{{ route('projects.index') }}" class="btn btn-sm btn-outline-primary">Go To Project List</a>
              </div>
            </div>
          </div>
        @endforeach
        </div>
      @endcan
      {{-- end for manager --}}

      {{-- for admin --}}
      @can('home-admin')
      <div class="col-md-12 mb-3">
        <h4 class="fw-bold">Welcome Back {{ Auth::user()->name }} !!</h4>
      </div>
      <h4>Dashboard</h4>
        <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
          {{-- user --}}
          <div class="col-md-4">
            <div class="card mb-4 rounded-3 shadow-sm">
              <div class="card-header py-3">
                <button class="btn bg-primary my-0 fw-normal border-0 text-light">User</button>
              </div>
              <div class="card-body">
                <h5 class="card-title pricing-card-title"></h5>
                <h1><i class="bi bi-people-fill"></i></h1>
                <h2 class="mb-3"><strong>{{ $user_total }}</strong></h2>
                <a href="{{ route('users.index') }}" class="btn btn-sm btn-outline-primary">Go To User List</a>
              </div>
            </div>
          </div>
          {{-- end user --}}
          {{-- Role --}}
          <div class="col-md-4">
            <div class="card mb-4 rounded-3 shadow-sm">
              <div class="card-header py-3">
                <button class="btn bg-primary my-0 fw-normal border-0 text-light">Role</button>
              </div>
              <div class="card-body">
                <h5 class="card-title pricing-card-title"></h5>
                <h1><i class="bi bi-diagram-3-fill"></i></h1>
                <h2 class="mb-3"><strong>{{ $role_total }}</strong></h2>
                <a href="{{ route('roles.index') }}" class="btn btn-sm btn-outline-primary">Go To Role List</a>
              </div>
            </div>
          </div>
          {{-- end Role --}}
          {{-- Project --}}
          <div class="col-md-4">
            <div class="card mb-4 rounded-3 shadow-sm">
              <div class="card-header py-3">
                <button class="btn bg-primary my-0 fw-normal border-0 text-light">Project</button>
              </div>
              <div class="card-body">
                <h5 class="card-title pricing-card-title"></h5>
                <h1><i class="bi bi-list-task"></i></h1>
                <h2 class="mb-3"><strong>{{ $project_total }}</strong></h2>
                <a href="{{ route('projects.index') }}" class="btn btn-sm btn-outline-primary">Go To Project List</a>
              </div>
            </div>
          </div>
          {{-- end Project --}}
        </div>
        
      @endcan
      {{-- end for admin --}}
    </div>

@endsection
