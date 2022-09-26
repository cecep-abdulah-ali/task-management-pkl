<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role-management',
            'user-management',
            'project-list',
            'project-admin',
            'project-manager',
            'project-staff',
            'project-create',
            'project-edit',
            'project-delete',
            'task-admin',
            'task-manager',
            'task-staff',
            'task-create',
            'task-edit',
            'task-delete',
            'home-staff',
            'home-manager',
            'home-admin',
            'home-user'

         ];
      
         foreach ($permissions as $permission) {
              Permission::create(['name' => $permission]);
         }
    }
}