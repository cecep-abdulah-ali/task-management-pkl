
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
    <div class="col-md-8 bg-white p-5 shadow p-3 mb-5 bg-white rounded">

        <h2>Edit Task</h2>
        <a class="btn btn-warning mt-3" href="{{ route('tasks.index') }}"> Back</a>

        <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="mt-5">
          @method('PATCH')
          @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Task Name : </label>
                <input name="name" type="text" class="form-control" id="name" required autofocus value="{{ $task->name }}">
            </div>
            <div class="mb-3">
              <label for="project_id">In Project : </label>
                  <select name="project_id" class="form-select" id="project_id" aria-label="Default select example" required>
                    @if(old('project_id', $task->project->name) == $task->project->name)
                    <option value="{{ $task->project->id }}" selected>{{ $task->project->name }}</option>
                    @foreach ($task_project as $data)
                    <option value="{{ $data->id }}">{{ $data->name }}</option>
                    @endforeach
                    @endif
                  </select>
            </div>
            <div class="mb-3">
              <label for="user_id">Assign To : </label>
                  <select name="user_id" class="form-select" id="user_id" aria-label="Default select example" required>
                      <option />
                      @if(old('user_id', $task->user->name) == $task->user->name)
                      <option value="{{ $task->user->id }}" selected>{{ $task->user->name }}</option>
                      @foreach ($task_user as $data)
                      <option value="{{ $data->id }}">{{ $data->name }}</option>
                      @endforeach
                      @endif
                  </select>
            </div>
            <div class="mb-3">
            <div class="row g-2">
                <div class="col-md">
                  <div class="form-floating">
                    <input name="start_date" type="date" class="form-control" id="date" required value="{{ $task->start_date }}">
                    <label for="date">Start date :</label> 
                  </div>
                </div>
                <div class="col-md">
                  <div class="form-floating">
                    <input name="end_date" type="date" class="form-control" id="date" required value="{{ $task->end_date }}">
                    <label for="date">End date :</label> 
                  </div>
                </div>
            </div>
            </div>
            <div class="mb-3">
              <label for="status">Status : </label>
                  <select name="status" class="form-select" id="status" aria-label="Default select example" required>
                    @if(old('status', $task->status) == $task->status)
                    <option value="{{ $task->status }}" selected>{{ $task->status }}</option>
                    <option value="up coming">Up coming</option>
                    <option value="in progres">In progres</option>
                    <option value="complete">Complete</option>
                  @endif
                  </select>
            </div>
            <div class="mb-3">
              <div class="form-floating">
                <textarea name="comment" class="form-control" placeholder="Leave a description here" id="comment" style="height: 200px">{{ $task->comment }}</textarea>
                <label for="comment">Comment</label>
              </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
          </form>
    </div>
</div>
@endsection 