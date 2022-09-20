<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Hardik Savani', 
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456')
        ]);
    
        $role = Role::create(['name' => 'Admin']);
     
        $permissions = Permission::pluck('id','id')->all();
   
        $role->syncPermissions($permissions);
     
        $user->assignRole([$role->id]);

        $user = User::create([
            'name' => 'Manager', 
            'email' => 'manager@gmail.com',
            'password' => bcrypt('123456')
        ]);
    
        $role = Role::create(['name' => 'Project Manager']);
   
        $role->syncPermissions(['home', 'my-project', 'my-task', 'project-list', 'task-list']);
     
        $user->assignRole([$role->id]);

        $user = User::create([
            'name' => 'Staff', 
            'email' => 'staff@gmail.com',
            'password' => bcrypt('123456')
        ]);
    
        $role = Role::create(['name' => 'Staff']);
   
        $role->syncPermissions(['home', 'my-project', 'my-task']);
     
        $user->assignRole([$role->id]);

        $user = User::create([
            'name' => 'User', 
            'email' => 'user@gmail.com',
            'password' => bcrypt('123456')
        ]);
    
        $role = Role::create(['name' => 'User']);
   
        $role->syncPermissions(['home']);
     
        $user->assignRole([$role->id]);
    }
}
