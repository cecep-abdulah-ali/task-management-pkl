<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\Project;
use Illuminate\Console\View\Components\Task as ComponentsTask;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::with('user')->get();
        // // $task = Task::where('project_id', $id)->get();
        // $uniqid = session('projects');
        // $project = Task::whereIn('project_id', $uniqid)->get();

        return view('task.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $project_id)
    {
        $task_members = User::role('staff')->whereHas('project_staff', function($query) use($project_id){
            $query->where('project_id', $project_id);
        })->get();

        return view('task.create', compact('task_members','project_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'name' => 'required',
        //     'project_id' => 'required',
        //     'user_id' => 'required',
        //     'start_date' => 'required',
        //     'end_date' => 'required',
        //     'status' => 'required',
        //     'comment' => 'required',
        // ]);


        // $data = $request->all();
        // $task = Task::create($data);
        $validatedData = $request->validate([
            // 'project_id' => 'required',
            'name' => 'required|max:255',
            'project_id' => 'required',
            'user_id' => 'required',
            'status' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'comment' => 'required',
        ]);

        // $validatedData['project_id'] = $project;


        $data = Task::create($validatedData);

        return redirect()->route('projects.show', ['project' => $request->project_id])
                            ->with('success','Task created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $task = Task::where('project_id', $id)->get();


        return view('task.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $task_members = User::role('staff')->whereHas('project_staff', function($query) use($task){
            $query->where('project_id', $task->project->id);
        })->get();
        return view('task.edit', compact('task', 'task_members'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $input = $request->all();
        $task->update($input);

        return redirect()->route('projects.show', ['project' => $task->project_id])
                        ->with('success','Task update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $project_id = $task->project_id;
        $task->delete();
        return redirect()->route('projects.show', ['project' => $project_id])
                        ->with('success','Task deleted successfully');
    }
}
