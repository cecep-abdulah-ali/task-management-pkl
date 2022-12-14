<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\HomeController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('landingpage');
});

Auth::routes();

Route::group(['middleware' => ['permission:home-user|home-staff|home-manager|home-admin']], function() {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

});

Route::group(['middleware' => ['permission:user-management|role-management|project-list|project-admin|project-manager|project-staff|project-edit|project-create|project-delete']], function() {
    Route::resource('users', UsersController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('projects', ProjectController::class);
});

Route::group(['middleware' => ['permission:task-admin|task-manager|task-staff|task-create|task-edit|task-delete']], function() {
    Route::get('/task', [TaskController::class, 'index']);
    Route::get('/task/create/{project_id}', [TaskController::class, 'create'])->name('tasks.create');
    Route::get('/task/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::get('/task/{task}', [TaskController::class, 'show']);
    Route::post('/task', [TaskController::class, 'store'])->name("tasks.store");
    Route::patch('/task/{task}', [TaskController::class, 'update'])->name('tasks.update');
    Route::delete('/task/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
});
