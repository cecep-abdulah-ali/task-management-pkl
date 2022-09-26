
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
    <div class="col-md-8 bg-white p-5 shadow p-3 mb-5 bg-body rounded">

        <h2>Create New Project</h2>
        <a class="btn btn-warning mt-3" href="{{ route('projects.index') }}"> Back</a>

        <form action="{{ route('projects.store') }}" method="POST" class="mt-5">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Project Name : </label>
                <input name="name" type="text" class="form-control" id="name" required autofocus>
            </div>
            <div class="mb-3">
              <label for="manager">Project Manager : </label>
                  <select name="manager_id" class="form-select" id="manager" aria-label="Default select example" required>
                      <option />
                      @foreach ($project_manager as $data)
                      <option value="{{ $data->id }}">{{ $data->name }}</option>
                      @endforeach
                  </select>
            </div>
            <div class="mb-3">
              <label for="members">Select Members : </label>
              <select name="members_id[]" multiple="" class="label ui selection fluid dropdown" placeholder="Select Members">
                  @foreach ($project_member as $data)
                  <option value="{{ $data->id }}">{{ $data->name }}</option>
                  @endforeach
              </select>
          </div>
            <div class="mb-3">
              <label for="status">Status : </label>
                  <select name="status" class="form-select" id="status" aria-label="Default select example" required>
                      <option />
                      <option value="up coming">Up coming</option>
                      <option value="in progres">In progres</option>
                      <option value="complete">Complete</option>
                  </select>
            </div>
            <div class="mb-3">
            <div class="row g-2">
                <div class="col-md">
                  <div class="form-floating">
                    <input name="start_date" type="date" class="form-control" id="date" required>
                    <label for="date">Start date :</label> 
                  </div>
                </div>
                <div class="col-md">
                  <div class="form-floating">
                    <input name="end_date" type="date" class="form-control" id="date" required>
                    <label for="date">End date :</label> 
                  </div>
                </div>
            </div>
            </div>
            <div class="mb-3">
              <div class="form-floating">
                <input id="description" type="hidden" name="description" required>
                <trix-editor input="description"></trix-editor>
              </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
          </form>
    </div>
</div>
@endsection 