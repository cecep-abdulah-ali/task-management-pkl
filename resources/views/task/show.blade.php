
@extends('layouts.app')


@section('content')

<div class="row justify-content-center">
    <div class="col-md-8 shadow p-3 mb-5 bg-white rounded">
        <h2>Task Detail</h2>
        <div class="card">
          <div class="card-body">
            <h5 class="card-text fn-md">Task Name : <b>{{ $task->name }}</b></h5>
            <br>
            <h5 class="card-text">In Project : <b>{{ $task->project->name }}</b></h5>
            <br>
            <h5 class="card-text">Assign To : <b>{{ $task->user->name }}</b></h5>
            <br>
            <h5 class="card-text">Start Date : <b>{{ $task->start_date }}</b></h5>
            <br>
            <h5 class="card-text">End Date : <b>{{ $task->end_date }}</b></h5>
            <br>
            <h5 class="card-text">Status : 
              <b>
                @if($task->status == "up coming")
                <label class="badge bg-primary">Up coming</label>
                @elseif($task->status == "in progres")
                <label class="badge bg-warning">In progres</label>
                @else
                <label class="badge bg-success">Complete</label>
                @endif
                </b></h5>
            <br>
            <h5 class="card-text">Comment : 
              <p><b>{{ $task->comment }}</b></p>
            </h5>

            <a href="{{ route('tasks.index') }}" class="btn btn-primary mt-5">Close</a>
          </div>
        </div>
    </div>
</div>

@endsection 