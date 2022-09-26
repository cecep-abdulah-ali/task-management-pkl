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
     
        $role->syncPermissions(['home-admin', 'user-management', 'role-management', 'project-list', 'project-admin', 'task-admin', 'project-create', 'project-edit', 'project-delete', 'task-create', 'task-edit', 'task-delete']);
     
        $user->assignRole([$role->id]);

        $user = User::create([
            'name' => 'Manager', 
            'email' => 'manager@gmail.com',
            'password' => bcrypt('123456')
        ]);
    
        $role = Role::create(['name' => 'Project Manager']);
   
        $role->syncPermissions(['home-manager', 'project-list', 'project-manager', 'project-edit', 'project-delete', 'task-manager', 'task-create', 'task-edit', 'task-delete']);
     
        $user->assignRole([$role->id]);

        $user = User::create([
            'name' => 'limbad', 
            'email' => 'limbad@gmail.com',
            'password' => bcrypt('123456')
        ]);
        $user->assignRole([$role->id]);

        $user = User::create([
            'name' => 'merah', 
            'email' => 'merah@gmail.com',
            'password' => bcrypt('123456')
        ]);
        $user->assignRole([$role->id]);

        $user = User::create([
            'name' => 'Staff', 
            'email' => 'staff@gmail.com',
            'password' => bcrypt('123456')
        ]);
    
        $role = Role::create(['name' => 'Staff']);
   
        $role->syncPermissions(['home-staff', 'project-list', 'project-staff', 'task-staff', 'task-edit']);
     
        $user->assignRole([$role->id]);

        $user = User::create([
            'name' => 'ragil', 
            'email' => 'ragil@gmail.com',
            'password' => bcrypt('123456')
        ]);
        $user->assignRole([$role->id]);

        $user = User::create([
            'name' => 'ghesa', 
            'email' => 'ghesa@gmail.com',
            'password' => bcrypt('123456')
        ]);  
        $user->assignRole([$role->id]);

        $user = User::create([
            'name' => 'User', 
            'email' => 'user@gmail.com',
            'password' => bcrypt('123456')
        ]);
    
        $role = Role::create(['name' => 'User']);
   
        $role->syncPermissions(['home-user']);
     
        $user->assignRole([$role->id]);
    }
}
