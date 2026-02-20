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
            'المستخدمين.عرض_الكل',
            'المستخدمين.إنشاء',
            'المستخدمين.تحديث',
            'المستخدمين.حذف',
            'الصلاحيات.عرض_الكل',
            'الصلاحيات.إنشاء',
            'الصلاحيات.تحديث',
            'الصلاحيات.حذف',
            'الأدوار.عرض_الكل',
            'الأدوار.إنشاء',
            'الأدوار.تحديث',
            'الأدوار.حذف',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        $admin = Role::firstOrCreate(['name' => 'admin']);

        $admin->givePermissionTo(Permission::all());
    }
}
