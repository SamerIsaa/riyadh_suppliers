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
            ['name' => 'add_admins', 'guard_name' => $guard_name,],
            ['name' => 'show_admins', 'guard_name' => $guard_name,],
            ['name' => 'delete_admins', 'guard_name' => $guard_name,],
            ['name' => 'manage_roles', 'guard_name' => $guard_name,],


            ['name' => 'manage_inbox', 'guard_name' => $guard_name,],

            ['name' => 'manage_faq', 'guard_name' => $guard_name,],
            ['name' => 'manage_services', 'guard_name' => $guard_name,],
            ['name' => 'manage_pages', 'guard_name' => $guard_name,],
            ['name' => 'manage_settings', 'guard_name' => $guard_name,],
        ];

        $admin = \App\Model\Admin::query()->updateOrCreate([
            'email' => 'admin@admin.com'
        ], [
            'name' => 'admin',
            'password' => \Illuminate\Support\Facades\Hash::make(123456),
        ]);


        foreach ($dataRoles as $item) {
            $role = Role::query()->updateOrCreate(['name' => $item['name']], $item);
        }
        foreach ($data as $item) {
            $per = Permission::query()->updateOrCreate(['name' => $item['name']], $item);
            $role->givePermissionTo($per);
        }

        $admin->syncRoles([$role['id']]);

    }
}
