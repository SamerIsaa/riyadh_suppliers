<?php

use Illuminate\Database\Seeder;
use \Spatie\Permission\Models\Permission;
use \Spatie\Permission\Models\Role;

class PermissionAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $guard_name = 'admin';

        $dataRoles = [
            [
                'name' => 'Super Admin',
                'guard_name' => $guard_name,
            ],
        ];

        $data = [
            ['name' => 'manage_roles', 'guard_name' => $guard_name,],
            ['name' => 'add_admins', 'guard_name' => $guard_name,],
            ['name' => 'show_admins', 'guard_name' => $guard_name,],
            ['name' => 'manage_faq', 'guard_name' => $guard_name,],
            ['name' => 'manage_pages', 'guard_name' => $guard_name,],
            ['name' => 'manage_settings', 'guard_name' => $guard_name,],
            ['name' => 'manage_inbox', 'guard_name' => $guard_name,],
            ['name' => 'manage_blogs', 'guard_name' => $guard_name,],
        ];

        foreach ($dataRoles as $item) {
            Role::updateOrCreate(['name' => $item['name']], $item);
        }
        foreach ($data as $item) {
            Permission::updateOrCreate(['name' => $item['name']], $item);
        }
    }
}
