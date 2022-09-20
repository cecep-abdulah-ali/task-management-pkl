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

    <h2>Project Management</h2>
    <a class="btn btn-success mb-3" href="{{ route('projects.create') }}"><i class="bi bi-plus-lg"></i> Create New Project</a>

    <table class="table table-bordered" >
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Project Manager</th>
        <th>Status</th>
        <th width="280px">Action</th>
      </tr>
      @foreach ($projects as $data)
       <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $data->name }}</td>
        <td>{{ $data->manager->name }}</td>
        <td>
          @if ($data->status == "up coming")
          <a href="#" class="btn btn-primary">Up Coming</a>
          @elseif($data->status == "in progres")
          <a href="#" class="btn btn-warning">In Progres</a>
          @else
          <a href="#" class="btn btn-success">Complete</a>
          @endif
        </td>
        <td>
          <a class="btn btn-info" href="{{ route('projects.show', $data->id) }}">Show</a>
          <a class="btn btn-primary" href="{{ route('projects.edit', $data->id) }}">Edit</a>
          <form action="{{ route('projects.destroy', $data->id) }}" class="d-inline" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger border-0" onclick="return confirm('Are you sure to delete this project?')">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
     </table>
  </div>
</div>
@endsection
