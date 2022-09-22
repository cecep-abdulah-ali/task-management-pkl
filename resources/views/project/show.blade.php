
@extends('layouts.app')


@section('content')

<div class="row justify-content-center">
  <div class="col-md-8 shadow p-3 mb-1 bg-white rounded">
    <h2>Project Detail</h2>
  </div>
    <div class="col-md-8 shadow p-3 mb-5 bg-white rounded">
        <div class="card border-0">
          <div class="card-body">
            <h5 class="card-text fn-md">Project Name : <b>{{ $project->name }}</b></h5>
            <br>
            <h5 class="card-text">Project Manager : <b>{{ $projects->manager->name }}</b></h5>
            <br>
            <h5 class="card-text">Project Member : <b>
            @foreach ($project->members as $data)
                {{ $data->name }},
            @endforeach  
            </b></h5>
            <br>
            <h5 class="card-text">Status : <b>{{ $project->status }}</b></h5>
            <br>
            <h5 class="card-text">Start Date : <b>{{ $project->start_date }}</b></h5>
            <br>
            <h5 class="card-text">End Date : <b>{{ $project->end_date }}</b></h5>
            <br>
            <h5 class="card-text">Description : 
              <p><b>{{ $project->description }}</b></p>
            </h5>

            <a href="{{ route('projects.index') }}" class="btn btn-primary mt-5">Close</a>
          </div>
        </div>
    </div>
</div>

@endsection 