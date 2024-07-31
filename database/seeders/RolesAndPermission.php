<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesAndPermission extends Seeder
{
    
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'register as admin']);
        Permission::create(['name' => 'register as project member']);
        Permission::create(['name' => 'login']);
        Permission::create(['name' => 'create projects']);
        Permission::create(['name' => 'invite project members']);
        Permission::create(['name' => 'create tasks']);
        Permission::create(['name' => 'assign tasks']);
        Permission::create(['name' => 'delete tasks']);
        Permission::create(['name' => 'update tasks']);
        Permission::create(['name' => 'update task status']);
        Permission::create(['name' => 'accept invitation']);
        Permission::create(['name' => 'view kanban board']);
 
        $admin = Role::create(['name' => 'admin']);
        $projectMember = Role::create(['name' => 'project_member']);
 
        $admin->givePermissionTo([
            'register as admin',
            'register as project member',
            'login',
            'create projects',
            'invite project members',
            'create tasks',
            'assign tasks',
            'delete tasks',
            'update tasks',
            'update task status',
            'view kanban board'
        ]);


        $projectMember->givePermissionTo([
            'register as project member',
            'login',
            'update task status',
            'accept invitation',
            'view kanban board'
        ]);
    }
}
