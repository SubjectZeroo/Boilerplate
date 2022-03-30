<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleSuperAdmin = Role::create(['name' => 'Super Admin']);
        $roleAnalist = Role::create(['name' => 'Analista']);

        /**
         * Permisos de permisos
         */

        Permission::create([
            'name' => 'permissions.index',
            'guard_name' => 'web'
        ])->syncRoles([]);

        Permission::create([
            'name' => 'permissions.create',
            'guard_name' => 'web'
        ])->syncRoles([]);

        Permission::create([
            'name' => 'permissions.edit',
            'guard_name' => 'web'
        ])->syncRoles([]);

        Permission::create([
            'name' => 'permissions.destroy',
            'guard_name' => 'web'
        ])->syncRoles([]);


         /**
         * Permisos de roles
         */

        Permission::create([
            'name' => 'roles.index',
            'guard_name' => 'web'
        ])->syncRoles([]);

        Permission::create([
            'name' => 'roles.create',
            'guard_name' => 'web'
        ])->syncRoles([]);

        Permission::create([
            'name' => 'roles.edit',
            'guard_name' => 'web'
        ])->syncRoles([]);

        Permission::create([
            'name' => 'roles.destroy',
            'guard_name' => 'web'
        ])->syncRoles([]);


         /**
         * Permisos de usuarios
         */

        Permission::create([
            'name' => 'users.index',
            'guard_name' => 'web'
        ])->syncRoles([]);

        Permission::create([
            'name' => 'users.create',
            'guard_name' => 'web'
        ])->syncRoles([]);

        Permission::create([
            'name' => 'users.edit',
            'guard_name' => 'web'
        ])->syncRoles([]);

        Permission::create([
            'name' => 'users.destroy',
            'guard_name' => 'web'
        ])->syncRoles([]);


    }
}
