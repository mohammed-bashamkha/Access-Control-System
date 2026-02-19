<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'task.view_all',
            'task.view_own',
            'task.create',
            'task.update',
            'task.delete',
            'task.assign',
            'category.manage',
            'category.add_task_to_category',
            'user.manage',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        $admin = Role::firstOrCreate(['name' => 'admin']);
        $manager = Role::firstOrCreate(['name' => 'manager']);
        $user = Role::firstOrCreate(['name' => 'user']);

        $admin->givePermissionTo(Permission::all());

        $manager->givePermissionTo([
            'task.view_all',
            'task.create',
            'task.update',
            'task.assign',
        ]);

        $user->givePermissionTo([
            'task.view_own',
            'task.update',
        ]);
    }
}
