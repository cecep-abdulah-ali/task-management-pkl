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
@can('project-create')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12 bg-body mb-5">
      <a href="{{ route('projects.create') }}" class="btn btn-success"><i class="bi bi-plus-lg"></i> Create Project</a>
    </div>
  </div>
</div>
@endcan
{{-- for staff --}}
@can('project-staff')
<div class="container">
  <h3>My Project :</h3>
  <div class="row">
    @foreach ($for_staff as $data)     
    <div class="col-12 col-md-6 col-lg-4 mb-5">
      <div class="card border-0 shadow-sm">
        <div class="card-body">
          <h4 class="card-title"><b>{{ $data->name }}</b></h4>
          @if ($data->status == "up coming")
          <button href="#" class="badge badge-primary border-0 mb-3">Up Coming</button>
          @elseif($data->status == "in progres")
          <button href="#" class="badge badge-warning border-0 mb-3">In Progres</button>
          @else
          <button href="#" class="badge badge-success border-0 mb-3">Complete</button>
          @endif
          <p class="card-text">{{ $data->excerpt }}</p>
          <p class="fw-bold fs-5">Manager : {{ $data->manager->name }}</p>
          <a href="{{ route('projects.show', $data->id) }}" class="card-link">Details......</a>
        </div>
        <div class="col-4 col-md-6 col-lg-4 d-inline mb-3">
        @can('project-edit')
        <a class="btn btn-primary" href="{{ route('projects.edit', $data->id) }}"><i class="bi bi-pencil-square"></i></a>
        @endcan
        @can('project-delete')
        <form action="{{ route('projects.destroy', $data->id) }}" class="d-inline" method="POST">
          @csrf
          @method('delete')
          <button type="submit" class="btn btn-danger border-0" onclick="return confirm('Are you sure to delete this project?')"><i class="bi bi-trash"></i></button>
        </form>
        @endcan
        <a class="btn btn-info mt-1" href="{{ route('projects.show', $data->id) }}"><i class="bi bi-eye"></i> Task</a>        
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endcan
{{-- end for staff --}}
{{-- for manager --}}
@can('project-manager')
<div class="container">
  <h3>My Project :</h3>
  <div class="row">
    @foreach ($for_manager as $data)     
    <div class="col-12 col-md-6 col-lg-4 mb-5">
      <div class="card border-0 shadow-sm">
        <div class="card-body">
          <h4 class="card-title"><b>{{ $data->name }}</b></h4>
          @if ($data->status == "up coming")
          <button href="#" class="badge badge-primary border-0 mb-3">Up Coming</button>
          @elseif($data->status == "in progres")
          <button href="#" class="badge badge-warning border-0 mb-3">In Progres</button>
          @else
          <button href="#" class="badge badge-success border-0 mb-3">Complete</button>
          @endif
          <p class="card-text">{{ $data->excerpt }}</p>
          <p class="fw-bold fs-5">Manager : {{ $data->manager->name }}</p>
          <a href="{{ route('projects.show', $data->id) }}" class="card-link">Details......</a>
        </div>
        <div class="col-4 col-md-6 col-lg-4 d-inline mb-3">
          @can('project-edit')
          <a class="btn btn-primary" href="{{ route('projects.edit', $data->id) }}"><i class="bi bi-pencil-square"></i></a>
          @endcan
          @can('project-delete')
          <form action="{{ route('projects.destroy', $data->id) }}" class="d-inline" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger border-0" onclick="return confirm('Are you sure to delete this project?')"><i class="bi bi-trash"></i></button>
          </form>
          @endcan
          <a class="btn btn-info mt-1" href="{{ route('projects.show', $data->id) }}"><i class="bi bi-eye"></i> Task</a>        
          </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endcan
{{-- End for manager --}}
{{-- for admin --}}
@can('project-admin')
<div class="container">
  <h3>All Project :</h3>
  <div class="row">
    @foreach ($projects as $data)     
    <div class="col-12 col-md-6 col-lg-4 mb-5">
      <div class="card border-0 shadow-sm">
        <div class="card-body">
          <h4 class="card-title"><b>{{ $data->name }}</b></h4>
          @if ($data->status == "up coming")
          <button href="#" class="badge badge-primary border-0 mb-3">Up Coming</button>
          @elseif($data->status == "in progres")
          <button href="#" class="badge badge-warning border-0 mb-3">In Progres</button>
          @else
          <button href="#" class="badge badge-success border-0 mb-3">Complete</button>
          @endif
          <p class="card-text">{{ $data->excerpt }}</p>
          <p class="fw-bold fs-5">Manager : {{ $data->manager->name }}</p>
          <a href="{{ route('projects.show', $data->id) }}" class="card-link">Details......</a>
        </div>
        <div class="col-4 col-md-6 col-lg-4 d-inline mb-3">
          @can('project-edit')
          <a class="btn btn-primary" href="{{ route('projects.edit', $data->id) }}"><i class="bi bi-pencil-square"></i></a>
          @endcan
          @can('project-delete')
          <form action="{{ route('projects.destroy', $data->id) }}" class="d-inline" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger border-0" onclick="return confirm('Are you sure to delete this project?')"><i class="bi bi-trash"></i></button>
          </form>
          @endcan
          <a class="btn btn-info mt-1" href="{{ route('projects.show', $data->id) }}"><i class="bi bi-eye"></i> Task</a>        
          </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endcan
{{-- End for admin --}}
@endsection
