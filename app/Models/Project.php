<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Task;

class Project extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function manager()
    {
        return $this->belongsTo(User::class);
    }

    public function members()
    {
    return $this->belongsToMany(User::class, 'project_staff');
    }

    public function task()
    {
    return $this->hasMany(Task::class);
    }
}
