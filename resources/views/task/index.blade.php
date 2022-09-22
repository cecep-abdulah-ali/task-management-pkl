@extends('layouts.app')

@section('content')
<div class="container">
	<h2 class="fw-bolder">Task Management</h2>
	<a href="{{ route('projects.index') }}" class="btn btn-warning"><i class="bi bi-arrow-left-square"></i> Back</a>
	@if (isset($project))
	<a href="{{ route('tasks.create', ['project_id' => $project->id]) }}" class="btn btn-success"><i class="bi bi-plus-lg"></i> Create Task</a>
	@endif
	<div class="row mb-3 mt-3">
			<div class="col-3 col-md-6 col-lg-4 mb-3">
				<div class="card border-0 p-3">
					<div class="card-title">
						<h4 class="fw-semibold text-primary">Up coming</h4>
					</div>
					@foreach ($tasks as $item)
					@if($item->status == "up coming")
					<div class="row p-2">
						<div class="col-12 p-3 border">
							<div class="card-title">
								<h5><b>{{ $item->name }}</b></h5>
							</div>
							<div class="card-body">
								<p class="fw-semibold">Assign To : <button href="" class="badge badge-success border-0">{{ $item->user->name }}</button></p>
								<p class="fw-semibold mb-5">End Date : <button href="" class="badge badge-warning border-0">{{ $item->end_date }}</button></p>

								<a class="btn btn-primary border-0" href="{{ route('tasks.edit', $item->id) }}"><i class="bi bi-pencil-square"></i></a>
								<form action="{{ route('tasks.destroy', ['task' => $item->id]) }}" class="d-inline" method="POST">
									@csrf
									@method('delete')
									<button type="submit" class="btn btn-danger border-0" onclick="return confirm('Are you sure to delete this task?')"><i class="bi bi-trash"></i></button>
								</form>
							</div>
						</div>
					</div>
					@endif
					@endforeach
				</div>
			</div>
			<div class="col-3 col-md-6 col-lg-4 mb-3">
				<div class="card p-3 border-0 border-box">
					<div class="card-title">
						<h4 class="fw-semibold text-warning">In Progres</h4>
					</div>
					@foreach ($tasks as $item)
					@if($item->status == "in progres")
					<div class="row p-2">
						<div class="col-12 p-3 border">
							<div class="card-title">
								<h5><b>{{ $item->name }}</b></h5>
							</div>
							<div class="card-body">
								<p class="fw-semibold">Assign To : <button href="" class="badge badge-success border-0">{{ $item->user->name }}</button></p>
								<p class="fw-semibold mb-5">End Date : <button href="" class="badge badge-warning border-0">{{ $item->end_date }}</button></p>

								<a class="btn btn-primary" href="{{ route('tasks.edit', $item->id) }}"><i class="bi bi-pencil-square"></i></a>
								<form action="{{ route('tasks.destroy', ['task' => $item->id]) }}" class="d-inline" method="POST">
									@csrf
									@method('delete')
									<button type="submit" class="btn btn-danger border-0" onclick="return confirm('Are you sure to delete this task?')"><i class="bi bi-trash"></i></button>
								</form>
							</div>
						</div>
					</div>
					@endif
					@endforeach
				</div>
			</div>
		
			<div class="col-3 col-md-6 col-lg-4 mb-3">
				<div class="card p-3 border-0">
					<div class="card-title">
						<h4 class="fw-semibold text-success">Complete</h4>
					</div>
					@foreach ($tasks as $item)
					@if($item->status == "complete")
					<div class="row p-2">
						<div class="col-12 p-3 border">
							<div class="card-title">
								<h5><b>{{ $item->name }}</b></h5>
							</div>
							<div class="card-body">
								<p class="fw-semibold">Assign To : <button href="" class="badge badge-success border-0">{{ $item->user->name }}</button></p>
								<p class="fw-semibold mb-5">End Date : <button href="" class="badge badge-warning border-0">{{ $item->end_date }}</button></p>

								<a class="btn btn-primary" href="{{ route('tasks.edit', ['task' => $item->id]) }}"><i class="bi bi-pencil-square"></i></a>
								<form action="{{ route('tasks.destroy', ['task' => $item->id]) }}" class="d-inline" method="POST">
									@csrf
									@method('delete')
									<button type="submit" class="btn btn-danger border-0" onclick="return confirm('Are you sure to delete this task?')"><i class="bi bi-trash"></i></button>
								</form>
							</div>
						</div>
					</div>
					@endif
					@endforeach
				</div>
			</div>
		
	</div>
</div>
@endsection
