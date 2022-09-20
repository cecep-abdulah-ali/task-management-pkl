<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Project;
use App\Models\Task;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $role = Role::create(['name' => 'staff']);
        // $permission = Permission::create(['name' => 'akses dashboard']);

        // auth()->user()->givePermissionTo('manage project', 'manage user', 'manage task', 'akses dashboard');

        // auth()->user()->assignRole('administrator');
        // $role = Role::findById(1);
        // $role->givePermissionTo('manage project', 'manage user', 'manage task', 'akses dashboard');

        // $permission = Auth::user()->getPermissionNames();
        // $roles = Auth::user()->getRoleNames();


        return view('home');
    }
}
