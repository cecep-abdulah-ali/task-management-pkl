@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			@if ($message = Session::get('success'))
			<div class="alert alert-success">
			<p>{{ $message }}</p>
			</div>
			@endif
		</div>
	</div>
    <div class="row justify-content-center mt-5 shadow p-3 mb-5 bg-white rounded">
			<div class="row">
				<div class="col-md-12 bg-white p-5">
					<div class="table-wrap">
						<h2>Task Management</h2>
						<th><a href="{{ route('tasks.create') }}" class="btn btn-success"><i class="bi bi-plus-lg"></i> Add Task</a></th>
							<table class="table table-bordered mt-3">
                <thead>
									<tr>
										<th>#</th>
										<th>Name</th>
										<th>In Project</th>
										<th>Assign To</th>
										<th>start date</th>
										<th>End date</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($tasks as $task)		
									<tr>
										<th scope="row">{{ $loop->iteration }}</th>
										<td>{{ $task->name }}</td>
										<td>{{ $task->project->name }}</td>
										<td>{{ $task->user->name }}</td>
										<td>{{ $task->start_date }}</td>
										<td>{{ $task->end_date }}</td>
										<td>
											@if ($task->status == "up coming")
											<a href="#" class="btn btn-primary">Up Coming</a>
											@elseif($task->status == "in progres")
											<a href="#" class="btn btn-warning">In Progres</a>
											@else
											<a href="#" class="btn btn-success">Complete</a>
											@endif
										<td>
											<a class="btn btn-info" href="{{ route('tasks.show', $task->id) }}">Show</a>
											<a class="btn btn-primary" href="{{ route('tasks.edit', $task->id) }}">Edit</a>
											<form action="{{ route('tasks.destroy', $task->id) }}" class="d-inline" method="POST">
												@csrf
												@method('delete')
												<button type="submit" class="btn btn-danger border-0" onclick="return confirm('Are you sure to delete this user?')">Delete</button>
											</form>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
					</div>
				</div>
			</div> 
    </div>
  </div>
</div>
@endsection
