<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::with('manager', 'members')->orderBy('id', 'desc')->get();
        // foreach($projects as $data) {
        //     // $task = Task::where('project_id', $data->id)->get();
        //     $excerpt = Str::words($data->description, 10);
        // }
        return view('project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $project_manager = User::role('Project Manager')->get();

        $project_member = user::role('Staff')->get();

        return view('project.create', compact('project_manager', 'project_member'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data = Project::create([
        //     'manager_id' => $request->manager_id,
        //     'name' => $request->name,
        //     'members_id' => $request->members_id,
        //     'status' => $request->status,
        //     'start_date' => $request->start_date,
        //     'end_date' => $request->end_date,
        //     'description' => $request->description,

        // ]);

        // $data = $request->all();
        $validatedData = $request->validate([
            'manager_id' => 'required',
            'name' => 'required|max:255',
            'members_id' => 'required',
            'status' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'description' => 'required',
        ]);

        $validatedData['description'] = strip_tags($request->description);

        $validatedData['excerpt'] = Str::limit(strip_tags($request->description), 50);

        $data = Project::create($validatedData);

        $data->members()->attach($request->input('members_id'));

        return redirect()->route('projects.index')
                        ->with('success','Project created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $tasks = Task::where('project_id', $project->id)->get();

        return view('task.index', compact('tasks', 'project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project_manager = User::role('Project Manager')->get();

        $project_member = user::role('Staff')->get();

        $project = Project::find($id);

        $projects = $project->load('manager');



        return view('project.edit', compact('project', 'projects', 'project_manager', 'project_member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $input = $request->all();

       $project = Project::find($id);

       $project->update($input);


        $project->members()->attach($request->input('members_id'));

        return redirect()->route('projects.index')
                        ->with('success','Project update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Project::find($id)->delete();
        return redirect()->route('projects.index')
                        ->with('success','Project deleted successfully');
    }
}
