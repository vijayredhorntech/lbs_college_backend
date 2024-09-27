<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoleAndPermissionSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            'admin',
            'teacher',
            'student',
        ];
        foreach ($roles as $role){
            \Spatie\Permission\Models\Role::create(['name' => $role]);
        }
    }
}
