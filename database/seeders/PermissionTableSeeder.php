<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $authorities = config('permission.authorities');

        $listPermissions = [];
        $superAdminPermissions = [];
        $mentorPermissions = [];
        $studentPermissions = [];

        foreach ($authorities as $label => $permissions) {

            foreach ($permissions as $permission) {
                $listPermissions[] = [
                    'name' => $permission,
                    'guard_name' => 'web',
                    'created_at' => date('Y-m-d H:m:s'),
                    'updated_at' => date('Y-m-d H:m:s'),
                ];

                // Super Admin
                $superAdminPermissions[] = $permission;

                // Mentor
                if (in_array($label, ['manage_courses', 'manage_chapters', 'manage_lessons'])) {
                    $mentorPermissions[] = $permission;
                };

                if (in_array($label, ['manage_courses'])) {
                    $studentPermissions[] = ['course_show', 'course_detail'];
                };
            }
        }

        // Insert Permissions
        Permission::insert($listPermissions);

        // Insert Role
        $superAdmin = Role::create([
            'name' => 'SuperAdmin',
            'guard_name' => 'web',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s'),
        ]);

        $mentor = Role::create([
            'name' => 'Mentor',
            'guard_name' => 'web',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s'),
        ]);

        $student = Role::create([
            'name' => 'Student',
            'guard_name' => 'web',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s'),
        ]);

        // Role -> Permission
        $superAdmin->givePermissionTo($superAdminPermissions);
        $mentor->givePermissionTo($mentorPermissions);
        $student->givePermissionTo($studentPermissions);

        $userSuperAdmin = User::find(1)->assignRole('SuperAdmin');
    }
}
